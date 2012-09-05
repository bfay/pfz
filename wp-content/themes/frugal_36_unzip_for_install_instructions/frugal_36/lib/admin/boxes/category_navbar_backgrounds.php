<div class="portlet-header"><?php _e('Secondary Navbar Backgrounds', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p style="margin-bottom:-10px"><?php _e('Main', 'frugal'); ?></p>
	<p class="gray_box"><select id="frugal[fr_subnav_bg_type]" name="frugal[fr_subnav_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_subnav_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_subnav_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_subnav_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_subnav_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_subnav_bg_color]" name="frugal[fr_subnav_bg_color]" value="<?php echo $options['fr_subnav_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_subnav_bg_image_name]" name="frugal[fr_subnav_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_subnav_bg_image_name'] ); ?></select></p>
	<p style="margin-bottom:-10px"><?php _e('Page', 'frugal'); ?></p>
	<p class="gray_box"><select id="frugal[fr_subnav_page_bg_type]" name="frugal[fr_subnav_page_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_subnav_page_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_subnav_page_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_subnav_page_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_subnav_page_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_subnav_page_bg_color]" name="frugal[fr_subnav_page_bg_color]" value="<?php echo $options['fr_subnav_page_bg_color']?>" />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_subnav_page_bg_image_name]" name="frugal[fr_subnav_page_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_subnav_page_bg_image_name'] ); ?></select></p>
	<p style="margin-bottom:-10px"><?php _e('Page Hover', 'frugal'); ?></p>
	<p class="gray_box"><select id="frugal[fr_subnav_page_hover_bg_type]" name="frugal[fr_subnav_page_hover_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_subnav_page_hover_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_subnav_page_hover_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_subnav_page_hover_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_subnav_page_hover_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_subnav_page_hover_bg_color]" name="frugal[fr_subnav_page_hover_bg_color]" value="<?php echo $options['fr_subnav_page_hover_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_subnav__page_hover_bg_image_name]" name="frugal[fr_subnav_page_hover_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_subnav_page_hover_bg_image_name'] ); ?></select></p>
	<p style="margin-bottom:-10px"><?php _e('Sub-Page', 'frugal'); ?></p>
	<p class="gray_box"><select id="frugal[fr_subnav_sub_bg_type]" name="frugal[fr_subnav_sub_bg_type]" size="1" style="width:187px;">
		<option value="Color"<?php if ($options['fr_subnav_sub_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_subnav_sub_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_subnav_sub_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_subnav_sub_bg_color]" name="frugal[fr_subnav_sub_bg_color]" value="<?php echo $options['fr_subnav_sub_bg_color']?>" />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_subnav_sub_bg_image_name]" name="frugal[fr_subnav_sub_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_subnav_sub_bg_image_name'] ); ?></select></p>
	<p style="margin-bottom:-10px"><?php _e('Sub-Page Hover', 'frugal'); ?></p>
	<p class="gray_box"><select id="frugal[fr_subnav_sub_hover_bg_type]" name="frugal[fr_subnav_sub_hover_bg_type]" size="1" style="width:187px;">
		<option value="Color"<?php if ($options['fr_subnav_sub_hover_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_subnav_sub_hover_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_subnav_sub_hover_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_subnav_sub_hover_bg_color]" name="frugal[fr_subnav_sub_hover_bg_color]" value="<?php echo $options['fr_subnav_sub_hover_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_subnav_sub_hover_bg_image_name]" name="frugal[fr_subnav_sub_hover_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_subnav_sub_hover_bg_image_name'] ); ?></select></p>
</div>