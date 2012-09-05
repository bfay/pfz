<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments', 'default'); ?>.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
<?php if ( ! empty($comments_by_type['comment']) ) : ?>


  	<div class="post"><h1><?php comments_number( __( 'No comments', 'default' ), __( '1 comment', 'default' ), __( '% comments', 'default' )); ?></h1></div>

  <ol class="commentlist">
  <?php wp_list_comments('type=comment&avatar_size=60&callback=list_comments'); ?>
  </ol>
  
  <div class="navigation">
		
		<div class="alignleft"><?php previous_comments_link(__('&laquo; Older Comments', 'default')); ?></div>
		<div class="alignright"><?php next_comments_link(__('Newer Comments &raquo;', 'default')); ?></div>
	</div>

<?php endif; ?>
	
	

<?php if ( ! empty($comments_by_type['pings']) ) : ?>
  
    <div class="post"><h1>
    <br/>
      <?php _e('Trackbacks', 'default'); ?>
      /
      <?php _e('Pingbacks', 'default'); ?>
    </h1></div>
    <ol class="pinglist">
    <?php wp_list_comments('type=pings&callback=list_pings'); ?>
    </ol>
<?php endif; ?>



<?php else : ?>
	<?php if ('open' == $post->comment_status) : ?>
	 <?php else : ?>
		<p class="nocomments"><?php _e('Comments are closed', 'default'); ?>.</p>
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<div id="respond">
   <div class="post"> <h1><?php comment_form_title(__('Leave a Reply', 'default' ), __( 'Leave a Reply to %s', 'default')); ?></h1> </div>
    <div class="cancel-comment-reply">
    	<?php // cancel_comment_reply_link(); ?>
    	<?php cancel_comment_reply_link(__('Click here to cancel reply.', 'default')); ?></div>

  
  <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <?php _e('You must be', 'default'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in', 'default'); ?></a> <?php _e('to post a comment', 'default'); ?>.

  <?php else : ?>
  
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
  
  <?php if ( $user_ID ) : ?>
  
  <p><?php _e('Logged in as', 'default'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out', 'default'); ?>"><?php _e('Log out', 'default'); ?> &raquo;</a></p>
  
  <?php else : ?>
 
    <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
    <label for="author"><?php _e('Name', 'default'); ?> <?php if ($req) echo "(required)"; ?></label></p>
    
    <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
    <label for="email"><?php _e('Mail (will not be published)', 'default'); ?> <?php if ($req) echo "(required)"; ?></label></p>
    
    <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
    <label for="url"><?php _e('Website', 'default'); ?></label></p>
  
  <?php endif; ?>
  
  <!--<p><small><strong>XHTML:</strong> <?php _e('You can use these tags', 'default'); ?>: <code><?php echo allowed_tags(); ?></code></small></p>-->
  

    <p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
    <p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'default'); ?>" />
    <?php comment_id_fields(); ?>
    </p>
    <?php do_action('comment_form', $post->ID); ?>

  
  </form>

  
  <?php endif; // If registration required and not logged in ?>
  </div>

<?php endif; // if you delete this the sky will fall on your head ?>
