<?php

/* The following classes were inspired by the work of Scott Wallick and Andy Skelton with their
'Sandbox' theme framework and later enhanced by Ian Stewart with his 'Thematic' theme framework */
function frugal_body_class($print = true) {
$feature_options = get_option('frugal_feature_options');
global $wp_query, $current_user;

	is_front_page()  ? $c[] = 'home'       : null;
	is_home()        ? $c[] = 'blog'       : null;
	is_home() && $feature_options['fr_homepage_display'] == "Home Page"    ? $c[] = 'static'    : null;//body class for the static homepage.
	is_page_template('blog.php') && $feature_options['fr_homepage_display'] == "Blog Page Template"    ? $c[] = 'static'    : null;//body class for the static homepage.
	is_archive()     ? $c[] = 'archive'    : null;
	is_date()        ? $c[] = 'date'       : null;
	is_search()      ? $c[] = 'search'     : null;
	is_paged()       ? $c[] = 'paged'      : null;
	is_attachment()  ? $c[] = 'attachment' : null;
	is_404()         ? $c[] = 'four04'     : null;
	
	if (is_single()):
		$postID = $wp_query->post->ID;
		the_post();
		
		$c[] = 'single postid-' . $postID;
		
		if ($cats = get_the_category())
			foreach ($cats as $cat)
				$c[] = 's-category-' . $cat->slug;

		$c[] = 's-author-' . sanitize_title_with_dashes(strtolower(get_the_author_login()));
		rewind_posts();	
	elseif (is_author()):
		$author = $wp_query->get_queried_object();
		$c[] = 'author';
		$c[] = 'author-' . $author->user_nicename;
	elseif (is_category()):
		$cat = $wp_query->get_queried_object();
		$c[] = 'category';
		$c[] = 'category-' . $cat->slug;
	elseif (is_tag()):
		$tags = $wp_query->get_queried_object();
		$c[] = 'tag';
		$c[] = 'tag-' . $tags->slug;
	elseif (is_page()):
		$pageID = $wp_query->post->ID;
		$page_children = wp_list_pages("child_of=$pageID&echo=0");
		the_post();
		$c[] = 'page pageid-' . $pageID;
		$c[] = 'page-author-' . sanitize_title_with_dashes(strtolower(get_the_author('login')));

		if ($page_children)
			$c[] = 'page-parent';
		if ( $wp_query->post->post_parent )
			$c[] = 'page-child parent-pageid-' . $wp_query->post->post_parent;
		if (is_page_template() & !is_page_template('default'))
			$c[] = 'page-template page-template-' . str_replace( '.php', '-php', get_post_meta( $pageID, '_wp_page_template', true ) );
		rewind_posts();
	endif;

	if ($current_user->ID)
		$c[] = 'loggedin';

	$browser = $_SERVER[ 'HTTP_USER_AGENT' ];

	if (preg_match("/Mac/", $browser)):
			$c[] = 'mac';
	elseif (preg_match( "/Windows/", $browser)):
			$c[] = 'windows';
	elseif (preg_match( "/Linux/", $browser)):
			$c[] = 'linux';
	else:
			$c[] = 'unknown-os';
	endif;

	if (preg_match("/Chrome/", $browser)):
			$c[] = 'chrome';

			preg_match("/Chrome\/(\d.\d)/si", $browser, $matches);
			$ch_version = 'ch' . str_replace('.', '-', $matches[1]);      
			$c[] = $ch_version;
	elseif (preg_match("/Safari/", $browser)):
			$c[] = 'safari';
			
			preg_match("/Version\/(\d.\d)/si", $browser, $matches);
			$sf_version = 'sf' . str_replace('.', '-', $matches[1]);      
			$c[] = $sf_version;	
	elseif (preg_match("/Opera/", $browser)):
			$c[] = 'opera';
			
			preg_match("/Opera\/(\d.\d)/si", $browser, $matches);
			$op_version = 'op' . str_replace('.', '-', $matches[1]);      
			$c[] = $op_version;
	elseif (preg_match("/MSIE/", $browser)):
			$c[] = 'msie';
			
			if(preg_match("/MSIE 6.0/", $browser)):
					$c[] = 'ie6';
			elseif (preg_match( "/MSIE 7.0/", $browser)):
					$c[] = 'ie7';
			elseif (preg_match("/MSIE 8.0/", $browser)):
					$c[] = 'ie8';
			endif;
			
	elseif (preg_match("/Firefox/", $browser) && preg_match("/Gecko/", $browser)):
			$c[] = 'firefox';
			
			preg_match("/Firefox\/(\d)/si", $browser, $matches);
			$ff_version = 'ff' . str_replace('.', '-', $matches[1]);      
			$c[] = $ff_version;
			
	else:
			$c[] = 'unknown-browser';
	endif;

	$c = join(' ', apply_filters('body_class',  $c));

	return $print ? print($c) : $c;
}