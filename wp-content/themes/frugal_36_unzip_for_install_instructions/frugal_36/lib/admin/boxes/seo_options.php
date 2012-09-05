<div class="portlet-header"><?php _e('SEO Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><b><?php _e('Placement of <code>&lt;h1&gt;</code> Tags On Homepage:', 'frugal'); ?></b></p>
	<p class="light_gray_box" style="margin-top:-10px;">
		<input type="radio" name="frugal[fr_h1_tag_placement]" value="h1_wrap_title" <?php if ($options['fr_h1_tag_placement'] == 'h1_wrap_title') echo 'checked="checked" '; ?>/><label><?php _e('Wrap Title With H1\'s', 'frugal'); ?></label><br />
		<input type="radio" name="frugal[fr_h1_tag_placement]" value="h1_wrap_tagline" <?php if ($options['fr_h1_tag_placement'] == 'h1_wrap_tagline' || empty($options['fr_h1_tag_placement']) ) echo 'checked="checked" '; ?>/><label><?php _e('Wrap Tagline With H1\'s', 'frugal'); ?></label><br />
		<input type="radio" name="frugal[fr_h1_tag_placement]" value="h1_wrap_neither" <?php if ($options['fr_h1_tag_placement'] == 'h1_wrap_neither') echo 'checked="checked" '; ?>/><label><?php _e('Neither: Let Me Do It Myself', 'frugal'); ?></label>
	</p>
	<p><?php _e('Homepage Meta Description', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Add a meta description to your homepage.', 'frugal'); ?>">[?]</a><br />
	<textarea id="frugal[fr_home_description]" name="frugal[fr_home_description]" style="width:100%;"><?php if ($options['fr_home_description']) echo stripslashes($options['fr_home_description']); ?></textarea></p>
	<p><?php _e('Homepage Meta Keywords', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Add meta keywords to your homepage. (Comma separated...eg... blogging, design, seo)', 'frugal'); ?>">[?]</a><br />
	<textarea id="frugal[fr_home_keywords]" name="frugal[fr_home_keywords]" style="width:100%;"><?php if ($options['fr_home_keywords']) echo stripslashes($options['fr_home_keywords']); ?></textarea></p>
	<p><select id="frugal[fr_cat_meta]" name="frugal[fr_cat_meta]" size="1" style="width:55px; margin-right:5px;">
		<option value="Yes"<?php if ($options['fr_cat_meta'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_cat_meta'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><?php _e('Categories As Meta', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Use categories as meta keywords in posts.', 'frugal'); ?>">[?]</a><br />
	<select id="frugal[fr_tag_meta]" name="frugal[fr_tag_meta]" size="1" style="width:55px; margin-right:5px;">
		<option value="Yes"<?php if ($options['fr_tag_meta'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_tag_meta'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><?php _e('Tags As Meta', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Use tags as meta keywords in posts.', 'frugal'); ?>">[?]</a><br />
	<select id="frugal[fr_canonical]" name="frugal[fr_canonical]" size="1" style="width:55px; margin-right:5px;">
		<option value="Yes"<?php if ($options['fr_canonical'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_canonical'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><?php _e('Canonical URLs', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Canonicalization is the process of picking the best url when there are several choices. This can help inform search engines of the proper URL to index when they crawl your site.', 'frugal'); ?>">[?]</a></p>
	<p><b><?php _e('Enable In-Post/In-Page SEO...', 'frugal'); ?></b> <a class="tooltip" href="#" class="tooltip" title="<?php _e('I\'ve add this option to disable these SEO options in case you are already using an SEO plugin that you\'d prefer to use for In-Post/In-Page SEO.', 'frugal'); ?>">[?]</a></p>
	<p><select id="frugal[fr_post_seo1_active]" name="frugal[fr_post_seo1_active]" size="1" style="width:55px; margin-right:5px;">
		<option value="Yes"<?php if ($options['fr_post_seo1_active'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_post_seo1_active'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><?php _e('In-Post/Page SEO 1', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Title-Description-Keyword options.', 'frugal'); ?>">[?]</a><br />
	<select id="frugal[fr_post_seo2_active]" name="frugal[fr_post_seo2_active]" size="1" style="width:55px; margin-right:5px;">
		<option value="Yes"<?php if ($options['fr_post_seo2_active'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_post_seo2_active'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><?php _e('In-Post/Page SEO 2', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Noindex-Nofollow options.', 'frugal'); ?>">[?]</a></p>
	<p><b><?php _e('Noindex...', 'frugal'); ?></b></p>
	<p><select id="frugal[fr_noindex_archives]" name="frugal[fr_noindex_archives]" size="1" style="width:55px; margin-right:5px;">
		<option value="No"<?php if ($options['fr_noindex_archives'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_noindex_archives'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><?php _e('Noindex Archive Pages', 'frugal'); ?></p><p style="margin-top:-10px; font-size:10px;"></p>
	<p><select id="frugal[fr_noindex_cats]" name="frugal[fr_noindex_cats]" size="1" style="width:55px; margin-right:5px;">
		<option value="No"<?php if ($options['fr_noindex_cats'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_noindex_cats'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><?php _e('Noindex Category Pages', 'frugal'); ?></p><p style="margin-top:-10px; font-size:10px;"></p>
	<p><select id="frugal[fr_noindex_tags]" name="frugal[fr_noindex_tags]" size="1" style="width:55px; margin-right:5px;">
		<option value="No"<?php if ($options['fr_noindex_tags'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_noindex_tags'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><?php _e('Noindex Tag Pages', 'frugal'); ?></p><p style="margin-top:-10px; font-size:10px;"></p>
	<p><select id="frugal[fr_noindex_author]" name="frugal[fr_noindex_author]" size="1" style="width:55px; margin-right:5px;">
		<option value="No"<?php if ($options['fr_noindex_author'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_noindex_author'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><?php _e('Noindex Author Pages', 'frugal'); ?></p>
	<p><b><?php _e('Nofollow...', 'frugal'); ?></b></p>
	<p><select id="frugal[fr_nofollow_home]" name="frugal[fr_nofollow_home]" size="1" style="width:55px; margin-right:5px;">
		<option value="Yes"<?php if ($options['fr_nofollow_home'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_nofollow_home'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><?php _e('Nofollow Homepage Link', 'frugal'); ?></p><p style="margin-top:-10px; font-size:10px;"></p>
	<p><select id="frugal[fr_nofollow_comment_author]" name="frugal[fr_nofollow_comment_author]" size="1" style="width:55px; margin-right:5px;">
		<option value="Yes"<?php if ($options['fr_nofollow_comment_author'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_nofollow_comment_author'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><?php _e('Nofollow Comment Author Links', 'frugal'); ?></p>
</div>