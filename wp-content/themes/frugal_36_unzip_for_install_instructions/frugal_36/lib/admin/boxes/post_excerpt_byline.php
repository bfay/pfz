<div class="portlet-header"><?php _e('Post Excerpt Byline Content', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><b><?php _e('Content to display...', 'frugal'); ?></b></p>
	<p><?php _e('Author', 'frugal'); ?><select id="frugal[fr_feature_author_meta_display]" name="frugal[fr_feature_author_meta_display]" size="1" style="width:55px; margin-right:5px; margin-left:5px;">
		<option value="Yes"<?php if ($options['fr_feature_author_meta_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_feature_author_meta_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><?php _e('Date', 'frugal'); ?><select id="frugal[fr_feature_date_meta_display]" name="frugal[fr_feature_date_meta_display]" size="1" style="width:55px; margin-right:5px; margin-left:5px;">
		<option value="Yes"<?php if ($options['fr_feature_date_meta_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_feature_date_meta_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><br />
	<?php _e('Comment #', 'frugal'); ?><select id="frugal[fr_feature_comment_meta_display]" name="frugal[fr_feature_comment_meta_display]" size="1" style="width:55px; margin-right:5px; margin-left:5px;">
		<option value="Yes"<?php if ($options['fr_feature_comment_meta_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_feature_comment_meta_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><?php _e('Categories', 'frugal'); ?><select id="frugal[fr_feature_cat_meta_display]" name="frugal[fr_feature_cat_meta_display]" size="1" style="width:55px; margin-right:5px; margin-left:5px;">
		<option value="Yes"<?php if ($options['fr_feature_cat_meta_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_feature_cat_meta_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select><br />
	<?php _e('Text Before Author', 'frugal'); ?> <input type="text" id="frugal[fr_excerpt_byline_author_text]" name="frugal[fr_excerpt_byline_author_text]" value="<?php echo $options['fr_excerpt_byline_author_text']?>" style="width:160px;" /><br />
	<?php _e('Text Before Date', 'frugal'); ?> <input type="text" id="frugal[fr_excerpt_byline_date_text]" name="frugal[fr_excerpt_byline_date_text]" value="<?php echo $options['fr_excerpt_byline_date_text']?>" style="width:172px;" /><br />
	<?php _e('Text Before Categories', 'frugal'); ?> <input type="text" id="frugal[fr_excerpt_byline_cat_text]" name="frugal[fr_excerpt_byline_cat_text]" value="<?php echo $options['fr_excerpt_byline_cat_text']?>" style="width:133px;" /></p>
</div>