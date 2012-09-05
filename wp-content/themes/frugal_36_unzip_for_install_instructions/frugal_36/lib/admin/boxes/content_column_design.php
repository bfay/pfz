<div class="portlet-header"><?php _e('Content Column Design', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Top/Bottom Margin Thickness', 'frugal'); ?><input type="text" id="frugal[fr_cc_tb_margin]" name="frugal[fr_cc_tb_margin]" value="<?php echo $options['fr_cc_tb_margin']?>" style="width:35px; margin-left:5px;" /><?php _e('px', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This can be especially useful when adding a border to this content area as it can allow space to be added between the top/bottom borders and the rest of the site boundaries.', 'frugal'); ?>">[?]</a></p>
	<p style="margin-bottom:-10px"><?php _e('Background (Type - Color - Name)', 'frugal'); ?></p>
	<p class="gray_box"><select id="frugal[fr_cc_bg_type]" name="frugal[fr_cc_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_cc_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_cc_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_cc_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_cc_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_cc_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_cc_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_cc_bg_color]" name="frugal[fr_cc_bg_color]" value="<?php echo $options['fr_cc_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_cc_bg_image_name]" name="frugal[fr_cc_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_cc_bg_image_name'] ); ?></select></p>
	<p style="margin-bottom:-10px"><?php _e('CMS Page BG (Type - Color - Name)', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Does not include the CMS Full Width Page content column.', 'frugal'); ?>">[?]</a></p>
	<p class="gray_box"><select id="frugal[fr_cms_cc_bg_type]" name="frugal[fr_cms_cc_bg_type]" size="1" style="width:187px;">
		<option value="Inherit Content Column"<?php if ($options['fr_cms_cc_bg_type'] == 'Inherit Content Column') echo ' selected="selected"'; ?>><?php _e('Inherit Content Column', 'frugal'); ?></option>
		<option value="Transparent"<?php if ($options['fr_cms_cc_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_cms_cc_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_cms_cc_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_cms_cc_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_cms_cc_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_cms_cc_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_cms_cc_bg_color]" name="frugal[fr_cms_cc_bg_color]" value="<?php echo $options['fr_cms_cc_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_cms_cc_bg_image_name]" name="frugal[fr_cms_cc_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_cms_cc_bg_image_name'] ); ?></select></p>
	<p style="margin-bottom:-10px"><?php _e('Wide Page BG (Type - Color - Name)', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Includes the CMS Full Width Page content column.', 'frugal'); ?>">[?]</a></p>
	<p class="gray_box"><select id="frugal[fr_wide_cc_bg_type]" name="frugal[fr_wide_cc_bg_type]" size="1" style="width:187px;">
		<option value="Inherit Content Column"<?php if ($options['fr_wide_cc_bg_type'] == 'Inherit Content Column') echo ' selected="selected"'; ?>><?php _e('Inherit Content Column', 'frugal'); ?></option>
		<option value="Transparent"<?php if ($options['fr_wide_cc_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_wide_cc_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_wide_cc_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_wide_cc_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_wide_cc_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_wide_cc_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_wide_cc_bg_color]" name="frugal[fr_wide_cc_bg_color]" value="<?php echo $options['fr_wide_cc_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_wide_cc_bg_image_name]" name="frugal[fr_wide_cc_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_wide_cc_bg_image_name'] ); ?></select></p>
	<p><b><?php _e('Border Options...', 'frugal'); ?></b></p>
	<p><?php _e('Style', 'frugal'); ?> <select id="frugal[fr_cc_border_style]" name="frugal[fr_cc_border_style]" size="1" style="width:80px; margin-right:5px;">
		<option value="solid"<?php if ($options['fr_cc_border_style'] == 'solid') echo ' selected="selected"'; ?>><?php _e('solid', 'frugal'); ?></option>
		<option value="dotted"<?php if ($options['fr_cc_border_style'] == 'dotted') echo ' selected="selected"'; ?>><?php _e('dotted', 'frugal'); ?></option>
		<option value="dashed"<?php if ($options['fr_cc_border_style'] == 'dashed') echo ' selected="selected"'; ?>><?php _e('dashed', 'frugal'); ?></option>
		<option value="double"<?php if ($options['fr_cc_border_style'] == 'double') echo ' selected="selected"'; ?>><?php _e('double', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('A \'double\' border style requires a border thickness greater than 2px. Just thought we\'d let you know. :)', 'frugal'); ?>">[?] </a>
	<?php _e('Thickness', 'frugal'); ?> <input type="text" id="frugal[fr_cc_border_thickness]" name="frugal[fr_cc_border_thickness]" value="<?php echo $options['fr_cc_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_cc_border_color]" name="frugal[fr_cc_border_color]" value="<?php echo $options['fr_cc_border_color']?>" /></p>
	<p><b><?php _e('Post Bottom Border...', 'frugal'); ?></b></p>
	<p><?php _e('Thickness', 'frugal'); ?><input type="text" id="frugal[fr_post_border_thickness]" name="frugal[fr_post_border_thickness]" value="<?php echo $options['fr_post_border_thickness']?>" style="width:35px; margin-left:5px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_post_border_color]" name="frugal[fr_post_border_color]" value="<?php echo $options['fr_post_border_color']?>" /></p>
</div>