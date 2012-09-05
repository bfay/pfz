<?php

require ('upload/settings.php');
require_once(ABSPATH . 'wp-admin/includes/class-pclzip.php');

function uploadImage()
	{
	 global $settings, $message;
	 
			$resizeimage = $_POST['resizeimage'];
			$resizewidth = $_POST['resizewidth'];
			$createthumbnail = $_POST['createthumbnail'];
			$resizethumbwidth = $_POST['resizethumbwidth'];
			$path = $settings['uploadpath'];
			$uploadedfile = $_FILES['image']['tmp_name'];	
		
		//Check if an empty upload request has been made and return an error
		if ( !$uploadedfile )
		{	
			
			$message = '<div class="error">Please select a file to upload.</div>';
			
		}

		//Check if the file being uploaded matches the $settings['filetypes'], if so continue, if not
		//return an error
		else if (in_array($_FILES["image"]["type"],$settings[filetypes]))
		{
		 	if( $_FILES["image"]["type"] == "image/pjpeg" || $_FILES["image"]["type"] == "image/jpeg" ) {
		 	$src = imagecreatefromjpeg($uploadedfile);
		 	//Set image type to jpg
			$imgType = "jpeg";
			}
			if( $_FILES["image"]["type"] == "image/x-png" || $_FILES["image"]["type"] == "image/png" ) {
		 	$src = imagecreatefrompng($uploadedfile);
			//Set image type to png
			$imgType = "png";
		 	}
			if( $_FILES["image"]["type"] == "image/gif" ) {
		 	$src = imagecreatefromgif($uploadedfile);
		 	//Set image type to gif
			$imgType = "gif";
			}
		 	list($width,$height)=getimagesize($uploadedfile);
			
			//If the image is larger than our specified width then resize it and continue
			if ($resizeimage==1 && $width > $resizewidth)
			{
			$newwidth=$resizewidth;
			$newheight=($height/$width)*$resizewidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);
				
			//If the image type is png or gif make temp image transparent
			if(($imgType == "png") || ($imgType =="gif"))
			{
				imagealphablending($tmp, false);
				imagesavealpha($tmp,true);
				$transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
				imagefilledrectangle($tmp, 0, 0, $newwidth, $newheight, $transparent);
			}

			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 
			
			}
			//If the image is smaller than our specified width then do not resize and continue
			else
			{
			$tmp=imagecreatetruecolor($width,$height);
				
			//If the image type is png or gif make temp image transparent
			if(($imgType == "png") || ($imgType =="gif"))
			{
				imagealphablending($tmp, false);
				imagesavealpha($tmp,true);
				$transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
				imagefilledrectangle($tmp, 0, 0, $width, $height, $transparent);
			}

			imagecopy($tmp,$src,0,0,0,0,$width,$height);	
			}
			$filename = $settings['uploadpath'] . clean($_FILES['image']['name']);
			
			//Check if a file with the same name already exists on the server, if so return an error, if not
			//continue processing and write the file to disk
			if (!file_exists($filename))
			{
				
				//Check image type and save accordingly. Gifs are converted to PNG  to ensure graceful resizing.
				switch ($imgType)
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
				if ($width < 10 || $height < 10):
				$newwidth=100;
				$newheight=100;
				elseif ($width < 100 && $height < 100):
				$newwidth=$width;
				$newheight=$height;
				elseif ($width > 100 && $newheight1 > 100):
				$newwidth=100;
				$newheight=100;
				elseif ($width > 100 && $newheight1 < 100):
				$newwidth=100;
				$newheight=$newheight1;
				elseif ($width < 100 && $newheight1 > 100):
				$newwidth=$width;
				$newheight=100;
				elseif ($width > 100 && $height < 100):
				$newwidth=100;
				$newheight=$height;
				else:
				$newwidth=100;
				$newheight=100;
				endif;
				$tmp=imagecreatetruecolor($newwidth,$newheight);	
				
				//If the image type is png or gif make temp image transparent
				if(($imgType == "png") || ($imgType =="gif"))
				{
					imagealphablending($tmp, false);
					imagesavealpha($tmp,true);
					$transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
					imagefilledrectangle($tmp, 0, 0, $newwidth, $newheight, $transparent);
				}

				imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 
			
				$adminthumbname = $settings['adminthumbpath'] . clean($_FILES['image']['name']);
				
				//Check image type and save accordingly. Gifs are converted to PNG  to ensure graceful resizing.
				switch ($imgType)
				{
					case "jpeg":
					imagejpeg($tmp,$adminthumbname);
					break;
					case "png":
					imagepng($tmp,$adminthumbname);
					break;
					case "gif":
					imagepng($tmp,str_replace('.gif','.png',$adminthumbname));
					break;
				}

					//The below sets the correct permissions on the uploaded files
					if (strlen($_FILES['image']['name']) > 0)
					{
					@chmod($settings['uploadpath'] . $_FILES['image']['name'], 0644);
					@chmod($settings['adminthumbpath'] . $_FILES['image']['name'], 0644);
					}
				
				//The below destroys the temporary files created by PHP
				imagedestroy($src);
				imagedestroy($tmp);	

				//If the upload has been successful, the below is displayed.
				$message = '<div class="success">' . __('Your image has been uploaded.', 'frugal') . '</div>';			
			}
			//The below is displayed if the filename being uploaded already exists on the server
			else
			{
			$message = '<div class="error">' . __('A file with this name already exists.', 'frugal') . '</div>';	
			}
				
			}
			
			//The below is displayed if the file being uploaded does not match the specified filetypes
			//held in the $settings['filetypes'] array above.	
			else 
			{
			$message = '<div class="error">' . __('This is not a valid filetype.  Valid filetypes are JPG, GIF and .PNG.', 'frugal') . '</div>';
			}
	
	}
	
