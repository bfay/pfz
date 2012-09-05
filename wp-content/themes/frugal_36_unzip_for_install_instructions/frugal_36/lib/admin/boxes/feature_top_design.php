<div class="portlet-header"><?php _e('Feature Top Design', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p style="margin-bottom:-10px"><b><?php _e('Background (Type - Color - Name)', 'frugal'); ?></b></p>
	<p class="gray_box"><select id="frugal[fr_ft_bg_type]" name="frugal[fr_ft_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_ft_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_ft_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_ft_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_ft_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_ft_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_ft_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_ft_bg_color]" name="frugal[fr_ft_bg_color]" value="<?php echo $options['fr_ft_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_ft_bg_image_name]" name="frugal[fr_ft_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_ft_bg_image_name'] ); ?></select></p>
	<p><b><?php _e('Border options...', 'frugal'); ?></b></p>
	<p><?php _e('Type', 'frugal'); ?> <select id="frugal[fr_ft_border_type]" name="frugal[fr_ft_border_type]" size="1" style="width:75px; margin-right:5px;">
		<option value="Bottom"<?php if ($options['fr_ft_border_type'] == 'Bottom') echo ' selected="selected"'; ?>><?php _e('Bottom', 'frugal'); ?></option>
		<option value="Full"<?php if ($options['fr_ft_border_type'] == 'Full') echo ' selected="selected"'; ?>><?php _e('Full', 'frugal'); ?></option>
	</select>
	<?php _e('Style', 'frugal'); ?> <select id="frugal[fr_ft_border_style]" name="frugal[fr_ft_border_style]" size="1" style="width:80px; margin-right:5px;">
		<option value="solid"<?php if ($options['fr_ft_border_style'] == 'solid') echo ' selected="selected"'; ?>><?php _e('solid', 'frugal'); ?></option>
		<option value="dotted"<?php if ($options['fr_ft_border_style'] == 'dotted') echo ' selected="selected"'; ?>><?php _e('dotted', 'frugal'); ?></option>
		<option value="dashed"<?php if ($options['fr_ft_border_style'] == 'dashed') echo ' selected="selected"'; ?>><?php _e('dashed', 'frugal'); ?></option>
		<option value="double"<?php if ($options['fr_ft_border_style'] == 'double') echo ' selected="selected"'; ?>><?php _e('double', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('A \'double\' border style requires a border thickness greater than 2px. Just thought we\'d let you know. :)', 'frugal'); ?>">[?]</a><br />
	<?php _e('Thickness', 'frugal'); ?><input type="text" id="frugal[fr_ft_border_thickness]" name="frugal[fr_ft_border_thickness]" value="<?php echo $options['fr_ft_border_thickness']?>" style="width:35px; margin-left:5px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_ft_border_color]" name="frugal[fr_ft_border_color]" value="<?php echo $options['fr_ft_border_color']?>" /></p>
	<p><b><?php _e('Main Margin/Padding...', 'frugal'); ?></b> <a class="tooltip" href="#" class="tooltip" title="<?php _e('NOTE: With CSS margin and padding settings like the ones below you just need to think clock-wise/top-to-bottom. In other words, the first px\'d number effects the TOP area, the 2nd number effects the RIGHT, the third effects the BOTTOM and the fourth effects the LEFT.', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Margin', 'frugal'); ?> <input type="text" id="frugal[fr_ft_top_margin]" name="frugal[fr_ft_top_margin]" value="<?php echo $options['fr_ft_top_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_ft_right_margin]" name="frugal[fr_ft_right_margin]" value="<?php echo $options['fr_ft_right_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_ft_bottom_margin]" name="frugal[fr_ft_bottom_margin]" value="<?php echo $options['fr_ft_bottom_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_ft_left_margin]" name="frugal[fr_ft_left_margin]" value="<?php echo $options['fr_ft_left_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('Padding', 'frugal'); ?> <input type="text" id="frugal[fr_ft_top_padding]" name="frugal[fr_ft_top_padding]" value="<?php echo $options['fr_ft_top_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_ft_right_padding]" name="frugal[fr_ft_right_padding]" value="<?php echo $options['fr_ft_right_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_ft_bottom_padding]" name="frugal[fr_ft_bottom_padding]" value="<?php echo $options['fr_ft_bottom_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_ft_left_padding]" name="frugal[fr_ft_left_padding]" value="<?php echo $options['fr_ft_left_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Individual Widget\'s Margin/Padding...', 'frugal'); ?></b></p>
	<p><?php _e('Margin', 'frugal'); ?> <input type="text" id="frugal[fr_ft_widget_top_margin]" name="frugal[fr_ft_widget_top_margin]" value="<?php echo $options['fr_ft_widget_top_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_ft_widget_right_margin]" name="frugal[fr_ft_widget_right_margin]" value="<?php echo $options['fr_ft_widget_right_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_ft_widget_bottom_margin]" name="frugal[fr_ft_widget_bottom_margin]" value="<?php echo $options['fr_ft_widget_bottom_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_ft_widget_left_margin]" name="frugal[fr_ft_widget_left_margin]" value="<?php echo $options['fr_ft_widget_left_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('Padding', 'frugal'); ?> <input type="text" id="frugal[fr_ft_widget_top_padding]" name="frugal[fr_ft_widget_top_padding]" value="<?php echo $options['fr_ft_widget_top_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_ft_widget_right_padding]" name="frugal[fr_ft_widget_right_padding]" value="<?php echo $options['fr_ft_widget_right_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_ft_widget_bottom_padding]" name="frugal[fr_ft_widget_bottom_padding]" value="<?php echo $options['fr_ft_widget_bottom_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_ft_widget_left_padding]" name="frugal[fr_ft_widget_left_padding]" value="<?php echo $options['fr_ft_widget_left_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('Display: block ?', 'frugal'); ?> <select id="frugal[fr_ft_widget_display_block]" name="frugal[fr_ft_widget_display_block]" size="1" style="width:55px;">
		<option value="No"<?php if ($options['fr_ft_widget_display_block'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_ft_widget_display_block'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This is a CSS style option (display:block;). It is good to use when the area in question houses a single image that fills the space. Without it you may find 5px\'s of unwanted padding below the content area.', 'frugal'); ?>">[?]</a></p>
</div>