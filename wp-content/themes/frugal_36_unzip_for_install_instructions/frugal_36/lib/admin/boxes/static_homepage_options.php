<div class="portlet-header"><?php _e('Static Homepage Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><select id="frugal[fr_homepage_display]" name="frugal[fr_homepage_display]" size="1" style="width:160px; margin-right:5px;">
		<option value="Do Not Display"<?php if ($options['fr_homepage_display'] == 'Do Not Display') echo ' selected="selected"'; ?>><?php _e('Do Not Display', 'frugal'); ?></option>
		<option value="Home Page"<?php if ($options['fr_homepage_display'] == 'Home Page') echo ' selected="selected"'; ?>><?php _e('Home Page', 'frugal'); ?></option>
		<option value="Blog Page Template"<?php if ($options['fr_homepage_display'] == 'Blog Page Template') echo ' selected="selected"'; ?>><?php _e('Blog Page Template', 'frugal'); ?></option>
	</select><?php _e('Display Location', 'frugal'); ?></p>
</div>