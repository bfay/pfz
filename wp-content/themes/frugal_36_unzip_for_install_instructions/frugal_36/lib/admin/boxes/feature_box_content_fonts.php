<div class="portlet-header"><?php _e('Feature Box Content Fonts', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Type', 'frugal'); ?> <select id="frugal[fr_fbox_content_font]" name="frugal[fr_fbox_content_font]" size="1" style="width:120px;">
	<?php $selected = (!$options['fr_fbox_content_font']) ? ' selected="selected"' : '';
	foreach ($font_list as $font_key => $font) {
		$selected = ($options['fr_fbox_content_font'] == $font_key) ? ' selected="selected"' : '';
		echo "<option" . $selected . " value=\"" . $font_key . "\">" . $font['name'] . "</option>\n";
	} ?></select> <?php _e('Size', 'frugal'); ?> <input type="text" id="frugal[fr_fbox_content_font_size]" name="frugal[fr_fbox_content_font_size]" value="<?php echo $options['fr_fbox_content_font_size']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Custom Font', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To use this Custom Font option you just need to add the CSS font text to the text area below (example: Georgia, serif) and then click \'SAVE\'.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_custom_fbox_content_font]" name="frugal[fr_custom_fbox_content_font]" value="<?php echo stripslashes($options['fr_custom_fbox_content_font'])?>" style="width:100%;" /></p>
	<p><?php _e('Line Height', 'frugal'); ?> <input type="text" id="frugal[fr_fbox_content_line_height]" name="frugal[fr_fbox_content_line_height]" value="<?php echo $options['fr_fbox_content_line_height']?>" style="width:40px;" /><?php _e('%', 'frugal'); ?>
	<?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_fbox_content_font_color]" name="frugal[fr_fbox_content_font_color]" value="<?php echo $options['fr_fbox_content_font_color']?>" /></p>
	<p><?php _e('Link', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_fbox_content_link_color]" name="frugal[fr_fbox_content_link_color]" value="<?php echo $options['fr_fbox_content_link_color']?>" />
	<?php _e('Link Hover', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_fbox_content_link_hover_color]" name="frugal[fr_fbox_content_link_hover_color]" value="<?php echo $options['fr_fbox_content_link_hover_color']?>" /></p>
	<p><?php _e('Hyperlink Underline', 'frugal'); ?><select id="frugal[fr_fbox_text_link_underline]" name="frugal[fr_fbox_text_link_underline]" size="1" style="width:120px; margin-left:5px;">
		<option value="On Hover"<?php if ($options['fr_fbox_text_link_underline'] == 'On Hover') echo ' selected="selected"'; ?>><?php _e('On Hover', 'frugal'); ?></option>
		<option value="Off Hover"<?php if ($options['fr_fbox_text_link_underline'] == 'Off Hover') echo ' selected="selected"'; ?>><?php _e('Off Hover', 'frugal'); ?></option>
		<option value="Always"<?php if ($options['fr_fbox_text_link_underline'] == 'Always') echo ' selected="selected"'; ?>><?php _e('Always', 'frugal'); ?></option>
		<option value="Never"<?php if ($options['fr_fbox_text_link_underline'] == 'Never') echo ' selected="selected"'; ?>><?php _e('Never', 'frugal'); ?></option>
	</select></p>
</div>