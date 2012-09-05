<div class="portlet-header"><?php _e('Main Layout', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Header/Footer/Navbar Fluid Options', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('The items in the dropdown menu, if selected, will span the entire width of the screen instead of being confined by borders.', 'frugal'); ?>">[?]</a><br />
	<select id="frugal[fr_head_foot_fluid]" name="frugal[fr_head_foot_fluid]" size="1" style="width:160px; margin-right:5px;">
		<option value="None"<?php if ($options['fr_head_foot_fluid'] == 'None') echo ' selected="selected"'; ?>><?php _e('None', 'frugal'); ?></option>
		<option value="Header Only"<?php if ($options['fr_head_foot_fluid'] == 'Header Only') echo ' selected="selected"'; ?>><?php _e('Header Only', 'frugal'); ?></option>
		<option value="Footer Only"<?php if ($options['fr_head_foot_fluid'] == 'Footer Only') echo ' selected="selected"'; ?>><?php _e('Footer Only', 'frugal'); ?></option>
		<option value="Navbar Only"<?php if ($options['fr_head_foot_fluid'] == 'Navbar Only') echo ' selected="selected"'; ?>><?php _e('Navbar Only', 'frugal'); ?></option>
		<option value="Header & Navbar Only"<?php if ($options['fr_head_foot_fluid'] == 'Header & Navbar Only') echo ' selected="selected"'; ?>><?php _e('Header & Navbar Only', 'frugal'); ?></option>
		<option value="Header & Footer Only"<?php if ($options['fr_head_foot_fluid'] == 'Header & Footer Only') echo ' selected="selected"'; ?>><?php _e('Header & Footer Only', 'frugal'); ?></option>
		<option value="Navbar & Footer Only"<?php if ($options['fr_head_foot_fluid'] == 'Navbar & Footer Only') echo ' selected="selected"'; ?>><?php _e('Navbar & Footer Only', 'frugal'); ?></option>
		<option value="All"<?php if ($options['fr_head_foot_fluid'] == 'All') echo ' selected="selected"'; ?>><?php _e('All', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Content Layout Options', 'frugal'); ?><br /><select id="frugal[fr_layout_type]" name="frugal[fr_layout_type]" size="1" style="width:160px; margin-right:5px;">
		<option value="Double Right Sidebar"<?php if ($options['fr_layout_type'] == 'Double Right Sidebar') echo ' selected="selected"'; ?>><?php _e('Double Right Sidebar', 'frugal'); ?></option>
		<option value="Double Left Sidebar"<?php if ($options['fr_layout_type'] == 'Double Left Sidebar') echo ' selected="selected"'; ?>><?php _e('Double Left Sidebar', 'frugal'); ?></option>
		<option value="Right Sidebar"<?php if ($options['fr_layout_type'] == 'Right Sidebar') echo ' selected="selected"'; ?>><?php _e('Right Sidebar', 'frugal'); ?></option>
		<option value="Left Sidebar"<?php if ($options['fr_layout_type'] == 'Left Sidebar') echo ' selected="selected"'; ?>><?php _e('Left Sidebar', 'frugal'); ?></option>
		<option value="Double Sidebar"<?php if ($options['fr_layout_type'] == 'Double Sidebar') echo ' selected="selected"'; ?>><?php _e('Double Sidebar', 'frugal'); ?></option>
		<option value="No Sidebar"<?php if ($options['fr_layout_type'] == 'No Sidebar') echo ' selected="selected"'; ?>><?php _e('No Sidebar', 'frugal'); ?></option>
	</select></p>
	<p><input type="text" id="frugal[fr_content_column_width]" name="frugal[fr_content_column_width]" value="<?php echo $options['fr_content_column_width']?>" style="width:40px;" /><?php _e('px Content Column Width', 'frugal'); ?><br />
	<input type="text" id="frugal[fr_sidebar_1_width]" name="frugal[fr_sidebar_1_width]" value="<?php echo $options['fr_sidebar_1_width']?>" style="width:40px;" /><?php _e('px Sidebar 1 Width', 'frugal'); ?><br />
	<input type="text" id="frugal[fr_sidebar_2_width]" name="frugal[fr_sidebar_2_width]" value="<?php echo $options['fr_sidebar_2_width']?>" style="width:40px;" /><?php _e('px Sidebar 2 Width', 'frugal'); ?></p>
</div>