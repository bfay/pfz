<div class="portlet-header"><?php _e('Navbar Margins/Borders', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><b><?php _e('Navbar Left Margin Thickness', 'frugal'); ?></b> <input type="text" id="frugal[fr_navbar_left_margin]" name="frugal[fr_navbar_left_margin]" value="<?php echo $options['fr_navbar_left_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('If you\'d like to center your Navbar pages in your Navbar area you can increase this number until you achieve your desired result. Note: This option is deactivated when your navbar is set to fluid width.', 'frugal'); ?>">[?]</a></p>
	<p><b><?php _e('Page Margin Thickness...', 'frugal'); ?></b></p>
	<p><?php _e('Left', 'frugal'); ?> <input type="text" id="frugal[fr_navbar_page_left_margin]" name="frugal[fr_navbar_page_left_margin]" value="<?php echo $options['fr_navbar_page_left_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Right', 'frugal'); ?> <input type="text" id="frugal[fr_navbar_page_right_margin]" name="frugal[fr_navbar_page_right_margin]" value="<?php echo $options['fr_navbar_page_right_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Page Padding Thickness...', 'frugal'); ?></b></p>
	<p><?php _e('Top/Bottom', 'frugal'); ?> <input type="text" id="frugal[fr_navbar_page_tb_padding]" name="frugal[fr_navbar_page_tb_padding]" value="<?php echo $options['fr_navbar_page_tb_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Left/Right', 'frugal'); ?> <input type="text" id="frugal[fr_navbar_page_lr_padding]" name="frugal[fr_navbar_page_lr_padding]" value="<?php echo $options['fr_navbar_page_lr_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Sub-Page Padding Thickness...', 'frugal'); ?></b></p>
	<p><?php _e('Top/Bottom', 'frugal'); ?> <input type="text" id="frugal[fr_navbar_sub_tb_padding]" name="frugal[fr_navbar_sub_tb_padding]" value="<?php echo $options['fr_navbar_sub_tb_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Left/Right', 'frugal'); ?> <input type="text" id="frugal[fr_navbar_sub_lr_padding]" name="frugal[fr_navbar_sub_lr_padding]" value="<?php echo $options['fr_navbar_sub_lr_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Main Border Thickness...', 'frugal'); ?></b></p>
	<p><?php _e('Top', 'frugal'); ?> <input type="text" id="frugal[fr_navbar_top_border_thickness]" name="frugal[fr_navbar_top_border_thickness]" value="<?php echo $options['fr_navbar_top_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Bottom', 'frugal'); ?> <input type="text" id="frugal[fr_navbar_bottom_border_thickness]" name="frugal[fr_navbar_bottom_border_thickness]" value="<?php echo $options['fr_navbar_bottom_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Page Border Thickness...', 'frugal'); ?></b></p>
	<p><?php _e('Top', 'frugal'); ?><input type="text" id="frugal[fr_navbar_page_top_border_thickness]" name="frugal[fr_navbar_page_top_border_thickness]" value="<?php echo $options['fr_navbar_page_top_border_thickness']?>" style="width:30px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Btm', 'frugal'); ?><input type="text" id="frugal[fr_navbar_page_bottom_border_thickness]" name="frugal[fr_navbar_page_bottom_border_thickness]" value="<?php echo $options['fr_navbar_page_bottom_border_thickness']?>" style="width:30px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Lft', 'frugal'); ?><input type="text" id="frugal[fr_navbar_page_left_border_thickness]" name="frugal[fr_navbar_page_left_border_thickness]" value="<?php echo $options['fr_navbar_page_left_border_thickness']?>" style="width:30px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Rt', 'frugal'); ?><input type="text" id="frugal[fr_navbar_page_right_border_thickness]" name="frugal[fr_navbar_page_right_border_thickness]" value="<?php echo $options['fr_navbar_page_right_border_thickness']?>" style="width:30px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Sub-Page Box Width', 'frugal'); ?></b> <input type="text" id="frugal[fr_navbar_sub_box_width]" name="frugal[fr_navbar_sub_box_width]" value="<?php echo $options['fr_navbar_sub_box_width']?>" style="width:40px;" /><?php _e('px', 'frugal'); ?></p>
	<p><b><?php _e('Border Colors...', 'frugal'); ?></b></p>
	<p><input type="text" class="color {pickerFaceColor:'#444'} color_box" id="frugal[fr_navbar_top_border_color]" name="frugal[fr_navbar_top_border_color]" value="<?php echo $options['fr_navbar_top_border_color']?>" /><?php _e('Top (Main)', 'frugal'); ?><br />
	<input type="text" class="color {pickerFaceColor:'#444'} color_box" id="frugal[fr_navbar_bottom_border_color]" name="frugal[fr_navbar_bottom_border_color]" value="<?php echo $options['fr_navbar_bottom_border_color']?>" /><?php _e('Bottom (Main)', 'frugal'); ?><br />
	<input type="text" class="color {pickerFaceColor:'#444'} color_box" id="frugal[fr_navbar_cp_border_color]" name="frugal[fr_navbar_cp_border_color]" value="<?php echo $options['fr_navbar_cp_border_color']?>" /><?php _e('Active Page', 'frugal'); ?><br />
	<input type="text" class="color {pickerFaceColor:'#444'} color_box" id="frugal[fr_navbar_page_border_color]" name="frugal[fr_navbar_page_border_color]" value="<?php echo $options['fr_navbar_page_border_color']?>" /><?php _e('Non-Active Page', 'frugal'); ?><br />
	<input type="text" class="color {pickerFaceColor:'#444'} color_box" id="frugal[fr_navbar_page_hover_border_color]" name="frugal[fr_navbar_page_hover_border_color]" value="<?php echo $options['fr_navbar_page_hover_border_color']?>" /><?php _e('Non-Active Page Hover', 'frugal'); ?><br />
	<input type="text" class="color {pickerFaceColor:'#444'} color_box" id="frugal[fr_navbar_sub_border_color]" name="frugal[fr_navbar_sub_border_color]" value="<?php echo $options['fr_navbar_sub_border_color']?>" /><?php _e('Sub-Page', 'frugal'); ?></p>
</div>