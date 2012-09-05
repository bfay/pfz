<?php

function frugal_sidebars() {
$feature_options = get_option('frugal_feature_options');
	echo '<div id="sb_fbox_wrap">' . "\n";
	
	if ($feature_options['fr_fbox_display'] == "Outside")
	{
		echo '<div id="feature_box_wrap">' . "\n";
		frugal_hook_feature_box();
		echo '</div>' . "\n";
	}
	
	echo '<div id="sidebar_wrap">' . "\n";
	frugal_hook_before_sidebars();
	frugal_build_sidebars();
	frugal_hook_after_sidebars();
	echo '</div>' . "\n";
	echo '</div>' . "\n";
}

function frugal_build_sidebars() {
$content_design = get_option('frugal_content_design');

	if ($content_design['fr_layout_type'] == "Double Sidebar")
	{
		frugal_sidebar_2();
	}
	elseif ($content_design['fr_layout_type'] == "Double Right Sidebar" || $content_design['fr_layout_type'] == "Double Left Sidebar")
	{
		frugal_dual_sidebars();
	}
	else
	{
		frugal_sidebar_1();
	}
}

function frugal_sidebar_1() {
echo '<div id="sidebar_1">' . "\n";
frugal_hook_before_sidebar_1();
	echo '<ul class="xoxo">' . "\n";
	
	if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 1'))
	{

		echo '<li id="recent-posts">' . "\n";
		echo '<div class="widget">' . "\n";
		echo '<h3>' . __('Recent Posts', 'frugal') . '</h3>' . "\n";
		echo '<ul>' . "\n";
		echo wp_get_archives('type=postbypost&limit=5');
		echo '</ul>' . "\n";
		echo '</div>' . "\n";
		echo '</li>' . "\n";
		
		echo '<li id="categories">' . "\n";
		echo '<div class="widget">' . "\n";
		echo '<h3>' . __('Categories', 'frugal') . '</h3>' . "\n";
		echo '<ul>' . "\n";
		echo wp_list_categories('sort_column=name&title_li=');
		echo '</ul>' . "\n";
		echo '</div>' . "\n";
		echo '</li>' . "\n";
		
	}

	echo '</ul>' . "\n";
frugal_hook_after_sidebar_1();
echo '</div>' . "\n";
}

function frugal_sidebar_2() {
echo '<div id="sidebar_2">' . "\n";
frugal_hook_before_sidebar_2();
	echo '<ul class="xoxo">' . "\n";
	
	if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 2'))
	{

		echo '<li id="archives">' . "\n";
		echo '<div class="widget">' . "\n";
		echo '<h3>' . __('Archives', 'frugal') . '</h3>' . "\n";
		echo '<ul>' . "\n";
		echo wp_get_archives('type=monthly');
		echo '</ul>' . "\n";
		echo '</div>' . "\n";
		echo '</li>' . "\n";

		echo '<li id="links">' . "\n";
		echo '<div class="widget">' . "\n";
		echo '<h3>' . __('Links', 'frugal') . '</h3>' . "\n";
		echo '<ul>' . "\n";
		echo get_links(-1, '<li>', '</li>', ' - ');
		echo '</ul>' . "\n";
		echo '</div>' . "\n";
		echo '</li>' . "\n";
		
	}

	echo '</ul>' . "\n";
frugal_hook_after_sidebar_2();
echo '</div>' . "\n";
}

function frugal_dual_sidebars() {
	frugal_sidebar_1();
	frugal_sidebar_2();
}

function frugal_home_sidebar() {
$feature_options = get_option('frugal_feature_options');
echo '<div id="sb_h_fbox_wrap">' . "\n";

if ($feature_options['fr_home_fb_display'] == "Outside")
{
	echo '<div id="home_feature_box_wrap">' . "\n";
	frugal_hook_home_feature_box();
	echo '</div>' . "\n";
}

echo '<div id="sidebar_h">' . "\n";
frugal_hook_before_sidebar_h();
	echo '<ul class="xoxo">' . "\n";
	
	if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Sidebar'))
	{

		echo '<li>' . "\n";
		echo '</li>' . "\n";
		
	}

	echo '</ul>' . "\n";
frugal_hook_after_sidebar_h();
echo '</div>' . "\n";
echo '</div>' . "\n";
}

function frugal_cms_sidebar_1() {
echo '<div id="sidebar_cms_1">' . "\n";
frugal_hook_before_sidebar_cms_1();
	echo '<ul class="xoxo">' . "\n";
	
	if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('CMS Page Sidebar 1'))
	{

		echo '<li>' . "\n";
		echo '</li>' . "\n";
		
	}

	echo '</ul>' . "\n";
frugal_hook_after_sidebar_cms_1();
echo '</div>' . "\n";
}

function frugal_cms_sidebar_2() {
echo '<div id="sidebar_cms_2">' . "\n";
frugal_hook_before_sidebar_cms_2();
	echo '<ul class="xoxo">' . "\n";
	
	if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('CMS Page Sidebar 2'))
	{

		echo '<li>' . "\n";
		echo '</li>' . "\n";
		
	}

	echo '</ul>' . "\n";
frugal_hook_after_sidebar_cms_2();
echo '</div>' . "\n";
}