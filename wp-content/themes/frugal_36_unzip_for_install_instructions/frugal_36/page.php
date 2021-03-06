<?php
$main_options = get_option('frugal_main_options');
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

frugal_hook_before_pagearea();
		
		if (have_posts()) : while (have_posts()) : the_post();

frugal_hook_before_headline(); ?>

		<h1><?php the_title(); ?></h1>

<?php frugal_hook_after_headline(); ?>
		
		<?php $read_more_text = $main_options['fr_read_more_text']; ?>
		<?php the_content($read_more_text); ?><div style="clear:both;"></div>

		<?php endwhile; else: ?>			
		<p><?php _e('Sorry, no posts matched your criteria.', 'frugal'); ?></p><?php endif; ?>
		
<?php frugal_hook_after_pagearea(); ?>

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