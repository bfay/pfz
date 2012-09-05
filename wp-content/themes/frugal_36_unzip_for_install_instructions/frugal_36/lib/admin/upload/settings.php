<?php 

global $wp_theme_options;
global $fr_multisite;
$home = get_option('siteurl');

//IMAGE STORAGE SETTINGS
if( false == $fr_multisite )
{
	$settings['uploadpath'] = WP_CONTENT_DIR . '/uploads/frugal/'; //The full size images will be stored here.  Must have forward slash on end.
	$settings['realpath'] = $home . '/wp-content/uploads/frugal/'; //This is the real URL location of your gallery images, this is used by the admin script to porvide a full URL link to the uploaded images
	$settings['adminthumbpath'] = WP_CONTENT_DIR . '/uploads/frugal/adminthumbnails/'; //Regardless of whether or not you have enabled automatic thumbnail creation above, a 100 pixel wide admin thumbnail is always created for use by the admin panel when listing images.
	$settings['adminthumbpath2'] = $home . '/wp-content/uploads/frugal/adminthumbnails/';
}
elseif( true == $fr_multisite )
{
	global $current_blog;
	$current_blog_id = $current_blog->blog_id;
	$settings['uploadpath'] = WP_CONTENT_DIR . '/uploads/frugal/' . $current_blog_id . '/'; //The full size images will be stored here.  Must have forward slash on end.
	$settings['realpath'] = $home . '/wp-content/uploads/frugal/' . $current_blog_id . '/'; //This is the real URL location of your gallery images, this is used by the admin script to porvide a full URL link to the uploaded images
	$settings['adminthumbpath'] = WP_CONTENT_DIR . '/uploads/frugal/' . $current_blog_id . '/adminthumbnails/'; //Regardless of whether or not you have enabled automatic thumbnail creation above, a 100 pixel wide admin thumbnail is always created for use by the admin panel when listing images.
	$settings['adminthumbpath2'] = $home . '/wp-content/uploads/frugal/' . $current_blog_id . '/adminthumbnails/';
}
$settings['filetypes'] = array("image/gif","image/pjpeg","image/jpeg","image/x-png","image/png");  //Only these filetypes are allowed to be uploaded


//DEFAULT IMAGE MANIPULATION SETTINGS
//These are the default settings for image resizing and thumbnail creation and are imported into the "Upload Options"
//on the file upload page.  If you intend to upload all your images with set options then set the required variables
//below and you can ignore the "Upload Options" button on the upload page.
//Of course you can still use the "Upload Options" button to upload files with different settings to your defaults if
//you wish
$settings['resizeimages'] = 1; //If you would like images to be resized by default set to "1", set to "0" to disable default image resizing
$settings['imagewidth'] = 2200; //Please enter your default required image width (in pixels), ignored if image resizing is turned off
$settings['thumbwidth'] = 100; //Please enter your default required thumbnail width (in pixels), ignored if image resizing is off
$settings['createthumbnails'] = 1; //If you would like thumbnails to be automatically created by default set to "1", set to "0" to disable default automatic thumbnail creation 

//SETTINGS END
?>