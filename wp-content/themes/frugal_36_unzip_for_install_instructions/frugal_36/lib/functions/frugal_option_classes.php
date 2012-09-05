<?php

class font_options_list {
	function set_option_fonts() {
		$this->fonts = array(
			'Georgia, serif' => array(
				'name' => 'Georgia',
			),
			'Times New Roman, Times, serif' => array(
				'name' => 'Times New Roman',
			),
			'Arial, sans-serif' => array(
				'name' => 'Arial',
			),
			'Arial Black, sans-serif' => array(
				'name' => 'Arial Black',
			),
			'Helvetica, sans-serif' => array(
				'name' => 'Helvetica',
			),
			'Courier New, sans-serif' => array(
				'name' => 'Courier New',
			),
			'Trebuchet MS, sans-serif' => array(
				'name' => 'Trebuchet MS',
			),
			'Lucida Console, sans-serif' => array(
				'name' => 'Lucida Console',
			),
			'Verdana, sans-serif' => array(
				'name' => 'Verdana',
			),
			'Lucida Sans Unicode, sans-serif' => array(
				'name' => 'Lucida Sans Unicode',
			),
			'Tahoma, sans-serif' => array(
				'name' => 'Tahoma',
			),
			'Impact, sans-serif' => array(
				'name' => 'Impact',
			)
		);
	}
}

function frugal_get_font_options() {
	$font_list = new font_options_list;
	$font_list->set_option_fonts();

	return $font_list->fonts;
}

