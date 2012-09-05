<?php
function Coralis_footer() { ?>
<p class="author">Coralis Theme by <a href="http://www.dkszone.net/" title="dkszone.net">dkszone.net</a> </p>
<?php }

add_action('wp_footer', 'Coralis_footer');
if ( function_exists('register_sidebar') )
    register_sidebar(array('name'=>'sidebar_left',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
	register_sidebar(array('name'=>'sidebar_right',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
	
function list_pings($comment, $args, $depth) 
{
	$GLOBALS['comment'] = $comment;
	echo "<li id=\"comment-";
 	echo comment_ID();
  	echo "\" class=\"pings\">";
 	echo comment_author_link();
}
	
function list_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>">
	<div class="post">
	
	<div class="comment-author vcard">
	<?php echo get_avatar($comment,$size='60',$default='<path_to_url>' ); ?>

	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
    <?php _e('Your comment is awaiting moderation.') ?>
    
    
    <?php endif; ?>
    
    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">			    <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?>     </div>
    
    <?php comment_text() ?>
    
    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>

    </div>
    <div class="cleared"></div>
    
    </div>
    <?php
}
	

?>