function listimages()
{
	global $settings;
	$content = '';
	//Open the upload directory
	$dir_handle = opendir($settings['uploadpath']);
	
	//Read the contents of the upload directory
	while (false !== ($file = readdir($dir_handle)))  
	{
		if ( !eregi( "gif|jpg|png|bmp" , $file ) )
		{
			continue;
		}
		else
		{
			//Get the width and height of each image
			list($width,$height) = getimagesize($settings['uploadpath'].$file);
			
			//Get the file size of each image
			$file_size = returnFilesize(filesize($settings['uploadpath'].$file));
				
			$content .= '<div class="placeholder2"><b class="container"><b class="container1"></b>';
		$content .= '<b class="container2"><b></b></b><b class="container3"></b>';
		$content .= '<b class="container4"></b><b class="container5"></b></b>';
			$content .= '<div class="containercontent">';
			
			$content .= '<div class="imagecontainer"><div class="thumbnaildiv"><img src="'.$settings['adminthumbpath2'].''.$file.'" alt="'.$file.'" class="thumbnail" /></div>';
			
			$content .= '<div class="imagetext">';
			
			$content .= '<p class="imageinfo">' . __('Filename:', 'frugal') . '  '.$file.'</p>';
			
			$content .= '<p class="imagedetails">' . __('Width:', 'frugal') . '  '.$width.' pixels</p>';
			
			$content .= '<p class="imagedetails">' . __('Height:', 'frugal') . '  '.$height.' pixels</p>';
			
			$content .= '<p class="imagesize">' . __('Filesize:', 'frugal') . '  '.$file_size.'</p>';
			
			$content .= '<p class="imagelink"><a href="'.$settings['realpath'].''.$file.'">'.$settings['realpath'].''.$file.'</a></p>';
			$content .= '<p><input type="checkbox" value="'.urlencode($file).'" name="bulk_delete[]" class="image_check">' . __('Select this image for Bulk Delete', 'frugal') . '</p>';
			$content .= '</div></div>';
			$content .= '<div class="buttoncontainer"><a href="?page=frugal&fct=rename&filename='.urlencode($file).'" class="button">' . __('Rename Image', 'frugal') . '</a>';
			$content .= '<a href="?page=frugal&fct=delete&filename='.urlencode($file).'" class="button">' . __('Delete Image', 'frugal') . '</a></div>'; 				  
			$content .= '</div><b class="container"><b class="container5"></b>';
		$content .= '<b class="container4"></b><b class="container3"></b>';
		$content .= '<b class="container2"><b></b></b><b class="container1"><b></b></b></b></div>';
		}			
		
	}
	//Close the upload directory
	closedir($dir_handle);
	
	echo $content;	
}

