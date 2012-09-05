<div class="portlet-header"><?php _e('Secondary Navbar Margins/Borders', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><b><?php _e('Left Margin Thickness', 'frugal'); ?></b> <input type="text" id="frugal[fr_subnav_left_margin]" name="frugal[fr_subnav_left_margin]" value="<?php echo $options['fr_subnav_left_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('If you\'d like to center your Secondary Navbar pages in your Secondary Navbar area you can increase this number until you achieve your desired result. Note: This option is deactivated when your Secondary Navbar is set to display above your header and your navbar is set to fluid width.', 'frugal'); ?>">[?]</a></p>
	<p><b><?php _e('Page Padding Thickness...', 'frugal'); ?></b></p>
	<p><?php _e('Top/Bottom', 'frugal'); ?> <input type="text" id="frugal[fr_subnav_page_tb_padding]" name="frugal[fr_subnav_page_tb_padding]" value="<?php echo $options['fr_subnav_page_tb_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Left/Right', 'frugal'); ?> <input type="text" id="frugal[fr_subnav_page_lr_padding]" name="frugal[fr_subnav_page_lr_padding]" value="<?php echo $options['fr_subnav_page_lr_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Sub-Page Padding Thickness...', 'frugal'); ?></b></p>
	<p><?php _e('Top/Bottom', 'frugal'); ?> <input type="text" id="frugal[fr_subnav_sub_tb_padding]" name="frugal[fr_subnav_sub_tb_padding]" value="<?php echo $options['fr_subnav_sub_tb_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Left/Right', 'frugal'); ?> <input type="text" id="frugal[fr_subnav_sub_lr_padding]" name="frugal[fr_subnav_sub_lr_padding]" value="<?php echo $options['fr_subnav_sub_lr_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Border Thickness...', 'frugal'); ?></b></p>
	<p><?php _e('Top', 'frugal'); ?> <input type="text" id="frugal[fr_subnav_top_border_thickness]" name="frugal[fr_subnav_top_border_thickness]" value="<?php echo $options['fr_subnav_top_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Bottom', 'frugal'); ?> <input type="text" id="frugal[fr_subnav_bottom_border_thickness]" name="frugal[fr_subnav_bottom_border_thickness]" value="<?php echo $options['fr_subnav_bottom_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Right', 'frugal'); ?> <input type="text" id="frugal[fr_subnav_right_border_thickness]" name="frugal[fr_subnav_right_border_thickness]" value="<?php echo $options['fr_subnav_right_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Sub-Page Box Width', 'frugal'); ?></b> <input type="text" id="frugal[fr_subnav_sub_box_width]" name="frugal[fr_subnav_sub_box_width]" value="<?php echo $options['fr_subnav_sub_box_width']?>" style="width:40px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Border Colors...', 'frugal'); ?></b></p>
	<p><?php _e('Top', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_subnav_top_border_color]" name="frugal[fr_subnav_top_border_color]" value="<?php echo $options['fr_subnav_top_border_color']?>" />
	<?php _e('Bottom', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_subnav_bottom_border_color]" name="frugal[fr_subnav_bottom_border_color]" value="<?php echo $options['fr_subnav_bottom_border_color']?>" /><br />
	<?php _e('Right', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_subnav_right_border_color]" name="frugal[fr_subnav_right_border_color]" value="<?php echo $options['fr_subnav_right_border_color']?>" />
	<?php _e('Sub-Page', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_subnav_sub_border_color]" name="frugal[fr_subnav_sub_border_color]" value="<?php echo $options['fr_subnav_sub_border_color']?>" /></p>
</div>