<?php
	$main_options = get_option('frugal_main_options');
	$feature_options = get_option('frugal_feature_options');

/* Build the homepage. */

function frugal_home_content() {
$feature_options = get_option('frugal_feature_options');
	echo '<div id="homecontainer">' . "\n";
	
	frugal_hook_before_home_container();

	echo '<div id="home">' . "\n";
	
	echo '<div id="hometop">' . "\n";
	
	frugal_hook_before_hometop();
	frugal_hometop_layout();		
	
	echo '<div style="clear:both;"></div>' . "\n";			
	
	echo '</div>' . "\n";
	
	frugal_hook_after_hometop();
	
	echo '</div>' . "\n";
	
	frugal_hook_after_home_container();
	
	echo '</div>' . "\n";
}

function frugal_home_bottom () {
$feature_options = get_option('frugal_feature_options');
	echo '<div id="homebottom" class="clearfix">' . "\n";
	
	frugal_hook_before_homebottom();
	frugal_homebottom_layout();	
	
	echo '<div style="clear:both;"></div>' . "\n";
	
	echo '</div>' . "\n";
	
	frugal_hook_after_homebottom();
}

/* Give the homepage some functions. */

function frugal_hometop_layout() {
$feature_options = get_option('frugal_feature_options');
	if ($feature_options['fr_home_top_layout'] == "1 Widget/Home Sidebar")
	{
		frugal_hometop_2();
	}
	elseif ($feature_options['fr_home_top_layout'] == "Featured Content/Home Sidebar")
	{
		frugal_hometop_2_post();
	}
	elseif ($feature_options['fr_home_top_layout'] == "Featured Content (Full Width)")
	{
		frugal_hometop_2_post_full();
	}
	elseif ($feature_options['fr_home_top_layout'] == "Widgets")
	{
		frugal_hometop_w();
	}
	elseif ($feature_options['fr_home_top_layout'] == "Latest Post Excerpts")
	{
		frugal_hometop_3_latest();
	}
	elseif ($feature_options['fr_home_top_layout'] == "Category Post Excerpts")
	{
		frugal_hometop_3_cat();
	}
	else
	{
		frugal_hometop_3_page();
	}
}

function frugal_hometop_2() {
	frugal_hometop_wide_l();
	frugal_hometop_r();
}

function frugal_hometop_2_post() {
	frugal_hometop_wide_l_post();
	frugal_hometop_r();
$feature_options = get_option('frugal_feature_options');
	if ($feature_options['fr_home_bottom_layout'] == "Excerpt Post List")
	{
		frugal_homebottom_excerpt_list();
	}
}

function frugal_hometop_2_post_full() {
	frugal_hometop_wide_l_post();
$feature_options = get_option('frugal_feature_options');
	if ($feature_options['fr_home_bottom_layout'] == "Excerpt Post List")
	{
		frugal_homebottom_excerpt_list();
	}
}

function frugal_hometop_w() {
	frugal_hometop();
}

function frugal_hometop_3_latest() {
	frugal_hometop_latest();
}

function frugal_hometop_3_cat() {
	frugal_hometop_cat();
}

function frugal_hometop_3_page() {
	frugal_hometop_page();
}

function frugal_homebottom_layout() {
$feature_options = get_option('frugal_feature_options');
	if ($feature_options['fr_home_bottom_layout'] == "Widgets")
	{
		frugal_home_bottom_widgets();
	}
	elseif ($feature_options['fr_home_bottom_layout'] == "Latest Post Excerpts")
	{
		frugal_home_bottom_latest();
	}
	elseif ($feature_options['fr_home_bottom_layout'] == "Category Post Excerpts")
	{
		frugal_home_bottom_cat();
	}
	elseif ($feature_options['fr_home_bottom_layout'] == "Page Excerpts")
	{
		frugal_home_bottom_page();
	}
}

function frugal_home_bottom_widgets() {
	frugal_homebottom();
}

function frugal_home_bottom_latest() {
	frugal_homebottom_latest();
}

function frugal_home_bottom_cat() {
	frugal_homebottom_cat();
}

function frugal_home_bottom_page() {
	frugal_homebottom_page();
}

/* Define each homepage frame. */

function frugal_hometop_wide_l() {
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Top Left') ) {
		?><div class="hometopleftwidget ht_widget feature_link"><?php
			echo '<img src="' . get_bloginfo('template_url') . '/images/home.jpg" alt="Home Page Image" />' . "\n";
		echo '</div>' . "\n";
	}	
}

