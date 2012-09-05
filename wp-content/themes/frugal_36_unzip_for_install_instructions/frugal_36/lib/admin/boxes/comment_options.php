<div class="portlet-header"><?php _e('Comment Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Comment Display Location', 'frugal'); ?><br />
	<select id="frugal[fr_comment_display_location]" name="frugal[fr_comment_display_location]" size="1" style="width:150px;">
		<option value="Posts"<?php if ($options['fr_comment_display_location'] == 'Posts') echo ' selected="selected"'; ?>><?php _e('Posts', 'frugal'); ?></option>
		<option value="Pages"<?php if ($options['fr_comment_display_location'] == 'Pages') echo ' selected="selected"'; ?>><?php _e('Pages', 'frugal'); ?></option>
		<option value="Posts AND Pages"<?php if ($options['fr_comment_display_location'] == 'Posts AND Pages') echo ' selected="selected"'; ?>><?php _e('Posts AND Pages', 'frugal'); ?></option>
		<option value="Remove Comments"<?php if ($options['fr_comment_display_location'] == 'Remove Comments') echo ' selected="selected"'; ?>><?php _e('Remove Comments', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Trackbacks', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Determine whether or not to display post trackbacks in your comments section.', 'frugal'); ?>">[?]</a><select id="frugal[fr_trackbacks_active]" name="frugal[fr_trackbacks_active]" size="1" style="width:55px; margin-left:5px; margin-right:5px;">
		<option value="No"<?php if ($options['fr_trackbacks_active'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_trackbacks_active'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><?php _e('Avatar Size', 'frugal'); ?> <input type="text" id="frugal[fr_avatar_size]" name="frugal[fr_avatar_size]" value="<?php echo $options['fr_avatar_size']?>" style="width:35px; margin-left:5px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Text Above Comment Box', 'frugal'); ?><br />
	<input type="text" id="frugal[fr_text_above_comment_box]" name="frugal[fr_text_above_comment_box]" value="<?php echo $options['fr_text_above_comment_box']?>" style="width:100%;" /></p>
	<p><?php _e('Submit Button Text', 'frugal'); ?> <input type="text" id="frugal[fr_comment_sub_text]" name="frugal[fr_comment_sub_text]" value="<?php echo $options['fr_comment_sub_text']?>" style="width:160px;" /></p>
</div>