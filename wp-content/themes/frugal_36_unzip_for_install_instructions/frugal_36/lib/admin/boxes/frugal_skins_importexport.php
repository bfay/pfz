<div class="portlet-header"><em>frugal</em> <?php _e('Skins Import/Export', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This section allows you to Import and Export custom \'Skins\'. By \'Skins\' I\'m referring to the ability to Import and Export custom frugal designs.', 'frugal'); ?>">[?]</a></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p style="margin-bottom:-1px;"><span style="font-family: Arial Black, sans-serif; font-size: 14px; color:#333;"><?php _e('Skin Export', 'frugal'); ?>:</span><a class="tooltip" href="#" class="tooltip" title="<?php _e('Please note that, in order for your Skin\'s images to be included in the export, they must be in the wp-content/uploads/frugal/ directory and begin with \'TheNameOfYourSkin\' (ie. skinname-logo.png or skinname-background.jpg)', 'frugal'); ?>">[?]</a><br />
	<form method="post" action="?page=frugal&fct=skinExport" />
		<input type="text" id="frugal_skin_name" name="frugal_skin_name" value="<?php _e('Enter Skin Name Here', 'frugal'); ?>" style="width:180px;" onfocus="if(this.value==this.defaultValue) this.value='';"/>
		<input type="submit" value="Export Skin"/>
	</form>
	</p>
	<p style="margin-bottom:-1px;"><span style="font-family: Arial Black, sans-serif; font-size: 14px; color:#333;"><?php _e('Skin Import', 'frugal'); ?>:</span><br />
	<form method="post" action="?page=frugal&fct=skinImport" enctype="multipart/form-data">
		<input name="skinImport" type="file" /><br />
		<input type="hidden" name="import_type" value="skin">
		<input type="submit" value="Import Skin"/>
	</form>
	</p>
</div>