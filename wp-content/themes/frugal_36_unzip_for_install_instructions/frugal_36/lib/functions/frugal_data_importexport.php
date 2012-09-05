<?php

function frugal_delete_dir($dir)
{
	$handle = opendir($dir);
	while(false !== ($file = readdir($handle)))
	{
		if(is_dir($dir.'/'.$file))
		{
			if(($file != '.') && ($file != '..'))
			{
				frugal_delete_dir($dir.'/'.$file);
			}
		}
		else
		{
			unlink($dir.'/'.$file);
		}
	}
	closedir($handle);
	rmdir($dir);
}

function get_importables($p_event, $p_header)
{
	$info = pathinfo($p_header['filename']);
	$ext = array('dat','jpg','png','gif'); 
	if (in_array( strtolower($info['extension']), $ext))
	{
		if ($info['basename']{0} ==  '.')
		{
			return 0;
		}
		else 
		{
			return 1;
		}
	}
	else
	{
	  return 0;
	}
}

function frugal_array_merge($array1, $array2)
{
	$merged = $array1;
	foreach($array2 as $key => $value)
	{
		if (is_array($value) && isset($merged[$key]) && is_array($merged[$key]))
		{
			$merged[$key] = frugal_array_merge($merged[$key],$value);
		}
		else
		{
			$merged[$key] = $value;
		}
	}
	return $merged;
}

function frugal_data_export($frugal_skin_name = 'no_skin_name', $export_images = 'no_export_images')
{
	global $fr_multisite;
	$frugal_blogname = strtolower(preg_replace('#\W#','_',get_option('blogname')));
	if( false == $fr_multisite )
	{
		$tmp_path = FRUGAL_ADMIN .'/data/tmp/';
	}
	elseif( true == $fr_multisite )
	{
		global $current_blog;
		$current_blog_id = $current_blog->blog_id;
		$tmp_path = FRUGAL_ADMIN .'/data/tmp/';
	}
	
	$main_options = get_option('frugal_main_options');
	$feature_options = get_option('frugal_feature_options');
	$header_design = get_option('frugal_header_design');
	$content_design = get_option('frugal_content_design');
	$feature_design = get_option('frugal_feature_design');

	if($frugal_skin_name != 'no_skin_name')
	{
		$export_type = 'skin';
		$skin_name = str_replace(' ','_',$frugal_skin_name);
		$skin_name_dash = $skin_name.'-';
		$export_filename = $skin_name.'-skin';
		$export_filename_dat = $export_filename.'.dat';
		$export_filename_zip = $export_filename.'.zip';
		
		$export_file_array = array($tmp_path.$export_filename_dat);
		if( false == $fr_multisite )
		{
			$images_path = WP_CONTENT_DIR . '/uploads/frugal/';
		}
		elseif( true == $fr_multisite )
		{
			global $current_blog;
			$current_blog_id = $current_blog->blog_id;		
			$images_path = WP_CONTENT_DIR . '/uploads/frugal/' . $current_blog_id . '/';
		}
		$handle = opendir($images_path);
		while (false !== ($file = readdir($handle)))
		{
			$skin_image = strpos($file,$skin_name_dash);
			if ($skin_image === 0)
			{
				array_push($export_file_array, $images_path.$file);
			}
		}
		closedir($handle);
		sort($export_file_array);
		$export_files = implode(',',$export_file_array);
		
		$data_export_options = array('frugal_feature_options' => $feature_options, 'frugal_header_design' => $header_design, 'frugal_content_design' => $content_design, 'frugal_feature_design' => $feature_design);
	}
	else
	{
		$export_type = 'options';
		$export_filename = $frugal_blogname.'_frugal-'.$export_type.'-export_'.date('Y-m-d-His');
		$export_filename_dat = $export_filename.'.dat';
		$export_filename_zip = $export_filename.'.zip';	
		$data_export_options = array('frugal_main_options' => $main_options, 'frugal_feature_options' => $feature_options, 'frugal_header_design' => $header_design, 'frugal_content_design' => $content_design, 'frugal_feature_design' => $feature_design);
		
		if($export_images[0] == 'export_images')
		{
			$export_file_array = array($tmp_path.$export_filename_dat);
			if( false == $fr_multisite )
			{
				$images_path = WP_CONTENT_DIR . '/uploads/frugal/';
			}
			elseif( true == $fr_multisite )
			{
				global $current_blog;
				$current_blog_id = $current_blog->blog_id;		
				$images_path = WP_CONTENT_DIR . '/uploads/frugal/' . $current_blog_id . '/';
			}
			$handle = opendir($images_path);
			while (false !== ($file = readdir($handle)))
			{
				if($file == "." || $file == ".." || $file == "adminthumbnails"){
            continue;
        }
				$ext = strtolower(substr(strrchr($file, '.'), 1));
				if($ext = 'jpg' || $ext = 'png' || $ext = 'gif')
				{
					array_push($export_file_array, $images_path.$file);
				}
			}
			closedir($handle);
			sort($export_file_array);
			$export_files = implode(',',$export_file_array);
		}
		else
		{
			$export_files = $tmp_path.$export_filename_dat;
		}
	}
	
	$default_options = frugal_defaults();
	
	$option_differences = array();
	foreach($data_export_options as $key => $value)
	{
		if (array_diff_assoc($data_export_options[$key], $default_options[$key]))
		{
			$export_differences[$key] = array_diff_assoc($data_export_options[$key], $default_options[$key]);
		}
	}
	$serialized_export_options = serialize($export_differences);
	
	if(!is_dir($tmp_path))
	{
		mkdir($tmp_path);
	}
	$dat_file = fopen($tmp_path.$export_filename_dat, 'x');
	fwrite($dat_file, $serialized_export_options);
	fclose ($dat_file); 
	
	$frugal_options_export = new PclZip($tmp_path.$export_filename_zip);
	$frugal_export_zip = $frugal_options_export->create($export_files, PCLZIP_OPT_REMOVE_ALL_PATH);
	if ($frugal_export_zip == 0)
	{
		die("Error : ".$frugal_options_export->errorInfo(true));
	}
	
	global $current_blog, $wpdb;
	header("Cache-Control: public, must-revalidate");
	header("Pragma: hack");
	header("Content-Type: application/zip");
	header('Content-Disposition: attachment; filename="'.$export_filename_zip.'"');
	readfile($tmp_path.$export_filename_zip);
	frugal_delete_dir($tmp_path);
	exit();
}

