<div class="portlet-header"><?php _e('Universal Design', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p class="gray_box"><b><?php _e('Universal Font Options', 'frugal'); ?></b><a class="tooltip" href="#" class="tooltip" title="<?php _e('If active, the following font options will override all other content font selections. This covers everything ACCEPT the Header, Footer and Navbar areas.', 'frugal'); ?>">[?]</a>
	<?php _e('Activate', 'frugal'); ?><select id="frugal[fr_universal_fonts_active]" name="frugal[fr_universal_fonts_active]" size="1" style="width:50px; margin-right:0px;">
		<option value="No"<?php if ($options['fr_universal_fonts_active'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_universal_fonts_active'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select>
	<?php _e('Type', 'frugal'); ?><select id="frugal[fr_universal_font]" name="frugal[fr_universal_font]" size="1" style="width:120px;">
	<?php $selected = (!$options['fr_universal_font']) ? ' selected="selected"' : '';
	foreach ($font_list as $font_key => $font) {
		$selected = ($options['fr_universal_font'] == $font_key) ? ' selected="selected"' : '';
		echo "<option" . $selected . " value=\"" . $font_key . "\">" . $font['name'] . "</option>\n";
	} ?></select> <?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box" id="frugal[fr_universal_font_color]" name="frugal[fr_universal_font_color]" value="<?php echo $options['fr_universal_font_color']?>" />
	<?php _e('Link', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_universal_link_color]" name="frugal[fr_universal_link_color]" value="<?php echo $options['fr_universal_link_color']?>" />
	<?php _e('Link Hover', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_universal_link_hover_color]" name="frugal[fr_universal_link_hover_color]" value="<?php echo $options['fr_universal_link_hover_color']?>" />
	<?php _e('Custom Font', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To use this Custom Font option you just need to add the CSS font text to the text area below (example: Georgia, serif) and then click \'SAVE\'.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_custom_universal_font]" name="frugal[fr_custom_universal_font]" value="<?php echo stripslashes($options['fr_custom_universal_font'])?>" style="width:100%;" /></p>
	<p><?php _e('Universal List Style', 'frugal'); ?> <select id="frugal[fr_universal_list_style]" name="frugal[fr_universal_list_style]" size="1" style="width:70px;">
		<option value="none"<?php if ($options['fr_universal_list_style'] == 'none') echo ' selected="selected"'; ?>><?php _e('none', 'frugal'); ?></option>
		<option value="disc"<?php if ($options['fr_universal_list_style'] == 'disc') echo ' selected="selected"'; ?>><?php _e('disc', 'frugal'); ?></option>
		<option value="circle"<?php if ($options['fr_universal_list_style'] == 'circle') echo ' selected="selected"'; ?>><?php _e('circle', 'frugal'); ?></option>
		<option value="square"<?php if ($options['fr_universal_list_style'] == 'square') echo ' selected="selected"'; ?>><?php _e('square', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('This covers the List-Styles of ALL areas of your site except Sidebars which have their own List-Style Option.', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Body Line Height', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Will effect the line height of any element that does not already have a specified line height.', 'frugal'); ?>"> [?] </a><input type="text" id="frugal[fr_body_line_height]" name="frugal[fr_body_line_height]" value="<?php echo $options['fr_body_line_height']?>" style="width:40px;" /><?php _e('%', 'frugal'); ?></p>
</div>