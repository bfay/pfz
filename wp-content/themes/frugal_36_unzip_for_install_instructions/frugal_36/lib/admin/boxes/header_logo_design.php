<div class="portlet-header"><?php _e('Header/Logo Design', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><b><?php _e('Header Design...', 'frugal'); ?></b></p>
	<p style="margin-bottom:-10px"><?php _e('Background (Type - Color - Name)', 'frugal'); ?></p>
	<p class="gray_box"><select id="frugal[fr_header_bg_type]" name="frugal[fr_header_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_header_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_header_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image (Left)"<?php if ($options['fr_header_bg_type'] == 'No-Repeat Image (Left)') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image (Left)', 'frugal'); ?></option>
		<option value="No-Repeat Image (Center)"<?php if ($options['fr_header_bg_type'] == 'No-Repeat Image (Center)') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image (Center)', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_header_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_header_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_header_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_header_bg_color]" name="frugal[fr_header_bg_color]" value="<?php echo $options['fr_header_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_header_bg_image_name]" name="frugal[fr_header_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_header_bg_image_name'] ); ?></select></p>
	<p><?php _e('Border Type', 'frugal'); ?> <select id="frugal[fr_header_border_type]" name="frugal[fr_header_border_type]" size="1" style="width:100px;">
		<option value="Bottom"<?php if ($options['fr_header_border_type'] == 'Bottom') echo ' selected="selected"'; ?>><?php _e('Bottom', 'frugal'); ?></option>
		<option value="Full"<?php if ($options['fr_header_border_type'] == 'Full') echo ' selected="selected"'; ?>><?php _e('Full', 'frugal'); ?></option>
	</select><br />
	<?php _e('Border Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_header_border_color]" name="frugal[fr_header_border_color]" value="<?php echo $options['fr_header_border_color']?>" /><br />
	<?php _e('Thickness', 'frugal'); ?> <input type="text" id="frugal[fr_header_border_thickness]" name="frugal[fr_header_border_thickness]" value="<?php echo $options['fr_header_border_thickness']?>" style="width:35px;" /><?php _e('px Style', 'frugal'); ?>
	<select id="frugal[fr_header_border_style]" name="frugal[fr_header_border_style]" size="1" style="width:80px; margin-right:5px;">
		<option value="solid"<?php if ($options['fr_header_border_style'] == 'solid') echo ' selected="selected"'; ?>><?php _e('solid', 'frugal'); ?></option>
		<option value="dotted"<?php if ($options['fr_header_border_style'] == 'dotted') echo ' selected="selected"'; ?>><?php _e('dotted', 'frugal'); ?></option>
		<option value="dashed"<?php if ($options['fr_header_border_style'] == 'dashed') echo ' selected="selected"'; ?>><?php _e('dashed', 'frugal'); ?></option>
		<option value="double"<?php if ($options['fr_header_border_style'] == 'double') echo ' selected="selected"'; ?>><?php _e('double', 'frugal'); ?></option>
	</select> <a class="tooltip" href="#" class="tooltip" title="<?php _e('A \'double\' border style requires a border thickness greater than 2px. Just thought I\'d let you know. :)', 'frugal'); ?>">[?]</a></p>
	<p><b><?php _e('Logo Font Options...', 'frugal'); ?></b></p>
	<p><?php _e('Type', 'frugal'); ?><select id="frugal[fr_logo_font]" name="frugal[fr_logo_font]" size="1" style="width:120px;">
	<?php $selected = (!$options['fr_logo_font']) ? ' selected="selected"' : '';
	foreach ($font_list as $font_key => $font) {
		$selected = ($options['fr_logo_font'] == $font_key) ? ' selected="selected"' : '';
		echo "<option" . $selected . " value=\"" . $font_key . "\">" . $font['name'] . "</option>\n";
	} ?></select> <?php _e('Size', 'frugal'); ?> <input type="text" id="frugal[fr_logo_font_size]" name="frugal[fr_logo_font_size]" value="<?php echo $options['fr_logo_font_size']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Custom Logo Font', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To use this Custom Font option you just need to add the CSS font text to the text area below (example: Georgia, serif) and then click \'SAVE\'.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_custom_logo_font]" name="frugal[fr_custom_logo_font]" value="<?php echo stripslashes($options['fr_custom_logo_font'])?>" style="width:100%;" /></p>
	<p><?php _e('Logo Font Weight', 'frugal'); ?> <select id="frugal[fr_logo_font_weight]" name="frugal[fr_logo_font_weight]" size="1" style="width:100px;">
		<option value="normal"<?php if ($options['fr_logo_font_weight'] == 'normal') echo ' selected="selected"'; ?>><?php _e('normal', 'frugal'); ?></option>
		<option value="bold"<?php if ($options['fr_logo_font_weight'] == 'bold') echo ' selected="selected"'; ?>><?php _e('bold', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_logo_font_color]" name="frugal[fr_logo_font_color]" value="<?php echo $options['fr_logo_font_color']?>" />
	<?php _e('Hover', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_logo_font_hover_color]" name="frugal[fr_logo_font_hover_color]" value="<?php echo $options['fr_logo_font_hover_color']?>" /></p>
	<p><?php _e('Logo Letter Spacing', 'frugal'); ?> <input type="text" id="frugal[fr_logo_letter_spacing]" name="frugal[fr_logo_letter_spacing]" value="<?php echo $options['fr_logo_letter_spacing']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Tagline Font Options...', 'frugal'); ?></b></p>
	<p><?php _e('Type', 'frugal'); ?><select id="frugal[fr_logo_tag_font]" name="frugal[fr_logo_tag_font]" size="1" style="width:120px;">
	<?php $selected = (!$options['fr_logo_tag_font']) ? ' selected="selected"' : '';
	foreach ($font_list as $font_key => $font) {
		$selected = ($options['fr_logo_tag_font'] == $font_key) ? ' selected="selected"' : '';
		echo "<option" . $selected . " value=\"" . $font_key . "\">" . $font['name'] . "</option>\n";
	} ?></select> <?php _e('Size', 'frugal'); ?> <input type="text" id="frugal[fr_logo_tag_font_size]" name="frugal[fr_logo_tag_font_size]" value="<?php echo $options['fr_logo_tag_font_size']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Custom Tagline Font', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To use this Custom Font option you just need to add the CSS font text to the text area below (example: Georgia, serif) and then click \'SAVE\'.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_custom_logo_tag_font]" name="frugal[fr_custom_logo_tag_font]" value="<?php echo stripslashes($options['fr_custom_logo_tag_font'])?>" style="width:100%;" /></p>
	<p><?php _e('Tagline Font Weight', 'frugal'); ?> <select id="frugal[fr_logo_tag_font_weight]" name="frugal[fr_logo_tag_font_weight]" size="1" style="width:100px;">
		<option value="normal"<?php if ($options['fr_logo_tag_font_weight'] == 'normal') echo ' selected="selected"'; ?>><?php _e('normal', 'frugal'); ?></option>
		<option value="bold"<?php if ($options['fr_logo_tag_font_weight'] == 'bold') echo ' selected="selected"'; ?>><?php _e('bold', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Tagline Font Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_logo_tag_font_color]" name="frugal[fr_logo_tag_font_color]" value="<?php echo $options['fr_logo_tag_font_color']?>" /></p>
	<p><?php _e('Tagline Letter Spacing', 'frugal'); ?> <input type="text" id="frugal[fr_logo_letter_spacing]" name="frugal[fr_logo_tag_letter_spacing]" value="<?php echo $options['fr_logo_tag_letter_spacing']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
</div>