<div class="portlet-header"><?php _e('Navbar Fonts', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Type', 'frugal'); ?><select id="frugal[fr_navbar_font]" name="frugal[fr_navbar_font]" size="1" style="width:120px;">
	<?php $selected = (!$options['fr_navbar_font']) ? ' selected="selected"' : '';
	foreach ($font_list as $font_key => $font) {
		$selected = ($options['fr_navbar_font'] == $font_key) ? ' selected="selected"' : '';
		echo "<option" . $selected . " value=\"" . $font_key . "\">" . $font['name'] . "</option>\n";
	} ?></select> <?php _e('Size', 'frugal'); ?> <input type="text" id="frugal[fr_navbar_font_size]" name="frugal[fr_navbar_font_size]" value="<?php echo $options['fr_navbar_font_size']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Custom Font', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To use this Custom Font option you just need to add the CSS font text to the text area below (example: Georgia, serif) and then click \'SAVE\'.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_custom_navbar_font]" name="frugal[fr_custom_navbar_font]" value="<?php echo stripslashes($options['fr_custom_navbar_font'])?>" style="width:100%;" /></p>
	<p><?php _e('Caps', 'frugal'); ?> <select id="frugal[fr_navbar_caps]" name="frugal[fr_navbar_caps]" size="1" style="width:95px;">
		<option value="none"<?php if ($options['fr_navbar_caps'] == 'none') echo ' selected="selected"'; ?>><?php _e('none', 'frugal'); ?></option>
		<option value="uppercase"<?php if ($options['fr_navbar_caps'] == 'uppercase') echo ' selected="selected"'; ?>><?php _e('uppercase', 'frugal'); ?></option>
		<option value="lowercase"<?php if ($options['fr_navbar_caps'] == 'lowercase') echo ' selected="selected"'; ?>><?php _e('lowercase', 'frugal'); ?></option>
	</select> <?php _e('Variant', 'frugal'); ?> <select id="frugal[fr_navbar_font_variant]" name="frugal[fr_navbar_font_variant]" size="1" style="width:95px;">
		<option value="normal"<?php if ($options['fr_navbar_font_variant'] == 'normal') echo ' selected="selected"'; ?>><?php _e('normal', 'frugal'); ?></option>
		<option value="small-caps"<?php if ($options['fr_navbar_font_variant'] == 'small-caps') echo ' selected="selected"'; ?>><?php _e('small-caps', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Weight', 'frugal'); ?> <select id="frugal[fr_navbar_font_weight]" name="frugal[fr_navbar_font_weight]" size="1" style="width:75px;">
		<option value="normal"<?php if ($options['fr_navbar_font_weight'] == 'normal') echo ' selected="selected"'; ?>><?php _e('normal', 'frugal'); ?></option>
		<option value="bold"<?php if ($options['fr_navbar_font_weight'] == 'bold') echo ' selected="selected"'; ?>><?php _e('bold', 'frugal'); ?></option>
	</select> <?php _e('Letter Spacing', 'frugal'); ?> <input type="text" id="frugal[fr_navbar_letter_spacing]" name="frugal[fr_navbar_letter_spacing]" value="<?php echo $options['fr_navbar_letter_spacing']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_navbar_font_color]" name="frugal[fr_navbar_font_color]" value="<?php echo $options['fr_navbar_font_color']?>" />
	<?php _e('Hover', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_navbar_text_hover_color]" name="frugal[fr_navbar_text_hover_color]" value="<?php echo $options['fr_navbar_text_hover_color']?>" /></p>
	<p><?php _e('Text Hover Underline', 'frugal'); ?> <select id="frugal[fr_navbar_text_hover_underline]" name="frugal[fr_navbar_text_hover_underline]" size="1" style="width:55px;">
		<option value="No"<?php if ($options['fr_navbar_text_hover_underline'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_navbar_text_hover_underline'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select></p>
	<p><b><?php _e('Active Page Font Color', 'frugal'); ?></b><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_navbar_cp_font_color]" name="frugal[fr_navbar_cp_font_color]" value="<?php echo $options['fr_navbar_cp_font_color']?>" /></p>
	<p><b><?php _e('Sub-Page Fonts...', 'frugal'); ?></b></p>
	<p><?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_navbar_sub_font_color]" name="frugal[fr_navbar_sub_font_color]" value="<?php echo $options['fr_navbar_sub_font_color']?>" />
	<?php _e('Hover', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_navbar_sub_text_hover_color]" name="frugal[fr_navbar_sub_text_hover_color]" value="<?php echo $options['fr_navbar_sub_text_hover_color']?>" /></p>
</div>