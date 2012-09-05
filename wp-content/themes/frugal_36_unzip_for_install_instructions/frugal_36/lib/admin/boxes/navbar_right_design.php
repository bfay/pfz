<div class="portlet-header"><?php _e('Navbar Right Design', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><b><?php _e('Font Options...', 'frugal'); ?></b></p>
	<p><?php _e('Type', 'frugal'); ?><select id="frugal[fr_navbar_right_font]" name="frugal[fr_navbar_right_font]" size="1" style="width:120px;">
	<?php $selected = (!$options['fr_navbar_right_font']) ? ' selected="selected"' : '';
	foreach ($font_list as $font_key => $font) {
		$selected = ($options['fr_navbar_right_font'] == $font_key) ? ' selected="selected"' : '';
		echo "<option" . $selected . " value=\"" . $font_key . "\">" . $font['name'] . "</option>\n";
	} ?></select> <?php _e('Size', 'frugal'); ?> <input type="text" id="frugal[fr_navbar_right_font_size]" name="frugal[fr_navbar_right_font_size]" value="<?php echo $options['fr_navbar_right_font_size']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Custom Font', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To use this Custom Font option you just need to add the CSS font text to the text area below (example: Georgia, serif) and then click \'SAVE\'.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_custom_navbar_right_font]" name="frugal[fr_custom_navbar_right_font]" value="<?php echo stripslashes($options['fr_custom_navbar_right_font'])?>" style="width:100%;" /></p>
	<p><?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_navbar_right_font_color]" name="frugal[fr_navbar_right_font_color]" value="<?php echo $options['fr_navbar_right_font_color']?>" />
	<?php _e('Hover', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_navbar_right_link_color]" name="frugal[fr_navbar_right_link_color]" value="<?php echo $options['fr_navbar_right_link_color']?>" /></p>
	<p><?php _e('Hyperlink Underline', 'frugal'); ?><select id="frugal[fr_navbar_right_text_link_underline]" name="frugal[fr_navbar_right_text_link_underline]" size="1" style="width:120px; margin-left:5px;">
		<option value="On Hover"<?php if ($options['fr_navbar_right_text_link_underline'] == 'On Hover') echo ' selected="selected"'; ?>><?php _e('On Hover', 'frugal'); ?></option>
		<option value="Off Hover"<?php if ($options['fr_navbar_right_text_link_underline'] == 'Off Hover') echo ' selected="selected"'; ?>><?php _e('Off Hover', 'frugal'); ?></option>
		<option value="Always"<?php if ($options['fr_navbar_right_text_link_underline'] == 'Always') echo ' selected="selected"'; ?>><?php _e('Always', 'frugal'); ?></option>
		<option value="Never"<?php if ($options['fr_navbar_right_text_link_underline'] == 'Never') echo ' selected="selected"'; ?>><?php _e('Never', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Padding', 'frugal'); ?> <input type="text" id="frugal[fr_navbar_right_top_padding]" name="frugal[fr_navbar_right_top_padding]" value="<?php echo $options['fr_navbar_right_top_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_navbar_right_right_padding]" name="frugal[fr_navbar_right_right_padding]" value="<?php echo $options['fr_navbar_right_right_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_navbar_right_bottom_padding]" name="frugal[fr_navbar_right_bottom_padding]" value="<?php echo $options['fr_navbar_right_bottom_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_navbar_right_left_padding]" name="frugal[fr_navbar_right_left_padding]" value="<?php echo $options['fr_navbar_right_left_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
</div>