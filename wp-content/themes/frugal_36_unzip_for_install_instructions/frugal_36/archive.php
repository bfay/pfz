<?php
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
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

frugal_hook_before_postarea(); ?>
		
		<?php if (have_posts()) : while (have_posts()) : the_post();

frugal_hook_before_list_post();

frugal_hook_before_headline(); ?>

		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

<?php frugal_hook_after_headline(); ?>

		<div class="byline">
			<p><span class="bylinemeta"><?php if ($main_options['fr_author_meta_display'] == "Yes") { ?><?php echo $main_options['fr_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($main_options['fr_date_meta_display'] == "Yes") { ?><?php echo $main_options['fr_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $main_options['fr_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($main_options['fr_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
			<?php if ($main_options['fr_cat_meta_display'] == "Yes") { echo $main_options['fr_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		
		<div style="clear:both;"></div>
		
<?php frugal_hook_after_byline(); ?>
		
		<?php
		$read_more_text = $main_options['fr_read_more_text'];
		
		if ($main_options['fr_archive_type'] == "Full Content")
		{
			echo the_content($read_more_text) . '<div style="clear:both;"></div>' . "\n";
		}
		else
		{
			$thumb_width = $feature_options['fr_thumb_width'];
			$thumb_height = $feature_options['fr_thumb_height'];
			if ($feature_options['fr_thumb_alignment'] == "Left")
			{
				$thumb_alignment = 'alignleft';
			}
			elseif ($feature_options['fr_thumb_alignment'] == "Center")
			{
				$thumb_alignment = 'aligncenter';
			}
			elseif ($feature_options['fr_thumb_alignment'] == "Right")
			{
				$thumb_alignment = 'alignright';
			}
			else
			{
				$thumb_alignment = '';
			}
			
			if (function_exists('has_post_thumbnail'))
			{
				if (has_post_thumbnail() && $main_options['fr_archive_thumbnails'] == "Yes")
				{
					echo the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
				}
				echo the_excerpt() . "\n";
				echo '<p><a href="' . get_permalink() . '">' . $read_more_text . '</a></p>' . "\n";
			}
		}
		?>
		
		<div class="commentmeta">
		<?php
		if (comments_open() && $main_options['fr_bottom_comment_meta_display'] == "Yes")
		{
			$zero_comments_text = $main_options['fr_zero_comments_text']; ?>
			<p><a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number('' . $zero_comments_text . '', '1 Comment', '% Comments'); ?></a></p><?php
		}
		?>
		</div>
		
		<?php frugal_hook_after_list_post();

		endwhile; else: ?>			
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