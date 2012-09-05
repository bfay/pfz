<?php get_header(); ?>


<div id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post">
	<h1 class="post"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
	<div class="postmetatop"> <?php the_time('F j, Y'); ?> &nbsp;| &nbsp;Posted by  <?php the_author(); ?> &nbsp; <?php edit_post_link('edit', '', '  '); ?></div>
	<div class="article"><?php the_content('Continue Reading &raquo;'); ?></div>
    <?php wp_link_pages(); ?>
	<p class="postmetabottom"><img src="<?php bloginfo('template_directory'); ?>/images/category.png" align="top" alt="Category" /> Categories: <?php the_category(', ') ?> &nbsp; |  &nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/tag.png" align="top" alt="Tag" /> Tags: <?php the_tags('', ', ', ''); ?> &nbsp;|&nbsp; <img src="<?php bloginfo('template_directory'); ?>/images/comments.png" align="top" alt="Comments" />     <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
	</div>


	<?php comments_template('', true); ?>

	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
    <div id="nextprev"><!-- post navigation -->
			<div class="alignleft"><h5><?php previous_post_link('&laquo; %link') ?></h5></div>
			<div class="alignright"><h5><?php next_post_link('%link &raquo;') ?></h5></div>
		</div><!--/post navigation -->
</div>
<?php include (TEMPLATEPATH . '/sidebarLeft.php'); ?>
    <?php include (TEMPLATEPATH . '/sidebarRight.php'); ?>


<?php get_footer(); ?>
</div><!--/Wrapper-->
<div id="footershadow"></div>
</div><!--/Container-->
</body>
</html>