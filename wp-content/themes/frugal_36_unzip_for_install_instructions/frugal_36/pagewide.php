<?php
/*
Template Name: Full Width Page
*/
$main_options = get_option('frugal_main_options');

get_header(); ?>

<div id="widecontainer">

<?php frugal_hook_before_container(); ?>

<div id="content">

<?php frugal_hook_before_content(); ?>

		<div class="postareawide postlinks">
		
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

<?php frugal_hook_after_content(); ?>

</div>

<?php frugal_hook_after_container(); ?>

</div>
	
<?php get_footer(); ?>