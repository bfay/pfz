<?php
/**
 * Builds and hooks in the Breadcrumbs functionality.
 *
 * @package Catalyst
 */
 
add_action( 'catalyst_hook_before_loop', 'catalyst_build_breadcrumbs' );
/**
 * Determine if and when to display the Catalyst breadcrumbs.
 *
 * @since 1.0
 */
function catalyst_build_breadcrumbs()
{
	global $catalyst_layout_id;
	
	if( is_front_page() && !catalyst_get_core( 'breadcrumbs_front_page' ) )
		return;
	if( is_home() && !catalyst_get_core( 'breadcrumbs_pages' ) )
		return;
	if( is_single() && !catalyst_get_core( 'breadcrumbs_posts' ) )
		return;
	if( is_page() && !is_front_page() && !catalyst_get_core( 'breadcrumbs_pages' ) && !is_page_template( 'template-blog.php' ) && !is_page_template( 'template-blank-content.php' ) )
		return;
	if( ( is_archive() || is_search() ) && !catalyst_get_core( 'breadcrumbs_archives' ) )
		return;
	if( is_page_template( 'template-blog.php' ) && !catalyst_get_core( 'breadcrumbs_blog' ) )
		return;
	if( is_page_template( 'template-blank-content.php' ) && !catalyst_get_core( 'breadcrumbs_blank_content' ) )
		return;
	if( is_404() || substr( $catalyst_layout_id, 0, 21 ) == 'catalyst_landing_page' )
		return;

	if( function_exists( 'bcn_display' ) )
	{
		echo '<div class="breadcrumb">'; bcn_display(); echo '</div>';
	}
	elseif( function_exists( 'yoast_breadcrumb' ) )
	{
		yoast_breadcrumb( '<div class="breadcrumb">','</div>' );
	}
	elseif( function_exists( 'breadcrumbs' ) )
	{
		breadcrumbs();
	}
	elseif( function_exists( 'crumbs' ) )
	{
		crumbs();
	}
	else
	{
		catalyst_breadcrumb();
	}
}

add_filter( 'breadcrumbs_text_main', 'breadcrumbs_text_main' );
/**
 * Filter in the breadcrumbs_text_main custom text.
 *
 * @since 1.5.1
 */
function breadcrumbs_text_main()
{
	return catalyst_get_core( 'breadcrumbs_text_main' );
}

add_filter( 'breadcrumbs_text_home', 'breadcrumbs_text_home' );
/**
 * Filter in the breadcrumbs_text_home custom text.
 *
 * @since 1.5.1
 */
function breadcrumbs_text_home()
{
	return catalyst_get_core( 'breadcrumbs_text_home' );
}

add_filter( 'breadcrumbs_text_archives', 'breadcrumbs_text_archives' );
/**
 * Filter in the breadcrumbs_text_archives custom text.
 *
 * @since 1.5.1
 */
function breadcrumbs_text_archives()
{
	return catalyst_get_core( 'breadcrumbs_text_archives' );
}

add_filter( 'breadcrumbs_text_search', 'breadcrumbs_text_search' );
/**
 * Filter in the breadcrumbs_text_search custom text.
 *
 * @since 1.5.1
 */
function breadcrumbs_text_search()
{
	return catalyst_get_core( 'breadcrumbs_text_search' );
}

add_filter( 'breadcrumbs_text_sep', 'breadcrumbs_text_sep' );
/**
 * Filter in the breadcrumbs_text_sep custom text.
 *
 * @since 1.5.1
 */
function breadcrumbs_text_sep()
{
	return catalyst_get_core( 'breadcrumbs_text_sep' );
}

/**
 * Build the Catalyst breadcrumbs HTML.
 *
 * @since 1.0
 * @return the Catalyst breadcrumbs HTML.
 */
