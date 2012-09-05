<?php

if ( ! function_exists( 'showcase_setup' ) ):
function showcase_setup() {

	add_theme_support('menus');

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'showcase', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
	) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
	
}
endif;

showcase_setup();

function showcase_pages()
{
  $my_page['post_title'] = 'Portfolio';
  $my_page['post_content'] = '';
  $my_page['post_name'] = 'portfolio';
  $my_page['post_type'] = 'page';
  $my_page['post_status'] = 'publish';
  $my_page['post_author'] = 1;

  wp_insert_post( $my_page );
}
global $pagenow;
if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
	$page = get_page_by_title('Portfolio', 'ARRAY_A');

	if( ! $page )
	{
		showcase_pages();
	}
}
$themename = "showcase";  
$shortname = "wd";

$categories = get_categories('hide_empty=0&orderby=name');  
$wp_cats = array();  
foreach ($categories as $category_list ) {  
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;  
}  
array_unshift($wp_cats, "Choose a category");

$tween_types = array("linear","easeInSine","easeOutSine", "easeInOutSine", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeOutInCubic", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeOutInQuint", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeOutInCirc", "easeInBack", "easeOutBack", "easeInOutBack", "easeOutInBack", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeOutInQuad", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeOutInQuart", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeOutInExpo", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeOutInElastic", "easeInBounce", "easeOutBounce", "easeInOutBounce", "easeOutInBounce");

$options = array (  
  
array( "name" => $themename." Options",  
    "type" => "title"),  

array( "name" => "General",  
    "type" => "section"),  
array( "type" => "open"),  
  
array( "name" => "Logo type",  
    "desc" => "Select the logo type you'd like to display",  
    "id" => $shortname."_logo_type",  
    "type" => "select",  
    "options" => array("Image", "Text"),  
    "std" => "Image"),  
  
array( "name" => "Logo Image",  
    "desc" => "Enter the link to your logo image (leave blank if you chose text)",  
    "id" => $shortname."_logo_image",  
    "type" => "text",  
    "std" => ""),  

array( "name" => "Logo Text",  
    "desc" => "Enter the text of your logo(leave blank if you chose image)",  
    "id" => $shortname."_logo_text",  
    "type" => "text",  
    "std" => ""),  
array( "name" => "Logo Text Color",  
    "desc" => "Enter the color of the text of your logo(leave blank if you chose image)",  
    "id" => $shortname."_logo_text_color",  
    "type" => "color",  
    "std" => ""),  

array( "name" => "Logo Text Link",  
    "desc" => "Enter the link of the text of your logo(leave blank if you chose image)",  
    "id" => $shortname."_logo_text_link",  
    "type" => "text",  
    "std" => ""),  

array( "name" => "Color Scheme",  
    "desc" => "Select the colour scheme for the theme",  
    "id" => $shortname."_color_scheme",  
    "type" => "select",  
    "options" => array("Dark", "Aqua", "Red"),  
    "std" => "Image"),  
  
array( "name" => "Custom CSS",  
    "desc" => "Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}",  
    "id" => $shortname."_custom_css",  
    "type" => "textarea",  
    "std" => ""),          

array( "name" => "Image replacer",  
"desc" => "Enter the image URL which will replace the 3D slider if the user has no flash.",  
"id" => $shortname."_no_flash",  
"type" => "text",  
),  

array( "name" => "Custom Favicon",  
    "desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",  
    "id" => $shortname."_favicon",  
    "type" => "text",  
    "std" => get_bloginfo('url') ."/favicon.ico"),
  
array( "type" => "close"),  

array( "name" => "Footer",  
    "type" => "section"),  
array( "type" => "open"),  
  
array( "name" => "Footer copyright text",  
    "desc" => "Enter text used in the right side of the footer. It can be HTML",  
    "id" => $shortname."_footer_text",  
    "type" => "textarea",  
    "std" => ""),  
  
array( "name" => "Google Analytics Code",  
    "desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",  
    "id" => $shortname."_ga_code",  
    "type" => "textarea",  
    "std" => ""),      

array( "type" => "close"),
  
array( "name" => "3D Slider Options",  
"type" => "section"),  
array( "type" => "open"),  

array( "name" => "Slider width",  
"desc" => "The width of the slider in px.",  
"id" => $shortname."_width",  
"type" => "text",  
"std" => "940"), 

array( "name" => "Slider height",  
"desc" => "The height of the slider in px. (Maximum 500px)",  
"id" => $shortname."_height",  
"type" => "text",  
"std" => "400"),  
  
array( "name" => "Segments",  
"desc" => "Number of segments in which the image will be sliced.",  
"id" => $shortname."_segments",  
"type" => "text",  
"std" => "9"),  
  
array( "name" => "Tween Time",  
"desc" => "Number of seconds for each element to be turned.",  
"id" => $shortname."_tween_time",  
"type" => "text",  
"std" => "3"),  
  
array( "name" => "Tween Delay",  
"desc" => "Number of seconds from one element starting to turn to the next element starting.",  
"id" => $shortname."_tween_delay",  
"type" => "text",  
"std" => "0.1"),  
  
array( "name" => "Tween Type",  
"desc" => "Type of animation transition.",  
"id" => $shortname."_tween_type",  
"type" => "select",  
"options" => $tween_types,  
"std" => "Choose a category"),  
  
array( "name" => "Z Distance",  
"desc" => "to which extend are the cubes moved on z axis when being tweened. Negative values bring the cube closer to the camera, positive values take it further away. A good range is roughly between -200 and 700.",  
"id" => $shortname."_z_distance",  
"type" => "text",  
"std" => "25"),  
  
array( "name" => "Expand",  
"desc" => "To which etxend are the cubes moved away from each other when tweening.",  
"id" => $shortname."_expand",  
"type" => "text",  
"std" => "9"),  
  
array( "name" => "Inner Color",  
"desc" => "Color of the sides of the elements in hex values (e.g. 0x000000 for black)",  
"id" => $shortname."_inner_color",  
"type" => "text",  
"std" => "0x000000"),  
  
array( "name" => "Text Background Color",  
"desc" => "Color of the description text background in hex values (e.g. 0xFF0000 for red)",  
"id" => $shortname."_text_background",  
"type" => "text",  
"std" => "0x666666"),  
  
array( "name" => "Text Distance",  
"desc" => "Distance of the info text to the borders of its background.",  
"id" => $shortname."_text_distance",  
"type" => "text",  
"std" => "25"),  
  
array( "name" => "Shadow Darkness",  
"desc" => "To which extend are the sides shadowed, when the elements are tweening and the sided move towards the background. 100 is black, 0 is no darkening.",  
"id" => $shortname."_shadow_darkness",  
"type" => "text",  
"std" => "25"),  
array( "name" => "Auto Play",  
"desc" => "Number of seconds to the next image when autoplay is on. Set 0, if you don't want autoplay.",  
"id" => $shortname."_autoplay",  
"type" => "text",  
"std" => "2"),  

array( "type" => "close"),

array( "name" => "3D Slider Images",  
"type" => "section"),  
array( "type" => "open"),  
  
array( "name" => "Image 1",  
"desc" => "Background image of the first slide. MUST BE IN THE IMAGES FOLDER. DO NOT FILL IN THE FULL PATH.",  
"id" => $shortname."_image1",  
"type" => "text",  
"std" => "image1.jpg"),

array( "name" => "Image 1 Title",  
"desc" => "The title of the first slide.",  
"id" => $shortname."_t_image1",  
"type" => "text",  
"std" => ""),
array( "name" => "Image 1 Description",  
"desc" => "Description of the first slide.",  
"id" => $shortname."_d_image1",  
"type" => "textarea",  
"std" => ""),

array( "name" => "Image 2",  
"desc" => "Background image of the 2nd slide. MUST BE IN THE IMAGES FOLDER. DO NOT FILL IN THE FULL PATH.",  
"id" => $shortname."_image2",  
"type" => "text",  
"std" => "image2.jpg"),

array( "name" => "Image 2 Title",  
"desc" => "The title of the 2nd slide.",  
"id" => $shortname."_t_image2",  
"type" => "text",  
"std" => ""),
array( "name" => "Image 2 Description",  
"desc" => "Description of the 2nd slide.",  
"id" => $shortname."_d_image2",  
"type" => "textarea",  
"std" => ""),

array( "name" => "Image 3",  
"desc" => "Background image of the 3rd slide. MUST BE IN THE IMAGES FOLDER. DO NOT FILL IN THE FULL PATH.",  
"id" => $shortname."_image3",  
"type" => "text",  
"std" => "image3.jpg"),

array( "name" => "Image 3 Title",  
"desc" => "The title of the 3rd slide.",  
"id" => $shortname."_t_image3",  
"type" => "text",  
"std" => ""),
array( "name" => "Image 3 Description",  
"desc" => "Description of the 3rd slide.",  
"id" => $shortname."_d_image3",  
"type" => "textarea",  
"std" => ""),

array( "name" => "Image 4",  
"desc" => "Background image of the 4th slide. MUST BE IN THE IMAGES FOLDER. DO NOT FILL IN THE FULL PATH.",  
"id" => $shortname."_image4",  
"type" => "text",  
"std" => "image4.jpg"),

array( "name" => "Image 4 Title",  
"desc" => "The title of the 4th slide.",  
"id" => $shortname."_t_image4",  
"type" => "text",  
"std" => ""),
array( "name" => "Image 4 Description",  
"desc" => "Description of the 4th slide.",  
"id" => $shortname."_d_image4",  
"type" => "textarea",  
"std" => ""),

array( "name" => "Image 5",  
"desc" => "Background image of the 5th slide. MUST BE IN THE IMAGES FOLDER. DO NOT FILL IN THE FULL PATH.",  
"id" => $shortname."_image5",  
"type" => "text",  
"std" => "image5.jpg"),

array( "name" => "Image 5 Title",  
"desc" => "The title of the 5th slide.",  
"id" => $shortname."_t_image5",  
"type" => "text",  
"std" => ""),
array( "name" => "Image 5 Description",  
"desc" => "Description of the 5th slide.",  
"id" => $shortname."_d_image5",  
"type" => "textarea",  
"std" => ""),

array( "name" => "Image 6",  
"desc" => "Background image of the 6th slide. MUST BE IN THE IMAGES FOLDER. DO NOT FILL IN THE FULL PATH.",  
"id" => $shortname."_image6",  
"type" => "text",  
"std" => "image6.jpg"),

array( "name" => "Image 6 Title",  
"desc" => "The title of the 6th slide.",  
"id" => $shortname."_t_image6",  
"type" => "text",  
"std" => ""),
array( "name" => "Image 6 Description",  
"desc" => "Description of the 6th slide.",  
"id" => $shortname."_d_image6",  
"type" => "textarea",  
"std" => ""),
  
array( "type" => "close")
  
);  


function mytheme_add_admin() {  
  
global $themename, $shortname, $options;  
  
if ( $_GET['page'] == basename(__FILE__) ) {  
  
    if ( 'save' == $_REQUEST['action'] ) {  
  
        foreach ($options as $value) {  
        update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }  
  
foreach ($options as $value) {  
    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }  
  
    header("Location: admin.php?page=functions.php&saved=true");  
die;  
  
}  
else if( 'reset' == $_REQUEST['action'] ) {  
  
    foreach ($options as $value) {  
        delete_option( $value['id'] ); }  
  
    header("Location: admin.php?page=functions.php&reset=true");  
die;  
  
}  
}  
  
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');  
}  
  
function mytheme_add_init() {  
$file_dir=get_bloginfo('template_directory');  
wp_enqueue_style("functions", $file_dir."/library/functions/functions.css", false, "1.0", "all"); 
wp_enqueue_script("rm_script", $file_dir."/library/functions/rm_script.js", false, "1.0");
wp_enqueue_script("jscolor", $file_dir."/library/colorpicker/jscolor.js", false, "1.0");
}
function mytheme_admin() {  
  
global $themename, $shortname, $options;  
$i=0;  
  
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';  
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';  
  
?>  
<div class="wrap rm_wrap">  
<h2><?php echo $themename; ?> Settings</h2>  
  
<div class="rm_opts">  
<form method="post"> 
<?php foreach ($options as $value) {  
switch ( $value['type'] ) {  
  
case "open":  
?>  
  
<?php break;  
  
case "close":  
?>  
  
</div>  
</div>  
<br />  
  
<?php break;  
  
case "title":  
?>  
<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>  
  
<?php break;  
  
case 'text':  
?>  
  
<div class="rm_input rm_text">  
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />  
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>  
  
 </div>  
<?php  
break;  

case 'color':
?>
<div class="rm_input rm_text">  
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" class="color" />  
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>  
  
 </div>  
 <?php
break;
  
case 'textarea':  
?>  
  
<div class="rm_input rm_textarea">  
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
    <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>  
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>  
  
 </div>  
  
<?php  
break;  
  
case 'select':  
?>  
  
<div class="rm_input rm_select">  
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
  
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">  
<?php foreach ($value['options'] as $option) { ?>  
        <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>  
</select>  
  
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>  
</div>  
<?php  
break;  
  
case "checkbox":  
?>  
  
<div class="rm_input rm_checkbox">  
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
  
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>  
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />  
  
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>  
 </div>  
<?php break;  
case "section":  
  
$i++;  
  
?>  
  
<div class="rm_section">  
<div class="rm_title"><h3><span class="inactive">&nbsp;</span><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />  
</span><div class="clearfix"></div></div>  
<div class="rm_options">  
  
<?php break;  
  
}  
}  
?>  
  
<input type="hidden" name="action" value="save" />  
</form>  
<form method="post">  
<p class="submit">  
<input name="reset" type="submit" value="Reset" />  
<input type="hidden" name="action" value="reset" />  
</p>  
</form>  
<div style="font-size:9px; margin-bottom:10px;">Icons: <a href="http://www.woothemes.com/2009/09/woofunction/">WooFunction</a></div>  
 </div>   
  
<?php  
}  

add_action('admin_init', 'mytheme_add_init');  
add_action('admin_menu', 'mytheme_add_admin'); 

	add_action('init', 'create_portfolio');
	function create_portfolio() {
    	$portfolio_args = array(
        	'label' => __('Portfolio'),
        	'singular_label' => __('Portfolio'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => true,
        	'supports' => array('title', 'editor', 'thumbnail')
        );
    	register_post_type('portfolio',$portfolio_args);
	}
	add_action("admin_init", "add_portfolio");
	add_action('save_post', 'update_website_url');
	function add_portfolio(){
		add_meta_box("portfolio_details", "Portfolio Options", "portfolio_options", "portfolio", "normal", "low");
	}
	function portfolio_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		$website_url = $custom["website_url"][0];
		$website_image = $custom["website_image"][0];
?>
	<div id="portfolio-options">
		<label>Project URL:</label><br /><input type="text" tabindex="7" name="website_url" value="<?php echo $website_url; ?>" style="width: 99%" /><br />	
		<label>Project Image (Or upload via the gallery):</label><br /><input type="text" tabindex="7" name="website_image" value="<?php echo $website_image; ?>" style="width: 99%" />
	</div><!--end portfolio-options-->   
<?php
	}
	function update_website_url(){
		global $post;
		update_post_meta($post->ID, "website_url", $_POST["website_url"]);
		update_post_meta($post->ID, "website_image", $_POST["website_image"]);
	}
add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");
add_action("manage_posts_custom_column",  "portfolio_columns_display");
 
function portfolio_edit_columns($portfolio_columns){
	$portfolio_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Project Title",
		"description" => "Description",
		"url" => "Project URL",
	);
	return $portfolio_columns;
}
 
function portfolio_columns_display($portfolio_columns){
	switch ($portfolio_columns)
	{
		case "description":
			the_excerpt();
			break;
		case "url":
			$custom = get_post_custom($post->ID);
			$website_url = $custom["website_url"][0];
			echo $website_url;	
	}
}

function the_image($size = 'full' , $class = ""){
global $post;

//setup the attachment array
$att_array = array(
'post_parent' => $post->ID,
'post_type' => 'attachment',
'post_mime_type' => 'image',
'order_by' => 'menu_order'
);

//get the post attachments
$attachments = get_children($att_array);

//make sure there are attachments
if (is_array($attachments)){
//loop through them
foreach($attachments as $att){
//find the one we want based on its characteristics
if ( $att->menu_order == 0){
$image_src_array = wp_get_attachment_image_src($att->ID, $size);

//get url – 1 and 2 are the x and y dimensions
$url = $image_src_array[0];
$caption = $att->post_excerpt;
$image_html = '%s';

//combine the data
$html = sprintf($image_html,$url);

//echo the result
}
}
return $html;
}

}


if ( ! function_exists( 'showcase_information' ) ) :
function showcase_information( $type = '' ) {
$cats = '<img src="'. get_bloginfo('template_url') .'/images/tag_red.png" />'. get_the_category_list( ', ' );
if( $type == 'portfolio' )
{
 $cats = '<img src="'. get_bloginfo('template_url') .'/images/tag_red.png" />Portfolio';
}
elseif( $type == 'page' )
{
 	$cats = '';
}
?>
			<div class="information">
				<img src="<?php bloginfo('template_url') ?>/images/date.png" style="padding-left:0" /><?php echo get_the_date(); ?>
				<?php echo $cats; ?>
				<img src="<?php bloginfo('template_url') ?>/images/user.png" /><?php echo get_the_author(); ?>
			</div>
<?php
}
endif;


if ( ! function_exists( 'showcase_post_edit' ) ) :
function showcase_post_edit()
{
	$tags_list = get_the_tag_list( '', ', ' );
	if ( $tags_list ):
?>
				<img src="<?php bloginfo('template_url') ?>/images/star.png" style="margin-left:0;padding-left:0" /><?php printf( __( '%2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
				<br />
				<?php endif; ?>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
				<img src="<?php bloginfo('template_url') ?>/images/comments.png" /><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?>
<?php
}
endif;

if ( ! function_exists( 'twentyten_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_in() {
?>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
				<img src="<?php bloginfo('template_url') ?>/images/star.png" />
<?php
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>', 'twentyten' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>', 'twentyten' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;
/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function twentyten_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'twentyten' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'twentyten' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'twentyten' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'twentyten' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'twentyten' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'twentyten' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'twentyten_widgets_init' );
/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );

if ( ! function_exists( 'showcase_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function showcase_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'twentyten'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Makes some changes to the <title> tag, by filtering the output of wp_title().
 *
 * If we have a site description and we're viewing the home page or a blog posts
 * page (when using a static front page), then we will add the site description.
 *
 * If we're viewing a search result, then we're going to recreate the title entirely.
 * We're going to add page numbers to all titles as well, to the middle of a search
 * result title and the end of all other titles.
 *
 * The site title also gets added to all titles.
 *
 * @since Twenty Ten 1.0
 *
 * @param string $title Title generated by wp_title()
 * @param string $separator The separator passed to wp_title(). Twenty Ten uses a
 * 	vertical bar, "|", as a separator in header.php.
 * @return string The new title, ready for the <title> tag.
 */
function twentyten_filter_wp_title( $title, $separator ) {
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'twentyten' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'twentyten_filter_wp_title', 10, 2 );
/*
function post_type_movies() {
	register_post_type(
                'movies', 
                array(
                        'label' => __('Movies'),
                        'public' => true,
                        'show_ui' => true,
                        'supports' => array(
                					'title',
                'author',
                'editor',
                                     'post-thumbnails',
                                     'excerpts',
                                     'trackbacks',
                                     'custom-fields',
                                     'comments',
                                     'revisions')
                )
        );
 
	register_taxonomy( 'actor', 'movies', array( 'hierarchical' => true, 'label' => __('Actor') ) ); 
 
        register_taxonomy( 'production', 'movies',
		array(
                         'hierarchical' => false,
			 'label' => __('Production'),
			 'query_var' => 'production',
			 'rewrite' => array('slug' => 'production' )
		)
	);
}
add_action('init', 'post_type_movies');
*/

?>
