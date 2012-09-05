<?php
////////////////////////////////////////////////////////////////////////////////
// load text domain
////////////////////////////////////////////////////////////////////////////////
define(TEMPLATE_DOMAIN, 'product');

define('DEVLIB', TEMPLATEPATH . '/library');

function init_localization( $locale ) {
return "en_EN";
}
// Uncomment add_filter below to test your localization, make sure to enter the right language code.
// add_filter('locale','init_localization');

if( function_exists( 'load_theme_textdomain' ) ) {
load_theme_textdomain(TEMPLATE_DOMAIN, DEVLIB . '/languages/');
}

require_once(DEVLIB . '/functions/conditional-functions.php' );

if( $bp_existed == 'false' ) { 
	wp_enqueue_script("jquery");
}

/* Register the widget columns */
register_sidebar(array(
		'name' => 'homeleft-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
	)
);

register_sidebar(array(
		'name' => 'homemiddle-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
	)
);

if($bp_existed == 'true'){
register_sidebar(array(
		'name' => 'memberleft-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
	)
);

register_sidebar(array(
		'name' => 'membermiddle-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
	)
);
}

register_sidebar(array(
		'name' => 'blogleft-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
	)
);

register_sidebar(array(
		'name' => 'blogmiddle-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
	)
);

register_sidebar(array(
		'name' => 'pageleft-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
	)
);

register_sidebar(array(
		'name' => 'pagemiddle-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
	)
);

if($bp_existed != 'true'){
	register_sidebar(array(
			'name' => 'blogright-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h3 class="widgettitle">',
	        'after_title' => '</h3>'
		)
	);

	register_sidebar(array(
			'name' => 'pageright-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h3 class="widgettitle">',
	        'after_title' => '</h3>'
		)
	);

	register_sidebar(array(
			'name' => 'homeright-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h3 class="widgettitle">',
	        'after_title' => '</h3>'
		)
	);
}

//load buddypress default functions//
if($bp_existed == 'true') {
	require_once(DEVLIB . '/functions/bp-functions.php' );
}
require_once(DEVLIB . '/functions/custom-functions.php');
require_once(DEVLIB . '/functions/widget-functions.php');
require_once(DEVLIB . '/functions/option-functions.php');
require_once(DEVLIB . '/functions/loop-functions.php');
?>