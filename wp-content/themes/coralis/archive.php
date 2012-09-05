<?php get_header(); ?>

	<div id="content">
		<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; ?>
	
		<?php if (is_category()) { ?>				
		<h1>Posts belonging to Category '<?php echo single_cat_title(); ?>'</h1>
			
		<?php } elseif (is_month()) { ?>
		<h1>Articles from <?php the_time('F Y'); ?></h1>
        <br/><br/>
			
		<?php } elseif (is_search()) { ?>
		<h1>Search Results</h1>
        <br/><br/>

		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
			
		<div class="post">
        <h1 class="post"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
		<div class="postmetatop"> <?php the_time('F j, Y'); ?> &nbsp; | &nbsp; Posted by  <?php the_author(); ?>  <?php edit_post_link('edit', '', '  '); ?></div>
		
		<?php the_excerpt() ?>
		<p class="postmetabottom"><img src="<?php bloginfo('template_directory'); ?>/images/category.png" align="top" alt="Category" /> Categories: <?php the_category(', ') ?>  &nbsp;| &nbsp; <img src="<?php bloginfo('template_directory'); ?>/images/tag.png" align="top" alt="Tag" /> Tags: <?php the_tags('', ', ', ''); ?> &nbsp;|&nbsp; <img src="<?php bloginfo('template_directory'); ?>/images/comments.png" align="top" alt="Comments" />     <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
        </div>
		
		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
		
		<?php else : ?>
		
		<h2>Please Try Again!</h2>
	    <?php include (TEMPLATEPATH . '/searchform.php'); ?>
		<?php endif; ?>			
	</div>
<?php include (TEMPLATEPATH . '/sidebarLeft.php'); ?>	
<?php include (TEMPLATEPATH . '/sidebarRight.php'); ?>

<?php get_footer(); ?>
</div><!--/Wrapper-->
<div id="footershadow"></div>
</div><!--/Container--></body>
</html>