<div class="portlet-header"><?php _e('Custom Function 1', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Create your custom functions by adding code below |
	Execute PHP In This Code?', 'frugal'); ?> <select id="frugal[fr_cf1_code_php]" name="frugal[fr_cf1_code_php]" size="1" style="width:55px; margin-right:5px;">
		<option value="No"<?php if ($options['fr_cf1_code_php'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_cf1_code_php'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select></p>
	<p><textarea id="frugal[fr_cf1_code]" name="frugal[fr_cf1_code]" style="width:100%; height:269px;"><?php if ($options['fr_cf1_code']) echo stripslashes($options['fr_cf1_code']); ?></textarea></p>
	<p><?php _e('Hook your new function into a location', 'frugal'); ?><select id="frugal[fr_cf1_hook]" name="frugal[fr_cf1_hook]" size="1" style="width:220px; margin-left:5px;">
	<?php $selected = (!$options['fr_cf1_hook']) ? ' selected="selected"' : '';
	foreach ($hook_list as $hook_key => $hook) {
		$selected = ($options['fr_cf1_hook'] == $hook_key) ? ' selected="selected"' : '';
		echo "<option" . $selected . " value=\"" . $hook_key . "\">" . $hook['name'] . "</option>\n";
	} ?></select></p>
</div>