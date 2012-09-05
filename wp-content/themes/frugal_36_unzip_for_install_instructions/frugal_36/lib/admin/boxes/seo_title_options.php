<div class="portlet-header"><?php _e('SEO Title Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('Home Title Display', 'frugal'); ?><br /><input type="text" id="frugal[fr_home_title]" name="frugal[fr_home_title]" value="<?php echo $options['fr_home_title']?>" style="width:100%;" /></p>
	<p><?php _e('Post Title Display', 'frugal'); ?><br /><input type="text" id="frugal[fr_post_title]" name="frugal[fr_post_title]" value="<?php echo $options['fr_post_title']?>" style="width:100%;" /></p>
	<p><?php _e('Page Title Display', 'frugal'); ?><br /><input type="text" id="frugal[fr_page_title]" name="frugal[fr_page_title]" value="<?php echo $options['fr_page_title']?>" style="width:100%;" /></p>
	<p><?php _e('Category Title Display', 'frugal'); ?><br /><input type="text" id="frugal[fr_cat_title]" name="frugal[fr_cat_title]" value="<?php echo $options['fr_cat_title']?>" style="width:100%;" /></p>
	<p><?php _e('Tag Title Display', 'frugal'); ?><br /><input type="text" id="frugal[fr_tag_title]" name="frugal[fr_tag_title]" value="<?php echo $options['fr_tag_title']?>" style="width:100%;" /></p>
	<p><?php _e('Archive Title Display', 'frugal'); ?><br /><input type="text" id="frugal[fr_archive_title]" name="frugal[fr_archive_title]" value="<?php echo $options['fr_archive_title']?>" style="width:100%;" /></p>
	<p><?php _e('Search Title Display', 'frugal'); ?><br /><input type="text" id="frugal[fr_search_title]" name="frugal[fr_search_title]" value="<?php echo $options['fr_search_title']?>" style="width:100%;" /></p>
	<p><?php _e('Author Title Display', 'frugal'); ?><br /><input type="text" id="frugal[fr_author_title]" name="frugal[fr_author_title]" value="<?php echo $options['fr_author_title']?>" style="width:100%;" /></p>
	<p><?php _e('404 Title Display', 'frugal'); ?><br /><input type="text" id="frugal[fr_404_title]" name="frugal[fr_404_title]" value="<?php echo $options['fr_404_title']?>" style="width:100%;" /></p>
</div>