//Show the upload options, including resize and thumbnail options.	
function uploadoptions()
{
	global $settings;
	$content = '';
	
	if ($settings['resizeimages']==1)
	{
	$checked="checked";	
	} 
	$content .= '<div id="uploadoptions" style="display:none; overflow:hidden; height:150px;">';
	$content .= '<div class="placeholderoptions"><b class="uploadoptions"><b class="uploadoptions1"></b>';
	$content .= '<b class="uploadoptions2"><b></b></b><b class="uploadoptions3"></b>';
	$content .= '<b class="uploadoptionsr4"></b><b class="uploadoptions5"></b></b>';
	$content .= '<div class="uploadoptionscontent">';
	$content .= '<center><span class="boxheader">' . __('Upload Options', 'frugal') . '</span></center>';
	$content .= __('Resize Image?', 'frugal') . ' <input type="checkbox" name="resizeimage" value="1" '.$checked.'> ' . __('Will only resize image if larger than custom width below.', 'frugal') . '<br />';
	$content .= __('Image Width (in pixels)', 'frugal') . ': <input type="text" size="5" class="optionsinput" name="resizewidth" value="'.$settings['imagewidth'].'"><br /><br />';		
	$content .= '</div><b class="uploadoptions"><b class="uploadoptions5"></b>';
	$content .= '<b class="uploadoptions4"></b><b class="uploadoptions3"></b>';
	$content .= '<b class="uploadoptions2"><b></b></b><b class="uploadoptions1"><b></b></b></b></div>';
	$content .= '</div>';
	echo $content;
	
}

//Rename image function, get the file data ready for renaming	
function renameimage()
{
	global $settings;
		$currentfilename = filename($_GET['filename']);
		$currentextension = extension($_GET['filename']);
		
		$content .= '<div class="blackout">';
		$content .= '<div class="box"><div class="boxtext"><span class="boxheader">' . __('Rename Image', 'frugal') . '</span>';
		$content .= '<form method="post" action="?page=frugal&fct=dorename" class="emailform">';
		$content .= __('Current Filename:', 'frugal') . '<br />';
		$content .= '<input name="currentfilename" type="text" size="31" class="renameinput" value="'.$currentfilename.'.'.$currentextension.'" readonly>';
		$content .= '<br /><br /><br />' . __('Rename to:', 'frugal') . '<br />';
		$content .= '<input name="newfilename" type="text" size="21" class="renameinput"><input name="currentextension" type="text" size="4" class="renameinput" value=".'.$currentextension.'" readonly>';
		$content .= '<div class="buttoncontainer"><input type="submit" name="submit" value="Rename" class="inputbutton"></input>';
		$content .= '<a href="?page=frugal" class="button">' . __('Cancel', 'frugal') . '</a>';
		$content .= '</form>';
		$content .= '</div></div></div></div>';
		
		echo $content;
	}