function frugal_hometop_wide_l_post() {
$feature_options = get_option('frugal_feature_options');
	if ($feature_options['fr_ht_feature_show'] == "page")
	{
		frugal_ht_wide_l_page();
	}
	elseif ($feature_options['fr_ht_feature_show'] == "post_id")
	{
		frugal_ht_wide_l_post();
	}
	elseif ($feature_options['fr_ht_feature_show'] == "category")
	{
		frugal_ht_wide_l_cat();
	}
	else
	{
		frugal_ht_wide_l_latest_post();
	}
}

function frugal_ht_wide_l_page() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
	global $more;
	// set $more to 0 in order to only get the first part of the post
	$more = 0;
	
$ht_left_page = $feature_options['fr_ht_page_id'];
$read_more_text = $main_options['fr_read_more_text'];

	echo '<div class="hometopleftlatest postlinks">' . "\n";
	frugal_hook_before_hometop_left_post();
	query_posts("page_id=" . $ht_left_page);
		if (have_posts()) : while (have_posts()) : the_post();
		
			frugal_hook_before_headline(); ?>

			<h2 class="post_title"><?php the_title(); ?></h2>
				
			<?php frugal_hook_after_headline(); ?>
			
				<?php the_content($read_more_text); ?><div style="clear:both;"></div>
			
		<?php endwhile; else: ?>			
		<p><?php _e('Sorry, no posts matched your criteria.', 'frugal'); ?></p><?php endif;
	frugal_hook_after_hometop_left_post(); ?>
	</div>	
<?php }

function frugal_ht_wide_l_post() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
	global $more;
	// set $more to 0 in order to only get the first part of the post
	$more = 0; 

