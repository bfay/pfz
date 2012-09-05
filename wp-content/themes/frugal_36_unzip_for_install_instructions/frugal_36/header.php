<?php global $wp_theme_options;
frugal_gzip();
$main_options = get_option('frugal_main_options');
$header_design = get_option('frugal_header_design'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

	<title><?php frugal_site_title(); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<?php frugal_meta();
	frugal_css_head(); ?>
	
	<link rel="Shortcut Icon" href="<?php echo bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e('RSS Feed', 'frugal'); ?>" href="<?php echo frugal_rss_link() ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php
	if ($header_design['fr_nav_location'] != "No Navbar" || $header_design['fr_subnav_location'] != "No Category Navbar")
	{
		?>
		<script type="text/javascript"><!--//--><![CDATA[//><!--
		sfHover = function() {
			if (!document.getElementsByTagName) return false;
			<?php
			if ($header_design['fr_nav_location'] != "No Navbar")
			{
				?>
				var sfEls = document.getElementById("nav").getElementsByTagName("li");
				<?php
			}
			?>
			
			<?php
			if ($header_design['fr_subnav_location'] != "No Category Navbar")
			{
				?>
				var sfEls1 = document.getElementById("subnav").getElementsByTagName("li");
				<?php
			}
			?>

			<?php
			if ($header_design['fr_nav_location'] != "No Navbar")
			{
				?>
				for (var i=0; i<sfEls.length; i++) {
					sfEls[i].onmouseover=function() {
						this.className+=" sfhover";
					}
					sfEls[i].onmouseout=function() {
						this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
					}
				}
				<?php
			}
			?>
			
			<?php
			if ($header_design['fr_subnav_location'] != "No Category Navbar")
			{
				?>
				for (var i=0; i<sfEls1.length; i++) {
					sfEls1[i].onmouseover=function() {
						this.className+=" sfhover1";
					}
					sfEls1[i].onmouseout=function() {
						this.className=this.className.replace(new RegExp(" sfhover1\\b"), "");
					}
				}
				<?php
			}
			?>

		}
		if (window.attachEvent) window.attachEvent("onload", sfHover);
		//--><!]]></script>
		<?php
	}
	?>

	<?php if (is_singular()) wp_enqueue_script( 'comment-reply' ); ?>
	
	<?php wp_head(); ?>
	
</head>

<?php if($main_options['fr_custom_stylesheet'] == "Yes") { $custom = ' custom'; }

echo '<body class="' . frugal_body_class(false) . $custom . '">' . "\n";

frugal_before_header();

frugal_header();

frugal_after_header(); ?>