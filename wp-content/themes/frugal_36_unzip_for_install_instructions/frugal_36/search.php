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

		<div class="postarea">
		
<?php
if ($main_options['fr_breadcrumbs_active'] == "Yes")
{
echo do_shortcode('[frugal_crumbs root="' . __('Home', 'frugal') . '" /]');
}

frugal_hook_before_postarea(); ?>
		
		<h3><?php _e('Search results for', 'frugal') ?> "<?php echo attribute_escape(get_search_query()); ?>":</h3>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
<?php frugal_hook_before_headline(); ?>

		<div class="searchtitle">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</div>

<?php frugal_hook_after_headline(); ?>

		<div class="byline">
			<p><span class="bylinemeta"><?php the_time('F j, Y'); ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); ?></span></p>
		</div>
		
		<div style="clear:both;"></div>
		
<?php frugal_hook_after_byline(); ?>

		<?php endwhile; else: ?>			
		<p><?php _e('Sorry, no posts matched your criteria.', 'frugal'); ?></p><?php endif; ?>
		<p class="allpostsmeta"><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page', 'frugal'), __('Next Page &raquo;', 'frugal')); ?></p>
		
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