<div class="portlet-header"><?php _e('Thumbnail Options', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('These thumbnail options are dependent on Wordpress 2.9 and above to function. If utilized, these options will effect all thumbnails that are added to the Static Homepage post excerpts as well as archive page posts excerpts (assuming you have your archive pages set to display excerpts over full content).', 'frugal'); ?>">[?]</a></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Mode', 'frugal'); ?><a class="tooltip" href="#" class="tooltip" title="<?php _e('\'Resize\' mode will maintain the proportions of your image. \'Crop\' mode will force your image to fit your specific dimensions, regardless of your original image proportions. Neither should distort your image. Note: The selected crop mode will only effect future image uploads as the cropping is performed upon upload.', 'frugal'); ?>">[?]</a>
	<select id="frugal[fr_thumb_type]" name="frugal[fr_thumb_type]" size="1" style="width:70px;">
		<option value="Resize"<?php if ($options['fr_thumb_type'] == 'Resize') echo ' selected="selected"'; ?>><?php _e('Resize', 'frugal'); ?></option>
		<option value="Crop"<?php if ($options['fr_thumb_type'] == 'Crop') echo ' selected="selected"'; ?>><?php _e('Crop', 'frugal'); ?></option>
	</select>
	<?php _e('Alignment', 'frugal'); ?><a class="tooltip" href="#" class="tooltip" title="<?php _e('\'None\' will float left without the text wrapping around the image.', 'frugal'); ?>">[?]</a>
	<select id="frugal[fr_thumb_alignment]" name="frugal[fr_thumb_alignment]" size="1" style="width:70px;">
		<option value="None"<?php if ($options['fr_thumb_alignment'] == 'None') echo ' selected="selected"'; ?>><?php _e('None', 'frugal'); ?></option>
		<option value="Left"<?php if ($options['fr_thumb_alignment'] == 'Left') echo ' selected="selected"'; ?>><?php _e('Left', 'frugal'); ?></option>
		<option value="Center"<?php if ($options['fr_thumb_alignment'] == 'Center') echo ' selected="selected"'; ?>><?php _e('Center', 'frugal'); ?></option>
		<option value="Right"<?php if ($options['fr_thumb_alignment'] == 'Right') echo ' selected="selected"'; ?>><?php _e('Right', 'frugal'); ?></option>
	</select><br />
	<?php _e('Width', 'frugal'); ?> <input type="text" id="frugal[fr_thumb_width]" name="frugal[fr_thumb_width]" value="<?php echo $options['fr_thumb_width']?>" style="width:40px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Height', 'frugal'); ?> <input type="text" id="frugal[fr_thumb_height]" name="frugal[fr_thumb_height]" value="<?php echo $options['fr_thumb_height']?>" style="width:40px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Border Options...', 'frugal'); ?></b></p>
	<p><?php _e('Style', 'frugal'); ?> <select id="frugal[fr_thumb_border_style]" name="frugal[fr_thumb_border_style]" size="1" style="width:80px; margin-right:5px;">
		<option value="solid"<?php if ($options['fr_thumb_border_style'] == 'solid') echo ' selected="selected"'; ?>><?php _e('solid', 'frugal'); ?></option>
		<option value="dotted"<?php if ($options['fr_thumb_border_style'] == 'dotted') echo ' selected="selected"'; ?>><?php _e('dotted', 'frugal'); ?></option>
		<option value="dashed"<?php if ($options['fr_thumb_border_style'] == 'dashed') echo ' selected="selected"'; ?>><?php _e('dashed', 'frugal'); ?></option>
		<option value="double"<?php if ($options['fr_thumb_border_style'] == 'double') echo ' selected="selected"'; ?>><?php _e('double', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('A \'double\' border style requires a border thickness greater than 2px. Just thought I\'d let you know. :-)', 'frugal'); ?>">[?] </a>
	<?php _e('Thickness', 'frugal'); ?> <input type="text" id="frugal[fr_thumb_border_thickness]" name="frugal[fr_thumb_border_thickness]" value="<?php echo $options['fr_thumb_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_thumb_border_color]" name="frugal[fr_thumb_border_color]" value="<?php echo $options['fr_thumb_border_color']?>" /></p>
</div>