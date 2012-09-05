<div class="portlet-header"><?php _e('Footer Layout/Design Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Add Text/Links To Footer', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Add any kind of Text/HTML to your footer via this text area. You can use the example HTML below and adjust it to your specific needs.', 'frugal'); ?>">[?]</a><br />
	<textarea id="frugal[fr_add_footer_text]" name="frugal[fr_add_footer_text]" style="width:100%; margin-bottom:5px;"><?php if ($options['fr_add_footer_text']) echo stripslashes($options['fr_add_footer_text']); ?></textarea><br />
	<b><?php _e('Example...', 'frugal'); ?></b></p>
	<p class="code_box"><code><textarea style="width:100%">&lt;a href=&quot;http://your-site.com/about&quot;&gt;About&lt;/a&gt; | &lt;a href=&quot;http://your-site.com/contact&quot;&gt;Contact&lt;/a&gt; | &lt;a href=&quot;http://your-site.com/terms&quot;&gt;Terms & Conditions&lt;/a&gt;</textarea></code></p>
	<p><?php _e('Footer Text Layout', 'frugal'); ?><br />
	<select id="frugal[fr_footer_text_layout]" name="frugal[fr_footer_text_layout]" size="1" style="width:200px; margin-right:5px;">
		<option value="Custom Text | frugal Link"<?php if ($options['fr_footer_text_layout'] == 'Custom Text | frugal Link') echo ' selected="selected"'; ?>><?php _e('Custom Text | frugal Link', 'frugal'); ?></option>
		<option value="frugal Link | Custom Text"<?php if ($options['fr_footer_text_layout'] == 'frugal Link | Custom Text') echo ' selected="selected"'; ?>><?php _e('frugal Link | Custom Text', 'frugal'); ?></option>
	</select><br />
	<?php _e('Display Copyright Info', 'frugal'); ?> <select id="frugal[fr_footer_copyright_display]" name="frugal[fr_footer_copyright_display]" size="1" style="width:55px;">
		<option value="Yes"<?php if ($options['fr_footer_copyright_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_footer_copyright_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><br />
	<?php _e('Display Admin Login Link', 'frugal'); ?> <select id="frugal[fr_footer_admin_display]" name="frugal[fr_footer_admin_display]" size="1" style="width:55px;">
		<option value="Yes"<?php if ($options['fr_footer_admin_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_footer_admin_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><br />
	<?php _e('Merge Copyright & Footer Link', 'frugal'); ?> <select id="frugal[fr_footer_content_combine]" name="frugal[fr_footer_content_combine]" size="1" style="width:55px;">
		<option value="No"<?php if ($options['fr_footer_content_combine'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_footer_content_combine'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select> <a class="tooltip" href="#" class="tooltip" title="<?php _e('NOTE: This will disable the \'Add Text/Links To Footer\' option as well as remove the footer \'Admin Login\' link.', 'frugal'); ?>">[?]</a></p>
</div>