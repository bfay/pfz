<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php if (is_single() || is_page() || is_archive()) { ?><?php wp_title('',true); ?> | <?php } ?><?php bloginfo('name'); ?></title>
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css" media="all" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>

<body>
<div id="container">
<div id="header-shadow"></div>
<div id="wrapper">

    <div id="header">
	
<h1 class="blogtitle"> <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
<a href="<?php bloginfo('rss2_url'); ?>" class="rssicon" title="RSS"></a>
<h3 class="slogantext"><?php bloginfo('description'); ?></h3>
    </div>
    <ul id="NaviBar">
		<li><a <?php if (is_page('home')) echo('class="current" '); ?>href="<?php bloginfo('url'); ?>/">Home</a></li>
        <?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>      
    </ul>