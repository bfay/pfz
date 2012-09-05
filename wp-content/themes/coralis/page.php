<?php get_header(); ?>

<div id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post">
	<h1 class="post"><?php the_title(); ?></h1>
	<p><?php edit_post_link('edit page', '', '  '); ?></p>
	<div class="article"><?php the_content('Continue Reading &raquo;'); ?></div>
     <?php wp_link_pages(); ?>
	</div>

<?php comments_template('', true); ?>
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
</div>
<?php include (TEMPLATEPATH . '/sidebarLeft.php'); ?>
<?php include (TEMPLATEPATH . '/sidebarRight.php'); ?>	
<?php get_footer(); ?>
</div><!--/Wrapper-->
<div id="footershadow"></div>
</div><!--/Container-->
</body>
</html>