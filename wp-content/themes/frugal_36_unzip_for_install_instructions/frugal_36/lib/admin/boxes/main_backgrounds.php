<div class="portlet-header"><?php _e('Main Backgrounds', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p class="gray_box"><select id="frugal[fr_bg_type]" name="frugal[fr_bg_type]" size="1" style="width:187px;">
		<option value="Color"<?php if ($options['fr_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image (Left)"<?php if ($options['fr_bg_type'] == 'No-Repeat Image (Left)') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image (Left)', 'frugal'); ?></option>
		<option value="No-Repeat Image (Center)"<?php if ($options['fr_bg_type'] == 'No-Repeat Image (Center)') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image (Center)', 'frugal'); ?></option>
		<option value="No-Repeat Image (Right)"<?php if ($options['fr_bg_type'] == 'No-Repeat Image (Right)') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image (Right)', 'frugal'); ?></option>
		<option value="No-Repeat Image (Left Fixed)"<?php if ($options['fr_bg_type'] == 'No-Repeat Image (Left Fixed)') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image (Left Fixed)', 'frugal'); ?></option>
		<option value="No-Repeat Image (Center Fixed)"<?php if ($options['fr_bg_type'] == 'No-Repeat Image (Center Fixed)') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image (Center Fixed)', 'frugal'); ?></option>
		<option value="No-Repeat Image (Right Fixed)"<?php if ($options['fr_bg_type'] == 'No-Repeat Image (Right Fixed)') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image (Right Fixed)', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image (Fixed)"<?php if ($options['fr_bg_type'] == 'Horizontal-Repeat Image (Fixed)') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image (Fixed)', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image (Fixed)"<?php if ($options['fr_bg_type'] == 'Vertical-Repeat Image (Fixed)') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image (Fixed)', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image (Fixed)"<?php if ($options['fr_bg_type'] == 'Horizontal & Vertical-Repeat Image (Fixed)') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image (Fixed)', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_bg_color]" name="frugal[fr_bg_color]" value="<?php echo $options['fr_bg_color']; ?>" />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_bg_image_name]" name="frugal[fr_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_bg_image_name'] ); ?></select></p>
	<p style="margin-bottom:-10px"><?php _e('Wrap Background (Type - Color - Name)', 'frugal'); ?></p>
	<p class="gray_box"><select id="frugal[fr_wrap_bg_type]" name="frugal[fr_wrap_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_wrap_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_wrap_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_wrap_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_wrap_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_wrap_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_wrap_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_wrap_bg_color]" name="frugal[fr_wrap_bg_color]" value="<?php echo $options['fr_wrap_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_wrap_bg_image_name]" name="frugal[fr_wrap_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_wrap_bg_image_name'] ); ?></select></p>
	<p style="margin-bottom:-10px"><?php _e('Container Background (Type - Color - Name)', 'frugal'); ?></p>
	<p class="gray_box"><select id="frugal[fr_container_bg_type]" name="frugal[fr_container_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_container_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_container_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_container_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_container_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_container_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_container_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_container_bg_color]" name="frugal[fr_container_bg_color]" value="<?php echo $options['fr_container_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_container_bg_image_name]" name="frugal[fr_container_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_container_bg_image_name'] ); ?></select></p>
	<p style="margin-bottom:-10px"><?php _e('Wide Container BG (Type - Color - Name)', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Includes the CMS Wide Page Template.', 'frugal'); ?>">[?]</a></p>
	<p class="gray_box"><select id="frugal[fr_wide_container_bg_type]" name="frugal[fr_wide_container_bg_type]" size="1" style="width:187px;">
		<option value="Inherit Container"<?php if ($options['fr_wide_container_bg_type'] == 'Inherit Container') echo ' selected="selected"'; ?>><?php _e('Inherit Container', 'frugal'); ?></option>
		<option value="Transparent"<?php if ($options['fr_wide_container_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_wide_container_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_wide_container_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_wide_container_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_wide_container_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_wide_container_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_wide_container_bg_color]" name="frugal[fr_wide_container_bg_color]" value="<?php echo $options['fr_wide_container_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_wide_container_bg_image_name]" name="frugal[fr_wide_container_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_wide_container_bg_image_name'] ); ?></select></p>
	<p style="margin-bottom:-10px"><?php _e('CMS Container BG (Type - Color - Name)', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Does not include the CMS Wide Page Template.', 'frugal'); ?>">[?]</a></p>
	<p class="gray_box"><select id="frugal[fr_cms_container_bg_type]" name="frugal[fr_cms_container_bg_type]" size="1" style="width:187px;">
		<option value="Inherit Container"<?php if ($options['fr_cms_container_bg_type'] == 'Inherit Container') echo ' selected="selected"'; ?>><?php _e('Inherit Container', 'frugal'); ?></option>
		<option value="Transparent"<?php if ($options['fr_cms_container_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_cms_container_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_cms_container_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_cms_container_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_cms_container_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_cms_container_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_cms_container_bg_color]" name="frugal[fr_cms_container_bg_color]" value="<?php echo $options['fr_cms_container_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_cms_container_bg_image_name]" name="frugal[fr_cms_container_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_cms_container_bg_image_name'] ); ?></select></p>
</div>