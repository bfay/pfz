<?php
/*
Template Name: CMS Page
*/
$main_options = get_option('frugal_main_options');
$content_design = get_option('frugal_content_design');

get_header(); ?>

<div id="cmscontainer">

<?php frugal_hook_before_cms_container(); ?>

<div id="content">

<?php frugal_hook_before_cms_content(); ?>

<?php
if ($content_design['fr_cms_layout_type'] == "Left Sidebar" || $content_design['fr_cms_layout_type'] == "Double Sidebar")
{
	frugal_cms_sidebar_1();
}
?>
	
	<div id="cms_content_column">
	
<?php frugal_hook_before_cms_content_column(); ?>

		<div class="cms_postarea postlinks">
		
<?php
if ($main_options['fr_breadcrumbs_active'] == "Yes")
{
echo do_shortcode('[frugal_crumbs root="' . __('Home', 'frugal') . '" /]');
}

frugal_hook_before_cms_pagearea();
		
		if (have_posts()) : while (have_posts()) : the_post();

frugal_hook_before_cms_headline(); ?>

		<h1><?php the_title(); ?></h1>

<?php frugal_hook_after_cms_headline(); ?>
		
		<?php $read_more_text = $main_options['fr_read_more_text']; ?>
		<?php the_content($read_more_text); ?><div style="clear:both;"></div>
		
		<?php endwhile; else: ?>			
		<p><?php _e('Sorry, no posts matched your criteria.', 'frugal'); ?></p><?php endif; ?>
		
<?php frugal_hook_after_cms_pagearea(); ?>

		</div>
		
	<?php
	if ($main_options['fr_comment_display_location'] == "Pages" || $main_options['fr_comment_display_location'] == "Posts AND Pages")
	{
		?>
		<div class="comments">
			<?php comments_template('',true); ?>
		</div>
		<?php
	}
	else
	{
		?>
		<!--DO NOTHING-->
		<?php
	}
	?>
		
<?php frugal_hook_after_cms_content_column(); ?>

	</div>
	
<?php
if ($content_design['fr_cms_layout_type'] == "Double Sidebar")
{
	frugal_cms_sidebar_2();
}
elseif ($content_design['fr_cms_layout_type'] == "Right Sidebar")
{
	frugal_cms_sidebar_1();
}
?>
	
<?php frugal_hook_after_cms_content(); ?>

</div>

<?php frugal_hook_after_cms_container(); ?>

</div>
	
<?php get_footer(); ?>