<div class="portlet-header"><?php _e('Sidebar Design', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Top/Bottom Margin Thickness', 'frugal'); ?><input type="text" id="frugal[fr_sb_tb_margin]" name="frugal[fr_sb_tb_margin]" value="<?php echo $options['fr_sb_tb_margin']?>" style="width:35px; margin-left:5px;" /><?php _e('px', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This can be especially useful when adding a border to this content area as it can allow space to be added between the top/bottom borders and the rest of the site boundaries.', 'frugal'); ?>">[?]</a></p>
	<p style="margin-bottom:-10px"><b><?php _e('Background (Type - Color - Name)', 'frugal'); ?></b></p>
	<p class="gray_box"><select id="frugal[fr_sb_bg_type]" name="frugal[fr_sb_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_sb_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_sb_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_sb_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_sb_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_sb_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_sb_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_sb_bg_color]" name="frugal[fr_sb_bg_color]" value="<?php echo $options['fr_sb_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_sb_bg_image_name]" name="frugal[fr_sb_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_sb_bg_image_name'] ); ?></select></p>
	<p style="margin-bottom:-10px"><b><?php _e('CMS Page BG (Type - Color - Name)', 'frugal'); ?></b></p>
	<p class="gray_box"><select id="frugal[fr_cms_sb_bg_type]" name="frugal[fr_cms_sb_bg_type]" size="1" style="width:187px;">
		<option value="Inherit Sidebars"<?php if ($options['fr_cms_sb_bg_type'] == 'Inherit Sidebars') echo ' selected="selected"'; ?>><?php _e('Inherit Sidebars', 'frugal'); ?></option>
		<option value="Transparent"<?php if ($options['fr_cms_sb_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_cms_sb_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_cms_sb_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_cms_sb_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_cms_sb_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_cms_sb_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_cms_sb_bg_color]" name="frugal[fr_cms_sb_bg_color]" value="<?php echo $options['fr_cms_sb_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_cms_sb_bg_image_name]" name="frugal[fr_cms_sb_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_cms_sb_bg_image_name'] ); ?></select></p>
	<p><b><?php _e('Main Border Options...', 'frugal'); ?></b></p>
	<p style="padding-bottom:12px; border-bottom:1px solid #ddd;"><?php _e('Style', 'frugal'); ?> <select id="frugal[fr_sb_border_style]" name="frugal[fr_sb_border_style]" size="1" style="width:80px; margin-right:5px;">
		<option value="solid"<?php if ($options['fr_sb_border_style'] == 'solid') echo ' selected="selected"'; ?>><?php _e('solid', 'frugal'); ?></option>
		<option value="dotted"<?php if ($options['fr_sb_border_style'] == 'dotted') echo ' selected="selected"'; ?>><?php _e('dotted', 'frugal'); ?></option>
		<option value="dashed"<?php if ($options['fr_sb_border_style'] == 'dashed') echo ' selected="selected"'; ?>><?php _e('dashed', 'frugal'); ?></option>
		<option value="double"<?php if ($options['fr_sb_border_style'] == 'double') echo ' selected="selected"'; ?>><?php _e('double', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('A \'double\' border style requires a border thickness greater than 2px. Just thought we\'d let you know. :)', 'frugal'); ?>">[?] </a>
	<?php _e('Thickness', 'frugal'); ?> <input type="text" id="frugal[fr_sb_border_thickness]" name="frugal[fr_sb_border_thickness]" value="<?php echo $options['fr_sb_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_sb_border_color]" name="frugal[fr_sb_border_color]" value="<?php echo $options['fr_sb_border_color']?>" /></p>
	<p style="margin-bottom:-10px"><b><?php _e('Heading Background (Type - Color - Name)', 'frugal'); ?></b></p>
	<p class="gray_box"><select id="frugal[fr_sb_heading_bg_type]" name="frugal[fr_sb_heading_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_sb_heading_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_sb_heading_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_sb_heading_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_sb_heading_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_sb_heading_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_sb_heading_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_sb_heading_bg_color]" name="frugal[fr_sb_heading_bg_color]" value="<?php echo $options['fr_sb_heading_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_sb_heading_bg_image_name]" name="frugal[fr_sb_heading_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_sb_heading_bg_image_name'] ); ?></select></p>
	<p><b><?php _e('Heading Border Options...', 'frugal'); ?></b></p>
	<p style="padding-bottom:12px; border-bottom:1px solid #ddd;"><?php _e('Type', 'frugal'); ?> <select id="frugal[fr_sb_heading_border_type]" name="frugal[fr_sb_heading_border_type]" size="1" style="width:80px;">
		<option value="Bottom"<?php if ($options['fr_sb_heading_border_type'] == 'Bottom') echo ' selected="selected"'; ?>><?php _e('Bottom', 'frugal'); ?></option>
		<option value="Full"<?php if ($options['fr_sb_heading_border_type'] == 'Full') echo ' selected="selected"'; ?>><?php _e('Full', 'frugal'); ?></option>
	</select>
	<?php _e('Style', 'frugal'); ?> <select id="frugal[fr_sb_heading_border_style]" name="frugal[fr_sb_heading_border_style]" size="1" style="width:80px; margin-right:5px;">
		<option value="solid"<?php if ($options['fr_sb_heading_border_style'] == 'solid') echo ' selected="selected"'; ?>><?php _e('solid', 'frugal'); ?></option>
		<option value="dotted"<?php if ($options['fr_sb_heading_border_style'] == 'dotted') echo ' selected="selected"'; ?>><?php _e('dotted', 'frugal'); ?></option>
		<option value="dashed"<?php if ($options['fr_sb_heading_border_style'] == 'dashed') echo ' selected="selected"'; ?>><?php _e('dashed', 'frugal'); ?></option>
		<option value="double"<?php if ($options['fr_sb_heading_border_style'] == 'double') echo ' selected="selected"'; ?>><?php _e('double', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('A \'double\' border style requires a border thickness greater than 2px. Just thought we\'d let you know. :)', 'frugal'); ?>">[?] </a><br />
	<?php _e('Thickness', 'frugal'); ?> <input type="text" id="frugal[fr_sb_heading_border_thickness]" name="frugal[fr_sb_heading_border_thickness]" value="<?php echo $options['fr_sb_heading_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_sb_heading_border_color]" name="frugal[fr_sb_heading_border_color]" value="<?php echo $options['fr_sb_heading_border_color']?>" /></p>
	<p><b><?php _e('Sidebar Widgets Design Active', 'frugal'); ?></b> <select id="frugal[fr_sb_content_design_active]" name="frugal[fr_sb_content_design_active]" size="1" style="width:50px;">
		<option value="Yes"<?php if ($options['fr_sb_content_design_active'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_sb_content_design_active'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select> <a class="tooltip" href="#" class="tooltip" title="<?php _e('When set to \'Yes\' the individual Sidebar Widget Background and Border options below are functional. When set to \'No\' they are non-functional. This option was put in place because some web forms and other sidebar widgets may not display properly with the below options active.', 'frugal'); ?>">[?]</a></p>
	<p style="margin-bottom:-10px"><b><?php _e('Widgets Background (Type - Color - Name)', 'frugal'); ?></b></p>
	<p class="gray_box"><select id="frugal[fr_sb_content_bg_type]" name="frugal[fr_sb_content_bg_type]" size="1" style="width:187px;">
		<option value="Transparent"<?php if ($options['fr_sb_content_bg_type'] == 'Transparent') echo ' selected="selected"'; ?>><?php _e('Transparent', 'frugal'); ?></option>
		<option value="Color"<?php if ($options['fr_sb_content_bg_type'] == 'Color') echo ' selected="selected"'; ?>><?php _e('Color', 'frugal'); ?></option>
		<option value="No-Repeat Image"<?php if ($options['fr_sb_content_bg_type'] == 'No-Repeat Image') echo ' selected="selected"'; ?>><?php _e('No-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal-Repeat Image"<?php if ($options['fr_sb_content_bg_type'] == 'Horizontal-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal-Repeat Image', 'frugal'); ?></option>
		<option value="Vertical-Repeat Image"<?php if ($options['fr_sb_content_bg_type'] == 'Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Vertical-Repeat Image', 'frugal'); ?></option>
		<option value="Horizontal & Vertical-Repeat Image"<?php if ($options['fr_sb_content_bg_type'] == 'Horizontal & Vertical-Repeat Image') echo ' selected="selected"'; ?>><?php _e('Horizontal & Vertical-Repeat Image', 'frugal'); ?></option>
	</select><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_sb_content_bg_color]" name="frugal[fr_sb_content_bg_color]" value="<?php echo $options['fr_sb_content_bg_color']?>" /><br />
	<?php _e('Image Name', 'frugal'); ?> <select id="frugal[fr_sb_content_bg_image_name]" name="frugal[fr_sb_content_bg_image_name]" size="1" style="width:190px;"><?php frugal_list_images( $options['fr_sb_content_bg_image_name'] ); ?></select></p>
	<p><b><?php _e('Widget\'s Border Options...', 'frugal'); ?></b> <a class="tooltip" href="#" class="tooltip" title="<?php _e('If using a \'Text\' widget with this custom widget you may need to wrap your \'Text\' widget content in paragraph HTML tags to enable your font options to take effect.', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Style', 'frugal'); ?> <select id="frugal[fr_sb_content_border_style]" name="frugal[fr_sb_content_border_style]" size="1" style="width:80px; margin-right:5px;">
		<option value="solid"<?php if ($options['fr_sb_content_border_style'] == 'solid') echo ' selected="selected"'; ?>><?php _e('solid', 'frugal'); ?></option>
		<option value="dotted"<?php if ($options['fr_sb_content_border_style'] == 'dotted') echo ' selected="selected"'; ?>><?php _e('dotted', 'frugal'); ?></option>
		<option value="dashed"<?php if ($options['fr_sb_content_border_style'] == 'dashed') echo ' selected="selected"'; ?>><?php _e('dashed', 'frugal'); ?></option>
		<option value="double"<?php if ($options['fr_sb_content_border_style'] == 'double') echo ' selected="selected"'; ?>><?php _e('double', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('A \'double\' border style requires a border thickness greater than 2px. Just thought we\'d let you know. :)', 'frugal'); ?>">[?] </a>
	<?php _e('Thickness', 'frugal'); ?> <input type="text" id="frugal[fr_sb_content_border_thickness]" name="frugal[fr_sb_content_border_thickness]" value="<?php echo $options['fr_sb_content_border_thickness']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('Color', 'frugal'); ?><input type="text" class="color {pickerFaceColor:'#444'} color_box2" id="frugal[fr_sb_content_border_color]" name="frugal[fr_sb_content_border_color]" value="<?php echo $options['fr_sb_content_border_color']?>" /></p>
	<p><b><?php _e('Sidebar List Style', 'frugal'); ?></b> <select id="frugal[fr_sb_list_style]" name="frugal[fr_sb_list_style]" size="1" style="width:70px;">
		<option value="none"<?php if ($options['fr_sb_list_style'] == 'none') echo ' selected="selected"'; ?>><?php _e('none', 'frugal'); ?></option>
		<option value="disc"<?php if ($options['fr_sb_list_style'] == 'disc') echo ' selected="selected"'; ?>><?php _e('disc', 'frugal'); ?></option>
		<option value="circle"<?php if ($options['fr_sb_list_style'] == 'circle') echo ' selected="selected"'; ?>><?php _e('circle', 'frugal'); ?></option>
		<option value="square"<?php if ($options['fr_sb_list_style'] == 'square') echo ' selected="selected"'; ?>><?php _e('square', 'frugal'); ?></option>
	</select></p>
</div>