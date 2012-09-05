<?php

function frugal_before_header() {
$header_design = get_option('frugal_header_design');
$content_design = get_option('frugal_content_design');

	frugal_hook_before_html();

	if ($content_design['fr_head_foot_fluid'] == "None" || $content_design['fr_head_foot_fluid'] == "Footer Only")
	{
	echo '<div id="wrap">' . "\n";
	}
	
		if ($header_design['fr_nav_location'] == "Above Header" || $content_design['fr_head_foot_fluid'] == "Navbar Only" || $content_design['fr_head_foot_fluid'] == "Navbar & Footer Only")
		{
			if ($header_design['fr_nav_location'] != "No Navbar" && $header_design['fr_nav_location'] != "Beside Header")
			{
				frugal_navbar_area();
			}
		}
		
		if ($header_design['fr_subnav_location'] == "Above Header")
		{
			frugal_catnav_area();
		}
		
	if ($content_design['fr_head_foot_fluid'] == "Navbar Only" || $content_design['fr_head_foot_fluid'] == "Navbar & Footer Only")
	{
		echo '<div id="wrap">' . "\n";
	}
}

function frugal_header() {
$main_options = get_option('frugal_main_options');
$header_design = get_option('frugal_header_design');

	if(is_home() || is_front_page())
	{
		if ($main_options['fr_h1_tag_placement'] == "h1_wrap_title")
		{
			$title_id = 'h1';
			$tag_id = 'p';
		}
		elseif( $main_options['fr_h1_tag_placement'] == "h1_wrap_tagline" || empty($main_options['fr_h1_tag_placement']) )
		{
			$title_id = 'p';
			$tag_id = 'h1';
		}
		else
		{
			$title_id = 'p';
			$tag_id = 'p';
		}
	}
	else
	{
		$title_id = 'p';
		$tag_id = 'p';
	}

	echo '<div id="header_wrap">' . "\n";
	frugal_hook_before_header();
		echo '<div id="header">' . "\n";
		frugal_hook_before_title();
		
		if ($main_options['fr_nofollow_home'] == "Yes")
		{
			$nofollow = ' nofollow';
		}
		
		if ($header_design['fr_logo_tag_show'] == "No")
		{
			$hidden = ' class="hidden"';
		}
		
		if ($header_design['fr_logo_type'] == "Text" || $header_design['fr_logo_type'] == "Text FULL")
		{
			echo '<div class="headerleft"  id="logotext">' . "\n";
				echo '<' . $title_id . ' id="title"><a href="' . get_option('home') . '" title="' . get_bloginfo('name') . '" rel="home' . $nofollow . '">' . get_bloginfo('name') . '</a></' . $title_id . '>' . "\n";
					echo '<' . $tag_id . ' id="tagline"' . $hidden . '>' . get_bloginfo('description') . '</' . $tag_id . '>' . "\n";
					frugal_hook_after_tagline();
			echo '</div>' . "\n";
		}
		elseif ($header_design['fr_logo_type'] == "Image" || $header_design['fr_logo_type'] == "Image FULL")
		{
			echo '<div class="headerleft" id="logoimage">' . "\n";
				echo '<' . $title_id . '><a href="' . get_option('home') . '" title="' . get_bloginfo('name') . '" rel="home' . $nofollow . '">' . get_bloginfo('name') . '</a></' . $title_id . '>' . "\n";
					echo '<' . $tag_id . '>' . get_bloginfo('description') . '</' . $tag_id . '>' . "\n";
					frugal_hook_after_tagline();
			echo '</div>' . "\n";
		}
		else
		{
		frugal_hook_header();
		}
		
		if ($header_design['fr_logo_type'] == "Text" || $header_design['fr_logo_type'] == "Image")
		{
			echo '<div class="headerright">' . "\n";
			if ($header_design['fr_nav_location'] == "Beside Header")
			{
				frugal_navbar_area();
			}
			else
			{
				echo '<ul>' . "\n";
					if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Header Right Banner'))
					{
						echo '<li></li>' . "\n";
					}
				echo '</ul>' . "\n";
			}
			echo '</div>' . "\n";
		}
		
		frugal_hook_after_title();	
		echo '</div>' . "\n";
	frugal_hook_after_header();
	echo '</div>' . "\n";
}
	
function frugal_after_header() {
$header_design = get_option('frugal_header_design');
$content_design = get_option('frugal_content_design');

	if ($content_design['fr_head_foot_fluid'] == "Header Only" || $content_design['fr_head_foot_fluid'] == "Header & Footer Only")
	{
		echo '<div id="wrap">' . "\n";
	}
	
	if ($header_design['fr_nav_location'] == "Below Header" && $content_design['fr_head_foot_fluid'] != "Navbar Only" && $content_design['fr_head_foot_fluid'] != "Navbar & Footer Only")
	{
		frugal_navbar_area();
	}
	
	if ($header_design['fr_subnav_location'] == "Below Header")
	{
		frugal_catnav_area();
	}
	
	if ($content_design['fr_head_foot_fluid'] == "Header & Navbar Only" || $content_design['fr_head_foot_fluid'] == "All")
	{
		echo '<div id="wrap">' . "\n";
	}
}

function frugal_header_scripts() {
$main_options = get_option('frugal_main_options');

	echo frugal_parse_php(stripslashes(html_entity_decode($main_options['fr_header_scripts'])));
}
add_action('wp_head', 'frugal_header_scripts');