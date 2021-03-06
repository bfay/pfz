<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Showcase
 * @since Showcase 1.0
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
	</div><!-- #nav-above -->
<?php endif; ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<?php
$i = 1;
while ( have_posts() ) : the_post();?>
<?php /* How to display posts in the Gallery category. */
$box_margin = '';
if( $i == 1 )
{
	$box_margin = " style='margin-left:0'";
}
elseif( $i == 3 )
{
	$box_margin = " style='margin-right:0'";
}
if( $i == 2 )
{
	?>
<div class="kav1"></div>
<?php
}
?>

		<div id="post-<?php the_ID(); ?>" <?php post_class('boxs'); ?><?php echo $box_margin; ?>>
<?php
	$big_image = the_image();
?>
				<div class="imag">
					<?php the_post_thumbnail(); ?>
					<ul> 
						<li class="view"><a href="<?php echo $big_image; ?>" rel="prettyPhoto">View</a></li> 
						<li class="to-post"><a href="<?php the_permalink(); ?>">To post</a></li> 
					</ul> 
				</div><!-- .gallery-thumb -->
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php showcase_information(); ?>

	<?php //if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
			<div class="entry-txt">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
	<?php /*else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
	<?php endif; */ ?>

			<div class="entry-utility">
				<div class="information">
					<?php showcase_post_edit(); ?>
				</div>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->
		<?php 
		if( $i == 2 )
		{
	?>
<div class="kav2"></div>
<?php
		}
	comments_template( '', true ); ?>



<?php

if( is_home() )
{
	if( $i == 3 )
	{
		break;
	}
}
$i++;
endwhile; // End the loop. Whew. ?>
<div class="clear"></div>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