function catalyst_breadcrumb( $args = array() )
{
	global $wp_query, $post;
	
	$breadcrumbs_text_main = apply_filters( 'breadcrumbs_text_main', __( 'Leave A Comment...', 'catalyst' ) );
	$breadcrumbs_text_home = apply_filters( 'breadcrumbs_text_home', __( 'Leave A Comment...', 'catalyst' ) );
	$breadcrumbs_text_archives = apply_filters( 'breadcrumbs_text_archives', __( 'Leave A Comment...', 'catalyst' ) );
	$breadcrumbs_text_search = apply_filters( 'breadcrumbs_text_search', __( 'Leave A Comment...', 'catalyst' ) );
	$breadcrumbs_text_sep = apply_filters( 'breadcrumbs_text_sep', __( 'Leave A Comment...', 'catalyst' ) );

	$defaults = array(
		'home'	=> $breadcrumbs_text_home,
		'sep'	 => $breadcrumbs_text_sep,
		'prefix'  => '<div class="breadcrumbs">',
		'suffix'  => '</div>',
		'display' => true,
		'labels'  => array(
			'prefix' => $breadcrumbs_text_main . ' ',
			'author' => $breadcrumbs_text_archives . ' ',
			'tag'	=> $breadcrumbs_text_archives . ' ',
			'date'   => $breadcrumbs_text_archives . ' ',
			'search' => $breadcrumbs_text_search . ' ',
			'tax'	=> $breadcrumbs_text_archives . ' ',
			'post_type'	=> $breadcrumbs_text_archives . ' '
		)
	);
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'catalyst_breadcrumb_args', $args );

	$args['sep'] = ' ' . trim( $args['sep'] ) . ' ';

	$link_format = '<a href="%s">%s</a>';

	$on_front = get_option( 'show_on_front' );

	if( 'page' == $on_front )
	{
		$homelink = sprintf( $link_format, get_permalink( get_option( 'page_on_front' ) ), $args['home'] );
		$bloglink = get_option( 'page_for_posts' );

		if( $bloglink )
			$bloglink = sprintf( '%s%s' . $link_format, $homelink, $args['sep'], get_permalink( $bloglink ), get_the_title( $bloglink ) );
		else
			$bloglink = $homelink;
	} 
	else
	{
		$homelink = sprintf( $link_format, home_url(), $args['home'] );
		$bloglink = $homelink;
	}

	$homelink = apply_filters( 'catalyst_breadcrumb_homelink', $homelink );
	$bloglink = apply_filters( 'catalyst_breadcrumb_bloglink', $bloglink );

	function catalyst_get_category_parents( $crumbs, $parent_id, $link = false, $visited = array() )
	{
		$parent = &get_category( ( int ) $parent_id );
		if( is_wp_error( $parent ) )
			return array();

		if( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) )
		{
			$visited[] = $parent->parent;
			$chain = catalyst_get_category_parents( array(), $parent->parent, true, $visited );
		}

		if( $link && ! is_wp_error( get_category_link( $parent->term_id ) ) )
			$chain[] = sprintf( '<a href="%s" title="%s">%s</a>', get_category_link( $parent->term_id ), esc_attr( sprintf( __( "View all posts in %s" ), $parent->cat_name ) ), esc_html( $parent->cat_name ) );
		else
			$chain[] = $parent->cat_name;

		return array_merge( $crumbs, $chain );
	}

	if(( 'page' == $on_front && is_front_page() ) || ( 'posts' == $on_front && is_home() ) )
	{
		$crumbs[] = $args['home'];

	}
	elseif( 'page' == $on_front && is_home() )
	{
		$crumbs[] = $homelink;
		$crumbs[] = get_the_title(get_option( 'page_for_posts' ) );
	}
	elseif( !is_page() )
	{
		$crumbs[] = $bloglink;
		
		if( is_singular( 'post' ) )
		{
			$cats = get_the_category();

			if( !is_wp_error( $cats ) )
			{
				$cat = $cats[0];
				if( $cat->parent != 0 )
				{
					$crumbs = catalyst_get_category_parents( $crumbs, $cat->term_id, true );
				}
				elseif( ! is_wp_error( get_category_link( $cat->term_id ) ) )
				{
					$crumbs[] = sprintf( $link_format, get_category_link( $cat->term_id ), esc_html( $cat->name ) );
				}
				else
				{
					$crumbs[] = esc_html( $cat->name );
				}
			}
		}
		
		if( is_singular() && !is_singular( 'post' ) )
		{
			$post_type = get_query_var( 'post_type' );
			$post_type_object = get_post_type_object( $post_type );

			$crumbs[] = sprintf( $link_format, get_post_type_archive_link( $post_type ), esc_html( $post_type_object->labels->name ) );
		}

		if( is_category() )
		{
			$crumbs = catalyst_get_category_parents( $crumbs, get_query_var( 'cat' ), false );
		}
		elseif( is_tag() )
		{
			$crumbs[] = $args['labels']['tag'] . single_cat_title( '', false );
		}
		elseif( is_date() )
		{
			$crumbs[] = $args['labels']['date'] . single_month_title( ' ', false );
		}
		elseif( is_author() )
		{
			$crumbs[] = $args['labels']['author'] . esc_html( $wp_query->queried_object->display_name );
		}
		elseif( is_search() )
		{
			$crumbs[] = $args['labels']['search'] . '"' . esc_html( apply_filters( 'the_search_query', get_search_query() ) ) . '"';
		}
		elseif( is_tax() )
		{
			$crumbs[] = $args['labels']['tax'] . esc_html( $wp_query->queried_object->name );
		}
		elseif ( is_post_type_archive() )
		{
			$crumbs[] = $args['labels']['post_type'] . esc_html( post_type_archive_title( '', false ) );
		}
		else
		{
			$crumbs[] = get_the_title();
		}
	}
	else
	{
		$post = $wp_query->get_queried_object();

		if( 0 == $post->post_parent )
		{
			$crumbs = array( $homelink, get_the_title() );
		}
		else
		{
			if( isset( $post->ancestors ) )
			{
				if( is_array( $post->ancestors ) )
					$ancestors = array_values( $post->ancestors );
				else
					$ancestors = array( $post->ancestors );
			}
			else
			{
				$ancestors = array( $post->post_parent );
			}

			$crumbs = array();
			foreach ( $ancestors as $ancestor )
			{
				array_unshift( $crumbs, sprintf( $link_format, get_permalink( $ancestor ), strip_tags( get_the_title( $ancestor ) ) ) );
			}

			array_unshift( $crumbs, $homelink );

			$crumbs[] = strip_tags(get_the_title( $post->ID ) );
		}
	}

	$output = join( $args['sep'], $crumbs );

	if( '' !== trim( $args['labels']['prefix'] ) )
		$output = $args['labels']['prefix'] . $output;

	if( $args['display'] )
		echo $args['prefix'] . $output . $args['suffix'];

	else
		return $args['prefix'] . $output . $args['suffix'];
}

//end lib/functions/catalyst-breadcrumbs.php