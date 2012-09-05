<div class="portlet-header"><?php _e('Home Bottom Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><select id="frugal[fr_display_home_bottom]" name="frugal[fr_display_home_bottom]" size="1" style="width:55px; margin-right:5px;">
		<option value="Yes"<?php if ($options['fr_display_home_bottom'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_display_home_bottom'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><?php _e('Display Home Bottom Section', 'frugal'); ?></p>
	<p><?php _e('Homepage Bottom Feature Layout Options', 'frugal'); ?><select id="frugal[fr_home_bottom_layout]" name="frugal[fr_home_bottom_layout]" size="1" style="width:220px; margin-right:5px;">
		<option value="Widgets"<?php if ($options['fr_home_bottom_layout'] == 'Widgets') echo ' selected="selected"'; ?>><?php _e('Widgets', 'frugal'); ?></option>
		<option value="Latest Post Excerpts"<?php if ($options['fr_home_bottom_layout'] == 'Latest Post Excerpts') echo ' selected="selected"'; ?>><?php _e('Latest Post Excerpts', 'frugal'); ?></option>
		<option value="Category Post Excerpts"<?php if ($options['fr_home_bottom_layout'] == 'Category Post Excerpts') echo ' selected="selected"'; ?>><?php _e('Category Post Excerpts', 'frugal'); ?></option>
		<option value="Page Excerpts"<?php if ($options['fr_home_bottom_layout'] == 'Page Excerpts') echo ' selected="selected"'; ?>><?php _e('Page Excerpts', 'frugal'); ?></option>
		<option value="Excerpt Post List"<?php if ($options['fr_home_bottom_layout'] == 'Excerpt Post List') echo ' selected="selected"'; ?>><?php _e('Excerpt Post List', 'frugal'); ?></option>
	</select> <a class="tooltip" href="#" class="tooltip" title="<?php _e('The \'Excerpt Post List\' option requires that you select the \'Featured Content/Home Sidebar\' option above for your Home Top Layout.', 'frugal'); ?>">[?]</a></p>
	<p><select id="frugal[fr_hb_widget_number]" name="frugal[fr_hb_widget_number]" size="1" style="width:55px; margin-right:5px;">
		<option value="3"<?php if ($options['fr_hb_widget_number'] == '3') echo ' selected="selected"'; ?>>3</option>
		<option value="2"<?php if ($options['fr_hb_widget_number'] == '2') echo ' selected="selected"'; ?>>2</option>
		<option value="1"<?php if ($options['fr_hb_widget_number'] == '1') echo ' selected="selected"'; ?>>1</option>
	</select><?php _e('Number Of Home Bottom Widgets', 'frugal'); ?></p>
	<p><?php _e('# of List Posts To Display', 'frugal'); ?> <input type="text" id="frugal[fr_hb_list_post_number]" name="frugal[fr_hb_list_post_number]" value="<?php echo $options['fr_hb_list_post_number']?>" style="width:35px;" /> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Referring to the \'Homepage Bottom Feature Layout Options\' \'Excerpt Post List\'.', 'frugal'); ?>">[?]</a></p>
</div>