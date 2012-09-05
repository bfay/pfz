<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
 		<?php include (TEMPLATEPATH . '/library/options/options.php'); ?>
		<title>
				<?php
				if($bp_existed == 'true') { ?>
				<?php bp_page_title() ?>
				<?php } else { ?>
					<?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?>
				<?php } ?>
		</title>
		<?php if($bp_existed == 'true') : ?>
			<?php do_action( 'bp_head' ) ?>
		<?php endif ?>
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
				<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/_inc/css/reset.css" type="text/css" media="all" />
			<?php
			$get_current_scheme = get_option('dev_product_custom_style');
			?>
			<?php
			if(($get_current_scheme == '') || ($get_current_scheme == 'default.css')) { ?>
			<?php print "<style type='text/css' media='screen'>"; ?>
			<?php include (TEMPLATEPATH . '/library/options/theme-options.php'); ?>
			<?php print "</style>"; ?>
			<?php } else { ?>
			<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/styles/<?php echo $get_current_scheme; ?>" type="text/css" media="all" />
			<?php }
			?>
			
			<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
			
			<?php if( $bp_existed == 'true' ) : //check if bp existed ?>
				<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/_inc/css/adminbar.css" type="text/css" media="all" />
			<?php endif ?>
			<?php if($bp_existed == 'true') { ?>
			<?php if ( function_exists( 'bp_sitewide_activity_feed_link' ) ) : ?>
				<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php _e('Site Wide Activity RSS Feed', TEMPLATE_DOMAIN ) ?>" href="<?php bp_sitewide_activity_feed_link() ?>" />
			<?php endif; ?>
			<?php if ( function_exists( 'bp_member_activity_feed_link' ) && bp_is_member() ) : ?>
				<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_displayed_user_fullname() ?> | <?php _e( 'Activity RSS Feed', TEMPLATE_DOMAIN ) ?>" href="<?php bp_member_activity_feed_link() ?>" />
			<?php endif; ?>
			<?php if ( function_exists( 'bp_group_activity_feed_link' ) && bp_is_group() ) : ?>
				<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_current_group_name() ?> | <?php _e( 'Group Activity RSS Feed', TEMPLATE_DOMAIN ) ?>" href="<?php bp_group_activity_feed_link() ?>" />
			<?php endif; ?>
				<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts RSS Feed', TEMPLATE_DOMAIN ) ?>" href="<?php bloginfo('rss2_url'); ?>" />
				<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts Atom Feed', TEMPLATE_DOMAIN ) ?>" href="<?php bloginfo('atom_url'); ?>" />	
			<?php } else { ?>
				<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
				<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
				<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
			<?php } ?>
				<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
				<link rel="icon" href="<?php bloginfo('stylesheet_directory');?>/favicon.ico" type="images/x-icon" />
				<?php if($bp_existed != 'true') { ?>
					<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
				<?php } ?>
		<?php wp_head(); ?>
		<script src="<?php bloginfo('template_directory'); ?>/library/scripts/loopedslider.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/hoverIntent.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/superfish.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/supersubs.js"></script>
		<script type="text/javascript">
		    jQuery(document).ready(function() {
			   jQuery.noConflict();

			     // Put all your code in your document ready area
			     jQuery(document).ready(function(){
			       // Do jQuery stuff using $
				 	jQuery(function(){
					 jQuery(".sf-menu").supersubs({ 
					            minWidth:    12,   // minimum width of sub-menus in em units 
					            maxWidth:    27,   // maximum width of sub-menus in em units 
					            extraWidth:  1     // extra width can ensure lines don't sometimes turn over 
					                               // due to slight rounding differences and font-family 
					        }).superfish();  // call supersubs first, then superfish, so that subs are 
					                         // not display:none when measuring. Call before initialising 
					                         // containing tabs for same reason.
					});
			    });
		    });
		</script>
		
		<script type="text/javascript" charset="utf-8">
		   jQuery.noConflict();

		     // Put all your code in your document ready area
		     jQuery(document).ready(function(){
			jQuery(function(){
				jQuery('#loopedSlider').loopedSlider(
					{
						autoHeight: 500
					}
					);
			});
				    });
		</script>
		<?php
			$slideheight = get_option('dev_product_slideone_height');
			$pheight = ($slideheight/2);
			
			if ($slideheight == ""){
				$slideheight = 300;
				$pheight = 150;
			}
			
		?>
		<style type="text/css" media="screen">
			a.previous { position:absolute; top:<?php echo $pheight; ?>px; left:-22px; }
			a.next { position:absolute; top:<?php echo $pheight; ?>px; right:-24px; }
			#loopedSlider .container { width:940px; height:<?php echo $slideheight; ?>px; overflow:hidden; position:relative; cursor:pointer; }
		</style>
		<!--[if IE 6]>
		<style type="text/css">
				.shadow-spacer{
					background: none;
				}
		</style>
			<![endif]-->
	</head>
	<body <?php body_class() ?>>
		<div id="site-wrapper">
		<?php if($bp_existed == 'true') : ?>
			<?php do_action( 'bp_before_header' ) ?>
		<?php endif ?>
		<div id="header">
				<div id="search-bar">
						<?php
							$sitedescription = get_option('dev_product_description');
							$sitetitle = get_option('dev_product_title');
							
									if ($sitedescription == ""){
										$sitedescription = "Enter a site description in options";
									}

									if ($sitetitle == ""){
										$sitetitle = "Product";
									}
						?>
					<h2><?php echo stripslashes($sitedescription); ?></h2>
					<?php locate_template( array( '/library/components/searchform.php' ), true ); ?>		
					<?php if($bp_existed == 'true') : ?>
						<?php //do_action( 'bp_search_login_bar' ) ?>
					<?php endif ?>
				</div><!-- #search-bar -->
				<div id="logo">
				<?php 
					$logo_on = get_option('dev_product_header_image');
					$logo_image = get_option('dev_product_header_logo');
					$description_on = get_option('dev_product_header_description_on');
					$square_logo = get_option('dev_product_header_image_square');
					$square_image = get_option('dev_product_header_logo_square');
				?>
				<?php

				if($logo_on == "no" && $square_logo == "yes"){
					?>
					<a href="<?php echo get_option('home') ?>" title="<?php _e( 'Home', 'buddypress' ) ?>"><img src="<?php echo $square_image; ?>" alt="<?php bloginfo('name'); ?>" class="logo-square"/></a>
					<h1 class="square-header"><a href="<?php echo get_option('home') ?>" title="<?php _e( 'Home', 'buddypress' ) ?>"><?php echo stripslashes($sitetitle); ?></a></h1>
				<?php
				}
				else if($logo_on == "yes" && $square_logo == "no"){
					?>
					<a href="<?php echo get_option('home') ?>" title="<?php _e( 'Home', 'buddypress' ) ?>"><img src="<?php echo $logo_image; ?>" alt="<?php bloginfo('name'); ?>" class="full-logo"/></a>
				<?php
				}
				else{
				?>
					<h1><a href="<?php echo get_option('home') ?>" title="<?php _e( 'Home', 'buddypress' ) ?>"><?php echo stripslashes($sitetitle); ?></a></h1>
				<?php
				}

				?>
				</div>
			<div class="clear"></div>
		</div><!-- #header -->
				<?php if( $bp_existed == 'true' ) { //check if bp existed ?>
					<?php locate_template( array( '/library/components/buddypress/buddypress-navigation.php' ), true ); ?>
				<?php } else { // if not bp detected..let go normal ?>
					<?php locate_template( array( '/library/components/navigation.php' ), true ); ?>
				<?php } ?>
				<?php
				
					locate_template( array( '/library/components/signup-box.php' ), true );
				
				?>
			<?php if($bp_existed == 'true') : ?>
				<?php do_action( 'bp_header' ) ?>
			<?php endif ?>
		<?php if($bp_existed == 'true') : ?>
			<?php do_action( 'bp_after_header' ) ?>
			<?php do_action( 'bp_before_container' ) ?>
		<?php endif ?>
		<div id="container">