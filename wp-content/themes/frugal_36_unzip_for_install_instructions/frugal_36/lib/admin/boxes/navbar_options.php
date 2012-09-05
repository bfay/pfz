<div class="portlet-header"><?php _e('Navbar Options', 'frugal'); ?></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<?php
	if( version_compare(get_bloginfo("version"), '2.9.2', '>') )
	{ ?>
		<p><?php _e('Main Navbar Type', 'frugal'); ?> <select id="frugal[fr_main_nav_type]" name="frugal[fr_main_nav_type]" size="1" style="width:95px;">
		<option value="Frugal"<?php if ($options['fr_main_nav_type'] == 'Frugal') echo ' selected="selected"'; ?>><?php _e('Frugal', 'frugal'); ?></option>
		<option value="Wordpress"<?php if ($options['fr_main_nav_type'] == 'Wordpress') echo ' selected="selected"'; ?>><?php _e('Wordpress', 'frugal'); ?></option>
	</select> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Here you can choose whether or not you want to use the Frugal Main Menu for your Navbar or the Wordpress Custom Menu (which can be created in Appearance > Menus in your Wordpress Dashboard).', 'frugal'); ?>">[?]</a></p>
	<p><?php _e('Secondary Navbar Type', 'frugal'); ?> <select id="frugal[fr_subnav_type]" name="frugal[fr_subnav_type]" size="1" style="width:95px;">
		<option value="Frugal"<?php if ($options['fr_subnav_type'] == 'Frugal') echo ' selected="selected"'; ?>><?php _e('Frugal', 'frugal'); ?></option>
		<option value="Wordpress"<?php if ($options['fr_subnav_type'] == 'Wordpress') echo ' selected="selected"'; ?>><?php _e('Wordpress', 'frugal'); ?></option>
	</select> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Here you can choose whether or not you want to use the Frugal Category Menu for your Secondary Navbar or the Wordpress Custom Menu (which can be created in Appearance > Menus in your Wordpress Dashboard).', 'frugal'); ?>">[?]</a></p>
	<?php
	}
	?>
	<p><b><?php _e('Navigation Display Locations...', 'frugal'); ?></b></p>
	<p><?php _e('Navbar', 'frugal'); ?><select id="frugal[fr_nav_location]" name="frugal[fr_nav_location]" size="1" style="width:115px; margin-left:5px;">
		<option value="Below Header"<?php if ($options['fr_nav_location'] == 'Below Header') echo ' selected="selected"'; ?>><?php _e('Below Header', 'frugal'); ?></option>
		<option value="Above Header"<?php if ($options['fr_nav_location'] == 'Above Header') echo ' selected="selected"'; ?>><?php _e('Above Header', 'frugal'); ?></option>
		<option value="Beside Header"<?php if ($options['fr_nav_location'] == 'Beside Header') echo ' selected="selected"'; ?>><?php _e('Beside Header', 'frugal'); ?></option>
		<option value="No Navbar"<?php if ($options['fr_nav_location'] == 'No Navbar') echo ' selected="selected"'; ?>><?php _e('No Navbar', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Secondary Navbar', 'frugal'); ?><select id="frugal[fr_subnav_location]" name="frugal[fr_subnav_location]" size="1" style="width:150px; margin-left:5px;">
		<option value="No Category Navbar"<?php if ($options['fr_subnav_location'] == 'No Category Navbar') echo ' selected="selected"'; ?>><?php _e('No Secondary Navbar', 'frugal'); ?></option>
		<option value="Below Header"<?php if ($options['fr_subnav_location'] == 'Below Header') echo ' selected="selected"'; ?>><?php _e('Below Header', 'frugal'); ?></option>
		<option value="Above Header"<?php if ($options['fr_subnav_location'] == 'Above Header') echo ' selected="selected"'; ?>><?php _e('Above Header', 'frugal'); ?></option>
	</select></p>
	<p><?php _e('Secondary Navbar On CMS Pages', 'frugal'); ?><select id="frugal[fr_subnav_cms_display]" name="frugal[fr_subnav_cms_display]" size="1" style="width:55px; margin-left:5px;">
		<option value="Yes"<?php if ($options['fr_subnav_cms_display'] == 'Yes') echo ' selected="selected"'; ?>><?php _e('Yes', 'frugal'); ?></option>
		<option value="No"<?php if ($options['fr_subnav_cms_display'] == 'No') echo ' selected="selected"'; ?>><?php _e('No', 'frugal'); ?></option>
	</select> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Choose whether or not to display the secondary navbar on pages using either of the two CMS page templates. The \'No Secondary Navbar\' selection above will override this option and remove it from ALL pages.', 'frugal'); ?>">[?]</a></p>
	<p><b><?php _e('Navbar Right Layout', 'frugal'); ?></b><select id="frugal[fr_navbar_right_layout]" name="frugal[fr_navbar_right_layout]" size="1" style="width:120px; margin-left:5px;">
		<option value="Empty"<?php if ($options['fr_navbar_right_layout'] == 'Empty') echo ' selected="selected"'; ?>><?php _e('Empty', 'frugal'); ?></option>
		<option value="RSS"<?php if ($options['fr_navbar_right_layout'] == 'RSS') echo ' selected="selected"'; ?>><?php _e('RSS', 'frugal'); ?></option>
		<option value="RSS & Email"<?php if ($options['fr_navbar_right_layout'] == 'RSS & Email') echo ' selected="selected"'; ?>><?php _e('RSS & Email', 'frugal'); ?></option>
		<option value="Twitter"<?php if ($options['fr_navbar_right_layout'] == 'Twitter') echo ' selected="selected"'; ?>><?php _e('Twitter', 'frugal'); ?></option>
		<option value="Search"<?php if ($options['fr_navbar_right_layout'] == 'Search') echo ' selected="selected"'; ?>><?php _e('Search', 'frugal'); ?></option>
		<option value="Text"<?php if ($options['fr_navbar_right_layout'] == 'Text') echo ' selected="selected"'; ?>><?php _e('Text', 'frugal'); ?></option>
	</select></p>
	<p><b><?php _e('2ndNav Right Layout', 'frugal'); ?></b><select id="frugal[fr_subnavbar_right_layout]" name="frugal[fr_subnavbar_right_layout]" size="1" style="width:120px; margin-left:5px;">
		<option value="Empty"<?php if ($options['fr_subnavbar_right_layout'] == 'Empty') echo ' selected="selected"'; ?>><?php _e('Empty', 'frugal'); ?></option>
		<option value="RSS"<?php if ($options['fr_subnavbar_right_layout'] == 'RSS') echo ' selected="selected"'; ?>><?php _e('RSS', 'frugal'); ?></option>
		<option value="RSS & Email"<?php if ($options['fr_subnavbar_right_layout'] == 'RSS & Email') echo ' selected="selected"'; ?>><?php _e('RSS & Email', 'frugal'); ?></option>
		<option value="Twitter"<?php if ($options['fr_subnavbar_right_layout'] == 'Twitter') echo ' selected="selected"'; ?>><?php _e('Twitter', 'frugal'); ?></option>
		<option value="Search"<?php if ($options['fr_subnavbar_right_layout'] == 'Search') echo ' selected="selected"'; ?>><?php _e('Search', 'frugal'); ?></option>
		<option value="Text"<?php if ($options['fr_subnavbar_right_layout'] == 'Text') echo ' selected="selected"'; ?>><?php _e('Text', 'frugal'); ?></option>
	</select></p>
</div>