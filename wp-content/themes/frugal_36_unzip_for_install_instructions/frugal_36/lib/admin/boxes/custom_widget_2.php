<div class="portlet-header"><?php _e('Custom Widget 2 Options', 'frugal'); ?> <code>[cw2]</code> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Copy this shortcode (ie. [cw2]) anywhere you want this custom widget to display. For example, if you want it to display in a page you can paste [cw2] anywhere in the page and it will display on that page. Requires \'Embed\' or \'Both\' Action to be selected.', 'frugal'); ?>">[?]</a></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Action', 'frugal'); ?> <select id="frugal[fr_cw2_action]" name="frugal[fr_cw2_action]" size="1" style="width:70px;">
		<option value="off"<?php if ($options['fr_cw2_action'] == 'off') echo ' selected="selected"'; ?>><?php _e('off', 'frugal'); ?></option>
		<option value="Hook"<?php if ($options['fr_cw2_action'] == 'Hook') echo ' selected="selected"'; ?>><?php _e('Hook', 'frugal'); ?></option>
		<option value="Embed"<?php if ($options['fr_cw2_action'] == 'Embed') echo ' selected="selected"'; ?>><?php _e('Embed', 'frugal'); ?></option>
		<option value="Both"<?php if ($options['fr_cw2_action'] == 'Both') echo ' selected="selected"'; ?>><?php _e('Both', 'frugal'); ?></option>
	</select> <a class="tooltip" href="#" class="tooltip" title="<?php _e('You can activate this custom widget by either choosing Hook (allows you to hook it into different parts of your site), Embed (using the shortcode you can embed this widget into specific posts and/or pages) or Both.', 'frugal'); ?>">[?]</a>
	<?php _e('Float', 'frugal'); ?> <select id="frugal[fr_cw2_float]" name="frugal[fr_cw2_float]" size="1" style="width:60px;">
		<option value="left"<?php if ($options['fr_cw2_float'] == 'left') echo ' selected="selected"'; ?>><?php _e('left', 'frugal'); ?></option>
		<option value="right"<?php if ($options['fr_cw2_float'] == 'right') echo ' selected="selected"'; ?>><?php _e('right', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Width', 'frugal'); ?> <input type="text" id="frugal[fr_cw2_width]" name="frugal[fr_cw2_width]" value="<?php echo $options['fr_cw2_width']?>" style="width:40px;" /><?php _e('px', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Leave \'Width\' blank for FULL width.', 'frugal'); ?>">[?]</a>
	<?php _e('Height', 'frugal'); ?> <input type="text" id="frugal[fr_cw2_height]" name="frugal[fr_cw2_height]" value="<?php echo $options['fr_cw2_height']?>" style="width:40px;" /><?php _e('px', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Leave \'Height\' blank for fluid height.', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Name', 'frugal'); ?> <input type="text" id="frugal[fr_cw2_name]" name="frugal[fr_cw2_name]" value="<?php echo $options['fr_cw2_name']?>" style="width:220px;" /></p>
	<p><?php _e('Margin', 'frugal'); ?> <input type="text" id="frugal[fr_cw2_top_margin]" name="frugal[fr_cw2_top_margin]" value="<?php echo $options['fr_cw2_top_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_cw2_right_margin]" name="frugal[fr_cw2_right_margin]" value="<?php echo $options['fr_cw2_right_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_cw2_bottom_margin]" name="frugal[fr_cw2_bottom_margin]" value="<?php echo $options['fr_cw2_bottom_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_cw2_left_margin]" name="frugal[fr_cw2_left_margin]" value="<?php echo $options['fr_cw2_left_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?><br >
	<?php _e('Padding', 'frugal'); ?> <input type="text" id="frugal[fr_cw2_top_padding]" name="frugal[fr_cw2_top_padding]" value="<?php echo $options['fr_cw2_top_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_cw2_right_padding]" name="frugal[fr_cw2_right_padding]" value="<?php echo $options['fr_cw2_right_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_cw2_bottom_padding]" name="frugal[fr_cw2_bottom_padding]" value="<?php echo $options['fr_cw2_bottom_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_cw2_left_padding]" name="frugal[fr_cw2_left_padding]" value="<?php echo $options['fr_cw2_left_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Location', 'frugal'); ?><select id="frugal[fr_cw2_hook]" name="frugal[fr_cw2_hook]" size="1" style="width:220px; margin-left:5px;">
	<?php $selected = (!$options['fr_cw2_hook']) ? ' selected="selected"' : '';
	foreach ($hook_list as $hook_key => $hook) {
		$selected = ($options['fr_cw2_hook'] == $hook_key) ? ' selected="selected"' : '';
		echo "<option" . $selected . " value=\"" . $hook_key . "\">" . $hook['name'] . "</option>\n";
	} ?></select></p>
</div>