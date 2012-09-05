<?php
function frugal_menusave()
{	
	$this_page = $_POST['this_page'];
	$positions = $_POST['positions'];
	
	$positions = substr($positions, 0, -3);
	$portlet_data = explode(':|:', $positions);
	foreach($portlet_data as $portlet)
	{
		$portlet_stuff = explode(':::', $portlet);
		$portlets[$portlet_stuff[0]][$portlet_stuff[1]] = array( 'name' => $portlet_stuff[2], 'visible' => $portlet_stuff[3] );
	}
	
	
	update_option('fr_' . $this_page .'_menus', $portlets);
	
	$blap = get_option('fr_mo_menus');
	
	
	echo "<pre>";
	print_r($blap);
	echo "</pre>";
	exit();
	
	
	
}

add_action('wp_ajax_frugal_menusave', 'frugal_menusave');
?>