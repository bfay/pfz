<div class="portlet-header"><?php _e('Links & Codes', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><?php _e('RSS Subscription Link', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This would be the link to your blog\'s RSS feed such as the default one (ie. http://your-blog.com/feed) or from something like Feedburner.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_rss_link]" name="frugal[fr_rss_link]" value="<?php echo $options['fr_rss_link']?>" style="width:100%;" /></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('Displaying link requires \'RSS\' or \'RSS | Email\' <b>Navbar Right Layout</b> option to be selected or the use of the', 'frugal'); ?> <b><?php _e('RSS Shortcode:', 'frugal'); ?></b> <code>[rss]</code> <?php _e('or', 'frugal'); ?> <b><?php _e('RSS | Email Shortcode:', 'frugal'); ?></b> <code>[rss_email]</code> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Copy this shortcode (ie. [rss] or [rss_email]) anywhere you want your RSS and/or Email link displayed. For example, if you want it to display in your sidebar you can paste [rss] into a \'Text\' widet and it will display in that location of your sidebar (you can do this in any widget area as well).', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Email Subscription Link', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This would be the link to your blog\'s Email feed such as one from Feedburner.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_email_link]" name="frugal[fr_email_link]" value="<?php echo $options['fr_email_link']?>" style="width:100%;" /></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('Displaying link requires \'RSS | Email\' <b>Navbar Right Layout</b> option to be selected or the use of the', 'frugal'); ?> <b><?php _e('RSS | Email Shortcode:', 'frugal'); ?></b> <code>[rss_email]</code> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Copy this shortcode (ie. [rss_email]) anywhere you want your RSS and Email link displayed. For example, if you want it to display in your sidebar you can paste [rss_email] into a \'Text\' widet and it will display in that location of your sidebar (you can do this in any widget area as well).', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Twitter ID (NOT full Twitter URL)', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This would be your actual Twitter ID, not the entire URL to your Twitter ID (ie. frugaltheme NOT http://twitter.com/frugaltheme).', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_twitter_id]" name="frugal[fr_twitter_id]" value="<?php echo $options['fr_twitter_id']?>" style="width:100%;" /></p>
	<p style="margin-top:-10px; font-size:10px;"><?php _e('Displaying link requires \'Follow Me\' <b>Navbar Right Layout</b> option to be selected or the use of the', 'frugal'); ?> <b><?php _e('Twitter Shortcode:', 'frugal'); ?></b> <code>[twitter]</code> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Copy this shortcode (ie. [twitter]) anywhere you want your Twitter link displayed. For example, if you want it to display in your sidebar you can paste [twitter] into a \'Text\' widet and it will display in that location of your sidebar (you can do this in any widget area as well).', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('frugal Footer Affiliate Link', 'frugal'); ?> (<a href="http://frugaltheme.com/affiliates/" /><?php _e('Sign Up', 'frugal'); ?></a>) <a class="tooltip" href="#" class="tooltip" title="<?php _e('Sign up as a frugal Affiliate and then add your affiliate link here. This adds your affiliate link to the frugal link in your site\'s footer. Why not make a little cash while using your awesome Frugal Theme?! :)', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_affiliate_link]" name="frugal[fr_affiliate_link]" value="<?php echo stripslashes($options['fr_affiliate_link'])?>" style="width:100%;" /></p>
	<p><?php _e('Gravatar Email Address', 'frugal'); ?> (<a href="http://en.gravatar.com/" /><?php _e('Get One', 'frugal'); ?></a>) <a class="tooltip" href="#" class="tooltip" title="<?php _e('By inserting your Gravatar email address in the text area below your Gravatar image will show up in your Author page (when readers click on the author link in the byline of your posts).  PLEASE NOTE that the Author page content is pulled from the Profile content you add to your Wordpress Dashboard. Name = Nickname & Content = Biographical Info. If you don\'t have a Gravatar email address you can click on the provided link to sign up.', 'frugal'); ?>">[?]</a><br />
	<input type="text" id="frugal[fr_grav_email]" name="frugal[fr_grav_email]" value="<?php echo stripslashes($options['fr_grav_email'])?>" style="width:100%;" /></p>
	<p><?php _e('Header Script Code', 'frugal'); ?><br />
	<textarea id="frugal[fr_header_scripts]" name="frugal[fr_header_scripts]" style="width:100%;"><?php if ($options['fr_header_scripts']) echo stripslashes($options['fr_header_scripts']); ?></textarea></p>
	<p><?php _e('Footer Script Code (ie. Google Analytics)', 'frugal'); ?><br />
	<textarea id="frugal[fr_footer_scripts]" name="frugal[fr_footer_scripts]" style="width:100%;"><?php if ($options['fr_footer_scripts']) echo stripslashes($options['fr_footer_scripts']); ?></textarea></p>
</div>