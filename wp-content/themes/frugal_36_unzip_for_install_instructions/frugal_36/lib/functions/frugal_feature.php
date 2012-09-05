<?php

/* Build the top feature section. */
function frugal_top_feature_area() {
	frugal_top_feature();
}

function frugal_top_feature() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
$read_more_text = $main_options['fr_read_more_text'];

	echo '<div id="featuretop">' . "\n";
	frugal_hook_before_top_feature();
		
	if ($feature_options['fr_ft_widget_number'] == "3")
	{
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Feature Top Left'))
		{
			echo '<div class="featuretopwidget feature_link">' . "\n";	
				echo '<h2>' . __('Feature Top Left', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";
			echo '</div>' . "\n";
		}
				
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Feature Top Middle'))
		{
			echo '<div class="featuretopwidget feature_link">' . "\n";			
				echo '<h2>' . __('Feature Top Middle', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";
			echo '</div>' . "\n";
		}
				
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Feature Top Right'))
		{
			echo '<div class="featuretopwidget feature_link">' . "\n";		
				echo '<h2>' . __('Feature Top Right', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";
			echo '</div>' . "\n";
		}
	}
	elseif ($feature_options['fr_ft_widget_number'] == "2")
	{
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Feature Top Left'))
		{
			echo '<div class="featuretopwidget feature_link">' . "\n";		
				echo '<h2>' . __('Feature Top Left', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";
			echo '</div>' . "\n";
		}
	
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Feature Top Right'))
		{
			echo '<div class="featuretopwidget feature_link">	' . "\n";		
				echo '<h2>' . __('Feature Top Right', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";
			echo '</div>' . "\n";
		}
	}
	elseif ($feature_options['fr_ft_widget_number'] == "1")
	{
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Feature Top Left'))
		{
			echo '<div class="featuretopwidget feature_link">	' . "\n";		
				echo '<h2>' . __('Feature Top Left', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";
			echo '</div>' . "\n";
		}
	}

	frugal_hook_after_top_feature();
	echo '</div>' . "\n";
}

/* Build the bottom feature section. */
function frugal_bottom_feature_area() {
	echo '<div style="clear:both;"></div>' . "\n";
	frugal_bottom_feature();
}

function frugal_bottom_feature() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
$read_more_text = $main_options['fr_read_more_text'];

	echo '<div id="featurebottom">' . "\n";
	frugal_hook_before_bottom_feature();
	
	if ($feature_options['fr_fb_widget_number'] == "3")
	{
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Feature Bottom Left'))
		{
			echo '<div class="featurebottomwidget feature_link">' . "\n";			
				echo '<h2>' . __('Feature Bottom Left', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";
			echo '</div>' . "\n";
		}
				
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Feature Bottom Middle'))
		{
			echo '<div class="featurebottomwidget feature_link">' . "\n";			
				echo '<h2>' . __('Feature Bottom Middle', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";
			echo '</div>' . "\n";
		}
				
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Feature Bottom Right'))
		{
			echo '<div class="featurebottomwidget feature_link">' . "\n";			
				echo '<h2>' . __('Feature Bottom Right', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";
			echo '</div>' . "\n";
		}
	}
	elseif ($feature_options['fr_fb_widget_number'] == "2")
	{
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Feature Bottom Left'))
		{
			echo '<div class="featurebottomwidget feature_link">' . "\n";			
				echo '<h2>' . __('Feature Bottom Left', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";
			echo '</div>' . "\n";
		}
		
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Feature Bottom Right'))
		{
			echo '<div class="featurebottomwidget feature_link">' . "\n";			
				echo '<h2>' . __('Feature Bottom Right', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";
			echo '</div>' . "\n";
		}
	}
	elseif ($feature_options['fr_fb_widget_number'] == "1")
	{
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Feature Bottom Left'))
		{
			echo '<div class="featurebottomwidget feature_link">' . "\n";			
				echo '<h2>' . __('Feature Bottom Left', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";
			echo '</div>' . "\n";
		}
	}
		
	frugal_hook_after_bottom_feature();
	echo '</div>' . "\n";
}

/* Build the feature boxes. */

function frugal_feature_box() {
	frugal_hook_before_feature_box();
	echo '<div id="feature_box">' . "\n";
	echo '<div class="feature_box">' . "\n";
	frugal_feature_box_widget();
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	frugal_hook_after_feature_box();
}

function frugal_home_feature_box() {
	frugal_hook_before_home_feature_box();
	echo '<div id="home_feature_box">' . "\n";
	echo '<div class="home_feature_box">' . "\n";
	frugal_home_feature_box_widget();
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	frugal_hook_after_home_feature_box();
}

function frugal_feature_box_widget() {
$feature_options = get_option('frugal_feature_options');

	if ($feature_options['fr_fb_video_embed'] != "")
	frugal_feature_box_video();
	else
	frugal_feature_box_text();
}

function frugal_feature_box_video() {
$feature_options = get_option('frugal_feature_options');
$fb_video_embed = $feature_options['fr_fb_video_embed'];

	echo '<ul class="image">' . "\n";
	echo stripslashes ($fb_video_embed);
	echo '</ul>' . "\n";
}

function frugal_feature_box_text() {
$feature_options = get_option('frugal_feature_options');
$fb_text_title = $feature_options['fr_fb_text_title'];
$fb_text = $feature_options['fr_fb_text'];

	echo '<h2>' . stripslashes ($fb_text_title) . '</h2>' . "\n";
	echo '<p>' . stripslashes ($fb_text) . '</p>' . "\n";
}

function frugal_home_feature_box_widget() {
$feature_options = get_option('frugal_feature_options');
	if ($feature_options['fr_home_fb_video_embed'] != "")
	{
		frugal_home_feature_box_video();
	}
	else
	{
		frugal_home_feature_box_text();
	}
}

function frugal_home_feature_box_video() {
$feature_options = get_option('frugal_feature_options');
$home_fb_video_embed = $feature_options['fr_home_fb_video_embed'];

	echo '<ul class="image">' . "\n";
	echo stripslashes ($home_fb_video_embed);
	echo '</ul>' . "\n";
}

function frugal_home_feature_box_text() {
$feature_options = get_option('frugal_feature_options');
$home_fb_text_title = $feature_options['fr_home_fb_text_title'];
$home_fb_text = $feature_options['fr_home_fb_text'];

	echo '<h2>' . stripslashes ($home_fb_text_title) . '</h2>' . "\n";
	echo '<p>' . stripslashes ($home_fb_text) . '</p>' . "\n";
}

function frugal_post_banner() {
	echo '<div class="postbanner">' . "\n";
		echo '<ul id="postbanner">' . "\n";
			if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Single Post Banner'))
			{
				echo '<li></li>' . "\n";
			}
		echo '</ul>' . "\n";
	echo '</div>' . "\n";

	frugal_hook_after_post_banner();
}