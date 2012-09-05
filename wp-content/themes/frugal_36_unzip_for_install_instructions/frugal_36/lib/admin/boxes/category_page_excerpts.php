<div class="portlet-header"><?php _e('Category/Page Excerpts', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p style="font-size:10px;"><?php _e('Choose which categories and/or page to feature in your static homepage excerpts. (requires use of the <b>Category Post Excerpts</b> or <b>Page Excerpts</b> option above)', 'frugal'); ?></p>
	<p><b><?php _e('Home Top...', 'frugal'); ?></b></p>
	<p><?php wp_dropdown_categories(array('selected' => $options['fr_ht_left_cat'], 'name' => 'frugal[fr_ht_left_cat]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?> <?php _e('Left', 'frugal'); ?><br />
	<?php wp_dropdown_categories(array('selected' => $options['fr_ht_middle_cat'], 'name' => 'frugal[fr_ht_middle_cat]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?> <?php _e('Middle', 'frugal'); ?><br />
	<?php wp_dropdown_categories(array('selected' => $options['fr_ht_right_cat'], 'name' => 'frugal[fr_ht_right_cat]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?> <?php _e('Right', 'frugal'); ?></p>
	<p><?php wp_dropdown_pages(array('selected' => $options['fr_ht_left_page'], 'name' => 'frugal[fr_ht_left_page]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?> <?php _e('Left', 'frugal'); ?><br />
	<?php wp_dropdown_pages(array('selected' => $options['fr_ht_middle_page'], 'name' => 'frugal[fr_ht_middle_page]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?> <?php _e('Middle', 'frugal'); ?><br />
	<?php wp_dropdown_pages(array('selected' => $options['fr_ht_right_page'], 'name' => 'frugal[fr_ht_right_page]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?> <?php _e('Right', 'frugal'); ?></p>
	<p><b><?php _e('Home Bottom...', 'frugal'); ?></b></p>
	<p><?php wp_dropdown_categories(array('selected' => $options['fr_hb_left_cat'], 'name' => 'frugal[fr_hb_left_cat]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?> <?php _e('Left', 'frugal'); ?><br />
	<?php wp_dropdown_categories(array('selected' => $options['fr_hb_middle_cat'], 'name' => 'frugal[fr_hb_middle_cat]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?> <?php _e('Middle', 'frugal'); ?><br />
	<?php wp_dropdown_categories(array('selected' => $options['fr_hb_right_cat'], 'name' => 'frugal[fr_hb_right_cat]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?> <?php _e('Right', 'frugal'); ?></p>
	<p><?php wp_dropdown_pages(array('selected' => $options['fr_hb_left_page'], 'name' => 'frugal[fr_hb_left_page]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?> <?php _e('Left', 'frugal'); ?><br />
	<?php wp_dropdown_pages(array('selected' => $options['fr_hb_middle_page'], 'name' => 'frugal[fr_hb_middle_page]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?> <?php _e('Middle', 'frugal'); ?><br />
	<?php wp_dropdown_pages(array('selected' => $options['fr_hb_right_page'], 'name' => 'frugal[fr_hb_right_page]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?> <?php _e('Right', 'frugal'); ?></p>
</div>