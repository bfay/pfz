<?php
update_option('siteurl','http://www.pfz.dev');
update_option('home','http://www.pfz.dev');

define( 'DYNAMIK_ACTIVE', true );

/* Call Catalyst's core functions */
require_once( TEMPLATEPATH . '/lib/catalyse.php' );

/* Call Dynamik's functions */
if( file_exists( TEMPLATEPATH . '/lib/functions/catalyst-dynamik-functions.php' ) )
{
	require_once( TEMPLATEPATH . '/lib/functions/catalyst-dynamik-functions.php' );
}