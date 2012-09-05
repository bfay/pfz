<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	} ?>

	<?php $main_options = get_option('frugal_main_options');
	$content_design = get_option('frugal_content_design'); ?>

	<?php if (have_comments()): ?>
	<h4><?php comments_number(__('No Responses', 'frugal'), __('One Response', 'frugal'), __('% Responses', 'frugal') );?> <?php _e('to', 'frugal'); ?> &#8220;<?php the_title(); ?>&#8221;</h4>
	<h3 id="comments"><b><?php _e('Comments', 'frugal'); ?></b></h3>
	<p class="commentlist"><?php _e('Read below or', 'frugal'); ?> <a href="#respond" rel="nofollow"><?php _e('add a comment...', 'frugal'); ?></a></p>
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=frugal_comment'); ?>
	</ol>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	
	<?php if ($main_options['fr_trackbacks_active'] == "Yes"):
	if (!empty($comments_by_type['pings'])):
	echo '<h3><b>' . __('Trackbacks', 'frugal') . '</b></h3>' . "\n";
	echo '<ol class="commentlist">' . "\n";
	wp_list_comments('type=pings');
	echo '</ol><br /><br />' . "\n";
	endif; endif;
	
	else : // this is displayed if there are no comments so far
		if ('open' == $post->comment_status): ?>
			<!-- If comments are open, but there are no comments. -->
		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<?php echo '<p class="nocomments">' . __('Comments are closed.', 'frugal') . '</p>' . "\n";
		endif;
	endif;

	if ('open' == $post->comment_status): ?>
		<div id="respond">
			<h3><?php echo stripslashes ($main_options['fr_text_above_comment_box']); ?></h3>

		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>

	<?php if (get_option('comment_registration') && !$user_ID ): ?>
		<p><?php _e('You must be', 'frugal'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>" rel="nofollow"><?php _e('logged in', 'frugal'); ?></a> <?php _e('to post a comment.', 'frugal'); ?></p></div>

	<?php else: ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ($user_ID): ?>
		<p><?php _e('Logged in as', 'frugal'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php" rel="nofollow"><?php echo $user_identity; ?></a><?php _e('.', 'frugal'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" rel="nofollow" title="Log out of this account"><?php _e('Log out', 'frugal'); ?> &raquo;</a></p>
	<?php else: ?>
	
		<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
		<label for="author"><small><?php _e('Name *', 'frugal'); ?></small></label></p>
		
		<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
		<label for="email"><small><?php _e('E-mail *', 'frugal'); ?></small></label></p>

		<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
		<label for="url"><small><?php _e('Website', 'frugal'); ?></small></label></p>

	<?php endif; ?>
	
	<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

	<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

	<p><input style="width:<?php echo $content_design['fr_comment_sub_width']; ?>px;" name="submit" type="submit" id="submit" tabindex="5" value="<?php echo $main_options['fr_comment_sub_text']; ?>" />
	<?php comment_id_fields(); ?>
	</p>

	<?php do_action('comment_form', $post->ID); ?>

</form>

</div>

<?php frugal_hook_after_comment();

endif;
endif; ?>