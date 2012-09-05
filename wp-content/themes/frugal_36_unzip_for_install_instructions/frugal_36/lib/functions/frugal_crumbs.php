<?php

function get_path_titles ($post, &$titles) {
	$post_parent;

	if ($post->post_parent):
		$post_parent = get_post($post->post_parent);
		$titles[$post_parent->post_name] = get_the_title($post_parent);
		get_path_titles ($post_parent, &$titles);
	endif;
	return;
}

function sc_unpack_query_string($query_string) {
	$temp = explode('&', $query_string);
	$results = array();
	foreach($temp as $item) {
		list ($key, $value) = explode('=', $item);
		$results[$key] = $value;
	}
	
	return $results;
}

function make_permalink($array, $post_type) {

	if (isset($array['s'])) return 'Search Results'; 

	$base_URL = get_bloginfo( 'url' );	
	$permalink = get_permalink();

	switch ($post_type) {

		case 'post':
			$permalink = '/';
			if (isset($array['category_name'])) $permalink .= '/category/'.urldecode($array['category_name']) . '/';
			if (isset($array['year'])) $permalink .= urldecode($array['year']) . '/';
			if (isset($array['monthnum'])) $permalink .= urldecode($array['monthnum']) . '/';
			if (isset($array['day'])) $permalink .= urldecode($array['day']) . '/';
			if (isset($array['name'])) $permalink .= urldecode($array['name']) . '/';
			
			if (isset($array['tag'])) $permalink .= 'tag/'.urldecode($array['tag']) . '/';
			
			break;
	
		case 'page':		
		case 'attachment':
		default:		
			$permalink = str_replace( $base_URL, '', $permalink );

	}
	
	$permalink = preg_replace('/^\/(.+)\/$/', '${1}', $permalink);
	
	return $permalink;
}



function frugal_crumbs_shortcode ( $attr ) {
	$divider = ' &gt; ';
	$titles = '';
	$titles_divider = '|^|';
	$theCrumb = array( );
	$strCrumb = '';
	$baseURL = get_bloginfo( 'url' );

	global $post;
	global $query_string;
	$query_array = sc_unpack_query_string($query_string);

	extract(shortcode_atts(array(
		'root'		 =>	''
	), $attr));	
	
	$postID = (int) $post->ID;
	$post_name = $post->post_name;
	$post_type = $post->post_type;

	$htmlTemplate = '<a class="navCrumb lnk" href="[__1__]">[__2__]</a>';
	$pattern = array('/\[__1__\]/','/\[__2__\]/');

	$permalink = make_permalink($query_array, $post_type);
	
	$titles[$post_name] = get_the_title($postID);
	get_path_titles ($post, $titles);
	
	if ($root):
		$replace = array($baseURL,ucfirst($root));
		$strCrumb = preg_replace($pattern, $replace, $htmlTemplate);
	endif;

	$tok = strtok( $permalink, '/');
	
	while  ($tok) {		
		$baseURL .= sprintf("/$tok");
		
		if ($tok<>'category') $strCrumb .= ($strCrumb) ? $divider : '';
		switch ($tok) {

			case 'attachment':
			case 'share':
			case 'tag':
			case 'Search Results':
				$strCrumb .= ucfirst($tok);		
				break;

			case 'category':
				break;
		
			default:
				if (isset($query_array['tag'])) $titles[$tok] = single_tag_title("", false);

				$replace = (isset($titles[$tok])) ? array($baseURL . '/', $titles[$tok]) : array($baseURL . '/', ucfirst($tok));
				$strCrumb .= preg_replace($pattern, $replace, $htmlTemplate);
		}
		
		$tok = strtok( '/' );
			
	}

	return $strCrumb;
}
add_shortcode('frugal_crumbs', 'frugal_crumbs_shortcode');