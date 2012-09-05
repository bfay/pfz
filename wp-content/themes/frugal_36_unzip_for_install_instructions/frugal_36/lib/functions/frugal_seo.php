<?php

function frugal_site_title() {
$main_options = get_option('frugal_main_options');

	$frugal_title = get_bloginfo('name');
	$frugal_tagline = get_bloginfo('description');
	$page_title = get_the_title();
	$category_title = single_cat_title('', false);
	$tag_title = single_tag_title('', false);
	$post_title = get_the_title();
	$search_title = get_search_query();
	
	if (is_day())
	{
		$archive_title = get_the_time(get_option('D F Y'));
	}
 	elseif (is_month())
	{
		$archive_title = get_the_time('F Y');
	}
	elseif (is_year())
	{
		$archive_title = get_the_time('Y');
    }
	
	if(get_query_var('author_name'))
	{
		$author_info = get_userdatabylogin(get_query_var('author_name'));
	}
	else
	{
		$author_info = get_userdata(get_query_var('author'));
	}
	$author_title = $author_info->display_name;
	
	if (function_exists('seo_title_tag'))
	{
		seo_title_tag();
		return null;
	}
	else
	{
		if (is_home() || is_front_page())
		{
			if (get_bloginfo('description') != "")
			{
				$output = stripslashes($main_options['fr_home_title']);
			}
			else
			{
				$output = $frugal_title;
			}
		}
		elseif (is_single())
		{
			if (get_meta_box_value('title') && $main_options['fr_post_seo1_active'] == 'Yes')
			{
				$post_seo_title = stripslashes(get_meta_box_value('title'));
				$output = $main_options['fr_post_title'];
				$output = str_replace('%post_title%', $post_seo_title, $output);
			}
			else
			{
				$output = $main_options['fr_post_title'];
				$output = str_replace('%post_title%', $post_title, $output);
			}
		}
		elseif (is_page())
		{
			if (get_meta_box_value('title') && $main_options['fr_post_seo1_active'] == 'Yes')
			{
				$page_seo_title = stripslashes(get_meta_box_value('title'));
				$output = $main_options['fr_page_title'];
				$output = str_replace('%page_title%', $page_seo_title, $output);
			}
			else
			{
				$output = $main_options['fr_page_title'];
				$output = str_replace('%page_title%', $page_title, $output);
			}
		}
		elseif (is_category())
		{
			$output = $main_options['fr_cat_title'];
			$output = str_replace('%category_title%', $category_title, $output);
		}
		elseif (is_tag())
		{
			$output = $main_options['fr_tag_title'];
			$output = str_replace('%tag_title%', $tag_title, $output);
		}
		elseif (is_date())
		{
			$output = $main_options['fr_archive_title'];
			$output = str_replace('%archive_title%', $archive_title, $output);
		}
		elseif (is_search())
		{
			$output = $main_options['fr_search_title'];
			$output = str_replace('%search_title%', $search_title, $output);
		}
		elseif (is_author())
		{
			$output = $main_options['fr_author_title'];
			$output = str_replace('%author_title%', $author_title, $output);
		}
		elseif (is_404())
		{
			$output = $main_options['fr_404_title'];
		}
	}
	
	$output = str_replace('%blog_title%', $frugal_title, $output);
	$output = str_replace('%tagline%', $frugal_tagline, $output);
	
	echo apply_filters('frugal_site_title', $output);
}

function nofollow_post_links($text) {
	if(get_meta_box_value('nofollow'))
	{
		preg_match_all("/<a.*? href=\"(.*?)\".*?>(.*?)<\/a>/i", $text, $links);
		$match_count = count($links[0]);
		for($i=0; $i < $match_count; $i++)
		{
			if(!preg_match("/rel=[\"\']*nofollow[\"\']*/",$links[0][$i]))
			{
				preg_match_all("/<a.*? href=\"(.*?)\"(.*?)>(.*?)<\/a>/i", $links[0][$i], $link_text);
				$text = str_replace(">".$link_text[3][0]."</a>"," rel='nofollow'>".$link_text[3][0]."</a>",$text);
			}
		}
		return $text;
	}
	else
	{
		return $text;
	}
}

$main_options = get_option('frugal_main_options');

