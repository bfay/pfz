<div class="portlet-header"><?php _e('Home/Feature Box Design', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><b><?php _e('Margins:', 'frugal'); ?></b><br />
	<?php _e('Feature: Top', 'frugal'); ?> <input type="text" id="frugal[fr_fbox_top_margin]" name="frugal[fr_fbox_top_margin]" value="<?php echo $options['fr_fbox_top_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Bottom', 'frugal'); ?> <input type="text" id="frugal[fr_fbox_bottom_margin]" name="frugal[fr_fbox_bottom_margin]" value="<?php echo $options['fr_fbox_bottom_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('Home: Top', 'frugal'); ?> <input type="text" id="frugal[fr_hfbox_top_margin]" name="frugal[fr_hfbox_top_margin]" value="<?php echo $options['fr_hfbox_top_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Bottom', 'frugal'); ?> <input type="text" id="frugal[fr_hfbox_bottom_margin]" name="frugal[fr_hfbox_bottom_margin]" value="<?php echo $options['fr_hfbox_bottom_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Background Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_fbox_bg_color]" name="frugal[fr_fbox_bg_color]" value="<?php echo $options['fr_fbox_bg_color']?>" /></p>
	<p><b><?php _e('Border colors...', 'frugal'); ?></b></p>
	<p><?php _e('Outer', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_fbox_outer_border_color]" name="frugal[fr_fbox_outer_border_color]" value="<?php echo $options['fr_fbox_outer_border_color']?>" />
	<?php _e('Inner', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_fbox_inner_border_color]" name="frugal[fr_fbox_inner_border_color]" value="<?php echo $options['fr_fbox_inner_border_color']?>" /></p>
	<p><b><?php _e('Home version...', 'frugal'); ?></b></p>
	<p><?php _e('Outer', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_hfbox_outer_border_color]" name="frugal[fr_hfbox_outer_border_color]" value="<?php echo $options['fr_hfbox_outer_border_color']?>" />
	<?php _e('Inner', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_hfbox_inner_border_color]" name="frugal[fr_hfbox_inner_border_color]" value="<?php echo $options['fr_hfbox_inner_border_color']?>" /></p>
</div>