function frugal_data_import($import_file, $import_type, $option_sets = 'no_option_sets')
{
	global $fr_multisite;
	
	if('zip' == strtolower(substr(strrchr($import_file['name'], '.'), 1)))
	{
		$import_tmp_name = $import_file['tmp_name'];
		$zip_file = new PclZip($import_tmp_name);
		if( false == $fr_multisite )
		{
			$tmp_path = WP_CONTENT_DIR . '/uploads/frugal/tmp/';
			$upload_path = WP_CONTENT_DIR . '/uploads/frugal/';
			$adminthumb_path = WP_CONTENT_DIR . '/uploads/frugal/adminthumbnails/';
		}
		elseif( true == $fr_multisite )
		{
			global $current_blog;
			$current_blog_id = $current_blog->blog_id;		
			$tmp_path = WP_CONTENT_DIR . '/uploads/frugal/' . $current_blog_id . '/tmp/';
			$upload_path = WP_CONTENT_DIR . '/uploads/frugal/' . $current_blog_id . '/';
			$adminthumb_path = WP_CONTENT_DIR . '/uploads/frugal/'. $current_blog_id .'/adminthumbnails/';
		}
		
		if (($unzip_result_list = $zip_file->extract(PCLZIP_OPT_PATH, $tmp_path, PCLZIP_OPT_REMOVE_ALL_PATH, PCLZIP_CB_PRE_EXTRACT, 'get_importables')) == 0)
		{
			die("Error : ".$zip_file->errorInfo(true));
		}		
		$import_image_flag = array_search('include_images', (array) $option_sets);
		$data_file_list = array();
		$handle = opendir($tmp_path);
		while (false !== ($file = readdir($handle)))
		{
			$ext = strtolower(substr(strrchr($file, '.'), 1));
			if(($import_image_flag !== false || $import_type == 'skin') && ($ext == 'jpg' || $ext == 'gif' || $ext == 'png'))
			{
				switch($ext)
				{
					case 'jpg':
					$src = imagecreatefromjpeg($tmp_path . $file);
					$img_type = "jpeg";
					break;
					
					case 'gif':
					$src = imagecreatefromgif($tmp_path . $file);
					$img_type = "gif";
					break;
					
					case 'png':
					$src = imagecreatefrompng($tmp_path . $file);
					$img_type = "png";
					break;
				}
				list($width,$height)=getimagesize($tmp_path . $file);
				$tmp=imagecreatetruecolor($width,$height);
				
				//If the image type is png or gif make temp image transparent
				if(($img_type == "png") || ($img_type =="gif"))
				{
					imagealphablending($tmp, false);
					imagesavealpha($tmp,true);
					$transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
					imagefilledrectangle($tmp, 0, 0, $width, $height, $transparent);
				}
				imagecopy($tmp,$src,0,0,0,0,$width,$height);
				$filename = $upload_path . clean($file);
				
				//Check image type and save accordingly. Gifs are converted to PNG (with .gif extension) to ensure graceful resizing.
				switch ($img_type)
				{
					case "jpeg":
					imagejpeg($tmp,$filename,100);
					break;
					
					case "png":
					imagepng($tmp,$filename);
					break;
					
					case "gif":
					imagepng($tmp,str_replace('.gif','.png',$filename));
					break;
				}

				//The below creates the 100 pixel wide thumbnail used only by the admin panel when listing the images
				$newheight1=($height/$width)*100;
				if ($width < 10 || $height < 10)
				{
					$newwidth=100;
					$newheight=100;
				}
				elseif ($width < 100 && $height < 100)
				{
					$newwidth=$width;
					$newheight=$height;
				}
				elseif ($width > 100 && $newheight1 > 100)
				{
					$newwidth=100;
					$newheight=100;
				}
				elseif ($width > 100 && $newheight1 < 100)
				{
					$newwidth=100;
					$newheight=$newheight1;
				}
				elseif ($width < 100 && $newheight1 > 100)
				{
					$newwidth=$width;
					$newheight=100;
				}
				elseif ($width > 100 && $height < 100)
				{
					$newwidth=100;
					$newheight=$height;
				}
				else
				{
					$newwidth=100;
					$newheight=100;
				}
				$tmp=imagecreatetruecolor($newwidth,$newheight);	
				
				//If the image type is png or gif make temp image transparent
				if(($img_type == "png") || ($img_type =="gif"))
				{
					imagealphablending($tmp, false);
					imagesavealpha($tmp,true);
					$transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
					imagefilledrectangle($tmp, 0, 0, $newwidth, $newheight, $transparent);
				}

				imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 
			
				$adminthumbname = $adminthumb_path . clean($file);
				
				//Check image type and save accordingly. Gifs are converted to PNG (with .gif extension) to ensure graceful resizing.
				switch ($img_type)
				{
					case "jpeg":
					$src = imagejpeg($tmp,$adminthumbname);
					break;
					
					case "png":
					$src = imagepng($tmp,$adminthumbname);
					break;
					
					case "gif":
					$src = imagepng($tmp,str_replace('.gif','.png',$adminthumbname));
					break;
				}

				//The below sets the correct permissions on the uploaded files
				if (strlen($file) > 0)
				{
				@chmod($upload_path . $file, 0644);
				@chmod($adminthumb_path . $file, 0644);
				}
				
				//The below destroys the temporary files created by PHP
				//imagedestroy($src);
				//imagedestroy($tmp);		
			}
			elseif($ext == 'dat')
			{
				array_push($data_file_list,$file);
			}
		}

		$default_options = frugal_defaults();
		$import_file_count = count($data_file_list);
		
		if($import_file_count == 1 && $import_type == 'skin')
		{
			$raw_data = file_get_contents($tmp_path . $data_file_list[0]);
			$import_data = unserialize($raw_data);
			$merged_import = frugal_array_merge($default_options,$import_data);
			
			$feature_options = $merged_import['frugal_feature_options'];
			$header_design = $merged_import['frugal_header_design'];
			$content_design = $merged_import['frugal_content_design'];
			$feature_design = $merged_import['frugal_feature_design'];
			$option_sets = array('feature_options','header_design','content_design','feature_design');
			
			foreach($option_sets as $option)
			{
					update_option('frugal_'.$option,$$option);
			}
		}
		elseif($import_file_count == 1 && $import_type == 'options')
		{
			$raw_data = file_get_contents($tmp_path . $data_file_list[0]);
			$import_data = unserialize($raw_data);
			$merged_import = frugal_array_merge($default_options,$import_data);
			
			$main_options = $merged_import['frugal_main_options'];
			$feature_options = $merged_import['frugal_feature_options'];
			$header_design = $merged_import['frugal_header_design'];
			$content_design = $merged_import['frugal_content_design'];
			$feature_design = $merged_import['frugal_feature_design'];
			
			foreach($option_sets as $option)
			{
				if($option != 'include_images')
				{
					update_option('frugal_'.$option,$$option);
				}
			}			
		}
		elseif($import_file_count > 1 && $import_type == 'skin')
		{
			foreach($data_file_list as $data_file)
			{
				$raw_data = file_get_contents($tmp_path . $data_file);
				$import_data = unserialize($raw_data);
				
				if(isset($import_data['fr_homepage_display']))
				{
					$feature_options = $default_options['frugal_feature_options'];
					$merged_import = frugal_array_merge($feature_options,$import_data);
					update_option('frugal_feature_options',$merged_import);
				}
				elseif(isset($import_data['fr_logo_type']))
				{
					$header_design = $default_options['frugal_header_design'];
					$merged_import = frugal_array_merge($header_design,$import_data);					
					update_option('frugal_header_design',$merged_import);
				}
				elseif(isset($import_data['fr_universal_fonts_active']))
				{
					$content_design = $default_options['frugal_content_design'];
					$merged_import = frugal_array_merge($content_design,$import_data);					
					update_option('frugal_content_design',$merged_import);
				}
				elseif(isset($import_data['fr_ft_bg_type']))
				{
					$feature_design = $default_options['frugal_feature_design'];
					$merged_import = frugal_array_merge($feature_design,$import_data);					
					update_option('frugal_feature_design',$merged_import);
				}
			}
		}
		elseif($import_file_count > 1 && $import_type == 'options')
		{
			foreach($data_file_list as $data_file)
			{
				$raw_data = file_get_contents($tmp_path . $data_file);
				$import_data = unserialize($raw_data);
				
				if(isset($import_data['fr_custom_stylesheet']))
				{
					$main_options = $default_options['frugal_main_options'];
					$merged_import = frugal_array_merge($main_options,$import_data);
					update_option('frugal_main_options',$merged_import);
				}
				elseif(isset($import_data['fr_homepage_display']))
				{
					$feature_options = $default_options['frugal_feature_options'];
					$merged_import = frugal_array_merge($feature_options,$import_data);
					update_option('frugal_feature_options',$merged_import);
				}
				elseif(isset($import_data['fr_logo_type']))
				{
					$header_design = $default_options['frugal_header_design'];
					$merged_import = frugal_array_merge($header_design,$import_data);					
					update_option('frugal_header_design',$merged_import);
				}
				elseif(isset($import_data['fr_universal_fonts_active']))
				{
					$content_design = $default_options['frugal_content_design'];
					$merged_import = frugal_array_merge($content_design,$import_data);					
					update_option('frugal_content_design',$merged_import);
				}
				elseif(isset($import_data['fr_ft_bg_type']))
				{
					$feature_design = $default_options['frugal_feature_design'];
					$merged_import = frugal_array_merge($feature_design,$import_data);					
					update_option('frugal_feature_design',$merged_import);
				}
			}		
		}
		frugal_delete_dir($tmp_path);
		wp_redirect('admin.php?page=frugal&import=complete');
		exit();		
	}
	else 
	{
		wp_redirect('admin.php?page=frugal&import=fail');
		exit();
	}
}