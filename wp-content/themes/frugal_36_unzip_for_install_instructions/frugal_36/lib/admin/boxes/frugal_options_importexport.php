<div class="portlet-header"><em>frugal</em> <?php _e('Options Import/Export', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('This section allows you to Import and Export the frugal Option Settings. This is ideal for either complete or partial backup and restore purposes. By Exporting your options you are backing up ALL of your current frugal settings. Upon Import of this Export file you can choose which frugal options page settings to Import by checking the boxes below.', 'frugal'); ?>">[?]</a></div>
<div class="portlet-content" style="display:<?php echo ($portlet['visible'] == 'true' ? 'block' : 'none'); ?>">
	<p style="margin-bottom:-1px;"><span style="font-family: Arial Black, sans-serif; font-size: 14px; color:#333;"><?php _e('Options Export', 'frugal'); ?>:</span><br />
	<?php _e('Exports ALL current frugal option settings.', 'frugal'); ?><br />
	<form method="post" action="?page=frugal&dld=exportall">
		<input type="submit" value="Export Options"/><br/>
		<input type="checkbox" value="export_images" name="export_images[]"><?php _e('Include Images in Export', 'frugal'); ?><br />
	</form>
	</p>
	<p style="margin-bottom:-1px;"><span style="font-family: Arial Black, sans-serif; font-size: 14px; color:#333;"><?php _e('Options Import', 'frugal'); ?>:</span><br />
	<form method="post" action="?page=frugal&fct=optionsImport" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />	
		<input name="optionsImport" type="file" /><br />
		<?php _e('Please select which options to import', 'frugal'); ?>:<br />
		<input type="checkbox" value="main_options" name="option_sets[]"><?php _e('Main Options', 'frugal'); ?><br />
		<input type="checkbox" value="feature_options" name="option_sets[]" checked><?php _e('Feature Options', 'frugal'); ?><br />
		<input type="checkbox" value="header_design" name="option_sets[]" checked><?php _e('Header Design', 'frugal'); ?><br />
		<input type="checkbox" value="content_design" name="option_sets[]" checked><?php _e('Content Design', 'frugal'); ?><br />
		<input type="checkbox" value="feature_design" name="option_sets[]" checked><?php _e('Feature Design', 'frugal'); ?><br />
		<input type="checkbox" value="include_images" name="option_sets[]"><?php _e('Include Images', 'frugal'); ?><br />
		<input type="hidden" name="import_type" value="options">
		<input type="submit" value="Import Options"/>
	</form>
	</p>
</div>