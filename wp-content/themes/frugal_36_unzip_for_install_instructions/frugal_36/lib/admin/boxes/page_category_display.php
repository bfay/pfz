<div class="portlet-header"><?php _e('Page/Category Display Control', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('\'Home\' Tab Text', 'frugal'); ?>
	<input type="text" id="frugal[fr_home_tab_text]" name="frugal[fr_home_tab_text]" value="<?php echo $options['fr_home_tab_text']?>" style="width:180px;" /></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('Delete text to remove the home link from navbar.', 'frugal'); ?></p>
	<p><?php _e('Exclude Pages From Navbar', 'frugal'); ?><br />
	<input type="text" id="frugal[fr_exclude_pages]" name="frugal[fr_exclude_pages]" value="<?php echo $options['fr_exclude_pages']?>" style="width:100%;" /></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('Add page ID\'s to exclude pages from Navbar. (Comma separated, no spaces. e.g. 55,67,91)', 'frugal'); ?></p>
	<p><?php _e('Remove Specific Page Items', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Use the code example below to remove the visibility of different items on specified pages.', 'frugal'); ?>">[?]</a><br />
	<textarea id="frugal[fr_remove_page_titles]" name="frugal[fr_remove_page_titles]" style="width:100%;"><?php if ($options['fr_remove_page_titles']) echo stripslashes($options['fr_remove_page_titles']); ?></textarea></p>
	<p><b><?php _e('Example...', 'frugal'); ?></b> <a class="tooltip" href="#" class="tooltip" title="<?php _e('If used in the above text box, the code examples below will remove different items from specified pages. For example... body.home #home h2.post_title, body.pageid-7 #content h1 ...will remove the page titles from the homepage and page with the ID of 7. Remove \'body.home #home h2.post_title,\' to display the home page title, and adjust the page IDs as needed... body.pageid-16 #header_wrap, body.pageid-16 #navbar_wrap, body.pageid-16 #footer_wrap ...will remove the Header, Navbar and Footer areas on a page with an ID of 16. So a simple landing page is easily achievable. Ad/remove/adjust as many instances as you\'d like. Note the comma separation, but no closing comma.', 'frugal'); ?>">[?]</a></p>
	<p class="code_box3"><code><textarea style="width:100%">body.home #home h2.post_title, body.pageid-7 #content h1, body.pageid-16 #header_wrap, body.pageid-16 #navbar_wrap, body.pageid-16 #footer_wrap</textarea></code></p>
	<p><?php $pages = get_pages('orderby=ID&hide_empty=0');
	echo '<strong>Page IDs/Names</strong> <a class="tooltip" href="#" class="tooltip" title="' . __("Below you will find a list of your Wordpress Pages and their corresponding IDs. This information is useful when you need to add a Page ID to a frugal option for such things as Page Exclusion and Page Title Removal.", 'frugal') . '">[?]</a><br />'; 
		foreach($pages as $page) { 
			echo $page->ID . ' = ' . $page->post_name . '<br />'; 
		} ?>
	</p>
	<p><?php _e('Exclude Categories From Category Navbar', 'frugal'); ?><br />
	<input type="text" id="frugal[fr_exclude_subnav_pages]" name="frugal[fr_exclude_subnav_pages]" value="<?php echo $options['fr_exclude_subnav_pages']?>" style="width:100%;" /></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('Add page ID\'s to exclude pages from Cat-Navbar. (Comma separated, no spaces. e.g. 55,67,91)', 'frugal'); ?></p>
	<p><?php $cats = get_categories('orderby=ID&hide_empty=0');
	echo '<strong>Category IDs/Names</strong> <a class="tooltip" href="#" class="tooltip" title="' . __("Below you will find a list of your Wordpress Categories and their corresponding IDs. This information is useful when you need to add a Category ID to the frugal option that excludes specific Categories from your Category Navbar.", 'frugal') . '">[?]</a><br />'; 
		foreach($cats as $category) { 
			echo $category->cat_ID . ' = ' . $category->cat_name . '<br />'; 
		} ?>
	</p>
</div>