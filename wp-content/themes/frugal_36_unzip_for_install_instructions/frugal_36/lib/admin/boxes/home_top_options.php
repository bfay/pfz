<div class="portlet-header"><?php _e('Home Top Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Homepage Top Feature Layout Options', 'frugal'); ?><select id="frugal[fr_home_top_layout]" name="frugal[fr_home_top_layout]" size="1" style="width:220px; margin-right:5px;">
		<option value="Widgets"<?php if ($options['fr_home_top_layout'] == 'Widgets') echo ' selected="selected"'; ?>><?php _e('Widgets', 'frugal'); ?></option>
		<option value="Latest Post Excerpts"<?php if ($options['fr_home_top_layout'] == 'Latest Post Excerpts') echo ' selected="selected"'; ?>><?php _e('Latest Post Excerpts', 'frugal'); ?></option>
		<option value="Category Post Excerpts"<?php if ($options['fr_home_top_layout'] == 'Category Post Excerpts') echo ' selected="selected"'; ?>><?php _e('Category Post Excerpts', 'frugal'); ?></option>
		<option value="Page Excerpts"<?php if ($options['fr_home_top_layout'] == 'Page Excerpts') echo ' selected="selected"'; ?>><?php _e('Page Excerpts', 'frugal'); ?></option>
		<option value="Featured Content/Home Sidebar"<?php if ($options['fr_home_top_layout'] == 'Featured Content/Home Sidebar') echo ' selected="selected"'; ?>><?php _e('Featured Content/Home Sidebar', 'frugal'); ?></option>
		<option value="Featured Content (Full Width)"<?php if ($options['fr_home_top_layout'] == 'Featured Content (Full Width)') echo ' selected="selected"'; ?>><?php _e('Featured Content (Full Width)', 'frugal'); ?></option>
		<option value="1 Widget/Home Sidebar"<?php if ($options['fr_home_top_layout'] == '1 Widget/Home Sidebar') echo ' selected="selected"'; ?>><?php _e('1 Widget/Home Sidebar', 'frugal'); ?></option>
	</select></p>
	<p class="gray_box"><b><?php _e('Home Sidebar Options...', 'frugal'); ?></b><br />
	<?php _e('Width', 'frugal'); ?> <input type="text" id="frugal[fr_sidebar_h_width]" name="frugal[fr_sidebar_h_width]" value="<?php echo $options['fr_sidebar_h_width']?>" style="width:40px;" /><?php _e('px', 'frugal'); ?>
	<?php _e('Float Location', 'frugal'); ?><select id="frugal[fr_home_sb_float]" name="frugal[fr_home_sb_float]" size="1" style="width:60px; margin-left:5px;">
		<option value="right"<?php if ($options['fr_home_sb_float'] == 'right') echo ' selected="selected"'; ?>><?php _e('right', 'frugal'); ?></option>
		<option value="left"<?php if ($options['fr_home_sb_float'] == 'left') echo ' selected="selected"'; ?>><?php _e('left', 'frugal'); ?></option>
	</select></p>
	<p><select id="frugal[fr_ht_widget_number]" name="frugal[fr_ht_widget_number]" size="1" style="width:55px; margin-right:5px;">
		<option value="3"<?php if ($options['fr_ht_widget_number'] == '3') echo ' selected="selected"'; ?>><?php _e('3', 'frugal'); ?></option>
		<option value="2"<?php if ($options['fr_ht_widget_number'] == '2') echo ' selected="selected"'; ?>><?php _e('2', 'frugal'); ?></option>
		<option value="1"<?php if ($options['fr_ht_widget_number'] == '1') echo ' selected="selected"'; ?>><?php _e('1', 'frugal'); ?></option>
	</select><?php _e('Number Of Home Top Widgets', 'frugal'); ?></p>
	<p><?php _e('Thumbnails In Home Excerpts', 'frugal'); ?> <select id="frugal[fr_home_thumbnails]" name="frugal[fr_home_thumbnails]" size="1" style="width:55px;">
		<option value="No"<?php if ($options['fr_home_thumbnails'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_home_thumbnails'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('This is your On/Off switch for thumbnail images when using the post excerpts on your Static Homeapge.', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Add URL To Activate \'View all posts\' Link For \'Featured Content/Home Sidebar\' Option', 'frugal'); ?><br />
	<input type="text" id="frugal[fr_home_view_posts_url]" name="frugal[fr_home_view_posts_url]" value="<?php echo $options['fr_home_view_posts_url']?>" style="width:100%;" /></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('(eg. A link to a \'blog\' or \'archive\' type page.)', 'frugal'); ?></p>
	<p><?php _e('Text', 'frugal'); ?> <input type="text" id="frugal[fr_home_view_posts_text]" name="frugal[fr_home_view_posts_text]" value="<?php echo $options['fr_home_view_posts_text']?>" style="width:255px;" /></p>
</div>