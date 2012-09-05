<div class="portlet-header"><?php _e('Feature Box Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Display', 'frugal'); ?> <select id="frugal[fr_fbox_display]" name="frugal[fr_fbox_display]" size="1" style="width:75px;">
		<option value="off"<?php if ($options['fr_fbox_display'] == 'off') echo ' selected="selected"'; ?>><?php _e('off', 'frugal'); ?></option>
		<option value="Inside"<?php if ($options['fr_fbox_display'] == 'Inside') echo ' selected="selected"'; ?>><?php _e('Inside', 'frugal'); ?></option>
		<option value="Outside"<?php if ($options['fr_fbox_display'] == 'Outside') echo ' selected="selected"'; ?>><?php _e('Outside', 'frugal'); ?></option>
	</select> <?php _e('sidebar wrap', 'frugal'); ?></p>
	<p><?php _e('Video/Image/Ad Embed', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To embed a video, image or ad in the feature box above the sidebar section, add the ebmed code or html here.', 'frugal'); ?>">[?]</a><br />
	<textarea id="frugal[fr_fb_video_embed]" name="frugal[fr_fb_video_embed]" style="width:100%; margin-bottom:5px;"><?php if ($options['fr_fb_video_embed']) echo stripslashes($options['fr_fb_video_embed']); ?></textarea><br />
	<b><?php _e('Image Embed Example...', 'frugal'); ?></b></p>
	<p class="code_box2"><code><textarea style="width:100%">&lt;a href=&quot;http://website.com/link-to-somewhere/&quot;&gt;&lt;img src=&quot;http://website.com/link-to-your-image.jpg&quot; width=400px &gt;&lt;/a&gt;</textarea></code></p>
	<p><?php _e('Text Title', 'frugal'); ?><br />
	<input type="text" id="frugal[fr_fb_text_title]" name="frugal[fr_fb_text_title]" value="<?php echo $options['fr_fb_text_title']?>" style="width:100%;" /></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('Displays a text title inside the feature box.', 'frugal'); ?></p>
	<p><?php _e('Add HTML or Plain Text', 'frugal'); ?><br />
	<textarea id="frugal[fr_fb_text]" name="frugal[fr_fb_text]" style="width:100%;"><?php if ($options['fr_fb_text']) echo stripslashes($options['fr_fb_text']); ?></textarea></p>
	<h4><?php _e('Home Feature Box Options', 'frugal'); ?></h4>
	<p><?php _e('Display', 'frugal'); ?> <select id="frugal[fr_home_fb_display]" name="frugal[fr_home_fb_display]" size="1" style="width:90px;">
		<option value="off"<?php if ($options['fr_home_fb_display'] == 'off') echo ' selected="selected"'; ?>><?php _e('off', 'frugal'); ?></option>
		<option value="Inside"<?php if ($options['fr_home_fb_display'] == 'Inside') echo ' selected="selected"'; ?>><?php _e('Inside', 'frugal'); ?></option>
		<option value="Outside"<?php if ($options['fr_home_fb_display'] == 'Outside') echo ' selected="selected"'; ?>><?php _e('Outside', 'frugal'); ?></option>
		<option value="Full Screen"<?php if ($options['fr_home_fb_display'] == 'Full Screen') echo ' selected="selected"'; ?>><?php _e('Full Screen', 'frugal'); ?></option>
	</select> <?php _e('home sidebar wrap', 'frugal'); ?><a class="tooltip" href="#" class="tooltip" title="<?php _e('When set to \'Full Screen\' the Home Feature Box will display in place of the Home Top Left widget. So for the Home Feature Box to display in Full Screen mode you must also choose \'Widgets\' for your \'Homepage Top Feature Layout Options\' as well as select \'1\' for the amount of Hometop Widgets to display.', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Video/Image/Ad Embed', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To embed a video, image or ad in the home feature box above the sidebar section, add the ebmed code or html here.', 'frugal'); ?>">[?]</a><br />
	<textarea id="frugal[fr_home_fb_video_embed]" name="frugal[fr_home_fb_video_embed]" style="width:100%;"><?php if ($options['fr_home_fb_video_embed']) echo stripslashes($options['fr_home_fb_video_embed']); ?></textarea></p>
	<p><?php _e('Text Title', 'frugal'); ?><br />
	<input type="text" id="frugal[fr_home_fb_text_title]" name="frugal[fr_home_fb_text_title]" value="<?php echo $options['fr_home_fb_text_title']?>" style="width:100%;" /></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('Displays a text title inside the home feature box.', 'frugal'); ?></p>
	<p><?php _e('Add HTML or Plain Text', 'frugal'); ?><br />
	<textarea id="frugal[fr_home_fb_text]" name="frugal[fr_home_fb_text]" style="width:100%;"><?php if ($options['fr_home_fb_text']) echo stripslashes($options['fr_home_fb_text']); ?></textarea></p>
</div>