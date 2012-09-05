<?php
function frugal_upload_options()
{
	$upload_options = get_option('frugal_upload_options'); ?>
	
	<div class="wrap">
		<h2><b>frugal</b> <?php _e('Settings/Uploads', 'frugal'); ?></h2>
		<p style="font-family: Georgia, Times New Roman, Trebuchet MS;"><b><a href="http://frugaltheme.com">frugalTheme.com</a> | <a href="<?php bloginfo('template_directory'); ?>/lib/options-info.html">INTRO</a> | <a href="http://frugaltheme.com/support"><i>frugal</i> SUPPORT</a> | <a href="http://frugaltheme.com/affiliates">AFFILIATES</a> | See your current <a href="<?php bloginfo('template_directory'); ?>/lib/css/dynamic.css"><i>DYNAMIC</i> STYLES </a></b>
		<a class="tooltip" href="#" class="tooltip" title="<?php _e('When using the CSS option below your frugal theme writes your current style selections to a CSS file so they can be easily cacheable by browsers (the PHP option utilizes caching as well, but in a different manor). Being able to view this file gives you a look at your current hard coded styles. I find this useful when troubleshooting styling issues among other things. Also, if you\'d like to download this file for a hard copy of your current CSS settings you can just right-click the \'<i>DYNAMIC</i> STYLES\' like and then left-click \'Save link as...\' and then click \'save\'.', 'frugal'); ?>">[?]</a></p>
		<?php
		
		if( ( !empty( $_GET['msg'] ) ) && ( $_GET['msg'] != '' ) && !( isset( $_GET['reset'] ) ) )
		{
		?>
			<p style="background:#EDF0F5; width:780px; padding:5px 10px 5px 10px; border:1px solid #ddd;"><b><i><span style="font-family: Georgia, Times New Roman, Trebuchet MS;">frugal</span></i></b> <?php _e('has been Updated!', 'frugal'); ?> <a href="<?php echo get_bloginfo('url')?>"><?php _e('View Site', 'frugal'); ?> &raquo;</a>
		<?php
		}
		if( !empty( $_GET['import'] ) && $_GET['import'] == 'fail')
		{
		?>
			<p style="background:#EDF0F5; width:780px; padding:5px 10px 5px 10px; border:1px solid #ddd;"><b><i><span style="font-family: Georgia, Times New Roman, Trebuchet MS; color:red;">frugal</span></i></b><span style="color:red;"> <?php _e('has encountered an error. Only .zip files can be imported. Please try again.', 'frugal'); ?></span>
		<?php
		}
		?>
		
	<div class="upload_settings_wrap">
	
		<?php frugal_build_admin_menus( 'uo', $upload_options ); ?>
		
		<div class="optionbox_outer_5">
			<div class="optionbox_inner_5">
				<div class='placeholder'>

					<h3><?php _e('IMAGE UPLOAD OPTIONS: Images are uploaded to the <code>/wp-content/uploads/frugal/</code> directory.', 'frugal'); ?> <a class="tooltip" href="#" class="tooltip" title="<?php _e('Here you can upload images from your computer and store them in your /wp-content/uploads/frugal/ directory. The \'Upload Options\' allows you to resize your images upon upload. This option is not intended to be used for gallery images and the like. Use this for images that pertain to the design of your website like backgrounds, buttons, logos and Skins.', 'frugal'); ?>">[<?php _e('More Info', 'frugal'); ?>...]</a></h3>
			
					<b class="container">
					<b class="container1"></b>
					<b class="container2"><b></b></b>
					<b class="container3"></b>
					<b class="container4"></b>
					<b class="container5"></b></b>

					<div class='containercontent'>
						<div class='containercontent-input'>
							<form method="post" action="?page=frugal&fct=upload" enctype="multipart/form-data" >
							<p>
								<input type="file" name="image" size="80" class="fileinput" ></input>
							<div id="upload-progress" style="display:none" class="uploadprogress">
							<?php _e('Please wait, uploading image.', 'frugal'); ?>
							</div>
						</div>
				
						<?php uploadoptions(); ?>
						<?php if( !empty( $message ) ) { echo $message; } ?>
				
						<div class="buttoncontainer"><a href="javascript:;" onmousedown="toggleSlide('uploadoptions');" class="button"><?php _e('Upload Options', 'frugal'); ?></a>
							<input type="submit" name="upload" value="Upload Image" class="inputbutton" onClick="displayLoading();"></input>
						</div>
							</p>
							</form>
			<!--This code displays success and error messages when they occur-->
					</div>
  
					<b class="container">
					<b class="container5"></b>
					<b class="container4"></b>
					<b class="container3"></b>
					<b class="container2"><b></b></b>
					<b class="container1"><b></b></b></b>

				</div>
				<form method="post" action="?page=frugal&fct=bulkdelete" onSubmit="return verify()">
				<?php listimages(); ?>
				<div class="buttoncontainer">
					<input type="submit" value="Delete Selected Images" name="action"/>
					<span onclick="jQuery('input[@type=checkbox].image_check').removeAttr('checked')" class="button"><?php _e('Deselect All', 'frugal'); ?></span>		
					<span onclick="jQuery('input[@type=checkbox].image_check').attr('checked', 'checked')" class="button"><?php _e('Select All', 'frugal'); ?></span>				
				</div>
				</form>
			</div>
		</div>
		<div id="frugal_this_page" style="display:none;">uo</div>
	</div>
<?php
}

