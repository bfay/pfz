<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Showcase
 * @since Showcase 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
<?php
$post_obj = $wp_query->get_queried_object();
$post_name = $post_obj->post_name;

if( $post_name != 'portfolio')
{
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="left">
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>	
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>	
					</div>
					<div class="right">
					<?php showcase_information('page'); ?>
					</div>
					<div class="clear"></div>			
<hr />
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					<div class="information">
						<?php twentyten_posted_in(); ?>
					</div><!-- .entry-utility -->
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile;
}
else
{
?>
					<div class="left">
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>	
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>	
					</div>
					<div class="right">
						<div class="information">
							<img src="<?php bloginfo('template_url') ?>/images/date.png" style="padding-left:0" /><?php echo get_the_date(); ?>
						</div>
					</div>
					<div class="clear"></div>
					<hr />
	<?php 
		$loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 10)); 
	?>
	<?php $i = 1; while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<?php	
		$custom = get_post_custom($post->ID);
		$website_url = $custom["website_url"][0];
		$website_image = $custom["website_image"][0];
	?>
<?php
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
	$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
	$big_image = the_image();
	if( $website_image != "" )
	{
		$big_image = $website_image;
	}
?>
				<div class="imag">
					<?php the_post_thumbnail(); ?>
					<ul style="left:28%"> 
						<li class="view"><a href="<?php echo $big_image; ?>" rel="prettyPhoto">View</a></li> 
						<li class="to-post"><a href="<?php echo $website_url; ?>">Live preview</a></li> 
					</ul> 
				</div><!-- .gallery-thumb -->
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php showcase_information('portfolio'); ?>

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
$i++;
endwhile; ?> 
<div class="clear"></div>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>

<?php 
}
?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
