<div class="portlet-header"><?php _e('Main Border/Padding/Margins', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><b><?php _e('Main Border...', 'frugal'); ?></b></p>
	<p><?php _e('Style', 'frugal'); ?> <select id="frugal[fr_border_style]" name="frugal[fr_border_style]" size="1" style="width:80px; margin-right:5px;">
		<option value="solid"<?php if ($options['fr_border_style'] == 'solid') echo ' selected="selected"'; ?>><?php _e('solid', 'frugal'); ?></option>
		<option value="dotted"<?php if ($options['fr_border_style'] == 'dotted') echo ' selected="selected"'; ?>><?php _e('dotted', 'frugal'); ?></option>
		<option value="dashed"<?php if ($options['fr_border_style'] == 'dashed') echo ' selected="selected"'; ?>><?php _e('dashed', 'frugal'); ?></option>
		<option value="double"<?php if ($options['fr_border_style'] == 'double') echo ' selected="selected"'; ?>><?php _e('double', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('A \'double\' border style requires a border thickness greater than 2px. Just thought we\'d let you know. :)', 'frugal'); ?>">[?] </a>
	<?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_border_color]" name="frugal[fr_border_color]" value="<?php echo $options['fr_border_color']?>" /><br />
	<?php _e('Top/Bottom Thickness', 'frugal'); ?> <input type="text" id="frugal[fr_tb_border_thickness]" name="frugal[fr_tb_border_thickness]" value="<?php echo $options['fr_tb_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('Left/Right Thickness', 'frugal'); ?> <input type="text" id="frugal[fr_lr_border_thickness]" name="frugal[fr_lr_border_thickness]" value="<?php echo $options['fr_lr_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Content Container Border...', 'frugal'); ?></b></p>
	<p><?php _e('Style', 'frugal'); ?> <select id="frugal[fr_container_border_style]" name="frugal[fr_container_border_style]" size="1" style="width:80px; margin-right:5px;">
		<option value="solid"<?php if ($options['fr_container_border_style'] == 'solid') echo ' selected="selected"'; ?>><?php _e('solid', 'frugal'); ?></option>
		<option value="dotted"<?php if ($options['fr_container_border_style'] == 'dotted') echo ' selected="selected"'; ?>><?php _e('dotted', 'frugal'); ?></option>
		<option value="dashed"<?php if ($options['fr_container_border_style'] == 'dashed') echo ' selected="selected"'; ?>><?php _e('dashed', 'frugal'); ?></option>
		<option value="double"<?php if ($options['fr_container_border_style'] == 'double') echo ' selected="selected"'; ?>><?php _e('double', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('A \'double\' border style requires a border thickness greater than 2px. Just thought we\'d let you know. :)', 'frugal'); ?>">[?] </a>
	<?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_container_border_color]" name="frugal[fr_container_border_color]" value="<?php echo $options['fr_container_border_color']?>" /><br />
	<?php _e('Top/Bottom Thickness', 'frugal'); ?> <input type="text" id="frugal[fr_container_tb_border_thickness]" name="frugal[fr_container_tb_border_thickness]" value="<?php echo $options['fr_container_tb_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('Left/Right Thickness', 'frugal'); ?> <input type="text" id="frugal[fr_container_lr_border_thickness]" name="frugal[fr_container_lr_border_thickness]" value="<?php echo $options['fr_container_lr_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Main Margins...', 'frugal'); ?></b></p>
	<p><?php _e('Top', 'frugal'); ?> <input type="text" id="frugal[fr_top_margin]" name="frugal[fr_top_margin]" value="<?php echo $options['fr_top_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Bottom', 'frugal'); ?> <input type="text" id="frugal[fr_bottom_margin]" name="frugal[fr_bottom_margin]" value="<?php echo $options['fr_bottom_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Padding...', 'frugal'); ?></b></p>
	<p><?php _e('Wrap Top/Bottom', 'frugal'); ?> <input type="text" id="frugal[fr_tb_padding_thickness]" name="frugal[fr_tb_padding_thickness]" value="<?php echo $options['fr_tb_padding_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('Wrap Left/Right', 'frugal'); ?> <input type="text" id="frugal[fr_lr_padding_thickness]" name="frugal[fr_lr_padding_thickness]" value="<?php echo $options['fr_lr_padding_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('Content Container Left/Right', 'frugal'); ?> <input type="text" id="frugal[fr_lr_container_padding]" name="frugal[fr_lr_container_padding]" value="<?php echo $options['fr_lr_container_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('The \'Content Container Padding\' is combined. (eg. 20px = 10px left + 10px right)', 'frugal'); ?>">[?]</a></p>
</div>