$ht_left_post = $feature_options['fr_ht_post_id'];
$read_more_text = $main_options['fr_read_more_text'];
$home_view_posts_text = $feature_options['fr_home_view_posts_text'];

	echo '<div class="hometopleftlatest postlinks">' . "\n";
	
	if ($main_options['fr_breadcrumbs_active'] == "Yes")
	{
		echo do_shortcode('[frugal_crumbs root="' . __('Home', 'frugal') . '" /]');
	}
	
	frugal_hook_before_hometop_left_post();
	query_posts("p=" . $ht_left_post);
		if (have_posts()) : while (have_posts()) : the_post();
		
			frugal_hook_before_headline(); ?>

			<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
			<?php frugal_hook_after_headline(); ?>
			
			<div class="byline_home">
				<p><span class="bylinemeta"><?php if ($feature_options['fr_fp_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_fp_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_fp_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_fp_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_fp_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_fp_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
				<?php if ($feature_options['fr_fp_cat_meta_display'] == "Yes") { echo $feature_options['fr_fp_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
			</div>
			
			<div style="clear:both;"></div>
			
			<?php frugal_hook_after_byline(); ?>
			
				<?php the_content($read_more_text); ?><div style="clear:both;"></div>
			
			<div class="commentmeta_home">
			<?php
			if (comments_open() && $feature_options['fr_home_bottom_comment_meta_display'] == "Yes")
			{
				$zero_comments_text = $main_options['fr_zero_comments_text'];
				?>
					<p><a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number('' . $zero_comments_text . '', __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a></p>
				<?php
			}
			?>
			</div>
			
		<?php endwhile; else: ?>			
		<p><?php _e('Sorry, no posts matched your criteria.', 'frugal'); ?></p><?php endif; ?>
		
		<?php
		if ($feature_options['fr_home_view_posts_url'] != "")
		{
			?>
			<p class="allpostsmeta"><a href="<?php echo $feature_options['fr_home_view_posts_url']; ?>" rel="nofollow"><?php echo $home_view_posts_text ?></a></p>
			<?php
		}
		
	frugal_hook_after_hometop_left_post(); ?>
	</div>	
<?php }

function frugal_ht_wide_l_cat() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
$ht_left_cat_post = $feature_options['fr_ht_cat_id'];
$read_more_text = $main_options['fr_read_more_text'];
$home_view_posts_text = $feature_options['fr_home_view_posts_text'];
$ht_left_post_number = $feature_options['fr_ht_left_post_number'];
$thumb_width = $feature_options['fr_thumb_width'];
$thumb_height = $feature_options['fr_thumb_height'];
if ($feature_options['fr_thumb_alignment'] == "Left"):
$thumb_alignment = 'alignleft';
elseif ($feature_options['fr_thumb_alignment'] == "Center"):
$thumb_alignment = 'aligncenter';
elseif ($feature_options['fr_thumb_alignment'] == "Right"):
$thumb_alignment = 'alignright';
else:
$thumb_alignment = '';
endif;

	echo '<div class="hometopleftlatest postlinks">' . "\n";
	
	if ($main_options['fr_breadcrumbs_active'] == "Yes")
	{
		echo do_shortcode('[frugal_crumbs root="' . __('Home', 'frugal') . '" /]');
	}
	
	frugal_hook_before_hometop_left_post();
	query_posts("cat=" . $ht_left_cat_post . "&showposts=" . $ht_left_post_number . "");
		if (have_posts()) : while (have_posts()) : the_post();
		
			frugal_hook_before_headline(); ?>

			<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
			<?php frugal_hook_after_headline(); ?>
			
			<div class="byline_home">
				<p><span class="bylinemeta"><?php if ($feature_options['fr_fp_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_fp_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_fp_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_fp_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_fp_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_fp_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
				<?php if ($feature_options['fr_fp_cat_meta_display'] == "Yes") { echo $feature_options['fr_fp_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
			</div>
			
			<div style="clear:both;"></div>
			
			<?php frugal_hook_after_byline(); ?>
			
				<?php
				if ($feature_options['fr_ht_left_post_type'] == "Full Content")
				{
					the_content($read_more_text); ?><div style="clear:both;"></div>
					<?php
				}
				elseif (function_exists('has_post_thumbnail'))
				{
					if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
					{
						the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
					}
					the_excerpt(); ?>
					<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
					<?php
				}
				?>
			
			<div class="commentmeta_home">
			<?php
			if (comments_open() && $feature_options['fr_home_bottom_comment_meta_display'] == "Yes")
			{
				$zero_comments_text = $main_options['fr_zero_comments_text'];
				?>
					<p><a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number('' . $zero_comments_text . '', __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a></p>
				<?php
			}
			?>
			</div>
			
		<?php endwhile; else: ?>			
		<p><?php _e('Sorry, no posts matched your criteria.', 'frugal'); ?></p><?php endif; ?>
		
		<?php
		if ($feature_options['fr_home_view_posts_url'] != "")
		{
			?>
			<p class="allpostsmeta"><a href="<?php echo $feature_options['fr_home_view_posts_url']; ?>" rel="nofollow"><?php echo $home_view_posts_text ?></a></p>
			<?php
		}
		
	frugal_hook_after_hometop_left_post(); ?>
	</div>	
<?php }

function frugal_ht_wide_l_latest_post() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
$read_more_text = $main_options['fr_read_more_text'];
$home_view_posts_text = $feature_options['fr_home_view_posts_text'];
$ht_left_post_number = $feature_options['fr_ht_left_post_number'];
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

	echo '<div class="hometopleftlatest postlinks">' . "\n";
	
	if ($main_options['fr_breadcrumbs_active'] == "Yes")
	{
		echo do_shortcode('[frugal_crumbs root="' . __('Home', 'frugal') . '" /]');
	}
	
	frugal_hook_before_hometop_left_post();
	query_posts("showposts=" . $ht_left_post_number . "");
		if (have_posts()) : while (have_posts()) : the_post();
		
			frugal_hook_before_headline(); ?>

			<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
			<?php frugal_hook_after_headline(); ?>
			
			<div class="byline_home">
				<p><span class="bylinemeta"><?php if ($feature_options['fr_fp_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_fp_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_fp_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_fp_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_fp_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_fp_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
				<?php if ($feature_options['fr_fp_cat_meta_display'] == "Yes") { echo $feature_options['fr_fp_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
			</div>
			
			<div style="clear:both;"></div>
			
			<?php frugal_hook_after_byline(); ?>
			
				<?php
				if ($feature_options['fr_ht_left_post_type'] == "Full Content")
				{
					the_content($read_more_text); ?><div style="clear:both;"></div>
					<?php
				}
				elseif (function_exists('has_post_thumbnail'))
				{
					if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
					{
						the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
					}
					the_excerpt(); ?>
					<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
					<?php
				}
				?>
			
			<div class="commentmeta_home">
			<?php
			if (comments_open() && $feature_options['fr_home_bottom_comment_meta_display'] == "Yes")
			{
				$zero_comments_text = $main_options['fr_zero_comments_text'];
				?>
					<p><a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number('' . $zero_comments_text . '', __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a></p>
				<?php
			}
			?>
			</div>
			
		<?php endwhile; else: ?>			
		<p><?php _e('Sorry, no posts matched your criteria.', 'frugal'); ?></p><?php endif; ?>
		
		<?php
		if ($feature_options['fr_home_bottom_layout'] == "Excerpt Post List")
		{
			?>
				<div class="negmargin"></div>
			<?php
		}
		elseif ($feature_options['fr_home_view_posts_url'] != "")
		{
			?>
			<p class="allpostsmeta"><a href="<?php echo $feature_options['fr_home_view_posts_url']; ?>" rel="nofollow"><?php echo $home_view_posts_text ?></a></p>
			<?php
		}
		
	frugal_hook_after_hometop_left_post(); ?>
	</div>
<?php }

function frugal_ht_wide_l_post_id() {
	frugal_home_sidebar();
}

function frugal_ht_wide_l_page_id() {
	frugal_home_sidebar();
}

function frugal_ht_wide_l_cat_id() {
	frugal_home_sidebar();
}

function frugal_hometop_r() {
	frugal_home_sidebar();
}

function frugal_hometop() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
$read_more_text = $main_options['fr_read_more_text'];

	if ($feature_options['fr_ht_widget_number'] == "3")
	{
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Top Left'))
		{
			?><div class="hometopwidget ht_widget feature_link"><?php
				echo '<h2>' . __('Home Top Left', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";					
			echo '</div>' . "\n";
		}
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Top Middle'))
		{
			?><div class="hometopwidget ht_widget feature_link"><?php
				echo '<h2>' . __('Home Top Middle', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";						
			echo '</div>' . "\n";
		}
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Top Right'))
		{
			?><div class="hometopwidget ht_widget feature_link"><?php
				echo '<h2>' . __('Home Top Right', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";						
			echo '</div>' . "\n";
		}
	}
	elseif ($feature_options['fr_ht_widget_number'] == "2")
	{
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Top Left'))
		{
			?><div class="hometopwidget ht_widget feature_link"><?php
				echo '<h2>' . __('Home Top Left', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";					
			echo '</div>' . "\n";
		}
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Top Right'))
		{
			?><div class="hometopwidget ht_widget feature_link"><?php
				echo '<h2>' . __('Home Top Right', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";						
			echo '</div>' . "\n";
		}
	}
	else
	{
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Top Left'))
		{
			?><div class="hometopwidget ht_widget feature_link"><?php
			if ($feature_options['fr_home_fb_display'] == "Full Screen")
			{
				frugal_hook_home_feature_box();
			}
			else
			{
				echo '<h2>' . __('Home Top Left', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";
			}
			echo '</div>' . "\n";
		}
	}
}

function frugal_hometop_latest() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
$read_more_text = $main_options['fr_read_more_text'];
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

	if ($feature_options['fr_ht_widget_number'] == "3")
	{
		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts('showposts=1');
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts('showposts=1&offset=1');
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts('showposts=1&offset=2');
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
	elseif ($feature_options['fr_ht_widget_number'] == "2")
	{
		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts('showposts=1');
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts('showposts=1&offset=1');
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
	else
	{
		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts('showposts=1');
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
}

function frugal_hometop_cat() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
$ht_left_cat = $feature_options['fr_ht_left_cat'];
$ht_middle_cat = $feature_options['fr_ht_middle_cat'];
$ht_right_cat = $feature_options['fr_ht_right_cat'];
$read_more_text = $main_options['fr_read_more_text'];
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

	if ($feature_options['fr_ht_widget_number'] == "3")
	{
		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("cat=" . $ht_left_cat . "&showposts=1");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("cat=" . $ht_middle_cat . "&showposts=1");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("cat=" . $ht_right_cat . "&showposts=1");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
	elseif ($feature_options['fr_ht_widget_number'] == "2")
	{
		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("cat=" . $ht_left_cat . "&showposts=1");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("cat=" . $ht_middle_cat . "&showposts=1");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
	else
	{
		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("cat=" . $ht_left_cat . "&showposts=1");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
}

function frugal_hometop_page() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
$read_more_text = $main_options['fr_read_more_text'];
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

	global $more;
	// set $more to 0 in order to only get the first part of the post
	$more = 0; 
	$ht_left_page = $feature_options['fr_ht_left_page'];
	$ht_middle_page = $feature_options['fr_ht_middle_page'];
	$ht_right_page = $feature_options['fr_ht_right_page'];

	if ($feature_options['fr_ht_widget_number'] == "3")
	{
		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("page_id=" . $ht_left_page . "");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2><br />
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("page_id=" . $ht_middle_page . "");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2><br />
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("page_id=" . $ht_right_page . "");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2><br />
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
	elseif ($feature_options['fr_ht_widget_number'] == "2")
	{
		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("page_id=" . $ht_left_page . "");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2><br />
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("page_id=" . $ht_right_page . "");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2><br />
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
	else
	{
		echo '<div class="hometopwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("page_id=" . $ht_left_page . "");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2><br />
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
}

function frugal_homebottom() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
$read_more_text = $main_options['fr_read_more_text'];

	if ($feature_options['fr_hb_widget_number'] == "3")
	{
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Bottom Left'))
		{
			?><div class="homebottomwidget hb_widget feature_link"><?php
				echo '<h2>' . __('Home Bottom Left', 'frugal') . '</h2>' . "\n";					
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";		
			echo '</div>' . "\n";
		}
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Bottom Middle'))
		{
			?><div class="homebottomwidget hb_widget feature_link"><?php
				echo '<h2>' . __('Home Bottom Middle', 'frugal') . '</h2>' . "\n";				
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";		
			echo '</div>' . "\n";
		}
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Bottom Right'))
		{
			?><div class="homebottomwidget hb_widget feature_link"><?php
				echo '<h2>' . __('Home Bottom Right', 'frugal') . '</h2>' . "\n";					
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";		
			echo '</div>' . "\n";
		}
	}
	elseif ($feature_options['fr_hb_widget_number'] == "2")
	{
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Bottom Left'))
		{
			?><div class="homebottomwidget hb_widget feature_link"><?php
				echo '<h2>' . __('Home Bottom Left', 'frugal') . '</h2>' . "\n";					
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";		
			echo '</div>' . "\n";
		}
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Bottom Right'))
		{
			?><div class="homebottomwidget hb_widget feature_link"><?php
				echo '<h2>' . __('Home Bottom Right', 'frugal') . '</h2>' . "\n";					
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";		
			echo '</div>' . "\n";
		}
	}
	else
	{
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Bottom Left'))
		{
			?><div class="homebottomwidget hb_widget feature_link"><?php
				echo '<h2>' . __('Home Bottom Left', 'frugal') . '</h2>' . "\n";					
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
				echo '<p><a href="#">' . $read_more_text . '</a></p>' . "\n";		
			echo '</div>' . "\n";
		}
	}
}

function frugal_homebottom_latest() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
$read_more_text = $main_options['fr_read_more_text'];
$ht_left_post_number = $feature_options['fr_ht_left_post_number'];
$hb_latest_offset_2 = $ht_left_post_number + 1;
$hb_latest_offset_3 = $ht_left_post_number + 2;
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

	global $more;
	// set $more to 0 in order to only get the first part of the post
	$more = 0; 

	if ($feature_options['fr_hb_widget_number'] == "3")
	{
		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		if ($feature_options['fr_home_top_layout'] == "Featured Content/Home Sidebar" && $feature_options['fr_ht_feature_show'] == "latest_post" || $feature_options['fr_home_top_layout'] == "Featured Content (Full Width)" && $feature_options['fr_ht_feature_show'] == "latest_post" || $feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "1")
		{
			query_posts("showposts=1&offset=" . $ht_left_post_number . "");
		}
		elseif ($feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "3")
		{
			query_posts('showposts=1&offset=3');
		}
		elseif ($feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "2")
		{
			query_posts('showposts=1&offset=2');
		}
		else
		{
			query_posts('showposts=1');
		}
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		if ($feature_options['fr_home_top_layout'] == "Featured Content/Home Sidebar" && $feature_options['fr_ht_feature_show'] == "latest_post" || $feature_options['fr_home_top_layout'] == "Featured Content (Full Width)" && $feature_options['fr_ht_feature_show'] == "latest_post" || $feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "1")
		{
			query_posts("showposts=1&offset=" . $hb_latest_offset_2 . "");
		}
		elseif ($feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "3")
		{
			query_posts('showposts=1&offset=4');
		}
		elseif ($feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "2")
		{
			query_posts('showposts=1&offset=3');
		}
		else
		{
			query_posts('showposts=1&offset=1');
		}
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		if ($feature_options['fr_home_top_layout'] == "Featured Content/Home Sidebar" && $feature_options['fr_ht_feature_show'] == "latest_post" || $feature_options['fr_home_top_layout'] == "Featured Content (Full Width)" && $feature_options['fr_ht_feature_show'] == "latest_post" || $feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "1")
		{
			query_posts("showposts=1&offset=" . $hb_latest_offset_3 . "");
		}
		elseif ($feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "3")
		{
			query_posts('showposts=1&offset=5');
		}
		elseif ($feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "2")
		{
			query_posts('showposts=1&offset=4');
		}
		else
		{
			query_posts('showposts=1&offset=2');
		}
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
	elseif ($feature_options['fr_hb_widget_number'] == "2")
	{
		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		if ($feature_options['fr_home_top_layout'] == "Featured Content/Home Sidebar" && $feature_options['fr_ht_feature_show'] == "latest_post" || $feature_options['fr_home_top_layout'] == "Featured Content (Full Width)" && $feature_options['fr_ht_feature_show'] == "latest_post" || $feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "1")
		{
			query_posts("showposts=1&offset=" . $ht_left_post_number . "");
		}
		elseif ($feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "3")
		{
			query_posts('showposts=1&offset=3');
		}
		elseif ($feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "2")
		{
			query_posts('showposts=1&offset=2');
		}
		else
		{
			query_posts('showposts=1');
		}
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		if ($feature_options['fr_home_top_layout'] == "Featured Content/Home Sidebar" && $feature_options['fr_ht_feature_show'] == "latest_post" || $feature_options['fr_home_top_layout'] == "Featured Content (Full Width)" && $feature_options['fr_ht_feature_show'] == "latest_post" || $feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "1")
		{
			query_posts("showposts=1&offset=" . $hb_latest_offset_2 . "");
		}
		elseif ($feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "3")
		{
			query_posts('showposts=1&offset=4');
		}
		elseif ($feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "2")
		{
			query_posts('showposts=1&offset=3');
		}
		else
		{
			query_posts('showposts=1&offset=1');
		}
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
	else
	{
		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		if ($feature_options['fr_home_top_layout'] == "Featured Content/Home Sidebar" && $feature_options['fr_ht_feature_show'] == "latest_post" || $feature_options['fr_home_top_layout'] == "Featured Content (Full Width)" && $feature_options['fr_ht_feature_show'] == "latest_post" || $feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "1")
		{
			query_posts("showposts=1&offset=" . $ht_left_post_number . "");
		}
		elseif ($feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "3")
		{
			query_posts('showposts=1&offset=3');
		}
		elseif ($feature_options['fr_home_top_layout'] == "Latest Post Excerpts" && $feature_options['fr_ht_widget_number'] == "2")
		{
			query_posts('showposts=1&offset=2');
		}
		else
		{
			query_posts('showposts=1');
		}
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
}

function frugal_homebottom_cat() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
$read_more_text = $main_options['fr_read_more_text'];
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

	global $more;
	// set $more to 0 in order to only get the first part of the post
	$more = 0; 
	$hb_left_cat = $feature_options['fr_hb_left_cat'];
	$hb_middle_cat = $feature_options['fr_hb_middle_cat'];
	$hb_right_cat = $feature_options['fr_hb_right_cat'];

	if ($feature_options['fr_hb_widget_number'] == "3")
	{
		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("cat=" . $hb_left_cat . "&showposts=1");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("cat=" . $hb_middle_cat . "&showposts=1");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("cat=" . $hb_right_cat . "&showposts=1");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
	elseif ($feature_options['fr_hb_widget_number'] == "2")
	{
		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("cat=" . $hb_left_cat . "&showposts=1");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("cat=" . $hb_right_cat . "&showposts=1");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
	else
	{
		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("cat=" . $hb_left_cat . "&showposts=1");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="home_excerpt_byline">
		<p><span class="home_excerpt_bylinemeta"><?php if ($feature_options['fr_feature_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_feature_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_excerpt_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_feature_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_feature_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
		<?php if ($feature_options['fr_feature_cat_meta_display'] == "Yes") { echo $feature_options['fr_excerpt_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
		</div>
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
}

function frugal_homebottom_page() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
$read_more_text = $main_options['fr_read_more_text'];
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

	global $more;
	// set $more to 0 in order to only get the first part of the post
	$more = 0; 
	$hb_left_page = $feature_options['fr_hb_left_page'];
	$hb_middle_page = $feature_options['fr_hb_middle_page'];
	$hb_right_page = $feature_options['fr_hb_right_page'];

	if ($feature_options['fr_hb_widget_number'] == "3")
	{
		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("page_id=" . $hb_left_page . "");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2><br />
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("page_id=" . $hb_middle_page . "");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2><br />
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("page_id=" . $hb_right_page . "");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2><br />
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
	elseif ($feature_options['fr_hb_widget_number'] == "2")
	{
		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("page_id=" . $hb_left_page . "");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2><br />
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";

		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("page_id=" . $hb_right_page . "");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2><br />
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
	else
	{
		echo '<div class="homebottomwidget home_excerpt_posts feature_link">' . "\n";
		query_posts("page_id=" . $hb_left_page . "");
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2><br />
		<?php
		if (function_exists('has_post_thumbnail'))
		{
			if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
			{
				the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
			}
		}
		?>
		<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
		<?php 
		echo '</div>' . "\n";
	}
}

function frugal_homebottom_excerpt_list() {
$main_options = get_option('frugal_main_options');
$feature_options = get_option('frugal_feature_options');
$read_more_text = $main_options['fr_read_more_text'];
$home_view_posts_text = $feature_options['fr_home_view_posts_text'];
$ht_left_post_number = $feature_options['fr_ht_left_post_number'];
$hb_list_post_number = $feature_options['fr_hb_list_post_number'];
$hb_list_post_offset = $ht_left_post_number * -1;
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

	echo '<div class="hometopleftlatest postlinks">' . "\n";
	query_posts("showposts=" . $hb_list_post_number . "&offset=" . $hb_list_post_offset . "");
		if (have_posts()) : while (have_posts()) : the_post();
		
			frugal_hook_before_headline(); ?>

			<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
			<?php frugal_hook_after_headline(); ?>
			
			<div class="byline_home">
				<p><span class="bylinemeta"><?php if ($feature_options['fr_fp_author_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_fp_byline_author_text']; ?> <?php the_author_posts_link(); ?> <?php } ?><?php if ($feature_options['fr_fp_date_meta_display'] == "Yes") { ?><?php echo $feature_options['fr_fp_byline_date_text']; ?> <?php the_time('F j, Y'); } ?><?php if (comments_open() && $feature_options['fr_fp_comment_meta_display'] == "Yes") { ?> - <a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number(__('0 Comments', 'frugal'), __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a><?php if ($feature_options['fr_fp_cat_meta_display'] == "No") { ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?><?php } ?><br />
				<?php if ($feature_options['fr_fp_cat_meta_display'] == "Yes") { echo $feature_options['fr_fp_byline_cat_text']; ?> <?php the_category(', ') ?> <?php edit_post_link(__('(Edit)', 'frugal'), '', ''); } ?></span></p>
			</div>
			
			<div style="clear:both;"></div>
			
			<?php frugal_hook_after_byline(); ?>
			
			<?php
			if (function_exists('has_post_thumbnail'))
			{
				if (has_post_thumbnail() && $feature_options['fr_home_thumbnails'] == "Yes")
				{
					the_post_thumbnail(array($thumb_width,$thumb_height), array( 'class' => '' . $thumb_alignment . '' ));
				}
			}
			?>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink() ?>"><?php echo $read_more_text ?></a>
			
			<div class="commentmeta_home">
			<?php
			if (comments_open() && $feature_options['fr_home_bottom_comment_meta_display'] == "Yes")
			{
				$zero_comments_text = $main_options['fr_zero_comments_text'];
				?>
					<p><a href="<?php the_permalink(); ?>#comments" rel="nofollow"><?php comments_number('' . $zero_comments_text . '', __('1 Comment', 'frugal'), __('% Comments', 'frugal')); ?></a></p>
				<?php
			}
			?>
			</div>
			
		<?php endwhile; else: ?>			
		<p><?php _e('Sorry, no posts matched your criteria.', 'frugal'); ?></p><?php endif; ?>
		
		<?php
		if ($feature_options['fr_home_view_posts_url'] != "")
		{
			?>
			<p class="allpostsmeta"><a href="<?php echo $feature_options['fr_home_view_posts_url']; ?>" rel="nofollow"><?php echo $home_view_posts_text ?></a></p>
			<?php
		}
		?>
	</div>	
<?php }