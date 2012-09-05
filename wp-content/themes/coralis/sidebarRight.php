<div id="sidebarRight" class="sidebar">
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(2) ) : ?>

	<h2>Topics</h2>  
		<ul>
			<?php wp_list_cats('sort_column=name&hierarchical=0'); ?>
    	</ul>
		<ul>
			<?php wp_list_bookmarks('arguments'); ?>
		</ul>
<?php endif; ?>
</div>