//The below function actually performs the file rename	
function dorename()
{
	global $settings;
	if ($_POST['submit']=="Rename")
	{
		$oldname = $_POST['currentfilename'];
		$newname = $_POST['newfilename'] .$_POST['currentextension'];
		
		//If an empty filename is attempted to be posted, show below
		if (!$_POST['newfilename'])
		{
		$content .= '<div class="blackout">';
		$content .= '<div class="box"><div class="boxtext"><span class="boxheader">' . __('Rename Image', 'frugal') . '</span><br />';
		$content .= '<div class="renameerror"></div>';
		$content .= __('You did not supply a filename.', 'frugal') . '';
		$content .= '<a href="?page=frugal" class="okbutton">' . __('OK', 'frugal') . '</a></div></div></div>';	
		}
		else
		{
		
		//Rename the main image file and the admin thumbnail file(if it exists)
		rename( $settings['uploadpath'] . $oldname, $settings['uploadpath'] . clean($newname) );
		if (file_exists($settings['adminthumbpath'] . $oldname)):
		rename( $settings['adminthumbpath'] . $oldname, $settings['adminthumbpath'] . clean($newname) );
		endif;
		
		$content .= '<div class="blackout">';
		$content .= '<div class="box"><div class="boxtext"><span class="boxheader">' . __('Rename Image', 'frugal') . '</span><br />';
		$content .= '<div class="deletesuccess"></div>';
		$content .= '<strong>'.$oldname.'</strong> ' . __('has been successfully renamed to', 'frugal') . ' <strong>'.$newname.'</strong>.';
		$content .= '<a href="?page=frugal" class="okbutton">' . __('OK', 'frugal') . '</a></div></div></div>';
		}
	}
	//If function is called with no POST or other data display below
	else
	{
		$content .= '<div class="blackout">';
		$content .= '<div class="box"><div class="boxtext"><span class="boxheader">' . __('Rename Image', 'frugal') . '</span><br />';
		$content .= '<div class="renameerror"></div>';
		$content .= __('You did not supply a filename.', 'frugal');
		$content .= '<a href="?page=frugal" class="okbutton">' . __('OK', 'frugal') . '</a></div></div></div>';		
	}
	echo $content;
}		

//Delete image function, get the file data ready for deletion	
function deleteimage()
{
	global $settings;
	
		//If a delete request is received, display a confirmation message
		$filename = $_GET['filename'];
		$content .= '<div class="blackout">';
		$content .= '<div class="box"><div class="boxtext"><span class="boxheader">' . __('Delete Image', 'frugal') . '</span>';
		$content .= '<form method="post" action="?page=frugal&fct=dodelete" class="emailform">';
		$content .= __('Are you sure you want to delete', 'frugal') . ' <strong>'.$filename.'</strong>?<br />';
		$content .= '<img src="'.$settings['adminthumbpath2'].''.$filename.'" class="boxthumbnail" alt="'.$filename.'" /><br />';
		$content .= '<div class="buttoncontainer"><input type="submit" name="submit" value="Delete" class="inputbutton"></input>';
		$content .= '<a href="?page=frugal" class="button">' . __('Cancel', 'frugal') . '</a>';
		$content .= '<input type="hidden" name="deletefile" value="'.$filename.'"></input>';
		$content .= '</form>';
		$content .= '</div></div></div></div>';
		
		echo $content;
	}
	
//The below function actually performs the file rename	
function dobulkdelete()
{
	global $settings;
	$bulk_delete = $_POST['bulk_delete'];
	foreach( (array) $bulk_delete as $filename)
	{
		//Delete the main image file, the admin thumbnail file and the thumbnail file (if it exists)
		unlink( $settings['uploadpath'] . $filename );
		if (file_exists($settings['adminthumbpath'] . $filename))
		{
		unlink( $settings['adminthumbpath'] . $filename );
		}
	}
}

