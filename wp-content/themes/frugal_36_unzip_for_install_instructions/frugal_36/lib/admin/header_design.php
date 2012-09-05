<?php
function frugal_header_design()
{
	$font_list = frugal_get_font_options();
	$upload_options = get_option('frugal_upload_options');
	$header_design = get_option('frugal_header_design'); ?>
	<div class="wrap">
	<form method="post">

	<h2><b>frugal</b> <?php _e('Header Design Options', 'frugal'); ?></h2>

	<?php frugal_dyn_css_writable(); ?>

		<p style="font-family: Georgia, Times New Roman, Trebuchet MS;"><b><a href="http://frugaltheme.com">frugalTheme.com</a> | <a href="<?php bloginfo('template_directory'); ?>/lib/options-info.html">INTRO</a> | <a href="http://frugaltheme.com/support"><i>frugal</i> SUPPORT</a> | <a href="http://frugaltheme.com/affiliates">AFFILIATES</a> | See your current <a href="<?php bloginfo('template_directory'); ?>/lib/css/dynamic.css"><i>DYNAMIC</i> STYLES </a></b>
		<a class="tooltip" href="#" class="tooltip" title="<?php _e('When using the CSS option below your frugal theme writes your current style selections to a CSS file so they can be easily cacheable by browsers (the PHP option utilizes caching as well, but in a different manor). Being able to view this file gives you a look at your current hard coded styles. I find this useful when troubleshooting styling issues among other things. Also, if you\'d like to download this file for a hard copy of your current CSS settings you can just right-click the \'<i>DYNAMIC</i> STYLES\' like and then left-click \'Save link as...\' and then click \'save\'.', 'frugal'); ?>">[?]</a><input type="submit" value="<?php _e('SAVE', 'frugal'); ?>" class="save_inner" name="Submit"/></p>

	<?php
	if($_POST):
		$new_options = $_POST['frugal'];
		update_option('frugal_header_design', $new_options);
		$header_design = get_option('frugal_header_design');
	?>
	<p style="background:#EDF0F5; width:240px; padding:5px 10px 5px 10px; border:1px solid #ddd;"><b><i><span style="font-family: Georgia, Times New Roman, Trebuchet MS;">frugal</span></i></b> <?php _e('has been Updated!', 'frugal'); ?> <a href="<?php echo get_bloginfo('url')?>"><?php _e('View Site', 'frugal'); ?> &raquo;</a></p><?php if ($upload_options['fr_dynamic_stylesheet_format'] == "CSS" && get_option('frugal_css_stylesheet') == 2): frugal_dynamic_styles(); endif; if ($upload_options['fr_dynamic_stylesheet_format'] == "PHP"): update_option('frugal_css_stylesheet', 0); else: update_option('frugal_css_stylesheet', 2); endif; update_option('frugal_css_timestamp', mktime()); endif; ?>
				
		<?php frugal_build_admin_menus( 'hd', $header_design, $font_list ); ?>
		
	</form>
	<div id="frugal_this_page" style="display:none;">hd</div>
	</div> <!-- Close Wrap -->
<?php
}
?>