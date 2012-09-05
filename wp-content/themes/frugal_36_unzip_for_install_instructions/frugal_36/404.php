<?php
$content_design = get_option('frugal_content_design');

get_header(); ?>

<div id="container">

<?php frugal_hook_before_container(); ?>

<div id="content">

<?php frugal_hook_before_content(); ?>

<?php
if ($content_design['fr_layout_type'] == "Double Sidebar")
{
	frugal_sidebar_1();
}
elseif ($content_design['fr_layout_type'] == "Left Sidebar" || $content_design['fr_layout_type'] == "Double Left Sidebar")
{
	frugal_sidebars();
}
?>
	
	<div id="content_column">
	
<?php frugal_hook_before_content_column(); ?>

		<div class="postarea">
		
<?php
if ($main_options['fr_breadcrumbs_active'] == "Yes")
{
echo do_shortcode('[frugal_crumbs root="' . __('Home', 'frugal') . '" /]');
}
?>
		
<?php frugal_hook_before_postarea(); ?>

		<h1><?php _e('Page Not Found', 'frugal'); ?></h1>
		<p><?php _e('The page you are looking for is not here.', 'frugal'); ?></p>
		<p><?php _e('Try a search or use the navigation to find the page or...', 'frugal'); ?></p>
		<h4><p><a href="<?php echo get_option('home') ?>"><?php _e('Return Home', 'frugal'); ?></a></p></h4>
		
<?php frugal_hook_after_postarea(); ?>

		</div>
		
<?php frugal_hook_after_content_column(); ?>

	</div>
	
<?php
if ($content_design['fr_layout_type'] != "Left Sidebar" && $content_design['fr_layout_type'] != "Double Left Sidebar" && $content_design['fr_layout_type'] != "No Sidebar")
{
	frugal_sidebars();
}
?>
	
<?php frugal_hook_after_content(); ?>

</div>

<?php frugal_hook_after_container(); ?>

</div>
	
<?php get_footer(); ?>