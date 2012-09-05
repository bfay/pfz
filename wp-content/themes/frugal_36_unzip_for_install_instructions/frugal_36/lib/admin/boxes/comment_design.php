<div class="portlet-header"><?php _e('Comment Design', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><b><?php _e('Comment Box Width', 'frugal'); ?></b> <input type="text" id="frugal[fr_comment_box_width]" name="frugal[fr_comment_box_width]" value="<?php echo $options['fr_comment_box_width']?>" style="width:40px;" /><?php _e('px', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Leave blank for a width of 100%. Try not to give it a width greater than that of your Content Column.', 'frugal'); ?>">[?]</a></p>
	<p><b><?php _e('Comment Box Colors...', 'frugal'); ?></b></p>
	<p style="margin-bottom:-10px"><?php _e('Background (Type - Color - Name)', 'frugal'); ?></p>
	<p class="gray_box"><select id="frugal[fr_comment_box_bg_type]" name="frugal[fr_comment_box_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_comment_box_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_comment_box_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_comment_box_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_comment_box_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_comment_box_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_comment_box_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_comment_box_bg_color]" name="frugal[fr_comment_box_bg_color]" value="<?php echo $options['fr_comment_box_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_comment_box_bg_image_name]" name="frugal[fr_comment_box_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_comment_box_bg_image_name'] ); ?></select></p>
	<p><?php _e('Border', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_comment_box_border_color]" name="frugal[fr_comment_box_border_color]" value="<?php echo $options['fr_comment_box_border_color']?>" />
	<?php _e('Text', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_comment_box_text_color]" name="frugal[fr_comment_box_text_color]" value="<?php echo $options['fr_comment_box_text_color']?>" /></p>
	<p><b><?php _e('Submit Button Width', 'frugal'); ?></b> <input type="text" id="frugal[fr_comment_sub_width]" name="frugal[fr_comment_sub_width]" value="<?php echo $options['fr_comment_sub_width']?>" style="width:40px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Submit Button Font Options...', 'frugal'); ?></b></p>
	<p><?php _e('Type', 'frugal'); ?> <select id="frugal[fr_comment_sub_font]" name="frugal[fr_comment_sub_font]" size="1" style="width:120px;">
	<?php $selected = (!$options['fr_comment_sub_font']) ? ' selected="selected"' : '';
	foreach ($font_list as $font_key => $font) {
		$selected = ($options['fr_comment_sub_font'] == $font_key) ? ' selected="selected"' : '';
		echo "<option" . $selected . " value=\"" . $font_key . "\">" . $font['name'] . "</option>\n";
	} ?></select> <?php _e('Size', 'frugal'); ?> <input type="text" id="frugal[fr_comment_sub_font_size]" name="frugal[fr_comment_sub_font_size]" value="<?php echo $options['fr_comment_sub_font_size']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Custom Font', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To use this Custom Font option you just need to add the CSS font text to the text area below (example: Georgia, serif) and then click \'SAVE\'.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_custom_comment_sub_font]" name="frugal[fr_custom_comment_sub_font]" value="<?php echo stripslashes($options['fr_custom_comment_sub_font'])?>" style="width:100%;" /></p>
	<p><?php _e('Weight', 'frugal'); ?><select id="frugal[fr_comment_sub_font_weight]" name="frugal[fr_comment_sub_font_weight]" size="1" style="width:75px; margin-left:5px;">
		<option value="bold"<?php if ($options['fr_comment_sub_font_weight'] == 'bold') echo ' selected="selected"'; ?>><?php _e('bold', 'frugal'); ?></option>
		<option value="normal"<?php if ($options['fr_comment_sub_font_weight'] == 'normal') echo ' selected="selected"'; ?>><?php _e('normal', 'frugal'); ?></option>
	</select> <?php _e('Color', 'frugal'); ?> <input type="text" class="color {pickerFaceColor:'#444'} color_box3" id="frugal[fr_comment_sub_text_color]" name="frugal[fr_comment_sub_text_color]" value="<?php echo $options['fr_comment_sub_text_color']?>" /></p>
	<p><b><?php _e('Submit Button Design...', 'frugal'); ?></b></p>
	<p style="margin-bottom:-10px"><?php _e('Background (Type - Color - Name)', 'frugal'); ?></p>
	<p class="gray_box"><select id="frugal[fr_comment_sub_bg_type]" name="frugal[fr_comment_sub_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_comment_sub_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_comment_sub_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_comment_sub_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_comment_sub_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_comment_sub_bg_color]" name="frugal[fr_comment_sub_bg_color]" value="<?php echo $options['fr_comment_sub_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_comment_sub_bg_image_name]" name="frugal[fr_comment_sub_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_comment_sub_bg_image_name'] ); ?></select></p>
	<p><?php _e('Border', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_comment_sub_border_color]" name="frugal[fr_comment_sub_border_color]" value="<?php echo $options['fr_comment_sub_border_color']?>" /></p>
	<p><b><?php _e('Misc Comment Colors...', 'frugal'); ?></b></p>
	<p><input type="text" class="color {pickerFaceColor:'#444'} color_box" id="frugal[fr_alt_comment_bg_color]" name="frugal[fr_alt_comment_bg_color]" value="<?php echo $options['fr_alt_comment_bg_color']?>" /><?php _e('Alternating Background', 'frugal'); ?><br />
	<input type="text" class="color {pickerFaceColor:'#444'} color_box" id="frugal[fr_alt_comment_reply_bg_color]" name="frugal[fr_alt_comment_reply_bg_color]" value="<?php echo $options['fr_alt_comment_reply_bg_color']?>" /><?php _e('Reply Alternating Background', 'frugal'); ?><br />
	<input type="text" class="color {pickerFaceColor:'#444'} color_box" id="frugal[fr_comment_border_color]" name="frugal[fr_comment_border_color]" value="<?php echo $options['fr_comment_border_color']?>" /><?php _e('Comment List Border', 'frugal'); ?></p>
</div>