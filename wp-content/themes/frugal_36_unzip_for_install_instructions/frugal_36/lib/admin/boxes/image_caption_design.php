<div class="portlet-header"><?php _e('Post Image/Caption Design', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('When you use an image \'Caption\' in your posts you can style the background, border and font of the captions here.  And regardless of whether or not you use a Caption you can adjust the image padding below.', 'frugal'); ?>">[?]</a></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Post/Page Image Padding', 'frugal'); ?> <select id="frugal[fr_post_image_padding]" name="frugal[fr_post_image_padding]" size="1" style="width:45px;">
		<option value="5"<?php if ($options['fr_post_image_padding'] == '5') echo ' selected="selected"'; ?>><?php _e('5', 'frugal'); ?></option>
		<option value="10"<?php if ($options['fr_post_image_padding'] == '10' || !$options['fr_post_image_padding']) echo ' selected="selected"'; ?>><?php _e('10', 'frugal'); ?></option>
		<option value="15"<?php if ($options['fr_post_image_padding'] == '15') echo ' selected="selected"'; ?>><?php _e('15', 'frugal'); ?></option>
		<option value="20"<?php if ($options['fr_post_image_padding'] == '20') echo ' selected="selected"'; ?>><?php _e('20', 'frugal'); ?></option>
	</select>px <a class="tooltip" href="#" class="tooltip" title="<?php _e('The space between your Post or Page images and the rest of your content.', 'frugal'); ?>">[?]</a></p>
	<p><b><?php _e('Image Caption Design...', 'frugal'); ?></b></p>
	<p><?php _e('Background Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_caption_bg_color]" name="frugal[fr_caption_bg_color]" value="<?php echo $options['fr_caption_bg_color']?>" /></p>
	<p><b><?php _e('Border Options...', 'frugal'); ?></b></p>
	<p><?php _e('Style', 'frugal'); ?> <select id="frugal[fr_caption_border_style]" name="frugal[fr_caption_border_style]" size="1" style="width:80px; margin-right:5px;">
		<option value="solid"<?php if ($options['fr_caption_border_style'] == 'solid') echo ' selected="selected"'; ?>><?php _e('solid', 'frugal'); ?></option>
		<option value="dotted"<?php if ($options['fr_caption_border_style'] == 'dotted') echo ' selected="selected"'; ?>><?php _e('dotted', 'frugal'); ?></option>
		<option value="dashed"<?php if ($options['fr_caption_border_style'] == 'dashed') echo ' selected="selected"'; ?>><?php _e('dashed', 'frugal'); ?></option>
		<option value="double"<?php if ($options['fr_caption_border_style'] == 'double') echo ' selected="selected"'; ?>><?php _e('double', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('A \'double\' border style requires a border thickness greater than 2px. Just thought we\'d let you know. :)', 'frugal'); ?>">[?] </a>
	<?php _e('Thickness', 'frugal'); ?> <input type="text" id="frugal[fr_caption_border_thickness]" name="frugal[fr_caption_border_thickness]" value="<?php echo $options['fr_caption_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_caption_border_color]" name="frugal[fr_caption_border_color]" value="<?php echo $options['fr_caption_border_color']?>" /></p>
	<p><b><?php _e('Fonts...', 'frugal'); ?></b></select><span style="float:right;"><?php _e('Add Padding For Text', 'frugal'); ?> <select id="frugal[fr_caption_text_padding]" name="frugal[fr_caption_text_padding]" size="1" style="width:55px;">
		<option value="Yes"<?php if ($options['fr_caption_text_padding'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_caption_text_padding'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select> <a class="tooltip" href="#" class="tooltip" title="<?php _e('When set to \'Yes\' bottom padding will be added to your image caption so your text will have room to display. But if you want to just have the caption background and border display, without the text, set this option to \'No\'. Then, when adding a caption, just place the cursor in the caption text area, hit the spacebar once, and then save your caption.', 'frugal'); ?>">[?]</a></span></p>
	<p><?php _e('Type', 'frugal'); ?> <select id="frugal[fr_caption_font]" name="frugal[fr_caption_font]" size="1" style="width:120px;">
	<?php $selected = (!$options['fr_caption_font']) ? ' selected="selected"' : '';
	foreach ($font_list as $font_key => $font) {
		$selected = ($options['fr_caption_font'] == $font_key) ? ' selected="selected"' : '';
		echo "<option" . $selected . " value=\"" . $font_key . "\">" . $font['name'] . "</option>\n";
	} ?></select> <?php _e('Size', 'frugal'); ?> <input type="text" id="frugal[fr_caption_font_size]" name="frugal[fr_caption_font_size]" value="<?php echo $options['fr_caption_font_size']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Custom Font', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To use this Custom Font option you just need to add the CSS font text to the text area below (example: Georgia, serif) and then click \'SAVE\'.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_custom_caption_font]" name="frugal[fr_custom_caption_font]" value="<?php echo stripslashes($options['fr_custom_caption_font'])?>" style="width:100%;" /></p>
	<p><?php _e('Weight', 'frugal'); ?> <select id="frugal[fr_caption_font_weight]" name="frugal[fr_caption_font_weight]" size="1" style="width:75px;">
		<option value="normal"<?php if ($options['fr_caption_font_weight'] == 'normal') echo ' selected="selected"'; ?>><?php _e('normal', 'frugal'); ?></option>
		<option value="bold"<?php if ($options['fr_caption_font_weight'] == 'bold') echo ' selected="selected"'; ?>><?php _e('bold', 'frugal'); ?></option>
	</select> <?php _e('Style', 'frugal'); ?> <select id="frugal[fr_caption_font_style]" name="frugal[fr_caption_font_style]" size="1" style="width:75px;">
		<option value="normal"<?php if ($options['fr_caption_font_style'] == 'normal') echo ' selected="selected"'; ?>><?php _e('normal', 'frugal'); ?></option>
		<option value="italic"<?php if ($options['fr_caption_font_style'] == 'italic') echo ' selected="selected"'; ?>><?php _e('italic', 'frugal'); ?></option>
	</select><br />
	<?php _e('Line Height', 'frugal'); ?> <input type="text" id="frugal[fr_caption_line_height]" name="frugal[fr_caption_line_height]" value="<?php echo $options['fr_caption_line_height']?>" style="width:40px;" /><?php _e('%', 'frugal'); ?>
	<?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_caption_font_color]" name="frugal[fr_caption_font_color]" value="<?php echo $options['fr_caption_font_color']?>" /></p>
</div>