<div class="portlet-header"><?php _e('Cat/Navbar Right Options Text', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<h3></h3>
	<p><?php _e('Navbar Right Subscribe Text', 'frugal'); ?><br />
	<input type="text" id="frugal[fr_navbar_right_subscribe_text]" name="frugal[fr_navbar_right_subscribe_text]" value="<?php echo $options['fr_navbar_right_subscribe_text']?>" style="width:100%;" /></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('Text that precedes the navbar right Subscribe link.', 'frugal'); ?></p>
	<p><?php _e('Navbar Right Twitter Text', 'frugal'); ?><br />
	<input type="text" id="frugal[fr_navbar_right_twitter_text]" name="frugal[fr_navbar_right_twitter_text]" value="<?php echo $options['fr_navbar_right_twitter_text']?>" style="width:100%;" /></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('Text that precedes the navbar right Twitter link.', 'frugal'); ?></p>
	<p><?php _e('Navbar Right Text', 'frugal'); ?><br />
	<textarea id="frugal[fr_navbar_right_text]" name="frugal[fr_navbar_right_text]" style="width:100%;"><?php if ($options['fr_navbar_right_text']) echo stripslashes($options['fr_navbar_right_text']); ?></textarea></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('When using the \'Text\' Navbar Right Layout option.', 'frugal'); ?></p>
	<p><?php _e('CatNav Right Text', 'frugal'); ?><br />
	<textarea id="frugal[fr_subnavbar_right_text]" name="frugal[fr_subnavbar_right_text]" style="width:100%;"><?php if ($options['fr_subnavbar_right_text']) echo stripslashes($options['fr_subnavbar_right_text']); ?></textarea></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('When using the \'Text\' CatNav Right Layout option.', 'frugal'); ?></p>
	<p><b><?php _e('Search Shortcode:</b> <code>[search]</code>', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Copy this shortcode (ie. [search]) anywhere you want your Search Box displayed. For example, if you want it to display in your sidebar you can paste [search] into a \'Text\' widet and it will display in that location of your sidebar (you can do this in any widget area as well).', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Search Box Text', 'frugal'); ?><br />
	<input type="text" id="frugal[fr_search_box_text]" name="frugal[fr_search_box_text]" value="<?php echo $options['fr_search_box_text']?>" style="width:100%;" /></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('Displays inside the Navbar Right Search box.', 'frugal'); ?></p>
</div>