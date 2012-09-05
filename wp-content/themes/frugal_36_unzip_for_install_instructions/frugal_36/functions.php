<?php
	global $current_blog;
	
	$upload_options = get_option('frugal_upload_options');
	$feature_options = get_option('frugal_feature_options');

	$featuretopwidget = 'featuretopwidget feature_link';
	$featurebottomwidget = 'featurebottomwidget feature_link';
	$hometopwidget = 'hometopwidget ht_widget feature_link';
		if($feature_options['fr_home_top_layout'] == '1 Widget/Home Sidebar')
		{
			$hometopwidget_left = 'hometopleftwidget ht_widget feature_link';
		}
		else
		{
			$hometopwidget_left = $hometopwidget;
		}
	$homebottomwidget = 'homebottomwidget hb_widget feature_link';

	register_sidebar(array('name'=>'Sidebar 1','before_title'=>'<h3>','after_title'=>'</h3>'));
	register_sidebar(array('name'=>'Sidebar 2','before_title'=>'<h3>','after_title'=>'</h3>'));
	register_sidebar(array('name'=>'Home Sidebar','before_title'=>'<h3>','after_title'=>'</h3>'));
	register_sidebar(array('name'=>'CMS Page Sidebar 1','before_title'=>'<h3>','after_title'=>'</h3>'));
	register_sidebar(array('name'=>'CMS Page Sidebar 2','before_title'=>'<h3>','after_title'=>'</h3>'));
	register_sidebar(array('name'=>'Header Right Banner','before_title'=>'<h3>','after_title'=>'</h3>'));
	register_sidebar(array('name'=>'Single Post Banner','before_title'=>'<h3>','after_title'=>'</h3>'));
	register_sidebar(array('name'=>'Feature Top Left','before_widget' => '<div class="' . $featuretopwidget . '">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
	register_sidebar(array('name'=>'Feature Top Middle','before_widget' => '<div class="' . $featuretopwidget . '">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
	register_sidebar(array('name'=>'Feature Top Right','before_widget' => '<div class="' . $featuretopwidget . '">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
	register_sidebar(array('name'=>'Feature Bottom Left','before_widget' => '<div class="' . $featurebottomwidget . '">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
	register_sidebar(array('name'=>'Feature Bottom Middle','before_widget' => '<div class="' . $featurebottomwidget . '">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
	register_sidebar(array('name'=>'Feature Bottom Right','before_widget' => '<div class="' . $featurebottomwidget . '">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
	register_sidebar(array('name'=>'Home Top Left','before_widget' => '<div class="' . $hometopwidget_left . '">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
	register_sidebar(array('name'=>'Home Top Middle','before_widget' => '<div class="' . $hometopwidget . '">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
	register_sidebar(array('name'=>'Home Top Right','before_widget' => '<div class="' . $hometopwidget . '">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
	register_sidebar(array('name'=>'Home Bottom Left','before_widget' => '<div class="' . $homebottomwidget . '">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
	register_sidebar(array('name'=>'Home Bottom Middle','before_widget' => '<div class="' . $homebottomwidget . '">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
	register_sidebar(array('name'=>'Home Bottom Right','before_widget' => '<div class="' . $homebottomwidget . '">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>',));
	
	global $fr_multisite;
	if( function_exists('is_multisite') )
	{
		if( !is_multisite() )
		{
			$fr_multisite = false;
		}
		elseif( is_multisite() )
		{
			$fr_multisite = true;
		}
		else
		{
			$fr_multisite = false;
		}
	}
	else
	{
		$fr_multisite = false;
	}
	
	function frugal_css_head() {
	$upload_options = get_option('frugal_upload_options');
	$main_options = get_option('frugal_main_options');
	$custom_css_timestamp = filemtime(get_stylesheet_directory() . '/custom.css');
	
		echo '<link rel="stylesheet" href="' . get_bloginfo('stylesheet_url') . '" type="text/css" media="screen, projection" />' . "\n";
		
		if ($upload_options['fr_dynamic_stylesheet_format'] == "CSS")
		{
			echo '<link rel="stylesheet" href="' . get_bloginfo('template_directory') . '/lib/css/dynamic.css?' . get_option('frugal_css_timestamp') . '" type="text/css" media="screen, projection" />' . "\n";
		}
		else
		{
			echo '<link rel="stylesheet" href="' . get_bloginfo('template_directory') . '/lib/css/css.php?' . get_option('frugal_css_timestamp') . '" type="text/css" media="screen, projection" />' . "\n";
		}
		
		if ($main_options['fr_custom_stylesheet'] == 'Yes')
		{
			echo '<link rel="stylesheet" href="' . get_bloginfo('template_directory') . '/custom.css?' . $custom_css_timestamp . '" type="text/css" />' . "\n";
		}
	}
	
	function frugal_rss_link(){
	$main_options = get_option('frugal_main_options');
	
		if($main_options['fr_rss_link']) return $main_options['fr_rss_link'];
		return get_bloginfo('rss2_url');
	}
	
	function frugal_gzip(){
	$upload_options = get_option('frugal_upload_options');
	
		if ($upload_options['fr_gzip_active'] == 'Yes' && extension_loaded('zlib'))
		{
			ob_start('ob_gzhandler');
		}
	}
	
	function frugal_parse_php($content){
		ob_start();
		eval("?>$content<?php ");
		$parsed = ob_get_contents();
		ob_end_clean();
		return $parsed;
	}

	add_filter('comments_template', 'legacy_comments');
	function legacy_comments($file) {
		if(!function_exists('wp_list_comments'))
		{
			$file = TEMPLATEPATH . '/legacy.comments.php';
		}
		return $file;
	}
	
	function frugal_comment($comment, $args, $depth) {
	$main_options = get_option('frugal_main_options');
	$GLOBALS['comment'] = $comment;
	$avatar_size = $main_options['fr_avatar_size']; ?>
	
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo get_avatar($comment,$size='' . $avatar_size . ''); ?>
				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
			</div>
			
			<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.') ?></em>
				<br />
			<?php endif; ?>
	 
			<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" rel="nofollow"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
			<?php comment_text() ?>
				<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
	<?php }
	
	add_filter('widget_text', 'do_shortcode');
	
	function frugal_rss() {
	$main_options = get_option('frugal_main_options'); ?>
	<div><a href="<?php echo frugal_rss_link(); ?>" ><img style="vertical-align:text-top; display:inline;" src="<?php bloginfo('template_url'); ?>/images/rss.gif" alt="RSS" /></a> <?php echo $main_options['fr_navbar_right_subscribe_text']; ?> <a href="<?php echo frugal_rss_link(); ?>"><?php _e('RSS', 'frugal'); ?></a></div>
	<?php }
	add_shortcode('rss', 'frugal_rss');
	
	function frugal_rss_email() {
	$main_options = get_option('frugal_main_options'); ?>
	<div><a href="<?php echo frugal_rss_link(); ?>" ><img style="vertical-align:text-top; display:inline;" src="<?php bloginfo('template_url'); ?>/images/rss.gif" alt="RSS" /></a> <?php echo $main_options['fr_navbar_right_subscribe_text']; ?> <a href="<?php echo frugal_rss_link(); ?>"><?php _e('RSS', 'frugal'); ?></a> <?php _e('|', 'frugal'); ?> <a href="<?php echo $main_options['fr_email_link']; ?>"><?php _e('Email', 'frugal'); ?></a></div>
	<?php }
	add_shortcode('rss_email', 'frugal_rss_email');
	
	function frugal_twitter() {
	$main_options = get_option('frugal_main_options');
	echo '<div>' . $main_options['fr_navbar_right_twitter_text']; ?> <strong><a href="http://twitter.com/<?php echo $main_options['fr_twitter_id']; ?>"><?php _e('Twitter', 'frugal'); ?></a></strong></div>
	<?php }
	add_shortcode('twitter', 'frugal_twitter');
	
	function frugal_search() {
	$main_options = get_option('frugal_main_options');
	$search_box_text = $main_options['fr_search_box_text'];
		?><div><form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" value="<?php echo $search_box_text; ?>" name="s" id="searchbox" onfocus="if (this.value == '<?php echo $search_box_text; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo $search_box_text; ?>';}" /></form></div>
	<?php }
	add_shortcode('search', 'frugal_search');
	
	function frugal_create_uploads_dir() {
		global $fr_multisite;
		
		if (!is_dir(WP_CONTENT_DIR . '/uploads'))
		{
			mkdir(WP_CONTENT_DIR . '/uploads');
			@chmod(WP_CONTENT_DIR . '/uploads', 0755);
		}
		if (!is_dir(WP_CONTENT_DIR . '/uploads/frugal'))
		{
			mkdir(WP_CONTENT_DIR . '/uploads'.'/frugal');
			@chmod(WP_CONTENT_DIR . '/uploads'.'/frugal', 0755);
		}
		if( false == $fr_multisite )
		{
			if (!is_dir(WP_CONTENT_DIR . '/uploads'.'/frugal/adminthumbnails'))
			{
				mkdir(WP_CONTENT_DIR . '/uploads'.'/frugal/adminthumbnails');
				@chmod(WP_CONTENT_DIR . '/uploads'.'/frugal/adminthumbnails', 0755);
			}
		}
		elseif( true == $fr_multisite )
		{
			global $current_blog;
			$current_blog_id = $current_blog->blog_id;
			if( !is_dir( WP_CONTENT_DIR . '/uploads'.'/frugal/' . $current_blog_id ) )
			{
				mkdir(WP_CONTENT_DIR . '/uploads'.'/frugal/' . $current_blog_id);
				@chmod(WP_CONTENT_DIR . '/uploads'.'/frugal/' . $current_blog_id, 0755);
			}
			if (!is_dir(WP_CONTENT_DIR . '/uploads'.'/frugal/' . $current_blog_id . '/adminthumbnails'))
			{
				mkdir(WP_CONTENT_DIR . '/uploads'.'/frugal/' . $current_blog_id . '/adminthumbnails');
				@chmod(WP_CONTENT_DIR . '/uploads'.'/frugal/' . $current_blog_id . '/adminthumbnails', 0755);
			}			
		}
	}
		
	function frugal_upload_dir() {
		global $fr_multisite;
		$home = get_option('siteurl');
		if( false == $fr_multisite )
		{
			$upload_dir = $home . '/wp-content/uploads/frugal/';
		}
		elseif( true == $fr_multisite )
		{
			global $current_blog;
			$current_blog_id = $current_blog->blog_id;
			$upload_dir = $home . '/wp-content/uploads/frugal/' . $current_blog_id . '/';
		}
		return $upload_dir;
	}
			
	add_filter( 'avatar_defaults', 'newgravatar' );
	function newgravatar ($avatar_defaults) {
		$myavatar = frugal_upload_dir() . 'custom-avatar.jpg';
		$avatar_defaults[$myavatar] = "Custom Avatar";
		return $avatar_defaults;
	}
	
	if (get_option('frugal_memory_limit') == '64M')
	{
		if (WP_MEMORY_LIMIT == '32M')
		{
			if (!defined('FRUGAL_MEMORY_LIMIT'))
			{
				define('FRUGAL_MEMORY_LIMIT', '64M');
				if ( function_exists('memory_get_usage') && ( (int) @ini_get('memory_limit') < abs(intval(FRUGAL_MEMORY_LIMIT)) ) )
				{
					@ini_set('memory_limit', FRUGAL_MEMORY_LIMIT);
				}
			}
		}
	}
	
	$thumb_width = $feature_options['fr_thumb_width'];
	$thumb_height = $feature_options['fr_thumb_height'];
	
	if (function_exists('add_theme_support'))
	{
	add_theme_support('post-thumbnails');
		if ($feature_options['fr_thumb_type'] == "Resize")
		{
		set_post_thumbnail_size($thumb_width, $thumb_height);
		}
		else
		{
		set_post_thumbnail_size($thumb_width, $thumb_height, true);
		}
	//adds Wordpress 3.0 Custom Nav Menus Support
	add_theme_support( 'menus' );
	//adds Wordpress 3.0 Automatic Feed Links Support
	add_theme_support( 'automatic-feed-links' );
	}
	
	if ( function_exists('register_nav_menus') )
	{
		register_nav_menus(array(
			'primary' => __('Primary Navigation Menu', 'frugal'),
			'secondary' => __('Secondary Navigation Menu', 'frugal')
		));
	}

	define('FRUGAL_LIB', TEMPLATEPATH . '/lib');
	define('FRUGAL_ADMIN', FRUGAL_LIB . '/admin');
	define('FRUGAL_BOXES', FRUGAL_ADMIN . '/boxes');
	define('FRUGAL_FUNCTIONS', FRUGAL_LIB . '/functions');
	define('FRUGAL_CSS', FRUGAL_LIB . '/css');
	define('FRUGAL_CUSTOM', TEMPLATEPATH . '/custom');
	define('FRUGAL_UPLOADS', WP_CONTENT_DIR . '/uploads/frugal');
	define('FRUGAL_DYNAMIC_CSS', FRUGAL_CSS . '/dynamic.css');
	
	load_theme_textdomain('frugal', FRUGAL_LIB . '/languages');
	
	if ($upload_options['fr_dynamic_stylesheet_format'] == "CSS")
	{
		require_once(FRUGAL_CSS . '/dynamic_styles.php');
	}
	
	function frugal_dyn_css_writable() {
	$upload_options = get_option('frugal_upload_options');
	
		if (!is_writable(FRUGAL_DYNAMIC_CSS) && $upload_options['fr_dynamic_stylesheet_format'] == "CSS")
		{
		?>
			<p><?php _e('<strong>PLEASE NOTE...</strong> Your dynamic CSS stylesheet located in <code>frugal_[version #]/lib/css/dynamic.css</code> is not writable. To enjoy frugal\'s robust design options you must either make this file writable by chaning its file permission to 666 or change the \'Dynamic Stylesheet Format\' option to \'PHP\' in the', 'frugal'); ?> '<a href="<?php bloginfo('wpurl') ?>/wp-admin/admin.php?page=main_options.php"><?php _e('Main Options', 'frugal'); ?></a>' <?php _e('area.', 'frugal'); ?></p>
		<?php
		}
	}
		
	if( is_admin() )
	{
		require_once(FRUGAL_FUNCTIONS . '/frugal_defaults.php');
		require_once(FRUGAL_FUNCTIONS . '/frugal_menus_array.php');
		require_once(FRUGAL_ADMIN . '/set_options.php');
		require_once(FRUGAL_ADMIN . '/frugal_menu.php');
		require_once(FRUGAL_ADMIN . '/upload_options.php');
		require_once(FRUGAL_ADMIN . '/main_options.php');
		require_once(FRUGAL_ADMIN . '/feature_options.php');
		require_once(FRUGAL_ADMIN . '/header_design.php');
		require_once(FRUGAL_ADMIN . '/content_design.php');
		require_once(FRUGAL_ADMIN . '/feature_design.php');
		require_once(FRUGAL_ADMIN . '/image_uploader.php');
		
		require_once(FRUGAL_FUNCTIONS . '/frugal_data_importexport.php');
		require_once(FRUGAL_FUNCTIONS . '/frugal_menusave.php');
		require_once(FRUGAL_FUNCTIONS . '/frugal_build_admin_menus.php');
	}		

	require_once(FRUGAL_FUNCTIONS . '/frugal_hooks.php');
	require_once(FRUGAL_FUNCTIONS . '/frugal_content_classes.php');
	require_once(FRUGAL_FUNCTIONS . '/frugal_option_classes.php');
	require_once(FRUGAL_FUNCTIONS . '/frugal_header.php');
	require_once(FRUGAL_FUNCTIONS . '/frugal_navbar.php');
	require_once(FRUGAL_FUNCTIONS . '/frugal_home.php');
	require_once(FRUGAL_FUNCTIONS . '/frugal_feature.php');
	require_once(FRUGAL_FUNCTIONS . '/frugal_sidebars.php');
	require_once(FRUGAL_FUNCTIONS . '/frugal_footer.php');
	require_once(FRUGAL_FUNCTIONS . '/frugal_meta_box.php');
	require_once(FRUGAL_FUNCTIONS . '/frugal_custom.php');
	require_once(FRUGAL_FUNCTIONS . '/frugal_seo.php');
	require_once(FRUGAL_FUNCTIONS . '/frugal_crumbs.php');
	require_once(FRUGAL_FUNCTIONS . '/frugal_actions.php');

	if (file_exists(FRUGAL_CUSTOM . '/custom_functions.php'))
	{
		include(FRUGAL_CUSTOM . '/custom_functions.php');
	}
	
?>
