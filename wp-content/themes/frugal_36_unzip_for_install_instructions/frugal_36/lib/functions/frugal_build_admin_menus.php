<?php

function frugal_build_admin_menus( $page, $options, $font_list = 'none', $hook_list = 'none' )
{

	$portlets = get_option('fr_' . $page . '_menus')
?>

	<div class="column" id="lftcol">
	<?php
	if( isset($portlets['lftcol']) )
	{
		foreach($portlets['lftcol'] as $portlet)
		{ ?>
			<div class="portlet" id="<?php echo $portlet['name']; ?>">
				<?php require_once( FRUGAL_BOXES . '/' . $portlet['name'] . '.php' ); ?>
			</div>
	<?php
		}
	}
	?>	
	</div>
	<div class="column" id="midcol">
	<?php
	if( isset($portlets['midcol']) )
	{
		foreach($portlets['midcol'] as $portlet)
		{ ?>
			<div class="portlet" id="<?php echo $portlet['name']; ?>">
				<?php require_once( FRUGAL_BOXES . '/' . $portlet['name'] . '.php' ); ?>
			</div>
	<?php
		}
	}
	?>	
	</div>
	<div class="column" id="rgtcol">
	<?php
	if( isset($portlets['rgtcol']) )
	{
		foreach($portlets['rgtcol'] as $portlet)
		{ ?>
			<div class="portlet" id="<?php echo $portlet['name']; ?>">
				<?php require_once( FRUGAL_BOXES . '/' . $portlet['name'] . '.php' ); ?>
			</div>
	<?php
		}
	}
	?>	
	</div>

<?php
}
?>