add_action( 'admin_init', 'frugal_init' );
function frugal_init()
{
	if(isset($_GET['import']))
	{
		if($_GET['import'] == 'complete')
		{
			$upload_options = get_option('frugal_upload_options');
			if($upload_options['fr_dynamic_stylesheet_format'] == "CSS" && get_option('frugal_css_stylesheet') == 2)
			{
				frugal_dynamic_styles();
				update_option('frugal_css_timestamp', mktime());
			}
			wp_redirect('admin.php?page=frugal&msg=frugalimportcomplete');
			exit();
		}
	}
	if(isset($_GET['fct']))
	{
		if($_GET['fct'] == 'skinExport')
		{
			frugal_data_export($_POST['frugal_skin_name']);
		}
		if($_GET['fct'] == 'skinImport')
		{
			$import_file = $_FILES['skinImport'];
			$import_type = $_POST['import_type'];
			frugal_data_import($import_file, $import_type);
		}
		if($_GET['fct'] == 'optionsImport')
		{
			$import_file = $_FILES['optionsImport'];
			$import_type = $_POST['import_type'];
			$option_sets = $_POST['option_sets'];
			frugal_data_import($import_file, $import_type, $option_sets);
		}
	}	
	if(isset($_GET['dld']))
	{
		if($_GET['dld'] == 'exportall')
		{
			$export_images = $_POST['export_images'];
			frugal_data_export('no_skin_name', $export_images);
		}
	}	
	if( !empty( $_POST['action'] ) && ( $_POST['action'] == 'upload-all-options' ))
	{
		$import_file = $_FILES['file'];
		$import_type = 'options';
		$option_sets = $_POST['option_sets'];
		frugal_data_import($import_file, $import_type, $option_sets);
	}
	if( !empty( $_GET['fct'] ) )
	{
		switch ($_GET['fct'])
		{
			case 'upload':
			uploadimage();
			break;
			
			case 'rename':
			renameimage();
			break;
			
			case 'dorename':
			dorename();
			break;
			
			case 'delete':
			deleteimage();
			break;
			
			case 'dodelete':
			dodelete();
			break;
			
			case 'bulkdelete':
			@dobulkdelete(); 
			break;
		}
	}
	if( !empty( $_POST["action"] ) && ( $_POST["action"] == "Save" ) )
	{
		$new_options = $_POST['frugal'];
		update_option('frugal_upload_options', $new_options);
		$upload_options = get_option('frugal_upload_options');
		$new_memory_limit = $_POST['frugal_memory_limit'];
		if ( get_option('frugal_memory_limit')  != $new_memory_limit)
		{
			update_option('frugal_memory_limit', $new_memory_limit);
		}
		if ($upload_options['fr_dynamic_stylesheet_format'] == "CSS" && get_option('frugal_css_stylesheet') == 2)
		{
			frugal_dynamic_styles();
		}
		if ($upload_options['fr_dynamic_stylesheet_format'] == "PHP")
		{
			update_option('frugal_css_stylesheet', 0); 
		}
		else
		{
			update_option('frugal_css_stylesheet', 2);
		}	
		update_option('frugal_css_timestamp', mktime());
		
		wp_redirect('admin.php?page=frugal&msg=saved');
		exit();	
	}
}

?>