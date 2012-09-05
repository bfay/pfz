<?php

function frugal_add_admin_menu()
{
	global $menu;
	
	if ( version_compare(get_bloginfo("version"), '2.9', '>=') )
		$menu['55.57'] = array( '', 'manage_options', 'separator-frugal', '', 'wp-menu-separator' );
	
	add_menu_page('frugal Theme', 'frugal Theme', 'manage_options', 'frugal', 'frugal_upload_options', get_bloginfo('template_directory') . '/lib/css/images/f.png', '55.575');
}

function frugal_add_admin_submenus()
{
	$_frugal_upload_options = add_submenu_page('frugal', __('Settings/Uploads','frugal'), __('Settings/Uploads','frugal'), 'manage_options', 'frugal', 'frugal_upload_options');
	$_frugal_main_options = add_submenu_page('frugal', __('Main Options','frugal'), __('Main Options','frugal'), 'manage_options', 'main_options', 'frugal_main_options');
	$_frugal_feature_options = add_submenu_page('frugal', __('Feature Options','frugal'), __('Feature Options','frugal'), 'manage_options', 'feature_options', 'frugal_feature_options');
	$_frugal_header_design = add_submenu_page('frugal', __('Header Design','frugal'), __('Header Design','frugal'), 'manage_options', 'header_design', 'frugal_header_design');
	$_frugal_content_design = add_submenu_page('frugal', __('Content Design','frugal'), __('Content Design','frugal'), 'manage_options', 'content_design', 'frugal_content_design');
	$_frugal_feature_design = add_submenu_page('frugal', __('Feature Design','frugal'), __('Feature Design','frugal'), 'manage_options', 'feature_design', 'frugal_feature_design');
	
	add_action('admin_print_styles-' . $_frugal_upload_options, 'frugal_admin_styles');
	add_action('admin_print_styles-' . $_frugal_upload_options, 'frugal_upload_options_styles');
	add_action('admin_print_styles-' . $_frugal_main_options, 'frugal_admin_styles');
	add_action('admin_print_styles-' . $_frugal_feature_options, 'frugal_admin_styles');
	add_action('admin_print_styles-' . $_frugal_header_design, 'frugal_admin_styles');
	add_action('admin_print_styles-' . $_frugal_content_design, 'frugal_admin_styles');
	add_action('admin_print_styles-' . $_frugal_feature_design, 'frugal_admin_styles');
}

function frugal_admin_init()
{
	wp_register_style( 'frugal_admin_styles', get_bloginfo('template_directory') . '/lib/css/option_styles.css' );
	wp_register_style( 'frugal_jquery_ui_theme', get_bloginfo('template_directory') . '/lib/css/smoothness/jquery-ui-1.8.custom.css' );
	wp_register_style( 'frugal_portlets', get_bloginfo('template_directory') . '/lib/css/frugal_portlets.css' );
	wp_register_style( 'frugal_selectmenu_css', get_bloginfo('template_directory') . '/lib/css/ui.selectmenu.css' );
	wp_register_style( 'frugal_image_uploader_css', get_bloginfo('template_directory') . '/lib/admin/upload/css/style.css' );	
	
	//wp_register_script( 'frugal_jquery_ui', get_bloginfo('template_directory') . '/lib/scripts/jquery-ui-1.8.custom.min.js' );
	wp_register_script( 'frugal_menusave', get_bloginfo('template_directory') . '/lib/scripts/frugal_menusave.js' );
	wp_register_script( 'frugal_jscolor', get_bloginfo('template_directory') . '/lib/scripts/jscolor/jscolor.js' );
	wp_register_script( 'frugal_tip', get_bloginfo('template_directory') . '/lib/scripts/tip.js' );
	wp_register_script( 'frugal_settings_uploads', get_bloginfo('template_directory') . '/lib/scripts/frugal_settings_uploads.js' );
	//wp_register_script( 'frugal_selectmenu_js', get_bloginfo('template_directory') . '/lib/scripts/ui.selectmenu.js' );
	wp_register_script( 'frugal_imageuploader_motionpack', get_bloginfo('template_directory') . '/lib/admin/upload/js/motionpack.js' );
	wp_register_script( 'frugal_imageuploader_js2', get_bloginfo('template_directory') . '/lib/admin/upload/js/js2.js' );
}

function frugal_admin_styles()
{
	wp_enqueue_style( 'frugal_admin_styles' );
	wp_enqueue_style( 'frugal_jquery_ui_theme' );
	wp_enqueue_style( 'frugal_portlets' );
	
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-dialog' );
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'frugal_menusave' );
	wp_enqueue_script( 'frugal_jscolor' );
	wp_enqueue_script( 'frugal_tip' );
}

function frugal_upload_options_styles()
{
	wp_enqueue_style( 'frugal_image_uploader_css' );
	
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-dialog' );
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'frugal_settings_uploads' );
	wp_enqueue_script( 'frugal_imageuploader_motionpack' );
	wp_enqueue_script( 'frugal_imageuploader_js2' );
}

add_action( 'admin_init', 'frugal_admin_init' );
add_action( 'admin_menu', 'frugal_add_admin_menu' );
add_action( 'admin_menu', 'frugal_add_admin_submenus' );

?>