<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Showcase
 * @since Showcase 1.0
 */
?>
	</div><!-- #main -->
</div>

	<div class='footer' id='footer'>
		<div class="inner">
<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>
		</div>
	</div>

	<div class='footer' id='below-footer'>
		<div class="inner">
			<div id='copyrights'>
			<?php echo get_option('wd_footer_text'); ?>
			</div>
<?php wp_nav_menu( array( 'menu_class' => 'menu2', 'theme_location' => 'second', 'depth' => '1' ) ); ?>
			<div class="clear"></div>
		</div>
	</div>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
<?php echo get_option('wd_ga_code'); ?>
</body>
</html>