class hook_options_list {
	function set_option_hooks() {
		$this->hooks = array(
			'frugal_hook_before_html' => array(
				'name' => 'frugal_hook_before_html',
			),
			'frugal_hook_after_html' => array(
				'name' => 'frugal_hook_after_html',
			),
			'frugal_hook_before_header' => array(
				'name' => 'frugal_hook_before_header',
			),
			'frugal_hook_after_header' => array(
				'name' => 'frugal_hook_after_header',
			),
			'frugal_hook_header' => array(
				'name' => 'frugal_hook_header',
			),
			'frugal_hook_before_title' => array(
				'name' => 'frugal_hook_before_title',
			),
			'frugal_hook_after_title' => array(
				'name' => 'frugal_hook_after_title',
			),
			'frugal_hook_after_tagline' => array(
				'name' => 'frugal_hook_after_tagline',
			),
			'frugal_hook_before_navbar' => array(
				'name' => 'frugal_hook_before_navbar',
			),
			'frugal_hook_after_navbar' => array(
				'name' => 'frugal_hook_after_navbar',
			),
			'frugal_hook_before_top_feature' => array(
				'name' => 'frugal_hook_before_top_feature',
			),
			'frugal_hook_after_top_feature' => array(
				'name' => 'frugal_hook_after_top_feature',
			),
			'frugal_hook_before_home_container' => array(
				'name' => 'frugal_hook_before_home_container',
			),
			'frugal_hook_after_home_container' => array(
				'name' => 'frugal_hook_after_home_container',
			),
			'frugal_hook_before_hometop' => array(
				'name' => 'frugal_hook_before_hometop',
			),
			'frugal_hook_after_hometop' => array(
				'name' => 'frugal_hook_after_hometop',
			),
			'frugal_hook_before_hometop_left_post' => array(
				'name' => 'frugal_hook_before_hometop_left_post',
			),
			'frugal_hook_after_hometop_left_post' => array(
				'name' => 'frugal_hook_after_hometop_left_post',
			),
			'frugal_hook_before_homebottom' => array(
				'name' => 'frugal_hook_before_homebottom',
			),
			'frugal_hook_after_homebottom' => array(
				'name' => 'frugal_hook_after_homebottom',
			),
			'frugal_hook_before_container' => array(
				'name' => 'frugal_hook_before_container',
			),
			'frugal_hook_after_container' => array(
				'name' => 'frugal_hook_after_container',
			),
			'frugal_hook_before_cms_container' => array(
				'name' => 'frugal_hook_before_cms_container',
			),
			'frugal_hook_after_cms_container' => array(
				'name' => 'frugal_hook_after_cms_container',
			),
			'frugal_hook_before_content' => array(
				'name' => 'frugal_hook_before_content',
			),
			'frugal_hook_after_content' => array(
				'name' => 'frugal_hook_after_content',
			),
			'frugal_hook_before_cms_content' => array(
				'name' => 'frugal_hook_before_cms_content',
			),
			'frugal_hook_after_cms_content' => array(
				'name' => 'frugal_hook_after_cms_content',
			),
			'frugal_hook_before_content_column' => array(
				'name' => 'frugal_hook_before_content_column',
			),
			'frugal_hook_after_content_column' => array(
				'name' => 'frugal_hook_after_content_column',
			),
			'frugal_hook_before_cms_content_column' => array(
				'name' => 'frugal_hook_before_cms_content_column',
			),
			'frugal_hook_after_cms_content_column' => array(
				'name' => 'frugal_hook_after_cms_content_column',
			),
			'frugal_hook_before_blog_column' => array(
				'name' => 'frugal_hook_before_blog_column',
			),
			'frugal_hook_after_blog_column' => array(
				'name' => 'frugal_hook_after_blog_column',
			),
			'frugal_hook_before_pagearea' => array(
				'name' => 'frugal_hook_before_pagearea',
			),
			'frugal_hook_after_pagearea' => array(
				'name' => 'frugal_hook_after_pagearea',
			),
			'frugal_hook_before_cms_pagearea' => array(
				'name' => 'frugal_hook_before_cms_pagearea',
			),
			'frugal_hook_after_cms_pagearea' => array(
				'name' => 'frugal_hook_after_cms_pagearea',
			),
			'frugal_hook_before_postarea' => array(
				'name' => 'frugal_hook_before_postarea',
			),
			'frugal_hook_after_postarea' => array(
				'name' => 'frugal_hook_after_postarea',
			),
			'frugal_hook_before_list_post' => array(
				'name' => 'frugal_hook_before_list_post',
			),
			'frugal_hook_after_list_post' => array(
				'name' => 'frugal_hook_after_list_post',
			),
			'frugal_hook_before_headline' => array(
				'name' => 'frugal_hook_before_headline',
			),
			'frugal_hook_after_headline' => array(
				'name' => 'frugal_hook_after_headline',
			),
			'frugal_hook_before_cms_headline' => array(
				'name' => 'frugal_hook_before_cms_headline',
			),
			'frugal_hook_after_cms_headline' => array(
				'name' => 'frugal_hook_after_cms_headline',
			),
			'frugal_hook_after_byline' => array(
				'name' => 'frugal_hook_after_byline',
			),
			'frugal_hook_post_banner' => array(
				'name' => 'frugal_hook_post_banner',
			),
			'frugal_hook_after_post_banner' => array(
				'name' => 'frugal_hook_after_post_banner',
			),
			'frugal_hook_after_comment' => array(
				'name' => 'frugal_hook_after_comment',
			),
			'frugal_hook_before_sidebars' => array(
				'name' => 'frugal_hook_before_sidebars',
			),
			'frugal_hook_after_sidebars' => array(
				'name' => 'frugal_hook_after_sidebars',
			),
			'frugal_hook_before_feature_box' => array(
				'name' => 'frugal_hook_before_feature_box',
			),
			'frugal_hook_after_feature_box' => array(
				'name' => 'frugal_hook_after_feature_box',
			),
			'frugal_hook_before_home_feature_box' => array(
				'name' => 'frugal_hook_before_home_feature_box',
			),
			'frugal_hook_after_home_feature_box' => array(
				'name' => 'frugal_hook_after_home_feature_box',
			),
			'frugal_hook_before_sidebar_1' => array(
				'name' => 'frugal_hook_before_sidebar_1',
			),
			'frugal_hook_after_sidebar_1' => array(
				'name' => 'frugal_hook_after_sidebar_1',
			),
			'frugal_hook_before_sidebar_2' => array(
				'name' => 'frugal_hook_before_sidebar_2',
			),
			'frugal_hook_after_sidebar_2' => array(
				'name' => 'frugal_hook_after_sidebar_2',
			),
			'frugal_hook_before_sidebar_h' => array(
				'name' => 'frugal_hook_before_sidebar_h',
			),
			'frugal_hook_after_sidebar_h' => array(
				'name' => 'frugal_hook_after_sidebar_h',
			),
			'frugal_hook_before_sidebar_cms_1' => array(
				'name' => 'frugal_hook_before_sidebar_cms_1',
			),
			'frugal_hook_after_sidebar_cms_1' => array(
				'name' => 'frugal_hook_after_sidebar_cms_1',
			),
			'frugal_hook_before_sidebar_cms_2' => array(
				'name' => 'frugal_hook_before_sidebar_cms_2',
			),
			'frugal_hook_after_sidebar_cms_2' => array(
				'name' => 'frugal_hook_after_sidebar_cms_2',
			),
			'frugal_hook_before_bottom_feature' => array(
				'name' => 'frugal_hook_before_bottom_feature',
			),
			'frugal_hook_after_bottom_feature' => array(
				'name' => 'frugal_hook_after_bottom_feature',
			),
			'frugal_hook_before_footer' => array(
				'name' => 'frugal_hook_before_footer',
			),
			'frugal_hook_after_footer' => array(
				'name' => 'frugal_hook_after_footer',
			),
			'frugal_hook_footer' => array(
				'name' => 'frugal_hook_footer',
			)
		);
	}
}

function frugal_get_hook_options() {
	$hook_list = new hook_options_list;
	$hook_list->set_option_hooks();

	return $hook_list->hooks;
}