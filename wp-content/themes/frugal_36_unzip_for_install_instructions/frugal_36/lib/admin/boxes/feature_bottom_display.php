<div class="portlet-header"><?php _e('Feature Bottom Display Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><b><?php _e('Which Pages to display feature bottom...', 'frugal'); ?></b></p>
	<p><select id="frugal[fr_fb_display_hp]" name="frugal[fr_fb_display_hp]" size="1" style="width:55px; margin-right:5px;">
		<option value="No"<?php if ($options['fr_fb_display_hp'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_fb_display_hp'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><?php _e('Static Homepage', 'frugal'); ?><br />
	<select id="frugal[fr_fb_display_blog]" name="frugal[fr_fb_display_blog]" size="1" style="width:55px; margin-right:5px;">
		<option value="No"<?php if ($options['fr_fb_display_blog'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_fb_display_blog'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><?php _e('Posts & Pages', 'frugal'); ?><br />
	<select id="frugal[fr_fb_display_cms]" name="frugal[fr_fb_display_cms]" size="1" style="width:55px; margin-right:5px;">
		<option value="No"<?php if ($options['fr_fb_display_cms'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_fb_display_cms'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><?php _e('CMS Page Template', 'frugal'); ?><br />
	<select id="frugal[fr_fb_widget_number]" name="frugal[fr_fb_widget_number]" size="1" style="width:55px; margin-right:5px;">
		<option value="3"<?php if ($options['fr_fb_widget_number'] == '3') echo ' selected="selected"'; ?>><?php _e('3', 'frugal'); ?></option>
		<option value="2"<?php if ($options['fr_fb_widget_number'] == '2') echo ' selected="selected"'; ?>><?php _e('2', 'frugal'); ?></option>
		<option value="1"<?php if ($options['fr_fb_widget_number'] == '1') echo ' selected="selected"'; ?>><?php _e('1', 'frugal'); ?></option>
	</select><?php _e('Number Of Feature Bottom Widgets', 'frugal'); ?></p>
</div>