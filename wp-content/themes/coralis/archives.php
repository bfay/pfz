<?php

?>

<?php get_header(); ?>


    <div id="content">

    <h1>Browse the Archives</h1>
    <div class="post">
    <p>By Date:</p>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
    	<p>By Category:</p>
    	<ul>
    		<?php list_cats(); ?>
    	</ul>
    </div>
	</div>
<?php include (TEMPLATEPATH . '/sidebarLeft.php'); ?>
<?php include (TEMPLATEPATH . '/sidebarRight.php'); ?>	
	
<?php get_footer(); ?>
</div><!--/Wrapper-->
<div id="footershadow"></div>
</div><!--/Container--></body>
</html>