if ($main_options['fr_post_seo2_active'] == "Yes")
{
	add_action('the_content', 'nofollow_post_links');
}

function comment_author_nofollow($url) {
$main_options = get_option('frugal_main_options');

	if ($main_options['fr_nofollow_comment_author'] == "Yes")
	{
		return $url;
	}
	
	$url = str_replace("rel='external nofollow'","rel='external'", $url);
	return $url;
}
add_filter('get_comment_author_link', 'comment_author_nofollow');

function frugal_meta() {
$main_options = get_option('frugal_main_options');
global $post;
	
	$post_content = (strlen(strip_tags($post->post_content)) <= 300) ? strip_tags($post->post_content) : substr(strip_tags($post->post_content),0,300);
	$post_excerpt = ($post->post_excerpt) ? $post->post_excerpt : $post_content;
	
	if(get_meta_box_value('description') != '')
	{
		$description = stripslashes(get_meta_box_value('description'));
	}
	else
	{
		$description = (is_home()) ? get_bloginfo('description') : $post_excerpt;
	}
	
	if (is_home() && $main_options['fr_home_description'] != "" || is_front_page() && $main_options['fr_home_description'] != "")
	{
		$home_description = $main_options['fr_home_description'];
	}
	else
	{
		$home_description = get_bloginfo('description');
	}
	
	$home_keywords = $main_options['fr_home_keywords'];
	
	if(get_meta_box_value('keywords'))
	{
		$keywords = get_meta_box_value('keywords') . ', ';
	}

	if ($main_options['fr_cat_meta'] == "Yes" && is_single() && get_the_category($post->ID))
	{
		foreach((array)get_the_category($post->ID) as $category) { $keywords .=  $category->cat_name . ', '; }
	}

	if ($main_options['fr_tag_meta'] == "Yes" && is_single() && get_the_tags($post->ID))
	{
		foreach((array)get_the_tags($post->ID) as $tag) { $keywords .= $tag->name . ', '; }
	}
	
	$keywords = substr($keywords,0);
	
	echo "\n" . "\n";
	
	if (is_date() && $main_options['fr_noindex_archives'] == "Yes")
	{
		echo '<meta name="robots" content="noindex" />';
	}
	
	if (is_category() && $main_options['fr_noindex_cats'] == "Yes")
	{
		echo '<meta name="robots" content="noindex" />';
	}
	
	if (is_tag() && $main_options['fr_noindex_tags'] == "Yes")
	{
		echo '<meta name="robots" content="noindex" />';
	}
	
	if (is_author() && $main_options['fr_noindex_author'] == "Yes")
	{
		echo '<meta name="robots" content="noindex" />';
	}
	
	if ($main_options['fr_post_seo1_active'] == "Yes")
	{
		if (!is_front_page() && is_single() || !is_front_page() && is_page())
		{
			echo '<meta name="description" content="' . esc_attr( $description ) . '" />' . "\n";
		}
		if (is_single() && $keywords || is_page() && $keywords)
		{
			echo '<meta name="keywords" content="' . $keywords . '" />' . "\n";
		}
	}
	
	if ($main_options['fr_post_seo2_active'] == "Yes")
	{
		if (is_single() && get_meta_box_value('noindex') == "1" || is_page() && get_meta_box_value('noindex') == "1")
		{
			echo '<meta name="robots" content="noindex" />' . "\n";
		}
	}

	if (is_front_page() && !class_exists('All_in_One_SEO_Pack') && !class_exists('HeadSpace2_Admin') || is_home() && !class_exists('All_in_One_SEO_Pack') && !class_exists('HeadSpace2_Admin'))
	{
		echo stripslashes ('<meta name="description" content="' . esc_attr( $home_description ) . '" />') . "\n";
	}
	
	if (is_front_page() && $main_options['fr_home_keywords'] != "" || is_home() && $main_options['fr_home_keywords'] != "")
	{
		echo '<meta name="keywords" content="' . $home_keywords . '" />' . "\n";
	}
	
	if ($main_options['fr_canonical'] == "Yes" && is_page() || $main_options['fr_canonical'] == "Yes" && is_single())
	{
		echo '<meta name="canonical" content="' . get_permalink() . '" />' . "\n";
	}
}