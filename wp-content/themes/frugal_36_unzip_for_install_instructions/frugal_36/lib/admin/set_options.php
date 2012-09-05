<?php
add_action('init', 'frugal_setup');
function frugal_setup()
{
	global $fr_multisite;
	$upload_options = get_option('frugal_upload_options');

	//if this is a new installation or a master reset
	if ( get_option('frugal_set_options') != 2 || ( $upload_options['fr_master_reset_1'] == "Re" && $upload_options['fr_master_reset_2'] == "set" ) )
	{
		/* Settings/Uploads Option Defaults */
		function frugal_upload_options_init() {
		$new_options = array(
			'fr_dynamic_stylesheet_format' => 'PHP',
			'fr_gzip_active' => 'Yes',
			'fr_db_speed_test' => 'No',
			'fr_master_reset_1' => 'off',
			'fr_master_reset_2' => 'off'
		);
		add_option('frugal_upload_options', $new_options);
		update_option('frugal_upload_options', $new_options);
		}
		frugal_upload_options_init();
		
		/* Custom File Editor Option Defaults */
		function frugal_custom_file_editor_init() {
		$new_options = array(
			'fr_reference_file_display' => 'Beside',
			'fr_reference_file_type' => 'Style(CSS)',
			'fr_function_reference_file' => 'frugal_hooks.php',
			'fr_css_reference_file' => 'Default'
		);
		add_option('frugal_custom_file_editor', $new_options);
		update_option('frugal_custom_file_editor', $new_options);
		}
		frugal_custom_file_editor_init();
		
		frugal_create_uploads_dir();
		update_option('frugal_css_timestamp', mktime());
		update_option('frugal_css_stylesheet', 0);
		frugal_restore_defaults();
		frugal_update_menu_arrays();
		update_option('frugal_set_options', 2);
		
		if ($upload_options['fr_dynamic_stylesheet_format'] == "CSS" && get_option('frugal_css_stylesheet') == 2)
		{
			frugal_dynamic_styles();
		}
		if ($upload_options['fr_dynamic_stylesheet_format'] == "PHP")
		{
			update_option('frugal_css_stylesheet', 0); 
		}
		else
		{
			update_option('frugal_css_stylesheet', 2);
		}	
		update_option('frugal_css_timestamp', mktime());
		
		wp_redirect('admin.php?page=frugal&msg=reset');
		exit();		
	}
	
	//if this is an update
	if( get_option('frugal_version') != '3.6' && get_option('frugal_set_options') == 2 )
	{	
		if( get_option('frugal_33_active') )
		{
			delete_option('frugal_33_active');
		}
		if ($upload_options['fr_dynamic_stylesheet_format'] == "CSS" && get_option('frugal_css_stylesheet') == 2)
		{
			frugal_dynamic_styles();
		}
		
		frugal_update_menu_arrays();
		update_option('frugal_version', '3.6');
	}
	
	if( true == $fr_multisite )
	{
		global $current_blog;
		$current_blog_id = $current_blog->blog_id;
		
		//if converting to multisite
		if( !get_option('frugal_multisite') && $current_blog_id == '1' )
		{
			update_option( 'frugal_multisite', '1') ;
			frugal_create_uploads_dir();
			
			$images_path = WP_CONTENT_DIR . '/uploads/frugal/';
			$new_images_path = WP_CONTENT_DIR . '/uploads/frugal/' . $current_blog_id . '/';
			$handle = opendir($images_path);
			while (false !== ($file = readdir($handle)))
			{
				if($file == "." || $file == ".." || is_dir($images_path.$file) )
				{
					continue;
				}
				$ext = strtolower(substr(strrchr($file, '.'), 1));
				if($ext = 'jpg' || $ext = 'png' || $ext = 'gif')
				{
					rename($images_path.$file, $new_images_path.$file);
				}
			}
			closedir($handle);
			
			$admin_images_path = WP_CONTENT_DIR . '/uploads/frugal/adminthumbnails/';
			if( is_dir($admin_images_path) )
			{
				$new_admin_images_path = WP_CONTENT_DIR . '/uploads/frugal/' . $current_blog_id . '/adminthumbnails/';
				$handle = opendir($admin_images_path);
				while (false !== ($file = readdir($handle)))
				{
					if($file == "." || $file == ".." || is_dir($admin_images_path.$file))
					{
						continue;
					}
					$ext = strtolower(substr(strrchr($file, '.'), 1));
					if($ext = 'jpg' || $ext = 'png' || $ext = 'gif')
					{
						rename($admin_images_path.$file, $new_admin_images_path.$file);
					}
				}
				closedir($handle);
			}	
		}
	}
}

//end lib/admin/set_options.php