<?php

function frugal_admin_login() {
$main_options = get_option('frugal_main_options');

	if($main_options['fr_footer_admin_display'] == "Yes")
	{
		if (is_user_logged_in())
		{
		    echo '<a href="' . admin_url() . '" class="footer_left">' . __('WP Dashboard', 'frugal') . '</a>';
		}
		else
		{
		    echo '<a href="' . admin_url() . '" class="footer_left">' . __('Admin Login', 'frugal') . '</a>';
		}
	}
}

/* Insert credits into the footer
	and add footer text option. */
function frugal_footer_link() {
$main_options = get_option('frugal_main_options');
$add_footer_text = stripslashes($main_options['fr_add_footer_text']);

	if($main_options['fr_footer_admin_display'] == "Yes")
	{
		if (is_user_logged_in())
		{
		    $admin_login = '<a href="' . admin_url() . '">' . __('WP Dashboard', 'frugal') . '</a>';
		}
		else
		{
		    $admin_login = '<a href="' . admin_url() . '">' . __('Admin Login', 'frugal') . '</a>';
		}
	}
	
	if($main_options['fr_affiliate_link'] != "")
	{
		$footer_link = $main_options['fr_affiliate_link'];
	}
	else
	{
		$footer_link = 'http://frugaltheme.com/';	
	}
	$return = apply_filters('frugal_footer_link', '<p class="footer_left">' . $add_footer_text . ' ' . $admin_login .'</p><p class="footer_right">' . __('Powered by', 'frugal') . ' <i><a href="' . $footer_link . '" title="frugal Premium Wordpress Theme">' . __('frugal', 'frugal') . '</a></i></p><br />');
		
	echo $return;
}
	
function frugal_footer_text() {
$upload_options = get_option('frugal_upload_options');
$main_options = get_option('frugal_main_options');

	if ($main_options['fr_footer_content_combine'] == "Yes")
	{
		$add_footer_text = stripslashes($main_options['fr_add_footer_text']);
	
		if($main_options['fr_affiliate_link'] != "")
		{
			$footer_link = $main_options['fr_affiliate_link'];
		}
		else
		{
			$footer_link = 'http://frugaltheme.com/';	
		}
		
		$final_footer_link = ' &bull; ' . __('Powered by', 'frugal') . ' <i><a href="' . $footer_link . '" title="frugal Premium Wordpress Theme">' . __('frugal', 'frugal') . '</a></i>';
		
		if ($main_options['fr_footer_copyright_display'] == "Yes")
		{
			echo '<p class="footer_center">' . __('Copyright', 'frugal') . ' &copy; ' . date('Y') . ' ' . get_bloginfo('name') . $final_footer_link . '</p>' . "\n";
		}
		
		if ($upload_options['fr_db_speed_test'] == "Yes" && is_user_logged_in())
		{
			?><p><?php echo get_num_queries(); ?> <?php _e('database queries in', 'frugal'); ?> <?php timer_stop(1); ?> <?php _e('seconds', 'frugal'); ?></p><?php
		}
	}
	else
	{
		frugal_footer_link();
		
		if ($main_options['fr_footer_copyright_display'] == "Yes")
		{
			echo '<p class="footer_center">' . __('Copyright', 'frugal') . ' &copy; ' . date('Y') . ' ' . get_bloginfo('name') . '</p>' . "\n";
		}
		
		if ($upload_options['fr_db_speed_test'] == "Yes" && is_user_logged_in())
		{
			?><p><?php echo get_num_queries(); ?> <?php _e('database queries in', 'frugal'); ?> <?php timer_stop(1); ?> <?php _e('seconds', 'frugal'); ?></p><?php
		}
	}
}
add_action ('frugal_hook_footer', 'frugal_footer_text');

function frugal_footer_scripts() {
$main_options = get_option('frugal_main_options');

	echo frugal_parse_php(stripslashes(html_entity_decode($main_options['fr_footer_scripts'])));
}
add_action('wp_footer', 'frugal_footer_scripts');