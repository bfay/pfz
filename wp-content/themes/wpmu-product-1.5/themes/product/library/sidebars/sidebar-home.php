
<div class="shadow-spacer"></div>
<div id="sidebar">
	<div class="padder">
			<div class="sidebar-box">
									<?php if ( !function_exists('dynamic_sidebar')
									|| !dynamic_sidebar('homeleft-sidebar') ) : ?>
												<div class="widget-error">
													<?php _e( 'Please log in and add widgets to this column.', 'buddypress' ) ?> <a href="<?php echo get_option('siteurl') ?>/wp-admin/widgets.php?s=&amp;show=&amp;sidebar=homeleft-sidebar"><?php _e( 'Add Widgets', 'buddypress' ) ?></a>
												</div>
									<?php endif; ?>
			</div>

				<div class="sidebar-box">
								<?php if ( !function_exists('dynamic_sidebar')
								|| !dynamic_sidebar('homemiddle-sidebar') ) : ?>
											<div class="widget-error">
												<?php _e( 'Please log in and add widgets to this column.', 'buddypress' ) ?> <a href="<?php echo get_option('siteurl') ?>/wp-admin/widgets.php?s=&amp;show=&amp;sidebar=homemiddle-sidebar"><?php _e( 'Add Widgets', 'buddypress' ) ?></a>
											</div>
								<?php endif; ?>			</div>
						<div id="login-box">
							<?php if ( !function_exists('dynamic_sidebar')
							|| !dynamic_sidebar('homeright-sidebar') ) : ?>
										<div class="widget-error">
											<?php _e( 'Please log in and add widgets to this column.', 'buddypress' ) ?> <a href="<?php echo get_option('siteurl') ?>/wp-admin/widgets.php?s=&amp;show=&amp;sidebar=homeright-sidebar"><?php _e( 'Add Widgets', 'buddypress' ) ?></a>
										</div>
							<?php endif; ?>			</div>
							<div class="clear"></div>
	</div><!-- .padder -->
</div><!-- #sidebar -->	
	<div class="shadow-spacer"></div>