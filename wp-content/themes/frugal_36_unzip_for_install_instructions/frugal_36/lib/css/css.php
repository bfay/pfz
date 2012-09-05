<?php
/** Add Expires headers to the stylesheets so your content will be cached
by browsers, reducing server load and increasing speed of the site. **/
$path_to_wpconfig = substr(dirname(__FILE__), 0, strpos(dirname(__FILE__), "wp-content"));

require($path_to_wpconfig . 'wp-config.php'); 

header("Content-type: text/css");

// seconds, minutes, hours, days
$expires = 60*60*24*30;
header("Pragma: public");
header("Cache-Control: maxage=".$expires);
header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');

include 'dynamic_styles.php';