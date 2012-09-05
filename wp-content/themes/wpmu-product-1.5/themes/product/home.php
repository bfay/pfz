<?php get_header() ?>
	<?php 
		$slideshow = get_option('dev_product_slideshow');{
			if ($slideshow == "yes"){
				locate_template( array( '/library/components/featured-slider.php' ), true );					
			}
			else{	
			}
		}		
	?>
	<div id="content">
		<div class="padder">
			<?php 
				$contentshow = get_option('dev_product_contentshow');{
					if ($contentshow == "yes"){
						locate_template( array( '/library/components/content-blocks.php' ), true );					
					}
					else if ($contentshow == "no"){
						
					}
					else{
						locate_template( array( '/library/components/content-none.php' ), true );			
					}
				}		
			?>
		</div><!-- .padder -->
	</div><!-- #content -->
	
		<?php if( $bp_existed == 'true' ) { //check if bp existed ?>
		<?php 
			locate_template( array( '/library/sidebars/bp-sidebar-home.php' ), true ); ?>
		<?php } else { // if not bp detected..let go normal ?>
		<?php 
			locate_template( array( '/library/sidebars/sidebar-home.php' ), true ); ?>
		<?php } ?>
	
<?php get_footer() ?>
