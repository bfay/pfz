<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Showcase
 * @since Showcase 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/schemes/<?php echo strtolower(get_option('wd_color_scheme')); ?>.css" type="text/css">  
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/prettyPhoto.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="<?php echo get_option('wd_favicon'); ?>">

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>

<script src="<?php bloginfo('template_url'); ?>/library/js/jquery.prettyPhoto.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/library/js/all.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/library/js/swfobject/swfobject.js"></script>

<?php
?>
<style type="text/css">
<?php
if( get_option('wd_custom_css') != "" )
{
echo get_option('wd_custom_css');
}
if( strtolower(get_option('wd_logo_type')) == 'text' ):
if( get_option('wd_logo_text_color') != "" )
{
?>
h1#logo-text a
{
	color: #<?php echo get_option('wd_logo_text_color');?>;
	
}
<?php
}
endif; ?>
</style>
</head>
<body <?php body_class(); ?>>
<div id="header">
	<div class="inner">
		<div id="logo">
		<?php if( strtolower(get_option('wd_logo_type')) == 'image' ):
		?>
			<img src="<?php echo get_option('wd_logo_image'); ?>" alt="<?php bloginfo('name');?> Logo" />
		<?php 
		else:
		$logo = ( get_option('wd_logo_text_link') ) ? '<a href="'. get_option('wd_logo_text_link'). '">'. get_option('wd_logo_text'). '</a>' : get_option('wd_logo_text');
		?>
		<h1 id="logo-text" style="color: #<?php echo get_option('wd_logo_text_color');?>;"><?php echo $logo; ?></h1> <?php endif; ?>
		</div>
		<?php wp_nav_menu( array( 'menu' => 'main', 'container_class' => 'menu', 'theme_location' => 'primary' ) ); ?>
	</div>
</div>

<div id="bger">
		<div id="box">
	<div class="inner">
<div id="flashcontent">
	<div style="margin-top: -30px;">
		<?php 
		$width = get_option('wd_width');
		$height = get_option('wd_height');
		?>
		<img src="<?php echo get_option('wd_no_flash'); ?>" alt="No Flash" style="width:<?php echo $width; ?>; height: <?php echo $height; ?>;" />
	</div>
</div><!-- end flashcontent -->
<script type="text/javascript">
		var flashvars = {};
		flashvars.xmlSource = "<?php bloginfo('template_url'); ?>/library/piecemaker/piecemakerXML.php";
		flashvars.cssSource = "<?php bloginfo('template_url'); ?>/library/piecemaker/css/piecemakerCSS.css";
		flashvars.imageSource = "<?php bloginfo('template_url'); ?>/images";
		var attributes = {};
		attributes.wmode = "transparent";
		swfobject.embedSWF("<?php bloginfo('template_url'); ?>/library/piecemaker/piecemaker.swf", "flashcontent", "1005", "500", "10", "<?php bloginfo('template_url'); ?>/library/js/swfobject/expressInstall.swf", flashvars, attributes);
</script>
		</div>
	</div>
</div>
<div class="clear"></div>
<div class='content'>	
	<div class="inner">