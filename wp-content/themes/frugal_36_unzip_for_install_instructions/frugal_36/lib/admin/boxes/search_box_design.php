<div class="portlet-header"><?php _e('Search Box Design', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p style="margin-bottom:-10px"><?php _e('Backgrounds (Type - Color - Name)', 'frugal'); ?></p>
	<p class="gray_box"><select id="frugal[fr_search_box_bg_type]" name="frugal[fr_search_box_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_search_box_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_search_box_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_search_box_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_search_box_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_search_box_bg_color]" name="frugal[fr_search_box_bg_color]" value="<?php echo $options['fr_search_box_bg_color']?>" />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_search_box_bg_image_name]" name="frugal[fr_search_box_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_search_box_bg_image_name'] ); ?></select></p>
	<p><?php _e('Font Type', 'frugal'); ?><select id="frugal[fr_search_box_font]" name="frugal[fr_search_box_font]" size="1" style="width:120px;">
	<?php $selected = (!$options['fr_search_box_font']) ? ' selected="selected"' : '';
	foreach ($font_list as $font_key => $font) {
		$selected = ($options['fr_search_box_font'] == $font_key) ? ' selected="selected"' : '';
		echo "<option" . $selected . " value=\"" . $font_key . "\">" . $font['name'] . "</option>\n";
	} ?></select> <?php _e('Size', 'frugal'); ?> <input type="text" id="frugal[fr_search_box_font_size]" name="frugal[fr_search_box_font_size]" value="<?php echo $options['fr_search_box_font_size']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Custom Font', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To use this Custom Font option you just need to add the CSS font text to the text area below (example: Georgia, serif) and then click \'SAVE\'.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_custom_search_box_font]" name="frugal[fr_custom_search_box_font]" value="<?php echo stripslashes($options['fr_custom_search_box_font'])?>" style="width:100%;" /></p>
	<p><b><?php _e('Colors:</b> Border', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box3" id="frugal[fr_search_box_border_color]" name="frugal[fr_search_box_border_color]" value="<?php echo $options['fr_search_box_border_color']?>" />
	<?php _e('Text', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box3" id="frugal[fr_search_box_text_color]" name="frugal[fr_search_box_text_color]" value="<?php echo $options['fr_search_box_text_color']?>" /></p>
	<p><?php _e('Width', 'frugal'); ?><input type="text" id="frugal[fr_search_box_width]" name="frugal[fr_search_box_width]" value="<?php echo $options['fr_search_box_width']?>" style="width:40px;" /><?php _e('px', 'frugal'); ?></p>
</div>