<div class="portlet-header"><?php _e('CMS Page Template Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('CMS Layout Options', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Use these options to customize your pages that use the CMS Page Template. frugal is all about CMS! :-)', 'frugal'); ?>">[?]</a>
	<select id="frugal[fr_cms_layout_type]" name="frugal[fr_cms_layout_type]" size="1" style="width:120px; margin-right:5px;">
		<option value="Right Sidebar"<?php if ($options['fr_cms_layout_type'] == 'Right Sidebar') echo ' selected="selected"'; ?>><?php _e('Right Sidebar', 'frugal'); ?></option>
		<option value="Left Sidebar"<?php if ($options['fr_cms_layout_type'] == 'Left Sidebar') echo ' selected="selected"'; ?>><?php _e('Left Sidebar', 'frugal'); ?></option>
		<option value="Double Sidebar"<?php if ($options['fr_cms_layout_type'] == 'Double Sidebar') echo ' selected="selected"'; ?>><?php _e('Double Sidebar', 'frugal'); ?></option>
	</select><br />
	<?php _e('CMS Sidebar 1 Width', 'frugal'); ?> <input type="text" id="frugal[fr_sidebar_cms_1_width]" name="frugal[fr_sidebar_cms_1_width]" value="<?php echo $options['fr_sidebar_cms_1_width']?>" style="width:40px;" /><?php _e('px', 'frugal'); ?><br />
	<?php _e('CMS Sidebar 2 Width', 'frugal'); ?><input type="text" id="frugal[fr_sidebar_cms_2_width]" name="frugal[fr_sidebar_cms_2_width]" value="<?php echo $options['fr_sidebar_cms_2_width']?>" style="width:40px;" /><?php _e('px', 'frugal'); ?></p>
</div>