function dodelete()
{
	global $settings;
	if ($_POST['submit']=="Delete")
	{
		$filename = $_POST['deletefile'];
		
		//If an empty filename is attempted to be posted, show below
		if (!$_POST['deletefile'])
		{
		$content .= '<div class="blackout">';
		$content .= '<div class="box"><div class="boxtext"><span class="boxheader">' . __('Delete Image', 'frugal') . '</span><br />';
		$content .= '<div class="renameerror"></div>';
		$content .= __('You did not supply a filename.', 'frugal');
		$content .= '<a href="?page=frugal" class="okbutton">' . __('OK', 'frugal') . '</a></div></div></div>';	
		}
		else
		{
		
		//Delete the main image file, the admin thumbnail file and the thumbnail file (if it exists)
		unlink( $settings['uploadpath'] . $filename );
		if (file_exists($settings['adminthumbpath'] . $filename)):
		unlink( $settings['adminthumbpath'] . $filename );
		endif;
		
		$content .= '<div class="blackout">';
		$content .= '<div class="box"><div class="boxtext"><span class="boxheader">' . __('Delete Image', 'frugal') . '</span><br />';
		$content .= '<div class="deletesuccess"></div>';
		$content .= '<strong>'.$filename.'</strong> ' . __('has been successfully deleted.', 'frugal') . '</strong>.';
		$content .= '<a href="?page=frugal" class="okbutton">' . __('OK', 'frugal') . '</a></div></div></div>';
		}
	}
	//If function is called with no POST or other data display below
	else
	{
		$content .= '<div class="blackout">';
		$content .= '<div class="box"><div class="boxtext"><span class="boxheader">' . __('Delete Image', 'frugal') . '</span><br />';
		$content .= '<div class="renameerror"></div>';
		$content .= __('You did not supply a filename.', 'frugal');
		$content .= '<a href="?page=frugal" class="okbutton">' . __('OK', 'frugal') . '</a></div></div></div>';		
	}
	echo $content;
}			

//The below function is used to correctly display the filesize
function returnFilesize($file_size)
{
	if ($file_size >= 1073741824) 
	{
		$show_filesize = number_format(($file_size / 1073741824),2) . " GB";
	} 
	elseif ($file_size >= 1048576) 
	{
	$show_filesize = number_format(($file_size / 1048576),2) . " MB";
	} 
	elseif ($file_size >= 1024) 
	{
		$show_filesize = number_format(($file_size / 1024),2) . " KB";
	} 
	elseif ($file_size >= 0) 
	{
		$show_filesize = $file_size . " bytes";
	} 
	else 
	{
		$show_filesize = "0 bytes";
	}
	
	return $show_filesize;
}

function filename($string) {
	$file = $string;
	$i = strrpos($file,'.');
	$filename = substr($file,0,$i);
	return $filename;
}

function extension($string) {
	$file = $string;
	$i = strrpos($file,'.');
	$extension = substr($file,$i+1);
	return $extension;
}

//The below function is use to clean the uploaded filename (convert to lowercase and change spaces into dashes)
function clean($string) {
$string = str_replace(' ', '-', $string);
$string = str_replace('-', ' ', $string);
$string = preg_replace('/^\s+|\s+$/', '', $string);
$string = preg_replace('/\s+/', ' ', $string);
$string = str_replace(' ', '-', $string);
return strtolower($string);
}

function frugal_list_images( $current_value )
{
	global $fr_multisite;
	$files = array();
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
		$ext = strtolower(substr(strrchr($file, '.'), 1));
		if( ($ext = 'jpg' || $ext = 'png' || $ext = 'gif') && ($file != "." && $file != ".." && $file != "adminthumbnails" && $file != "snapshots") )
		{
			array_push($files, $file);
		}
	}
	closedir($handle);
	
	echo '<option></option>';
	
	if(count($files) != 0)
	{
		sort($files);
		foreach($files as $file)
		{
			$image_list_option = '<option value="' . $file . '"';
			if( $current_value == $file )
			{
				$image_list_option .= ' selected="selected"';
			}
			$image_list_option .= '>' . $file . '</option>' . "\n";
			echo $image_list_option;
		}
	}
}

?>