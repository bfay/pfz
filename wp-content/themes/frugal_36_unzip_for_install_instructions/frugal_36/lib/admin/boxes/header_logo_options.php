<div class="portlet-header"><?php _e('Header/Logo Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p><select id="frugal[fr_logo_type]" name="frugal[fr_logo_type]" size="1" style="width:110px; margin-right:5px;">
		<option value="Text"<?php if ($options['fr_logo_type'] == 'Text') echo ' selected="selected"'; ?>><?php _e('Text', 'frugal'); ?></option>
		<option value="Text FULL"<?php if ($options['fr_logo_type'] == 'Text FULL') echo ' selected="selected"'; ?>><?php _e('Text FULL', 'frugal'); ?></option>
		<option value="Image"<?php if ($options['fr_logo_type'] == 'Image') echo ' selected="selected"'; ?>><?php _e('Image', 'frugal'); ?></option>
		<option value="Image FULL"<?php if ($options['fr_logo_type'] == 'Image FULL') echo ' selected="selected"'; ?>><?php _e('Image FULL', 'frugal'); ?></option>
		<option value="Header Hook"<?php if ($options['fr_logo_type'] == 'Header Hook') echo ' selected="selected"'; ?>><?php _e('Header Hook', 'frugal'); ?></option>
	</select><?php _e('Logo Type', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('The logo types specified as FULL will remove the Header Right Banner widget so you can utilize the full width of your header area. To use a logo image just upload your logo image file to your \'wp-content/uploads/frugal/\' directory using the built-in frugal upload tool in the \'Settings/Uploads\' frugal options page. If uploading by any other means you just need to be sure your logo image file is place in your ...wp-content/uploads/frugal/... directory. Then adjust the logo image name in the text box below accordingly. Be sure to include the full image file name (eg. logo.png NOT JUST logo).', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Logo Image File Name', 'frugal'); ?><br />
	<select id="frugal[fr_logo_image_name]" name="frugal[fr_logo_image_name]" style="width:100%;"><?php frugal_list_images( $options['fr_logo_image_name'] ); ?></select></p>
	<p><input type="text" id="frugal[fr_header_height]" name="frugal[fr_header_height]" value="<?php echo $options['fr_header_height']?>" style="width:40px;" /><?php _e('px Header Height', 'frugal'); ?><br />
	<input type="text" id="frugal[fr_logo_width]" name="frugal[fr_logo_width]" value="<?php echo $options['fr_logo_width']?>" style="width:40px;" /><?php _e('px Logo Width', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('When using an Image Logo this will represent its exact width, but for a Text Logo this will represent both the width AND the left and right Text Logo Padding. So in stock form, for example, 440px width really means 420px width + 20px left padding.', 'frugal'); ?>">[?]</a> <?php _e('Header Width:', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('To determine the full width of your header (which may be helpful when creating a full width logo and/or header image) you can click on the \'Dynamic Styles\' link at the top of this page then scroll down just a bit to see your current #header width.', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Image Logo Alignment', 'frugal'); ?> <select id="frugal[fr_logo_image_align]" name="frugal[fr_logo_image_align]" size="1" style="width:70px;">
		<option value="left"<?php if ($options['fr_logo_image_align'] == 'left') echo ' selected="selected"'; ?>><?php _e('left', 'frugal'); ?></option>
		<option value="center"<?php if ($options['fr_logo_image_align'] == 'center') echo ' selected="selected"'; ?>><?php _e('center', 'frugal'); ?></option>
		<option value="right"<?php if ($options['fr_logo_image_align'] == 'right') echo ' selected="selected"'; ?>><?php _e('right', 'frugal'); ?></option>
	</select><br />
	<?php _e('Image Logo Top Margin', 'frugal'); ?> <input type="text" id="frugal[fr_logo_image_top_margin]" name="frugal[fr_logo_image_top_margin]" value="<?php echo $options['fr_logo_image_top_margin']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('When you increase the height of the header the logo image will float up and to the left (unless the logo image height is also increased). So adding a little top margin can push the image logo down if needed.', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Text Logo Alignment', 'frugal'); ?> <select id="frugal[fr_logo_text_align]" name="frugal[fr_logo_text_align]" size="1" style="width:70px;">
		<option value="left"<?php if ($options['fr_logo_text_align'] == 'left') echo ' selected="selected"'; ?>><?php _e('left', 'frugal'); ?></option>
		<option value="center"<?php if ($options['fr_logo_text_align'] == 'center') echo ' selected="selected"'; ?>><?php _e('center', 'frugal'); ?></option>
		<option value="right"<?php if ($options['fr_logo_text_align'] == 'right') echo ' selected="selected"'; ?>><?php _e('right', 'frugal'); ?></option>
	</select><br />
	<?php _e('Text Logo Padding', 'frugal'); ?><br /><input type="text" id="frugal[fr_logo_text_top_padding]" name="frugal[fr_logo_text_top_padding]" value="<?php echo $options['fr_logo_text_top_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_logo_text_right_padding]" name="frugal[fr_logo_text_right_padding]" value="<?php echo $options['fr_logo_text_right_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_logo_text_bottom_padding]" name="frugal[fr_logo_text_bottom_padding]" value="<?php echo $options['fr_logo_text_bottom_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_logo_text_left_padding]" name="frugal[fr_logo_text_left_padding]" value="<?php echo $options['fr_logo_text_left_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Show Tagline In Header', 'frugal'); ?> <select id="frugal[fr_logo_tag_show]" name="frugal[fr_logo_tag_show]" size="1" style="width:55px;">
		<option value="Yes"<?php if ($options['fr_logo_tag_show'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_logo_tag_show'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select> <a class="tooltip" href="#" class="tooltip" title="<?php _e('For the Tagline to display in your header you must be using either the \'Text\' or \'Text FULL\' \'Logo Type\' option.', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Tagline Padding', 'frugal'); ?><br /><input type="text" id="frugal[fr_logo_tag_top_padding]" name="frugal[fr_logo_tag_top_padding]" value="<?php echo $options['fr_logo_tag_top_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_logo_tag_right_padding]" name="frugal[fr_logo_tag_right_padding]" value="<?php echo $options['fr_logo_tag_right_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_logo_tag_bottom_padding]" name="frugal[fr_logo_tag_bottom_padding]" value="<?php echo $options['fr_logo_tag_bottom_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_logo_tag_left_padding]" name="frugal[fr_logo_tag_left_padding]" value="<?php echo $options['fr_logo_tag_left_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
	<p><?php _e('Header Right Banner Padding', 'frugal'); ?><br /><input type="text" id="frugal[fr_header_right_top_padding]" name="frugal[fr_header_right_top_padding]" value="<?php echo $options['fr_header_right_top_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_header_right_right_padding]" name="frugal[fr_header_right_right_padding]" value="<?php echo $options['fr_header_right_right_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_header_right_bottom_padding]" name="frugal[fr_header_right_bottom_padding]" value="<?php echo $options['fr_header_right_bottom_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?> 
	<input type="text" id="frugal[fr_header_right_left_padding]" name="frugal[fr_header_right_left_padding]" value="<?php echo $options['fr_header_right_left_padding']?>" style="width:35px;" /><?php _e('px', 'frugal'); ?></p>
</div>