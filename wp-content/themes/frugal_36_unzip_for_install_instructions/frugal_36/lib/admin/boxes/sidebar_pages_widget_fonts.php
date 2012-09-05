<div class="portlet-header"><?php _e('Sidebar \'Pages\' Widget Fonts', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Using the Wordpress \'Pages\' Widget in your sidebar is a fast and easy way create vertical navigation on your site. The problem is that when your Page links look just like the rest of your sidebar links it can be confusing to your visitors. With the following styles you can now independently style these Page links and create an all together more functional vertical navigation system.', 'frugal'); ?>">[?]</a></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Type', 'frugal'); ?> <select id="frugal[fr_sb_pages_font]" name="frugal[fr_sb_pages_font]" size="1" style="width:120px;">
	<?php $selected = (!$options['fr_sb_pages_font']) ? ' selected="selected"' : '';
	foreach ($font_list as $font_key => $font) {
		$selected = ($options['fr_sb_pages_font'] == $font_key) ? ' selected="selected"' : '';
		echo "<option" . $selected . " value=\"" . $font_key . "\">" . $font['name'] . "</option>\n";
	} ?></select> <?php _e('Size', 'frugal'); ?> <input type="text" id="frugal[fr_sb_pages_font_size]" name="frugal[fr_sb_pages_font_size]" value="<?php echo $options['fr_sb_pages_font_size']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Custom Font', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To use this Custom Font option you just need to add the CSS font text to the text area below (example: Georgia, serif) and then click \'SAVE\'.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_custom_sb_pages_font]" name="frugal[fr_custom_sb_pages_font]" value="<?php echo stripslashes($options['fr_custom_sb_pages_font'])?>" style="width:100%;" /></p>
	<p><?php _e('Weight', 'frugal'); ?> <select id="frugal[fr_sb_pages_font_weight]" name="frugal[fr_sb_pages_font_weight]" size="1" style="width:75px;">
		<option value="normal"<?php if ($options['fr_sb_pages_font_weight'] == 'normal') echo ' selected="selected"'; ?>><?php _e('normal', 'frugal'); ?></option>
		<option value="bold"<?php if ($options['fr_sb_pages_font_weight'] == 'bold') echo ' selected="selected"'; ?>><?php _e('bold', 'frugal'); ?></option>
	</select> <?php _e('Letter Spacing', 'frugal'); ?> <input type="text" id="frugal[fr_sb_pages_letter_spacing]" name="frugal[fr_sb_pages_letter_spacing]" value="<?php echo $options['fr_sb_pages_letter_spacing']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Line Height', 'frugal'); ?> <input type="text" id="frugal[fr_sb_pages_line_height]" name="frugal[fr_sb_pages_line_height]" value="<?php echo $options['fr_sb_pages_line_height']?>" style="width:40px;" /><?php _e('%', 'frugal'); ?>
	<?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_sb_pages_font_color]" name="frugal[fr_sb_pages_font_color]" value="<?php echo $options['fr_sb_pages_font_color']?>" /></p>
	<p><?php _e('Link', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_sb_pages_font_link_color]" name="frugal[fr_sb_pages_font_link_color]" value="<?php echo $options['fr_sb_pages_font_link_color']?>" />
	<?php _e('Link Hover', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_sb_pages_font_link_hover_color]" name="frugal[fr_sb_pages_font_link_hover_color]" value="<?php echo $options['fr_sb_pages_font_link_hover_color']?>" /></p>
	<p><?php _e('Hyperlink Underline', 'frugal'); ?><select id="frugal[fr_sb_pages_link_underline]" name="frugal[fr_sb_pages_link_underline]" size="1" style="width:120px; margin-left:5px;">
		<option value="On Hover"<?php if ($options['fr_sb_pages_link_underline'] == 'On Hover') echo ' selected="selected"'; ?>><?php _e('On Hover', 'frugal'); ?></option>
		<option value="Off Hover"<?php if ($options['fr_sb_pages_link_underline'] == 'Off Hover') echo ' selected="selected"'; ?>><?php _e('Off Hover', 'frugal'); ?></option>
		<option value="Always"<?php if ($options['fr_sb_pages_link_underline'] == 'Always') echo ' selected="selected"'; ?>><?php _e('Always', 'frugal'); ?></option>
		<option value="Never"<?php if ($options['fr_sb_pages_link_underline'] == 'Never') echo ' selected="selected"'; ?>><?php _e('Never', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Display \'Pages\' Widget Heading', 'frugal'); ?> <select id="frugal[fr_sb_pages_heading_display]" name="frugal[fr_sb_pages_heading_display]" size="1" style="width:55px; margin-right:5px;">
		<option value="Yes"<?php if ($options['fr_sb_pages_heading_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_sb_pages_heading_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select></p>
</div>