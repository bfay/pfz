<?php

////////////////////custom most commented post widget//////////////////////////////

function custom_most_comment($args) {

extract($args);

$settings = get_option("widget_custom_most_comment");

$mc_name = $settings['name'];
//check if xustom name exited///
if($mc_name == '') {
$mc_name = __('Most Commented', TEMPLATE_DOMAIN);
} else {
$mc_name = $mc_name;
}


$mc_number = $settings['number'];
?>

<?php
global $wpdb, $post;
$mostcommenteds = $wpdb->get_results("SELECT  $wpdb->posts.ID, post_title, post_name, post_date, COUNT($wpdb->comments.comment_post_ID) AS 'comment_total' FROM $wpdb->posts LEFT JOIN $wpdb->comments ON $wpdb->posts.ID = $wpdb->comments.comment_post_ID WHERE comment_approved = '1' AND post_date_gmt < '".gmdate("Y-m-d H:i:s")."' AND post_status = 'publish' AND post_password = '' GROUP BY $wpdb->comments.comment_post_ID ORDER  BY comment_total DESC LIMIT $mc_number");

echo $before_widget;

echo $before_title . $mc_name . $after_title;

echo "<ul> ";

foreach ($mostcommenteds as $post) {
$post_title = htmlspecialchars(stripslashes($post->post_title));
$comment_total = (int) $post->comment_total;
echo "<li><a href=\"".get_permalink()."\">$post_title&nbsp;<strong>($comment_total)</strong></a></li>";
}

echo "</ul> ";

echo $after_widget;
?>

<?php }

function custom_most_comment_admin() {

$settings = get_option("widget_custom_most_comment");

// check if anything's been sent
if (isset($_POST['update_custom_most_comment'])) {
$settings['name'] = strip_tags(stripslashes($_POST['custom_most_comment_id']));
$settings['number'] = strip_tags(stripslashes($_POST['custom_most_comment_number']));
update_option("widget_custom_most_comment",$settings);
}   ?>
<p>
<label for="custom_most_comment_id"><?php _e('Name for most comment(optional):', TEMPLATE_DOMAIN); ?>
<input id="custom_most_comment_id" name="custom_most_comment_id" type="text" class="widefat" value="<?php echo $settings['name']; ?>" /></label></p>

<p>
<label for="custom_most_comment_number"><?php _e('Total to show: ', TEMPLATE_DOMAIN); ?>
<input id="custom_most_comment_number" name="custom_most_comment_number" type="text" class="widefat" value="<?php echo $settings['number']; ?>" /></label></p>
<input type="hidden" id="update_custom_most_comment" name="update_custom_most_comment" value="1" />

<?php }

register_sidebar_widget('Most Comment', 'custom_most_comment');
register_widget_control('Most Comment', 'custom_most_comment_admin', 300, 200);






////////////////////recent commented post with avatar//////////////////////////////

function custom_recent_comment($args) {

extract($args);

$settings = get_option("widget_custom_recent_comment");

$rc_name = $settings['name'];
//check if xustom name exited///
if($rc_name == '') {
$rc_name = __('Recent Comments', TEMPLATE_DOMAIN);
} else {
$rc_name = $rc_name;
}

$rc_avatar = $settings['avatar_on'];

$rc_number = $settings['number'];
?>

<?php

global $wpdb;

$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved,
comment_type,comment_author_url,
SUBSTRING(comment_content,1,50) AS com_excerpt
FROM $wpdb->comments
LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
$wpdb->posts.ID)
WHERE comment_approved = '1' AND comment_type = '' AND
post_password = ''
ORDER BY comment_date_gmt DESC LIMIT $rc_number";

$comments = $wpdb->get_results($sql);
$output = $pre_HTML;

echo $before_widget;

echo $before_title . $rc_name . $after_title;

echo "<ul> ";

foreach ($comments as $comment) {

$email = $comment->comment_author_email;
$grav_name = $comment->comment_author_name;
$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($email). "&amp;size=16";

?>
<li>
<?php if($rc_avatar == 'yes') { ?>
<img class="alignleft" src="<?php echo $grav_url; ?>" alt="<?php echo $grav_name ?>" />
<?php } ?>
<a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title="on <?php echo $comment->post_title; ?>">
<?php echo strip_tags($comment->comment_author); ?>: <?php echo strip_tags($comment->com_excerpt); ?>...
</a>
</li>
<?php
}

echo "</ul> ";

echo $after_widget;


?>
<?php }

function custom_recent_comment_admin() {

$settings = get_option("widget_custom_recent_comment");

// check if anything's been sent
if (isset($_POST['update_custom_recent_comment'])) {
$settings['name'] = strip_tags(stripslashes($_POST['custom_recent_comment_name']));

$settings['avatar_on'] = strip_tags(stripslashes($_POST['custom_recent_comment_avatar_status']));


$settings['number'] = strip_tags(stripslashes($_POST['custom_recent_comment_number']));
update_option("widget_custom_recent_comment",$settings);
}

?>

<p>
<label for="custom_recent_comment_id"><?php _e('Name for recent comment(optional):', TEMPLATE_DOMAIN); ?>
<input id="custom_recent_comment_name" name="custom_recent_comment_name" type="text" class="widefat" value="<?php echo $settings['name']; ?>" /></label></p>

<p>
<label for="custom_recent_comment_avatar_status"><?php _e('Enable avatar?:', TEMPLATE_DOMAIN); ?>
<select id="custom_recent_comment_avatar_status" name="custom_recent_comment_avatar_status">
<option name="<?php echo $settings['avatar_on']; ?>" value="yes"><?php _e('yes', TEMPLATE_DOMAIN); ?></option>
<option name="<?php echo $settings['avatar_on']; ?>" value="no"><?php _e('no', TEMPLATE_DOMAIN); ?></option>
</select>
</p>

<p>
<label for="custom_recent_comment_number"><?php _e('Total to show:', TEMPLATE_DOMAIN); ?>
<input id="custom_recent_comment_number" name="custom_recent_comment_number" type="text" class="widefat" value="<?php echo $settings['number']; ?>" /></label></p>
<input type="hidden" id="update_custom_recent_comment" name="update_custom_recent_comment" value="1" />
<?php }

register_sidebar_widget('Comment It Avatar', 'custom_recent_comment');
register_widget_control('Comment It Avatar', 'custom_recent_comment_admin', 300, 200);




?>