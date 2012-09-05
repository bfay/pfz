<?php
$feature_options = get_option('frugal_feature_options');

//** Custom Widget 1 **//

function frugal_custom_widget_1() {
$feature_options = get_option('frugal_feature_options');
$cw1_name = $feature_options['fr_cw1_name'];
	echo '<div id="custom_widget_1" >' . "\n";
							
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('' . $cw1_name . ''))
		{
			echo '<div class="customwidget1">' . "\n";	
				echo '<h2>' . __('Custom Widget 1', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
			echo '</div>' . "\n";
		}

	echo '</div>' . "\n";
}

if ($feature_options['fr_cw1_action'] == "Embed" || $feature_options['fr_cw1_action'] == "Both")
{
	add_shortcode('cw1', 'frugal_custom_widget_1');
}

$cw1_hook = $feature_options['fr_cw1_hook'];
$cw1_name = $feature_options['fr_cw1_name'];

if ($feature_options['fr_cw1_action'] == "Hook" || $feature_options['fr_cw1_action'] == "Both")
{
	add_action('' . $cw1_hook . '', 'frugal_custom_widget_1');
}

if ( function_exists('register_sidebars') && $feature_options['fr_cw1_action'] != "off" )
{
	register_sidebar(array('name'=>'' . $cw1_name . '','before_widget' => '<div class="customwidget1">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
}

//** Custom Widget 2 **//
	
function frugal_custom_widget_2() {
$feature_options = get_option('frugal_feature_options');
$cw2_name = $feature_options['fr_cw2_name'];
	echo '<div id="custom_widget_2" >' . "\n";
							
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('' . $cw2_name . ''))
		{
			echo '<div class="customwidget2">' . "\n";	
				echo '<h2>' . __('Custom Widget 2', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
			echo '</div>' . "\n";
		}

	echo '</div>' . "\n";
}

if ($feature_options['fr_cw2_action'] == "Embed" || $feature_options['fr_cw2_action'] == "Both")
{
	add_shortcode('cw2', 'frugal_custom_widget_2');
}

$cw2_hook = $feature_options['fr_cw2_hook'];
$cw2_name = $feature_options['fr_cw2_name'];

if ($feature_options['fr_cw2_action'] == "Hook" || $feature_options['fr_cw2_action'] == "Both")
{
	add_action('' . $cw2_hook . '', 'frugal_custom_widget_2');
}

if ( function_exists('register_sidebars') && $feature_options['fr_cw2_action'] != "off" )
{
	register_sidebar(array('name'=>'' . $cw2_name . '','before_widget' => '<div class="customwidget2">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
}
	
//** Custom Widget 3 **//
	
function frugal_custom_widget_3() {
$feature_options = get_option('frugal_feature_options');
$cw3_name = $feature_options['fr_cw3_name'];
	echo '<div id="custom_widget_3" >' . "\n";
							
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('' . $cw3_name . ''))
		{
			echo '<div class="customwidget3">' . "\n";	
				echo '<h2>' . __('Custom Widget 3', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
			echo '</div>' . "\n";
		}

	echo '</div>' . "\n";
}

if ($feature_options['fr_cw3_action'] == "Embed" || $feature_options['fr_cw3_action'] == "Both")
{
	add_shortcode('cw3', 'frugal_custom_widget_3');
}

$cw3_hook = $feature_options['fr_cw3_hook'];
$cw3_name = $feature_options['fr_cw3_name'];

if ($feature_options['fr_cw3_action'] == "Hook" || $feature_options['fr_cw3_action'] == "Both")
{
	add_action('' . $cw3_hook . '', 'frugal_custom_widget_3');
}

if ( function_exists('register_sidebars') && $feature_options['fr_cw3_action'] != "off" )
{
	register_sidebar(array('name'=>'' . $cw3_name . '','before_widget' => '<div class="customwidget3">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
}
	
//** Custom Widget 4 **//
	
function frugal_custom_widget_4() {
$feature_options = get_option('frugal_feature_options');
$cw4_name = $feature_options['fr_cw4_name'];
	echo '<div id="custom_widget_4" >' . "\n";
							
		if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('' . $cw4_name . ''))
		{
			echo '<div class="customwidget4">' . "\n";	
				echo '<h2>' . __('Custom Widget 4', 'frugal') . '</h2>' . "\n";
				echo '<p>' . __('Use these areas to feature your content. Each featured area is widget ready so you can easily add any sort of widget capable content. Images may also be added to these featured areas to help maximize the spotlight you put on your home page content.', 'frugal') . '</p>' . "\n";
			echo '</div>' . "\n";
		}

	echo '</div>' . "\n";
}

if ($feature_options['fr_cw4_action'] == "Embed" || $feature_options['fr_cw4_action'] == "Both")
{
	add_shortcode('cw4', 'frugal_custom_widget_4');
}

$cw4_hook = $feature_options['fr_cw4_hook'];
$cw4_name = $feature_options['fr_cw4_name'];

if ($feature_options['fr_cw4_action'] == "Hook" || $feature_options['fr_cw4_action'] == "Both")
{
	add_action('' . $cw4_hook . '', 'frugal_custom_widget_4');
}

if ( function_exists('register_sidebars') && $feature_options['fr_cw4_action'] != "off" )
{
	register_sidebar(array('name'=>'' . $cw4_name . '','before_widget' => '<div class="customwidget4">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
}

//** Custom Function 1 **//
	
$cf1_hook = $feature_options['fr_cf1_hook'];
function frugal_custom_function_1() {
$feature_options = get_option('frugal_feature_options');
$val = stripslashes($feature_options['fr_cf1_code']);
	if ($feature_options['fr_cf1_code_php'] == "Yes")
	{
		ob_start();
		eval("?>$val<?php ");
		$val = ob_get_contents();
		ob_end_clean();
	}
	echo $val;
}
add_action('' . $cf1_hook . '', 'frugal_custom_function_1');

//** Custom Function 2 **//

$cf2_hook = $feature_options['fr_cf2_hook'];
function frugal_custom_function_2() {
$feature_options = get_option('frugal_feature_options');
$val = stripslashes($feature_options['fr_cf2_code']);
	if ($feature_options['fr_cf2_code_php'] == "Yes")
	{
		ob_start();
		eval("?>$val<?php ");
		$val = ob_get_contents();
		ob_end_clean();
	}
	echo $val;
}
add_action('' . $cf2_hook . '', 'frugal_custom_function_2');