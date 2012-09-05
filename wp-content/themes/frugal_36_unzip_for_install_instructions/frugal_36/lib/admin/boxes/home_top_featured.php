<div class="portlet-header"><?php _e('Home Top Featured Content', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p style="font-size:10px;"><?php _e('Feature either a page, post or category on your static homepage. (requires use of the <b>Featured Content/Home Sidebar</b> option above)', 'frugal'); ?></p>
	<?php $ht_feature_show = $options['fr_ht_feature_show']; ?>
	<input type="radio" name="frugal[fr_ht_feature_show]" value="page" <?php if ($ht_feature_show == 'page') echo 'checked="checked" '; ?>/><label><?php _e('Display Featured Page', 'frugal'); ?></label><br />
	<input type="radio" name="frugal[fr_ht_feature_show]" value="category" <?php if ($ht_feature_show == 'category') echo 'checked="checked" '; ?>/><label><?php _e('Display Featured Category', 'frugal'); ?></label><br />
	<input type="radio" name="frugal[fr_ht_feature_show]" value="post_id" <?php if ($ht_feature_show == 'post_id') echo 'checked="checked" '; ?>/><label><?php _e('Display Featured Post', 'frugal'); ?></label><br />
	<input type="radio" name="frugal[fr_ht_feature_show]" value="latest_post" <?php if ($ht_feature_show == 'latest_post') echo 'checked="checked" '; ?>/><label><?php _e('Display Latest Post', 'frugal'); ?></label>
	<p><?php _e('Page To Display', 'frugal'); ?><br />
	<?php wp_dropdown_pages(array('selected' => $options['fr_ht_page_id'], 'name' => 'frugal[fr_ht_page_id]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?></p>
	<p><?php _e('Category To Display', 'frugal'); ?><br />
	<?php wp_dropdown_categories(array('selected' => $options['fr_ht_cat_id'], 'name' => 'frugal[fr_ht_cat_id]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?></p>
	<p><?php _e('Post To Display -- insert post ID -->', 'frugal'); ?> <input type="text" id="frugal[fr_ht_post_id]" name="frugal[fr_ht_post_id]" value="<?php echo $options['fr_ht_post_id']?>" style="width:40px;" /><br />
	<?php _e('Feature Post Layout', 'frugal'); ?> <select id="frugal[fr_ht_left_post_type]" name="frugal[fr_ht_left_post_type]" size="1" style="width:100px; margin-right:5px;">
		<option value="Full Content"<?php if ($options['fr_ht_left_post_type'] == 'Full Content') echo ' selected="selected"'; ?>><?php _e('Full Content', 'frugal'); ?></option>
		<option value="Excerpt"<?php if ($options['fr_ht_left_post_type'] == 'Excerpt') echo ' selected="selected"'; ?>><?php _e('Excerpt', 'frugal'); ?></option>
	</select><a class="tooltip" href="#" class="tooltip" title="<?php _e('Determines how much content is revealed in when using the Featured Content and the Display Latest Post options for your Home Top section of your Static Homepage.', 'frugal'); ?>">[?]</a><br />
	<?php _e('# of Latest/Category Posts To Display', 'frugal'); ?> <input type="text" id="frugal[fr_ht_left_post_number]" name="frugal[fr_ht_left_post_number]" value="<?php echo $options['fr_ht_left_post_number']?>" style="width:35px;" /></p>
</div>