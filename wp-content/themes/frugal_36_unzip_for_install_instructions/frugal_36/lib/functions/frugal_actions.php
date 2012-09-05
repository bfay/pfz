<?php
$feature_options = get_option('frugal_feature_options');
$content_design = get_option('frugal_content_design');

/* Determine if/where user wants the top feature section to be displayed. */
if ($feature_options['fr_ft_display_blog'] == "Yes"):
add_action('frugal_hook_before_container', 'frugal_top_feature_area');
endif;

/* Determine if/where user wants the top feature section to be displayed. */
if ($feature_options['fr_ft_display_cms'] == "Yes"):
add_action('frugal_hook_before_cms_container', 'frugal_top_feature_area');
endif;

/* Determine if/where user wants the top feature section to be displayed. */
if ($feature_options['fr_ft_display_hp'] == "Yes"):
add_action('frugal_hook_before_home_container', 'frugal_top_feature_area');
endif;

/* Determine if/where user wants the bottom feature section to be displayed. */
if ($feature_options['fr_home_bottom_layout'] == "Excerpt Post List"):
	if ($feature_options['fr_fb_display_hp'] == "Yes"):
	add_action('frugal_hook_after_home_container', 'frugal_bottom_feature_area');
	endif;
else:
	if ($feature_options['fr_fb_display_hp'] == "Yes" && $feature_options['fr_display_home_bottom'] == "Yes"):
	add_action('frugal_hook_after_homebottom', 'frugal_bottom_feature_area');
	elseif ($feature_options['fr_fb_display_hp'] == "Yes" && $feature_options['fr_display_home_bottom'] == "No"):
	add_action('frugal_hook_after_home_container', 'frugal_bottom_feature_area');
	endif;
endif;

/* Determine if/where user wants the bottom feature section to be displayed. */
if ($feature_options['fr_fb_display_blog'] == "Yes"):
add_action('frugal_hook_after_container', 'frugal_bottom_feature_area');
endif;

/* Determine if/where user wants the bottom feature section to be displayed. */
if ($feature_options['fr_fb_display_cms'] == "Yes"):
add_action('frugal_hook_after_cms_container', 'frugal_bottom_feature_area');
endif;

/* Determine if user wants to activate the main feature box. */
if ($feature_options['fr_fbox_display'] == "Outside"):
add_action('frugal_hook_feature_box', 'frugal_feature_box');
elseif ($feature_options['fr_fbox_display'] == "Inside"):
add_action('frugal_hook_before_sidebars', 'frugal_feature_box');
endif;

/* Determine if user wants to activate the home feature box. */
if ($feature_options['fr_home_fb_display'] == "Outside" || $feature_options['fr_home_fb_display'] == "Full Screen"):
add_action('frugal_hook_home_feature_box', 'frugal_home_feature_box');
elseif ($feature_options['fr_home_fb_display'] == "Inside"):
add_action('frugal_hook_before_sidebar_h', 'frugal_home_feature_box');
endif;

/* Determine if user wants the home bottom section to show on the homepage. */	
if ($feature_options['fr_display_home_bottom'] == "Yes" && $feature_options['fr_home_bottom_layout'] != "Excerpt Post List"):
add_action('frugal_hook_after_home_container', 'frugal_home_bottom');
endif;

/* Determine if user wants to activate the single post banner widget. */
if ($content_design['fr_post_banner_display'] == "Yes"):
add_action('frugal_hook_post_banner', 'frugal_post_banner');
endif;