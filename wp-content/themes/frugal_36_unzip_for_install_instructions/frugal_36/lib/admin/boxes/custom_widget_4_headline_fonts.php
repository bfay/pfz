<div class="portlet-header"><?php _e('Custom Widget 4 Headline Fonts', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Type', 'frugal'); ?> <select id="frugal[fr_cw4_headline_font]" name="frugal[fr_cw4_headline_font]" size="1" style="width:120px;">
	<?php $selected = (!$options['fr_cw4_headline_font']) ? ' selected="selected"' : '';
	foreach ($font_list as $font_key => $font) {
		$selected = ($options['fr_cw4_headline_font'] == $font_key) ? ' selected="selected"' : '';
		echo "<option" . $selected . " value=\"" . $font_key . "\">" . $font['name'] . "</option>\n";
	} ?></select> <?php _e('Size', 'frugal'); ?> <input type="text" id="frugal[fr_cw4_headline_font_size]" name="frugal[fr_cw4_headline_font_size]" value="<?php echo $options['fr_cw4_headline_font_size']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Custom Font', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To use this Custom Font option you just need to add the CSS font text to the text area below (example: Georgia, serif) and then click \'SAVE\'.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_custom_cw4_headline_font]" name="frugal[fr_custom_cw4_headline_font]" value="<?php echo stripslashes($options['fr_custom_cw4_headline_font'])?>" style="width:100%;" /></p>
	<p><?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_cw4_headline_font_color]" name="frugal[fr_cw4_headline_font_color]" value="<?php echo $options['fr_cw4_headline_font_color']?>" />
	<?php _e('Weight', 'frugal'); ?><select id="frugal[fr_cw4_headline_font_weight]" name="frugal[fr_cw4_headline_font_weight]" size="1" style="width:75px; margin-left:5px;">
		<option value="normal"<?php if ($options['fr_cw4_headline_font_weight'] == 'normal') echo ' selected="selected"'; ?>><?php _e('normal', 'frugal'); ?></option>
		<option value="bold"<?php if ($options['fr_cw4_headline_font_weight'] == 'bold') echo ' selected="selected"'; ?>><?php _e('bold', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Alignment', 'frugal'); ?> <select id="frugal[fr_cw4_headline_text_align]" name="frugal[fr_cw4_headline_text_align]" size="1" style="width:70px; margin-right:5px;">
		<option value="left"<?php if ($options['fr_cw4_headline_text_align'] == 'left') echo ' selected="selected"'; ?>><?php _e('left', 'frugal'); ?></option>
		<option value="center"<?php if ($options['fr_cw4_headline_text_align'] == 'center') echo ' selected="selected"'; ?>><?php _e('center', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Caps', 'frugal'); ?> <select id="frugal[fr_cw4_headline_text_caps]" name="frugal[fr_cw4_headline_text_caps]" size="1" style="width:95px;">
		<option value="none"<?php if ($options['fr_cw4_headline_text_caps'] == 'none') echo ' selected="selected"'; ?>><?php _e('none', 'frugal'); ?></option>
		<option value="uppercase"<?php if ($options['fr_cw4_headline_text_caps'] == 'uppercase') echo ' selected="selected"'; ?>><?php _e('uppercase', 'frugal'); ?></option>
		<option value="lowercase"<?php if ($options['fr_cw4_headline_text_caps'] == 'lowercase') echo ' selected="selected"'; ?>><?php _e('lowercase', 'frugal'); ?></option>
	</select> <?php _e('Variant', 'frugal'); ?> <select id="frugal[fr_cw4_headline_font_variant]" name="frugal[fr_cw4_headline_font_variant]" size="1" style="width:95px;">
		<option value="normal"<?php if ($options['fr_cw4_headline_font_variant'] == 'normal') echo ' selected="selected"'; ?>><?php _e('normal', 'frugal'); ?></option>
		<option value="small-caps"<?php if ($options['fr_cw4_headline_font_variant'] == 'small-caps') echo ' selected="selected"'; ?>><?php _e('small-caps', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Letter Spacing', 'frugal'); ?> <input type="text" id="frugal[fr_cw4_headline_letter_spacing]" name="frugal[fr_cw4_headline_letter_spacing]" value="<?php echo $options['fr_cw4_headline_letter_spacing']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Line Height', 'frugal'); ?> <input type="text" id="frugal[fr_cw4_headline_line_height]" name="frugal[fr_cw4_headline_line_height]" value="<?php echo $options['fr_cw4_headline_line_height']?>" style="width:40px;" /><?php _e('%', 'frugal'); ?></p>
</div>