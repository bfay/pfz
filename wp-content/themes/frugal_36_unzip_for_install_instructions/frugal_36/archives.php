<?php
/*
Template Name: Archives
*/
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

		<div class="postarea postlinks">
		
<?php
if ($main_options['fr_breadcrumbs_active'] == "Yes")
{
echo do_shortcode('[frugal_crumbs root="' . __('Home', 'frugal') . '" /]');
}
?>
		
<?php frugal_hook_before_postarea(); ?>

<?php frugal_hook_before_headline(); ?>

		<h1><?php the_title(); ?></h1>

<?php frugal_hook_after_headline(); ?>

			<h3><?php _e('By Month:', 'frugal'); ?></h3>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
			<h3><?php _e('By Category:', 'frugal'); ?></h3>
			<ul>
				<?php wp_list_categories('title_li=0'); ?>
			</ul>
		
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