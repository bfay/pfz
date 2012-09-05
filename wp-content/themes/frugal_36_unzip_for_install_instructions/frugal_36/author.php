<?php
$main_options = get_option('frugal_main_options');
$content_design = get_option('frugal_content_design');

get_header(); 

// The users email, passed to Gravatar
$usersEmail = $main_options['fr_grav_email'];

// A default avatar to load if Gravatar
// doesn't find one.
$defaultImage = get_bloginfo('template_directory') . "/images/myster-man.jpg";

// The size of the image
$avatarSize = "80";

// Minimum rating for your site
// Possible values (G, PG, R, X)
$avatarRating = "G";

// Border around the image
$avatarBorder = "000000";

// URL for Gravatar
$gravatarURL = "http://www.gravatar.com/avatar.php?gravatar_id=%s
&default=%s&size=%s&border=%s&rating=%s";

$avatarURL = sprintf
(
	$gravatarURL, 
	md5($usersEmail), 
	$defaultImage,
	$avatarSize,
	$avatarBorder,
	$avatarRating
);

?>

<div id="container">

<?php frugal_hook_before_container(); ?>

<div id="content">

<?php frugal_hook_before_content(); ?>

<?php
if ($content_design['fr_layout_type'] == "Double Sidebar")
{
	frugal_sidebar_1();
}
elseif ($content_design['fr_layout_type'] == "Left Sidebar" || $content_design['fr_layout_type'] == "Double Left Sidebar")
{
	frugal_sidebars();
}
?>
	
	<div id="content_column">
	
<?php frugal_hook_before_content_column();

if(isset($_GET['author_name']))
{
	$curauth = get_userdatabylogin($author_name);
}
else
{
	$curauth = get_userdata(intval($author));
}
?>

		<div class="postarea postlinks">
		
<?php
if ($main_options['fr_breadcrumbs_active'] == "Yes")
{
echo do_shortcode('[frugal_crumbs root="' . __('Home', 'frugal') . '" /]');
}
?>

<?php frugal_hook_before_postarea(); ?>

<?php frugal_hook_before_headline(); ?>

<h2>About: <?php echo $curauth->nickname; ?></h2>

<?php frugal_hook_after_headline(); ?>

<p><?php print "<img class='alignleft' src=\"" . 
	$avatarURL . "\" width=\"" . 
	$avatarSize . "\" height=\"" . 
	$avatarSize . "\" />"; echo $curauth->user_description; ?></p>
		
<?php frugal_hook_after_postarea(); ?>

		</div>
		
<?php frugal_hook_after_content_column(); ?>

	</div>
	
<?php
if ($content_design['fr_layout_type'] != "Left Sidebar" && $content_design['fr_layout_type'] != "Double Left Sidebar" && $content_design['fr_layout_type'] != "No Sidebar")
{
	frugal_sidebars();
}
?>
	
<?php frugal_hook_after_content(); ?>

</div>

<?php frugal_hook_after_container(); ?>

</div>
	
<?php get_footer(); ?>