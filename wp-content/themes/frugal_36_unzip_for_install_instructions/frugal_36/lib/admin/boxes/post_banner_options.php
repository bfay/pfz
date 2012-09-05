<div class="portlet-header"><?php _e('Post Banner Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><select id="frugal[fr_post_banner_display]" name="frugal[fr_post_banner_display]" size="1" style="width:55px; margin-right:5px;">
		<option value="No"<?php if ($options['fr_post_banner_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_post_banner_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><?php _e('Display Single Post Banner', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This is a widget area located between the post and comment section.', 'frugal'); ?>">[?]</a><br />
	<?php _e('Display: block ?', 'frugal'); ?> <select id="frugal[fr_post_banner_display_block]" name="frugal[fr_post_banner_display_block]" size="1" style="width:55px;">
		<option value="No"<?php if ($options['fr_post_banner_display_block'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_post_banner_display_block'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This is a CSS style option (display:block;). It is good to use when the area in question houses a single image that fills the space. Without it you may find 5px\'s of unwanted padding below the content area.', 'frugal'); ?>">[?]</a></p>
	<p><b><?php _e('Color Options...', 'frugal'); ?></b></p>
	<p style="margin-bottom:-10px"><?php _e('Background (Type - Color - Name)', 'frugal'); ?></p>
	<p class="gray_box"><select id="frugal[fr_post_banner_bg_type]" name="frugal[fr_post_banner_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_post_banner_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_post_banner_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_post_banner_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_post_banner_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_post_banner_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_post_banner_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_post_banner_bg_color]" name="frugal[fr_post_banner_bg_color]" value="<?php echo $options['fr_post_banner_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_post_banner_bg_image_name]" name="frugal[fr_post_banner_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_post_banner_bg_image_name'] ); ?></select></p>
	<p><?php _e('Border', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_post_banner_border_color]" name="frugal[fr_post_banner_border_color]" value="<?php echo $options['fr_post_banner_border_color']?>" />
	<?php _e('Text', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_post_banner_text_color]" name="frugal[fr_post_banner_text_color]" value="<?php echo $options['fr_post_banner_text_color']?>" /></p>
</div>