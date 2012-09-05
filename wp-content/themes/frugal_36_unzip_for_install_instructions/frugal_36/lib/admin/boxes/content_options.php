<div class="portlet-header"><?php _e('Content Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><select id="frugal[fr_custom_stylesheet]" name="frugal[fr_custom_stylesheet]" size="1" style="width:55px; margin-right:5px;">
		<option value="No"<?php if ($options['fr_custom_stylesheet'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_custom_stylesheet'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><?php _e('Activate Custom Stylesheet', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Your custom stylesheet (custom.css) is located in the root of your frugal theme directory and therefore can be edited via the built-in Wordpress Editor. These styles override all other site styles.', 'frugal'); ?>">[?]</a></p>
	<p><select id="frugal[fr_breadcrumbs_active]" name="frugal[fr_breadcrumbs_active]" size="1" style="width:55px; margin-right:5px;">
		<option value="No"<?php if ($options['fr_breadcrumbs_active'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_breadcrumbs_active'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><?php _e('Activate Breadcrumbs', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('These are breadcrumb links which display just above post and page titles.', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Archive Content Layout', 'frugal'); ?> <select id="frugal[fr_archive_type]" name="frugal[fr_archive_type]" size="1" style="width:100px; margin-right:5px;">
		<option value="Excerpt"<?php if ($options['fr_archive_type'] == 'Excerpt') echo ' selected="selected"'; ?>><?php _e('Excerpt', 'frugal'); ?></option>
		<option value="Full Content"<?php if ($options['fr_archive_type'] == 'Full Content') echo ' selected="selected"'; ?>><?php _e('Full Content', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('Determines how much content is revealed in archived pages such as Categories, Tags, etc..', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Thumbnails In Archive Excerpts', 'frugal'); ?> <select id="frugal[fr_archive_thumbnails]" name="frugal[fr_archive_thumbnails]" size="1" style="width:55px;">
		<option value="No"<?php if ($options['fr_archive_thumbnails'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_archive_thumbnails'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('This only applies when using the \'Excerpt\' option for Archive content.', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Blog Content Layout', 'frugal'); ?> <select id="frugal[fr_blog_archive_type]" name="frugal[fr_blog_archive_type]" size="1" style="width:100px; margin-right:5px;">
		<option value="Excerpt"<?php if ($options['fr_blog_archive_type'] == 'Excerpt') echo ' selected="selected"'; ?>><?php _e('Excerpt', 'frugal'); ?></option>
		<option value="Full Content"<?php if ($options['fr_blog_archive_type'] == 'Full Content') echo ' selected="selected"'; ?>><?php _e('Full Content', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('Determines how much content is revealed when using the Blog Page Template.', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Thumbnails In Blog Excerpts', 'frugal'); ?> <select id="frugal[fr_blog_thumbnails]" name="frugal[fr_blog_thumbnails]" size="1" style="width:55px;">
		<option value="No"<?php if ($options['fr_blog_thumbnails'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
		<option value="Yes"<?php if ($options['fr_blog_thumbnails'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('This only applies when using the \'Excerpt\' option for Blog Page content.', 'frugal'); ?>">[?]</a></p>
	<p><b><?php _e('Post Byline Meta Content to display...', 'frugal'); ?></b> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Decide what you want displayed in your byline area of your posts.', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Author', 'frugal'); ?><select id="frugal[fr_author_meta_display]" name="frugal[fr_author_meta_display]" size="1" style="width:55px; margin-right:5px; margin-left:5px;">
		<option value="Yes"<?php if ($options['fr_author_meta_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_author_meta_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><?php _e('Date', 'frugal'); ?><select id="frugal[fr_date_meta_display]" name="frugal[fr_date_meta_display]" size="1" style="width:55px; margin-right:5px; margin-left:5px;">
		<option value="Yes"<?php if ($options['fr_date_meta_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_date_meta_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><br />
	<?php _e('Comment #', 'frugal'); ?><select id="frugal[fr_comment_meta_display]" name="frugal[fr_comment_meta_display]" size="1" style="width:55px; margin-right:5px; margin-left:5px;">
		<option value="Yes"<?php if ($options['fr_comment_meta_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_comment_meta_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><?php _e('Categories', 'frugal'); ?><select id="frugal[fr_cat_meta_display]" name="frugal[fr_cat_meta_display]" size="1" style="width:55px; margin-right:5px; margin-left:5px;">
		<option value="Yes"<?php if ($options['fr_cat_meta_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_cat_meta_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><br />
	<?php _e('Comment # Below Posts', 'frugal'); ?><select id="frugal[fr_bottom_comment_meta_display]" name="frugal[fr_bottom_comment_meta_display]" size="1" style="width:55px; margin-left:5px;">
		<option value="Yes"<?php if ($options['fr_bottom_comment_meta_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_bottom_comment_meta_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Comment Text Below Posts', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This text only displays when there are zero comments.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_zero_comments_text]" name="frugal[fr_zero_comments_text]" value="<?php echo $options['fr_zero_comments_text']?>" style="width:100%;" /></p>
	<p><?php _e('Read More Text', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Covers every instance of Read More text.', 'frugal'); ?>">[?]</a>
	<input type="text" id="frugal[fr_read_more_text]" name="frugal[fr_read_more_text]" value="<?php echo $options['fr_read_more_text']?>" style="width:160px;" /></p>
	<p>
	<?php _e('Tags Below Single Posts', 'frugal'); ?><select id="frugal[fr_tag_meta_display]" name="frugal[fr_tag_meta_display]" size="1" style="width:55px; margin-left:5px;">
		<option value="Yes"<?php if ($options['fr_tag_meta_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_tag_meta_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><br />
	<?php _e('Text Before Author', 'frugal'); ?> <input type="text" id="frugal[fr_byline_author_text]" name="frugal[fr_byline_author_text]" value="<?php echo $options['fr_byline_author_text']?>" style="width:153px;" /><br />
	<?php _e('Text Before Date', 'frugal'); ?> <input type="text" id="frugal[fr_byline_date_text]" name="frugal[fr_byline_date_text]" value="<?php echo $options['fr_byline_date_text']?>" style="width:166px;" /><br />
	<?php _e('Text Before Categories', 'frugal'); ?> <input type="text" id="frugal[fr_byline_cat_text]" name="frugal[fr_byline_cat_text]" value="<?php echo $options['fr_byline_cat_text']?>" style="width:127px;" />
	<b><?php _e('Byline Top Margin', 'frugal'); ?></b> <input type="text" id="frugal[fr_byline_top_margin]" name="frugal[fr_byline_top_margin]" value="<?php echo $options['fr_byline_top_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This setting allows you to increase or decrease the space between your post\'s title and the byline. The reason it\'s a margin setting and not a padding setting is because I use a negative number to push it up closer to the title in spite of the title\'s line-height. If this were a padding setting the negative number would not work.', 'frugal'); ?>">[?]</a><br />
	<b><?php _e('Byline Bottom Padding', 'frugal'); ?></b> <input type="text" id="frugal[fr_byline_bottom_padding]" name="frugal[fr_byline_bottom_padding]" value="<?php echo $options['fr_byline_bottom_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This setting allows you to increase or decrease the space between your post\'s title/byline area and the beginning of your content.', 'frugal'); ?>">[?]</a></p>
</div>