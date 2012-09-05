<?php //** Build Dynamic Styles  **//

class frugal_dyn_CSS {
	function build() {
		$this->frugal_design();
	}
	
	function frugal_design() {

	$main_options = get_option('frugal_main_options');
	$feature_options = get_option('frugal_feature_options');
	$header_design = get_option('frugal_header_design');
	$content_design = get_option('frugal_content_design');
	$feature_design = get_option('frugal_feature_design');
		
		//** Define Content Column Width & Padding **//
		
		$cc_width = $content_design['fr_content_column_width'];
		
		$cc_border_style = $content_design['fr_cc_border_style'];
		$cc_border_thickness = $content_design['fr_cc_border_thickness'];
		$cc_border_padding = $cc_border_thickness * 2;
		
		if ($content_design['fr_layout_type'] == "No Sidebar")
		{
			$cc_padding = 20;
		}
		else
		{
			$cc_padding = 30;
		}
		
		$cc_ds_padding = 40;
		
		if ($content_design['fr_cc_border_thickness'] == "0")
		{
			$cc_with_border_padding = 0;
			$cc_padding_style = "20px 10px 10px 10px";
		}
		else
		{
			$cc_with_border_padding = 10;
			$cc_padding_style = "10px 15px 10px 15px";
		}
		
		//** Define Sidebar Width & Padding **//
		
		$sb_1 = $content_design['fr_sidebar_1_width'];
		$sb_2 = $content_design['fr_sidebar_2_width'];
		$sb_h = $feature_options['fr_sidebar_h_width'];
		$sb_cms_1 = $content_design['fr_sidebar_cms_1_width'];
		$sb_cms_2 = $content_design['fr_sidebar_cms_2_width'];
		
		if ($content_design['fr_layout_type'] == "Double Sidebar" || $content_design['fr_layout_type'] == "Double Right Sidebar" || $content_design['fr_layout_type'] == "Double Left Sidebar")
		{
			$sidebar_width = $sb_1 + $sb_2;
		}
		elseif ($content_design['fr_layout_type'] == "No Sidebar")
		{
			$sidebar_width = 0;
		}
		else
		{
			$sidebar_width = $sb_1;
		}
		
		$sb_border_style = $content_design['fr_sb_border_style'];
		$sb_border_thickness = $content_design['fr_sb_border_thickness'];
		$sb_h_border_style = $feature_design['fr_sb_h_border_style'];
		$sb_h_border_thickness = $feature_design['fr_sb_h_border_thickness'];
		$sb_h_border_color = $feature_design['fr_sb_h_border_color'];
		
		if ($content_design['fr_sb_border_thickness'] != "0" && $content_design['fr_layout_type'] != "Double Sidebar" && $content_design['fr_sb_content_border_thickness'] == "0" || $content_design['fr_sb_border_thickness'] != "0" && $content_design['fr_layout_type'] != "Double Sidebar" && $content_design['fr_sb_content_design_active'] == "No")
		{
			$sb_w_border_padding = 10;
			$sb_1_alt_padding = '5px 10px 5px 15px';
			$sb_2_alt_padding = '5px 15px 5px 10px';
			$sb_widget_alt_padding = '10px 0px 10px 0px';
		}
		elseif ($content_design['fr_sb_border_thickness'] != "0" && $content_design['fr_layout_type'] == "Double Sidebar" && $content_design['fr_sb_content_border_thickness'] == "0" || $content_design['fr_sb_border_thickness'] != "0" && $content_design['fr_layout_type'] == "Double Sidebar" && $content_design['fr_sb_content_design_active'] == "No")
		{
			$sb_w_border_padding = 20;
			$sb_1_alt_padding = '10px 15px 10px 15px';
			$sb_2_alt_padding = '10px 15px 10px 15px';
			$sb_widget_alt_padding = '10px 0px 10px 0px';
		}
		elseif ($content_design['fr_layout_type'] == "Double Sidebar" && $content_design['fr_sb_content_border_thickness'] != "0" && $content_design['fr_sb_content_design_active'] == "Yes")
		{
			$ds_extra_padding = 10;
			$sb_1_alt_padding = '5px 10px 5px 10px';
			$sb_2_alt_padding = '5px 10px 5px 10px';
			$sb_widget_alt_padding = '5px 0px 5px 0px';
		}
		elseif ($content_design['fr_sb_border_thickness'] == "0" && $content_design['fr_layout_type'] != "Double Sidebar" && $content_design['fr_sb_content_border_thickness'] == "0" || $content_design['fr_sb_border_thickness'] == "0" && $content_design['fr_layout_type'] != "Double Sidebar" && $content_design['fr_sb_content_design_active'] == "No")
		{
			$sb_w_border_padding = 0;
			$sb_1_alt_padding = '0px 10px 0px 10px';
			$sb_2_alt_padding = '0px 10px 0px 10px';
			$sb_widget_alt_padding = '10px 0px 10px 0px';
		}
		elseif ($content_design['fr_sb_border_thickness'] == "0" && $content_design['fr_layout_type'] == "Double Sidebar" && $content_design['fr_sb_content_border_thickness'] == "0" || $content_design['fr_sb_border_thickness'] == "0" && $content_design['fr_layout_type'] == "Double Sidebar" && $content_design['fr_sb_content_design_active'] == "No")
		{
			$ds_extra_padding = 10;
			$sb_1_alt_padding = '0px 10px 0px 10px';
			$sb_2_alt_padding = '0px 10px 0px 10px';
			$sb_widget_alt_padding = '10px 0px 10px 0px';
		}
		elseif ($content_design['fr_sb_content_border_thickness'] != "0" && $content_design['fr_sb_content_design_active'] == "Yes" && $content_design['fr_layout_type'] != "Right Sidebar" && $content_design['fr_layout_type'] != "Left Sidebar")
		{
			$sb_w_border_padding = -10;
			$sb_1_alt_padding = '5px 5px 5px 10px';
			$sb_2_alt_padding = '5px 10px 5px 5px';
			$sb_widget_alt_padding = '5px 0px 5px 0px';
		}
		elseif ($content_design['fr_sb_content_border_thickness'] != "0" && $content_design['fr_sb_content_design_active'] == "Yes" && $content_design['fr_layout_type'] == "Right Sidebar" || $content_design['fr_layout_type'] == "Left Sidebar")
		{
			$sb_w_border_padding = 0;
			$sb_1_alt_padding = '5px 5px 5px 10px';
			$sb_2_alt_padding = '5px 10px 5px 5px';
			$sb_widget_alt_padding = '5px 0px 5px 0px';
		}
		
		if ($content_design['fr_sb_border_thickness'] != "0" && $content_design['fr_cms_layout_type'] != "Double Sidebar" && $content_design['fr_sb_content_border_thickness'] == "0")
		{
			$sb_cms_w_border_padding = 10;
			$sb_cms_alt_padding = '5px 15px 5px 15px';
			$sb_cms_widget_alt_padding = '10px 0px 10px 0px';
		}
		elseif ($content_design['fr_sb_border_thickness'] != "0" && $content_design['fr_cms_layout_type'] == "Double Sidebar" && $content_design['fr_sb_content_border_thickness'] == "0")
		{
			$sb_cms_w_border_padding = 50;
			$sb_cms_alt_padding = '5px 15px 5px 15px';
			$sb_cms_widget_alt_padding = '10px 0px 10px 0px';
		}
		elseif ($content_design['fr_cms_layout_type'] == "Double Sidebar" && $content_design['fr_sb_content_border_thickness'] != "0")
		{
			$sb_cms_w_border_padding = 30;
			$sb_cms_alt_padding = '5px 10px 5px 10px';
			$sb_cms_widget_alt_padding = '5px 0px 5px 0px';
		}
		elseif ($content_design['fr_sb_border_thickness'] == "0" && $content_design['fr_cms_layout_type'] != "Double Sidebar" && $content_design['fr_sb_content_border_thickness'] == "0")
		{
			$sb_cms_w_border_padding = 0;
			$sb_cms_alt_padding = '0px 10px 0px 10px';
			$sb_cms_widget_alt_padding = '10px 0px 10px 0px';
		}
		elseif ($content_design['fr_sb_border_thickness'] == "0" && $content_design['fr_cms_layout_type'] == "Double Sidebar" && $content_design['fr_sb_content_border_thickness'] == "0")
		{
			$sb_cms_w_border_padding = 30;
			$sb_cms_alt_padding = '0px 10px 0px 10px';
			$sb_cms_widget_alt_padding = '10px 0px 10px 0px';
		}
		elseif ($content_design['fr_sb_content_border_thickness'] != "0" && $content_design['fr_cms_layout_type'] != "Right Sidebar" && $content_design['fr_cms_layout_type'] != "Left Sidebar")
		{
			$sb_cms_w_border_padding = 10;
			$sb_cms_alt_padding = '5px 15px 5px 15px';
			$sb_cms_widget_alt_padding = '5px 0px 5px 0px';
		}
		elseif ($content_design['fr_sb_content_border_thickness'] != "0" && $content_design['fr_cms_layout_type'] == "Right Sidebar" || $content_design['fr_cms_layout_type'] == "Left Sidebar")
		{
			$sb_cms_w_border_padding = 0;
			$sb_cms_alt_padding = '5px 10px 5px 10px';
			$sb_cms_widget_alt_padding = '5px 0px 5px 0px';
		}
		
		if ($feature_design['fr_sb_h_border_thickness'] == "0" && $content_design['fr_sb_content_border_thickness'] == "0")
		{
			$sb_h_with_border_padding = 0;
			$sb_h_alt_padding = '10px';
			$sb_h_widget_alt_padding = '10px 0px 10px 0px';
		}
		elseif ($feature_design['fr_sb_h_border_thickness'] == "0" && $content_design['fr_sb_content_border_thickness'] != "0")
		{
			$sb_h_with_border_padding = 0;
			$sb_h_alt_padding = '10px';
			$sb_h_widget_alt_padding = '5px 0px 5px 0px';
		}
		elseif ($feature_design['fr_sb_h_border_thickness'] != "0" && $content_design['fr_sb_content_border_thickness'] == "0")
		{
			$sb_h_with_border_padding = 20;
			$sb_h_alt_padding = '10px 15px 10px 15px';
			$sb_h_widget_alt_padding = '10px 0px 10px 0px';
		}
		elseif ($feature_design['fr_sb_h_border_thickness'] != "0" && $content_design['fr_sb_content_border_thickness'] != "0")
		{
			$sb_h_with_border_padding = 10;
			$sb_h_alt_padding = '5px 10px 5px 10px';
			$sb_h_widget_alt_padding = '5px 0px 5px 0px';
		}
		
		if ($content_design['fr_layout_type'] == "Double Sidebar")
		{
			$sb_border_padding = $sb_border_thickness * 4;
			$sb_with_border_padding_main = $sb_w_border_padding;
			$sb_with_border_padding = $sb_w_border_padding - 10;
		}
		else
		{
			$sb_border_padding = $sb_border_thickness * 2;
			$sb_with_border_padding_main = $sb_w_border_padding;
			$sb_with_border_padding = $sb_w_border_padding;
		}
		
		if ($content_design['fr_cms_layout_type'] == "Double Sidebar")
		{
			$sb_cms_border_padding = $sb_border_thickness * 4;
			$sb_cms_width = $sb_cms_1 + $sb_cms_2;
		}
		else
		{
			$sb_cms_border_padding = $sb_border_thickness * 2;
			$sb_cms_width = $sb_cms_1;
		}
		
		$sb_padding = 20;
		$double_sb_padding = 40;
		
		//** Define Body Border & Padding Thickness **//
		
		$border_style = $content_design['fr_border_style'];
		$tb_border_thickness = $content_design['fr_tb_border_thickness'];
		$lr_border_thickness = $content_design['fr_lr_border_thickness'];
		$tb_padding_thickness = $content_design['fr_tb_padding_thickness'];
		$lr_padding_thickness = $content_design['fr_lr_padding_thickness'];
		$container_border_style = $content_design['fr_container_border_style'];
		$container_tb_border_thickness = $content_design['fr_container_tb_border_thickness'];
		$container_lr_border_thickness = $content_design['fr_container_lr_border_thickness'];
		$container_lr_border_padding = $container_lr_border_thickness * 2;
		
		//** Define Full Content Width **//
		
		if ($content_design['fr_layout_type'] == "Double Sidebar")
		{
			$content_padding = $cc_ds_padding + $double_sb_padding + $cc_border_padding + $sb_border_padding + $cc_with_border_padding + $sb_with_border_padding_main;
		}
		elseif ($content_design['fr_layout_type'] == "Double Right Sidebar" || $content_design['fr_layout_type'] == "Double Left Sidebar")
		{
			$content_padding = $cc_padding + $double_sb_padding + $cc_border_padding + $sb_border_padding + $cc_with_border_padding + $sb_with_border_padding_main;
		}
		elseif ($content_design['fr_layout_type'] == "No Sidebar")
		{
			$content_padding = $cc_padding + $cc_border_padding + $cc_with_border_padding;
		}
		else
		{
			$content_padding = $cc_padding + $sb_padding + $cc_border_padding + $sb_border_padding + $cc_with_border_padding + $sb_with_border_padding_main;
		}
		
		$content_width = $cc_width + $sidebar_width + $content_padding;
		$container_lr_padding = $content_design['fr_lr_container_padding'];
		$content_area_padding = $container_lr_padding / 2;
		$container_width = $content_width + $container_lr_padding + $container_lr_border_padding;
		$container_div_width = $container_width - $container_lr_border_padding;
		
		//** Define Body Width **//
		
		$full_width = $container_width + $lr_border_thickness + $lr_padding_thickness;
		
		//** Main Background Styles **//
		
		$bg_color = $content_design['fr_bg_color'];
		$bg_image_name = $content_design['fr_bg_image_name'];
		$frugal_upload_dir = frugal_upload_dir();
		
		if ($content_design['fr_bg_type'] == "No-Repeat Image (Left)")
		{
			$bg_image_type = ' url(' . $frugal_upload_dir . $bg_image_name . ') no-repeat';
		}
		elseif ($content_design['fr_bg_type'] == "No-Repeat Image (Center)")
		{
			$bg_image_type = ' url(' . $frugal_upload_dir . $bg_image_name . ') top center no-repeat';
		}
		elseif ($content_design['fr_bg_type'] == "No-Repeat Image (Right)")
		{
			$bg_image_type = ' url(' . $frugal_upload_dir . $bg_image_name . ') top right no-repeat';
		}
		elseif ($content_design['fr_bg_type'] == "No-Repeat Image (Left Fixed)")
		{
			$bg_image_type = ' url(' . $frugal_upload_dir . $bg_image_name . ') fixed no-repeat';
		}
		elseif ($content_design['fr_bg_type'] == "No-Repeat Image (Center Fixed)")
		{
			$bg_image_type = ' url(' . $frugal_upload_dir . $bg_image_name . ') top center fixed no-repeat';
		}
		elseif ($content_design['fr_bg_type'] == "No-Repeat Image (Right Fixed)")
		{
			$bg_image_type = ' url(' . $frugal_upload_dir . $bg_image_name . ') top right fixed no-repeat';
		}
		elseif ($content_design['fr_bg_type'] == "Horizontal-Repeat Image")
		{
			$bg_image_type = ' url(' . $frugal_upload_dir . $bg_image_name . ') repeat-x';
		}
		elseif ($content_design['fr_bg_type'] == "Horizontal-Repeat Image (Fixed)")
		{
			$bg_image_type = ' url(' . $frugal_upload_dir . $bg_image_name . ') fixed repeat-x';
		}
		elseif ($content_design['fr_bg_type'] == "Vertical-Repeat Image")
		{
			$bg_image_type = ' url(' . $frugal_upload_dir . $bg_image_name . ') repeat-y';
		}
		elseif ($content_design['fr_bg_type'] == "Vertical-Repeat Image (Fixed)")
		{
			$bg_image_type = ' url(' . $frugal_upload_dir . $bg_image_name . ') fixed repeat-y';
		}
		elseif ($content_design['fr_bg_type'] == "Horizontal & Vertical-Repeat Image")
		{
			$bg_image_type = ' url(' . $frugal_upload_dir . $bg_image_name . ') repeat';
		}
		elseif ($content_design['fr_bg_type'] == "Horizontal & Vertical-Repeat Image (Fixed)")
		{
			$bg_image_type = ' url(' . $frugal_upload_dir . $bg_image_name . ') fixed repeat';
		}
		else
		{
			$bg_image_type = '';
		}
		
		//** More Background Styles **//
		
		$wrap_bg_color = $content_design['fr_wrap_bg_color'];
		$wrap_bg_image_name = $content_design['fr_wrap_bg_image_name'];
		
		if ($content_design['fr_wrap_bg_type'] == "No-Repeat Image")
		{
			$wrap_bg_image_type = ' url(' . $frugal_upload_dir . $wrap_bg_image_name . ') no-repeat';
		}
		elseif ($content_design['fr_wrap_bg_type'] == "Horizontal-Repeat Image")
		{
			$wrap_bg_image_type = ' url(' . $frugal_upload_dir . $wrap_bg_image_name . ') repeat-x';
		}
		elseif ($content_design['fr_wrap_bg_type'] == "Vertical-Repeat Image")
		{
			$wrap_bg_image_type = ' url(' . $frugal_upload_dir . $wrap_bg_image_name . ') repeat-y';
		}
		elseif ($content_design['fr_wrap_bg_type'] == "Horizontal & Vertical-Repeat Image")
		{
			$wrap_bg_image_type = ' url(' . $frugal_upload_dir . $wrap_bg_image_name . ') repeat';
		}
		else
		{
			$wrap_bg_image_type = '';
		}
		
		if ($content_design['fr_wrap_bg_type'] != "Transparent")
		{
			$wrap_bg = 'background: #' . $wrap_bg_color . $wrap_bg_image_type . ';';
		}
		else
		{
			$wrap_bg = 'background: transparent;';
		}
		
		$container_bg_color = $content_design['fr_container_bg_color'];
		$container_bg_image_name = $content_design['fr_container_bg_image_name'];
		
		if ($content_design['fr_container_bg_type'] == "No-Repeat Image")
		{
			$container_bg_image_type = ' url(' . $frugal_upload_dir . $container_bg_image_name . ') no-repeat';
		}
		elseif ($content_design['fr_container_bg_type'] == "Horizontal-Repeat Image")
		{
			$container_bg_image_type = ' url(' . $frugal_upload_dir . $container_bg_image_name . ') repeat-x';
		}
		elseif ($content_design['fr_container_bg_type'] == "Vertical-Repeat Image")
		{
			$container_bg_image_type = ' url(' . $frugal_upload_dir . $container_bg_image_name . ') repeat-y';
		}
		elseif ($content_design['fr_container_bg_type'] == "Horizontal & Vertical-Repeat Image")
		{
			$container_bg_image_type = ' url(' . $frugal_upload_dir . $container_bg_image_name . ') repeat';
		}
		else
		{
			$container_bg_image_type = '';
		}
		
		if ($content_design['fr_container_bg_type'] != "Transparent")
		{
			$container_bg = 'background: #' . $container_bg_color . $container_bg_image_type . ';';
		}
		else
		{
			$container_bg = 'background: transparent;';
		}
		
		if ($content_design['fr_wide_container_bg_type'] != "Inherit Container")
		{
			$wide_container_bg_color = $content_design['fr_wide_container_bg_color'];
			$wide_container_bg_image_name = $content_design['fr_wide_container_bg_image_name'];
			
			if ($content_design['fr_wide_container_bg_type'] == "No-Repeat Image")
			{
				$wide_container_bg_image_type = ' url(' . $frugal_upload_dir . $wide_container_bg_image_name . ') no-repeat';
			}
			elseif ($content_design['fr_wide_container_bg_type'] == "Horizontal-Repeat Image")
			{
				$wide_container_bg_image_type = ' url(' . $frugal_upload_dir . $wide_container_bg_image_name . ') repeat-x';
			}
			elseif ($content_design['fr_wide_container_bg_type'] == "Vertical-Repeat Image")
			{
				$wide_container_bg_image_type = ' url(' . $frugal_upload_dir . $wide_container_bg_image_name . ') repeat-y';
			}
			elseif ($content_design['fr_wide_container_bg_type'] == "Horizontal & Vertical-Repeat Image")
			{
				$wide_container_bg_image_type = ' url(' . $frugal_upload_dir . $wide_container_bg_image_name . ') repeat';
			}
			else
			{
				$wide_container_bg_image_type = '';
			}
			
			if ($content_design['fr_wide_container_bg_type'] != "Transparent")
			{
				$wide_container_bg = 'background: #' . $wide_container_bg_color . $wide_container_bg_image_type . ';';
			}
			else
			{
				$wide_container_bg = 'background: transparent;';
			}
		}
		else
		{
			$wide_container_bg = $container_bg;
		}
		
		if ($content_design['fr_cms_container_bg_type'] != "Inherit Container")
		{
			$cms_container_bg_color = $content_design['fr_cms_container_bg_color'];
			$cms_container_bg_image_name = $content_design['fr_cms_container_bg_image_name'];
			
			if ($content_design['fr_cms_container_bg_type'] == "No-Repeat Image")
			{
				$cms_container_bg_image_type = ' url(' . $frugal_upload_dir . $cms_container_bg_image_name . ') no-repeat';
			}
			elseif ($content_design['fr_cms_container_bg_type'] == "Horizontal-Repeat Image")
			{
				$cms_container_bg_image_type = ' url(' . $frugal_upload_dir . $cms_container_bg_image_name . ') repeat-x';
			}
			elseif ($content_design['fr_cms_container_bg_type'] == "Vertical-Repeat Image")
			{
				$cms_container_bg_image_type = ' url(' . $frugal_upload_dir . $cms_container_bg_image_name . ') repeat-y';
			}
			elseif ($content_design['fr_cms_container_bg_type'] == "Horizontal & Vertical-Repeat Image")
			{
				$cms_container_bg_image_type = ' url(' . $frugal_upload_dir . $cms_container_bg_image_name . ') repeat';
			}
			else
			{
				$cms_container_bg_image_type = '';
			}
			
			if ($content_design['fr_cms_container_bg_type'] != "Transparent")
			{
			$cms_container_bg = 'background: #' . $cms_container_bg_color . $cms_container_bg_image_type . ';';
			}
			else
			{
			$cms_container_bg = 'background: transparent;';
			}
		}
		else
		{
			$cms_container_bg = $container_bg;
		}
		
		$header_bg_color = $header_design['fr_header_bg_color'];
		$header_bg_image_name = $header_design['fr_header_bg_image_name'];
		
		if ($header_design['fr_header_bg_type'] == "No-Repeat Image (Left)")
		{
			$header_bg_image_type = ' url(' . $frugal_upload_dir . $header_bg_image_name . ') no-repeat';
		}
		elseif ($header_design['fr_header_bg_type'] == "No-Repeat Image (Center)")
		{
			$header_bg_image_type = ' url(' . $frugal_upload_dir . $header_bg_image_name . ') top center no-repeat';
		}
		elseif ($header_design['fr_header_bg_type'] == "Horizontal-Repeat Image")
		{
			$header_bg_image_type = ' url(' . $frugal_upload_dir . $header_bg_image_name . ') repeat-x';
		}
		elseif ($header_design['fr_header_bg_type'] == "Vertical-Repeat Image")
		{
			$header_bg_image_type = ' url(' . $frugal_upload_dir . $header_bg_image_name . ') repeat-y';
		}
		elseif ($header_design['fr_header_bg_type'] == "Horizontal & Vertical-Repeat Image")
		{
			$header_bg_image_type = ' url(' . $frugal_upload_dir . $header_bg_image_name . ') repeat';
		}
		else
		{
			$header_bg_image_type = '';
		}
		
		if ($header_design['fr_header_bg_type'] != "Transparent")
		{
			$header_bg = 'background: #' . $header_bg_color . $header_bg_image_type . ';';
		}
		else
		{
			$header_bg = 'background: transparent;';
		}
		
		$navbar_bg_color = $header_design['fr_navbar_bg_color'];
		$navbar_bg_image_name = $header_design['fr_navbar_bg_image_name'];
		
		if ($header_design['fr_navbar_bg_type'] == "No-Repeat Image")
		{
			$navbar_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_bg_image_name . ') no-repeat';
		}
		elseif ($header_design['fr_navbar_bg_type'] == "Horizontal-Repeat Image")
		{
			$navbar_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_bg_image_name . ') repeat-x';
		}
		else
		{
			$navbar_bg_image_type = '';
		}
		
		if ($header_design['fr_navbar_bg_type'] != "Transparent")
		{
			$navbar_bg = 'background: #' . $navbar_bg_color . $navbar_bg_image_type . ';';
		}
		else
		{
			$navbar_bg = 'background: transparent;';
		}
		
		$navbar_cp_bg_color = $header_design['fr_navbar_cp_bg_color'];
		$navbar_cp_bg_image_name = $header_design['fr_navbar_cp_bg_image_name'];
		
		if ($header_design['fr_navbar_cp_bg_type'] == "No-Repeat Image")
		{
			$navbar_cp_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_cp_bg_image_name . ') no-repeat';
		}
		elseif ($header_design['fr_navbar_cp_bg_type'] == "Horizontal-Repeat Image")
		{
			$navbar_cp_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_cp_bg_image_name . ') repeat-x';
		}
		else
		{
			$navbar_cp_bg_image_type = '';
		}
		
		if ($header_design['fr_navbar_cp_bg_type'] != "Transparent")
		{
			$navbar_cp_bg = 'background: #' . $navbar_cp_bg_color . $navbar_cp_bg_image_type . ';';
		}
		else
		{
			$navbar_cp_bg = 'background: transparent;';
		}
		
		$navbar_non_cp_bg_color = $header_design['fr_navbar_non_cp_bg_color'];
		$navbar_non_cp_bg_image_name = $header_design['fr_navbar_non_cp_bg_image_name'];
		
		if ($header_design['fr_navbar_non_cp_bg_type'] == "No-Repeat Image")
		{
			$navbar_non_cp_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_non_cp_bg_image_name . ') no-repeat';
		}
		elseif ($header_design['fr_navbar_non_cp_bg_type'] == "Horizontal-Repeat Image")
		{
			$navbar_non_cp_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_non_cp_bg_image_name . ') repeat-x';
		}
		else
		{
			$navbar_non_cp_bg_image_type = '';
		}
		
		if ($header_design['fr_navbar_non_cp_bg_type'] != "Transparent")
		{
			$navbar_non_cp_bg = 'background: #' . $navbar_non_cp_bg_color . $navbar_non_cp_bg_image_type . ';';
		}
		else
		{
			$navbar_non_cp_bg = 'background: transparent;';
		}
		
		$navbar_non_cp_hover_bg_color = $header_design['fr_navbar_non_cp_hover_bg_color'];
		$navbar_non_cp_hover_bg_image_name = $header_design['fr_navbar_non_cp_hover_bg_image_name'];
		
		if ($header_design['fr_navbar_non_cp_hover_bg_type'] == "No-Repeat Image")
		{
			$navbar_non_cp_hover_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_non_cp_hover_bg_image_name . ') no-repeat';
		}
		elseif ($header_design['fr_navbar_non_cp_hover_bg_type'] == "Horizontal-Repeat Image")
		{
			$navbar_non_cp_hover_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_non_cp_hover_bg_image_name . ') repeat-x';
		}
		else
		{
			$navbar_non_cp_hover_bg_image_type = '';
		}
		
		if ($header_design['fr_navbar_non_cp_hover_bg_type'] != "Transparent")
		{
			$navbar_non_cp_hover_bg = 'background: #' . $navbar_non_cp_hover_bg_color . $navbar_non_cp_hover_bg_image_type . ';';
		}
		else
		{
			$navbar_non_cp_hover_bg = 'background: transparent;';
		}
		
		$navbar_sub_bg_color = $header_design['fr_navbar_sub_bg_color'];
		$navbar_sub_bg_image_name = $header_design['fr_navbar_sub_bg_image_name'];
		
		if ($header_design['fr_navbar_sub_bg_type'] == "No-Repeat Image")
		{
			$navbar_sub_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_sub_bg_image_name . ') no-repeat';
		}
		elseif ($header_design['fr_navbar_sub_bg_type'] == "Horizontal-Repeat Image")
		{
			$navbar_sub_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_sub_bg_image_name . ') repeat-x';
		}
		else
		{
			$navbar_sub_bg_image_type = '';
		}
		
		$navbar_sub_hover_bg_color = $header_design['fr_navbar_sub_hover_bg_color'];
		$navbar_sub_hover_bg_image_name = $header_design['fr_navbar_sub_hover_bg_image_name'];
		
		if ($header_design['fr_navbar_sub_hover_bg_type'] == "No-Repeat Image")
		{
			$navbar_sub_hover_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_sub_hover_bg_image_name . ') no-repeat';
		}
		elseif ($header_design['fr_navbar_sub_hover_bg_type'] == "Horizontal-Repeat Image")
		{
			$navbar_sub_hover_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_sub_hover_bg_image_name . ') repeat-x';
		}
		else
		{
			$navbar_sub_hover_bg_image_type = '';
		}
		
		$navbar_sub_cp_bg_color = $header_design['fr_navbar_sub_cp_bg_color'];
		$navbar_sub_cp_bg_image_name = $header_design['fr_navbar_sub_cp_bg_image_name'];
		
		if ($header_design['fr_navbar_sub_cp_bg_type'] == "No-Repeat Image")
		{
			$navbar_sub_cp_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_sub_cp_bg_image_name . ') no-repeat';
		}
		elseif ($header_design['fr_navbar_sub_cp_bg_type'] == "Horizontal-Repeat Image")
		{
			$navbar_sub_cp_bg_image_type = ' url(' . $frugal_upload_dir . $navbar_sub_cp_bg_image_name . ') repeat-x';
		}
		else
		{
			$navbar_sub_cp_bg_image_type = '';
		}

		$subnav_bg_color = $header_design['fr_subnav_bg_color'];
		$subnav_bg_image_name = $header_design['fr_subnav_bg_image_name'];
		
		if ($header_design['fr_subnav_bg_type'] == "No-Repeat Image"):
		$subnav_bg_image_type = ' url(' . $frugal_upload_dir . $subnav_bg_image_name . ') no-repeat';
		elseif ($header_design['fr_subnav_bg_type'] == "Horizontal-Repeat Image"):
		$subnav_bg_image_type = ' url(' . $frugal_upload_dir . $subnav_bg_image_name . ') repeat-x';
		else:
		$subnav_bg_image_type = '';
		endif;
		
		if ($header_design['fr_subnav_bg_type'] != "Transparent"):
		$subnav_bg = 'background: #' . $subnav_bg_color . $subnav_bg_image_type . ';';
		else:
		$subnav_bg = 'background: transparent;';
		endif;
		
		$subnav_page_bg_color = $header_design['fr_subnav_page_bg_color'];
		$subnav_page_bg_image_name = $header_design['fr_subnav_page_bg_image_name'];
		
		if ($header_design['fr_subnav_page_bg_type'] == "No-Repeat Image"):
		$subnav_page_bg_image_type = ' url(' . $frugal_upload_dir . $subnav_page_bg_image_name . ') no-repeat';
		elseif ($header_design['fr_subnav_page_bg_type'] == "Horizontal-Repeat Image"):
		$subnav_page_bg_image_type = ' url(' . $frugal_upload_dir . $subnav_page_bg_image_name . ') repeat-x';
		else:
		$subnav_page_bg_image_type = '';
		endif;
		
		if ($header_design['fr_subnav_page_bg_type'] != "Transparent"):
		$subnav_page_bg = 'background: #' . $subnav_page_bg_color . $subnav_page_bg_image_type . ';';
		else:
		$subnav_page_bg = 'background: transparent;';
		endif;
		
		$subnav_page_hover_bg_color = $header_design['fr_subnav_page_hover_bg_color'];
		$subnav_page_hover_bg_image_name = $header_design['fr_subnav_page_hover_bg_image_name'];
		
		if ($header_design['fr_subnav_page_hover_bg_type'] == "No-Repeat Image"):
		$subnav_page_hover_bg_image_type = ' url(' . $frugal_upload_dir . $subnav_page_hover_bg_image_name . ') no-repeat';
		elseif ($header_design['fr_subnav_page_hover_bg_type'] == "Horizontal-Repeat Image"):
		$subnav_page_hover_bg_image_type = ' url(' . $frugal_upload_dir . $subnav_page_hover_bg_image_name . ') repeat-x';
		else:
		$subnav_page_hover_bg_image_type = '';
		endif;
		
		if ($header_design['fr_subnav_page_hover_bg_type'] != "Transparent"):
		$subnav_page_hover_bg = 'background: #' . $subnav_page_hover_bg_color . $subnav_page_hover_bg_image_type . ';';
		else:
		$subnav_page_hover_bg = 'background: transparent;';
		endif;
		
		$subnav_sub_bg_color = $header_design['fr_subnav_sub_bg_color'];
		$subnav_sub_bg_image_name = $header_design['fr_subnav_sub_bg_image_name'];
		
		if ($header_design['fr_subnav_sub_bg_type'] == "No-Repeat Image"):
		$subnav_sub_bg_image_type = ' url(' . $frugal_upload_dir . $subnav_sub_bg_image_name . ') no-repeat';
		elseif ($header_design['fr_subnav_sub_bg_type'] == "Horizontal-Repeat Image"):
		$subnav_sub_bg_image_type = ' url(' . $frugal_upload_dir . $subnav_sub_bg_image_name . ') repeat-x';
		else:
		$subnav_sub_bg_image_type = '';
		endif;
		
		$subnav_sub_hover_bg_color = $header_design['fr_subnav_sub_hover_bg_color'];
		$subnav_sub_hover_bg_image_name = $header_design['fr_subnav_sub_hover_bg_image_name'];
		
		if ($header_design['fr_subnav_sub_hover_bg_type'] == "No-Repeat Image"):
		$subnav_sub_hover_bg_image_type = ' url(' . $frugal_upload_dir . $subnav_sub_hover_bg_image_name . ') no-repeat';
		elseif ($header_design['fr_subnav_sub_hover_bg_type'] == "Horizontal-Repeat Image"):
		$subnav_sub_hover_bg_image_type = ' url(' . $frugal_upload_dir . $subnav_sub_hover_bg_image_name . ') repeat-x';
		else:
		$subnav_sub_hover_bg_image_type = '';
		endif;
		
		$ft_bg_color = $feature_design['fr_ft_bg_color'];
		$ft_bg_image_name = $feature_design['fr_ft_bg_image_name'];
		
		if ($feature_design['fr_ft_bg_type'] == "No-Repeat Image"):
		$ft_bg_image_type = ' url(' . $frugal_upload_dir . $ft_bg_image_name . ') no-repeat';
		elseif ($feature_design['fr_ft_bg_type'] == "Horizontal-Repeat Image"):
		$ft_bg_image_type = ' url(' . $frugal_upload_dir . $ft_bg_image_name . ') repeat-x';
		elseif ($feature_design['fr_ft_bg_type'] == "Vertical-Repeat Image"):
		$ft_bg_image_type = ' url(' . $frugal_upload_dir . $ft_bg_image_name . ') repeat-y';
		elseif ($feature_design['fr_ft_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$ft_bg_image_type = ' url(' . $frugal_upload_dir . $ft_bg_image_name . ') repeat';
		else:
		$ft_bg_image_type = '';
		endif;
		
		if ($feature_design['fr_ft_bg_type'] != "Transparent"):
		$ft_bg = 'background: #' . $ft_bg_color . $ft_bg_image_type . ';';
		else:
		$ft_bg = 'background: transparent;';
		endif;

		if ($feature_design['fr_home_top_layout'] == 'Featured Content/Home Sidebar'):
		$ht_bg_color = $wrap_bg_color;
		else:
		$ht_bg_color = $feature_design['fr_ht_bg_color'];
		endif;
		$ht_bg_image_name = $feature_design['fr_ht_bg_image_name'];
		
		if ($feature_design['fr_ht_bg_type'] == "No-Repeat Image"):
		$ht_bg_image_type = ' url(' . $frugal_upload_dir . $ht_bg_image_name . ') no-repeat';
		elseif ($feature_design['fr_ht_bg_type'] == "Horizontal-Repeat Image"):
		$ht_bg_image_type = ' url(' . $frugal_upload_dir . $ht_bg_image_name . ') repeat-x';
		elseif ($feature_design['fr_ht_bg_type'] == "Vertical-Repeat Image"):
		$ht_bg_image_type = ' url(' . $frugal_upload_dir . $ht_bg_image_name . ') repeat-y';
		elseif ($feature_design['fr_ht_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$ht_bg_image_type = ' url(' . $frugal_upload_dir . $ht_bg_image_name . ') repeat';
		else:
		$ht_bg_image_type = '';
		endif;
		
		if ($feature_design['fr_ht_bg_type'] != "Transparent"):
		$ht_bg = 'background: #' . $ht_bg_color . $ht_bg_image_type . ';';
		else:
		$ht_bg = 'background: transparent;';
		endif;
		
		$fb_bg_color = $feature_design['fr_fb_bg_color'];
		$fb_bg_image_name = $feature_design['fr_fb_bg_image_name'];
		
		if ($feature_design['fr_fb_bg_type'] == "No-Repeat Image"):
		$fb_bg_image_type = ' url(' . $frugal_upload_dir . $fb_bg_image_name . ') no-repeat';
		elseif ($feature_design['fr_fb_bg_type'] == "Horizontal-Repeat Image"):
		$fb_bg_image_type = ' url(' . $frugal_upload_dir . $fb_bg_image_name . ') repeat-x';
		elseif ($feature_design['fr_fb_bg_type'] == "Vertical-Repeat Image"):
		$fb_bg_image_type = ' url(' . $frugal_upload_dir . $fb_bg_image_name . ') repeat-y';
		elseif ($feature_design['fr_fb_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$fb_bg_image_type = ' url(' . $frugal_upload_dir . $fb_bg_image_name . ') repeat';
		else:
		$fb_bg_image_type = '';
		endif;
		
		if ($feature_design['fr_fb_bg_type'] != "Transparent"):
		$fb_bg = 'background: #' . $fb_bg_color . $fb_bg_image_type . ';';
		else:
		$fb_bg = 'background: transparent;';
		endif;
		
		$cc_bg_color = $content_design['fr_cc_bg_color'];
		$cc_bg_image_name = $content_design['fr_cc_bg_image_name'];
		
		if ($content_design['fr_cc_bg_type'] == "No-Repeat Image"):
		$cc_bg_image_type = ' url(' . $frugal_upload_dir . $cc_bg_image_name . ') no-repeat';
		elseif ($content_design['fr_cc_bg_type'] == "Horizontal-Repeat Image"):
		$cc_bg_image_type = ' url(' . $frugal_upload_dir . $cc_bg_image_name . ') repeat-x';
		elseif ($content_design['fr_cc_bg_type'] == "Vertical-Repeat Image"):
		$cc_bg_image_type = ' url(' . $frugal_upload_dir . $cc_bg_image_name . ') repeat-y';
		elseif ($content_design['fr_cc_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$cc_bg_image_type = ' url(' . $frugal_upload_dir . $cc_bg_image_name . ') repeat';
		else:
		$cc_bg_image_type = '';
		endif;
		
		if ($content_design['fr_cc_bg_type'] != "Transparent"):
		$cc_bg = 'background: #' . $cc_bg_color . $cc_bg_image_type . ';';
		else:
		$cc_bg = 'background: transparent;';
		endif;
		
		if ($content_design['fr_cms_cc_bg_type'] != "Inherit Content Column"):
		$cms_cc_bg_color = $content_design['fr_cms_cc_bg_color'];
		$cms_cc_bg_image_name = $content_design['fr_cms_cc_bg_image_name'];
		
		if ($content_design['fr_cms_cc_bg_type'] == "No-Repeat Image"):
		$cms_cc_bg_image_type = ' url(' . $frugal_upload_dir . $cms_cc_bg_image_name . ') no-repeat';
		elseif ($content_design['fr_cms_cc_bg_type'] == "Horizontal-Repeat Image"):
		$cms_cc_bg_image_type = ' url(' . $frugal_upload_dir . $cms_cc_bg_image_name . ') repeat-x';
		elseif ($content_design['fr_cms_cc_bg_type'] == "Vertical-Repeat Image"):
		$cms_cc_bg_image_type = ' url(' . $frugal_upload_dir . $cms_cc_bg_image_name . ') repeat-y';
		elseif ($content_design['fr_cms_cc_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$cms_cc_bg_image_type = ' url(' . $frugal_upload_dir . $cms_cc_bg_image_name . ') repeat';
		else:
		$cms_cc_bg_image_type = '';
		endif;
		
		if ($content_design['fr_cms_cc_bg_type'] != "Transparent"):
		$cms_cc_bg = 'background: #' . $cms_cc_bg_color . $cms_cc_bg_image_type . ';';
		else:
		$cms_cc_bg = 'background: transparent;';
		endif;
		
		else:
		$cms_cc_bg = $cc_bg;
		endif;
		
		if ($content_design['fr_wide_cc_bg_type'] != "Inherit Content Column"):
		$wide_cc_bg_color = $content_design['fr_wide_cc_bg_color'];
		$wide_cc_bg_image_name = $content_design['fr_wide_cc_bg_image_name'];
		
		if ($content_design['fr_wide_cc_bg_type'] == "No-Repeat Image"):
		$wide_cc_bg_image_type = ' url(' . $frugal_upload_dir . $wide_cc_bg_image_name . ') no-repeat';
		elseif ($content_design['fr_wide_cc_bg_type'] == "Horizontal-Repeat Image"):
		$wide_cc_bg_image_type = ' url(' . $frugal_upload_dir . $wide_cc_bg_image_name . ') repeat-x';
		elseif ($content_design['fr_wide_cc_bg_type'] == "Vertical-Repeat Image"):
		$wide_cc_bg_image_type = ' url(' . $frugal_upload_dir . $wide_cc_bg_image_name . ') repeat-y';
		elseif ($content_design['fr_wide_cc_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$wide_cc_bg_image_type = ' url(' . $frugal_upload_dir . $wide_cc_bg_image_name . ') repeat';
		else:
		$wide_cc_bg_image_type = '';
		endif;
		
		if ($content_design['fr_wide_cc_bg_type'] != "Transparent"):
		$wide_cc_bg = 'background: #' . $wide_cc_bg_color . $wide_cc_bg_image_type . ';';
		else:
		$wide_cc_bg = 'background: transparent;';
		endif;
		
		else:
		$wide_cc_bg = $cc_bg;
		endif;
		
		$sb_bg_color = $content_design['fr_sb_bg_color'];
		$sb_bg_image_name = $content_design['fr_sb_bg_image_name'];
		
		if ($content_design['fr_sb_bg_type'] == "No-Repeat Image"):
		$sb_bg_image_type = ' url(' . $frugal_upload_dir . $sb_bg_image_name . ') no-repeat';
		elseif ($content_design['fr_sb_bg_type'] == "Horizontal-Repeat Image"):
		$sb_bg_image_type = ' url(' . $frugal_upload_dir . $sb_bg_image_name . ') repeat-x';
		elseif ($content_design['fr_sb_bg_type'] == "Vertical-Repeat Image"):
		$sb_bg_image_type = ' url(' . $frugal_upload_dir . $sb_bg_image_name . ') repeat-y';
		elseif ($content_design['fr_sb_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$sb_bg_image_type = ' url(' . $frugal_upload_dir . $sb_bg_image_name . ') repeat';
		else:
		$sb_bg_image_type = '';
		endif;
		
		if ($content_design['fr_sb_bg_type'] != "Transparent"):
		$sb_bg = 'background: #' . $sb_bg_color . $sb_bg_image_type . ';';
		else:
		$sb_bg = 'background: transparent;';
		endif;
		
		if ($content_design['fr_cms_sb_bg_type'] != "Inherit Sidebars"):
		$cms_sb_bg_color = $content_design['fr_cms_sb_bg_color'];
		$cms_sb_bg_image_name = $content_design['fr_cms_sb_bg_image_name'];
		
		if ($content_design['fr_cms_sb_bg_type'] == "No-Repeat Image"):
		$cms_sb_bg_image_type = ' url(' . $frugal_upload_dir . $cms_sb_bg_image_name . ') no-repeat';
		elseif ($content_design['fr_cms_sb_bg_type'] == "Horizontal-Repeat Image"):
		$cms_sb_bg_image_type = ' url(' . $frugal_upload_dir . $cms_sb_bg_image_name . ') repeat-x';
		elseif ($content_design['fr_cms_sb_bg_type'] == "Vertical-Repeat Image"):
		$cms_sb_bg_image_type = ' url(' . $frugal_upload_dir . $cms_sb_bg_image_name . ') repeat-y';
		elseif ($content_design['fr_cms_sb_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$cms_sb_bg_image_type = ' url(' . $frugal_upload_dir . $cms_sb_bg_image_name . ') repeat';
		else:
		$cms_sb_bg_image_type = '';
		endif;
		
		if ($content_design['fr_cms_sb_bg_type'] != "Transparent"):
		$cms_sb_bg = 'background: #' . $cms_sb_bg_color . $cms_sb_bg_image_type . ';';
		else:
		$cms_sb_bg = 'background: transparent;';
		endif;
		
		else:
		$cms_sb_bg = $sb_bg;
		endif;
		
		if ($feature_design['fr_sb_h_bg_type'] != "Inherit Sidebars"):
		$sb_h_bg_color = $feature_design['fr_sb_h_bg_color'];
		$sb_h_bg_image_name = $feature_design['fr_sb_h_bg_image_name'];
		
		if ($feature_design['fr_sb_h_bg_type'] == "No-Repeat Image"):
		$sb_h_bg_image_type = ' url(' . $frugal_upload_dir . $sb_h_bg_image_name . ') no-repeat';
		elseif ($feature_design['fr_sb_h_bg_type'] == "Horizontal-Repeat Image"):
		$sb_h_bg_image_type = ' url(' . $frugal_upload_dir . $sb_h_bg_image_name . ') repeat-x';
		elseif ($feature_design['fr_sb_h_bg_type'] == "Vertical-Repeat Image"):
		$sb_h_bg_image_type = ' url(' . $frugal_upload_dir . $sb_h_bg_image_name . ') repeat-y';
		elseif ($feature_design['fr_sb_h_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$sb_h_bg_image_type = ' url(' . $frugal_upload_dir . $sb_h_bg_image_name . ') repeat';
		else:
		$sb_h_bg_image_type = '';
		endif;
		
		if ($feature_design['fr_sb_h_bg_type'] != "Transparent"):
		$sb_h_bg = 'background: #' . $sb_h_bg_color . $sb_h_bg_image_type . ';';
		else:
		$sb_h_bg = 'background: transparent;';
		endif;
		
		else:
		$sb_h_bg = $sb_bg;
		endif;
		
		$sb_heading_bg_color = $content_design['fr_sb_heading_bg_color'];
		$sb_heading_bg_image_name = $content_design['fr_sb_heading_bg_image_name'];
		
		if ($content_design['fr_sb_heading_bg_type'] == "No-Repeat Image"):
		$sb_heading_bg_image_type = ' url(' . $frugal_upload_dir . $sb_heading_bg_image_name . ') no-repeat';
		elseif ($content_design['fr_sb_heading_bg_type'] == "Horizontal-Repeat Image"):
		$sb_heading_bg_image_type = ' url(' . $frugal_upload_dir . $sb_heading_bg_image_name . ') repeat-x';
		elseif ($content_design['fr_sb_heading_bg_type'] == "Vertical-Repeat Image"):
		$sb_heading_bg_image_type = ' url(' . $frugal_upload_dir . $sb_heading_bg_image_name . ') repeat-y';
		elseif ($content_design['fr_sb_heading_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$sb_heading_bg_image_type = ' url(' . $frugal_upload_dir . $sb_heading_bg_image_name . ') repeat';
		else:
		$sb_heading_bg_image_type = '';
		endif;
		
		if ($content_design['fr_sb_heading_bg_type'] != "Transparent"):
		$sb_heading_bg = 'background: #' . $sb_heading_bg_color . $sb_heading_bg_image_type . ';';
		else:
		$sb_heading_bg = 'background: transparent;';
		endif;
		
		$sb_content_bg_color = $content_design['fr_sb_content_bg_color'];
		$sb_content_bg_image_name = $content_design['fr_sb_content_bg_image_name'];
		
		if ($content_design['fr_sb_content_bg_type'] == "No-Repeat Image"):
		$sb_content_bg_image_type = ' url(' . $frugal_upload_dir . $sb_content_bg_image_name . ') no-repeat';
		elseif ($content_design['fr_sb_content_bg_type'] == "Horizontal-Repeat Image"):
		$sb_content_bg_image_type = ' url(' . $frugal_upload_dir . $sb_content_bg_image_name . ') repeat-x';
		elseif ($content_design['fr_sb_content_bg_type'] == "Vertical-Repeat Image"):
		$sb_content_bg_image_type = ' url(' . $frugal_upload_dir . $sb_content_bg_image_name . ') repeat-y';
		elseif ($content_design['fr_sb_content_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$sb_content_bg_image_type = ' url(' . $frugal_upload_dir . $sb_content_bg_image_name . ') repeat';
		else:
		$sb_content_bg_image_type = '';
		endif;
		
		if ($content_design['fr_sb_content_design_active'] == "Yes"):
			if ($content_design['fr_sb_content_bg_type'] != "Transparent"):
			$sb_content_bg = 'background: #' . $sb_content_bg_color . $sb_content_bg_image_type . ';';
			else:
			$sb_content_bg = 'background: transparent;';
			endif;
		else:
			$sb_content_bg = '';
		endif;
		
		$search_box_bg_color = $header_design['fr_search_box_bg_color'];
		$search_box_bg_image_name = $header_design['fr_search_box_bg_image_name'];
		
		if ($header_design['fr_search_box_bg_type'] == "No-Repeat Image"):
		$search_box_bg_image_type = ' url(' . $frugal_upload_dir . $search_box_bg_image_name . ') no-repeat';
		elseif ($header_design['fr_search_box_bg_type'] == "Horizontal-Repeat Image"):
		$search_box_bg_image_type = ' url(' . $frugal_upload_dir . $search_box_bg_image_name . ') repeat-x';
		else:
		$search_box_bg_image_type = '';
		endif;
		
		if ($header_design['fr_search_box_bg_type'] != "Transparent"):
		$search_box_bg = 'background: #' . $search_box_bg_color . $search_box_bg_image_type . ';';
		else:
		$search_box_bg = 'background: transparent;';
		endif;
		
		$blockquote_bg_color = $content_design['fr_blockquote_bg_color'];
		$blockquote_bg_image_name = $content_design['fr_blockquote_bg_image_name'];
		
		if ($content_design['fr_blockquote_bg_type'] == "No-Repeat Image"):
		$blockquote_bg_image_type = ' url(' . $frugal_upload_dir . $blockquote_bg_image_name . ') no-repeat';
		elseif ($content_design['fr_blockquote_bg_type'] == "Horizontal-Repeat Image"):
		$blockquote_bg_image_type = ' url(' . $frugal_upload_dir . $blockquote_bg_image_name . ') repeat-x';
		elseif ($content_design['fr_blockquote_bg_type'] == "Vertical-Repeat Image"):
		$blockquote_bg_image_type = ' url(' . $frugal_upload_dir . $blockquote_bg_image_name . ') repeat-y';
		elseif ($content_design['fr_blockquote_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$blockquote_bg_image_type = ' url(' . $frugal_upload_dir . $blockquote_bg_image_name . ') repeat';
		else:
		$blockquote_bg_image_type = '';
		endif;
		
		if ($content_design['fr_blockquote_bg_type'] != "Transparent"):
		$blockquote_bg = 'background: #' . $blockquote_bg_color . $blockquote_bg_image_type . ';';
		else:
		$blockquote_bg = 'background: transparent;';
		endif;
		
		$post_banner_bg_color = $content_design['fr_post_banner_bg_color'];
		$post_banner_bg_image_name = $content_design['fr_post_banner_bg_image_name'];
		
		if ($content_design['fr_post_banner_bg_type'] == "No-Repeat Image"):
		$post_banner_bg_image_type = ' url(' . $frugal_upload_dir . $post_banner_bg_image_name . ') no-repeat';
		elseif ($content_design['fr_post_banner_bg_type'] == "Horizontal-Repeat Image"):
		$post_banner_bg_image_type = ' url(' . $frugal_upload_dir . $post_banner_bg_image_name . ') repeat-x';
		elseif ($content_design['fr_post_banner_bg_type'] == "Vertical-Repeat Image"):
		$post_banner_bg_image_type = ' url(' . $frugal_upload_dir . $post_banner_bg_image_name . ') repeat-y';
		elseif ($content_design['fr_post_banner_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$post_banner_bg_image_type = ' url(' . $frugal_upload_dir . $post_banner_bg_image_name . ') repeat';
		else:
		$post_banner_bg_image_type = '';
		endif;
		
		if ($content_design['fr_post_banner_bg_type'] != "Transparent"):
		$post_banner_bg = 'background: #' . $post_banner_bg_color . $post_banner_bg_image_type . ';';
		else:
		$post_banner_bg = 'background: transparent;';
		endif;
		
		$comment_box_bg_color = $content_design['fr_comment_box_bg_color'];
		$comment_box_bg_image_name = $content_design['fr_comment_box_bg_image_name'];
		
		if ($content_design['fr_comment_box_bg_type'] == "No-Repeat Image"):
		$comment_box_bg_image_type = ' url(' . $frugal_upload_dir . $comment_box_bg_image_name . ') no-repeat';
		elseif ($content_design['fr_comment_box_bg_type'] == "Horizontal-Repeat Image"):
		$comment_box_bg_image_type = ' url(' . $frugal_upload_dir . $comment_box_bg_image_name . ') repeat-x';
		elseif ($content_design['fr_comment_box_bg_type'] == "Vertical-Repeat Image"):
		$comment_box_bg_image_type = ' url(' . $frugal_upload_dir . $comment_box_bg_image_name . ') repeat-y';
		elseif ($content_design['fr_comment_box_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$comment_box_bg_image_type = ' url(' . $frugal_upload_dir . $comment_box_bg_image_name . ') repeat';
		else:
		$comment_box_bg_image_type = '';
		endif;
		
		if ($content_design['fr_comment_box_bg_type'] != "Transparent"):
		$comment_box_bg = 'background: #' . $comment_box_bg_color . $comment_box_bg_image_type . ';';
		else:
		$comment_box_bg = 'background: transparent;';
		endif;
		
		$comment_sub_bg_color = $content_design['fr_comment_sub_bg_color'];
		$comment_sub_bg_image_name = $content_design['fr_comment_sub_bg_image_name'];
		
		if ($content_design['fr_comment_sub_bg_type'] == "No-Repeat Image"):
		$comment_sub_bg_image_type = ' url(' . $frugal_upload_dir . $comment_sub_bg_image_name . ') no-repeat';
		elseif ($content_design['fr_comment_sub_bg_type'] == "Horizontal-Repeat Image"):
		$comment_sub_bg_image_type = ' url(' . $frugal_upload_dir . $comment_sub_bg_image_name . ') repeat-x';
		else:
		$comment_sub_bg_image_type = '';
		endif;
		
		if ($content_design['fr_comment_sub_bg_type'] != "Transparent"):
		$comment_sub_bg = 'background: #' . $comment_sub_bg_color . $comment_sub_bg_image_type . ';';
		else:
		$comment_sub_bg = 'background: transparent;';
		endif;
		
		$footer_bg_color = $content_design['fr_footer_bg_color'];
		$footer_bg_image_name = $content_design['fr_footer_bg_image_name'];
		
		if ($content_design['fr_footer_bg_type'] == "No-Repeat Image (Left)"):
		$footer_bg_image_type = ' url(' . $frugal_upload_dir . $footer_bg_image_name . ') no-repeat';
		elseif ($content_design['fr_footer_bg_type'] == "No-Repeat Image (Center)"):
		$footer_bg_image_type = ' url(' . $frugal_upload_dir . $footer_bg_image_name . ') top center no-repeat';
		elseif ($content_design['fr_footer_bg_type'] == "Horizontal-Repeat Image"):
		$footer_bg_image_type = ' url(' . $frugal_upload_dir . $footer_bg_image_name . ') repeat-x';
		elseif ($content_design['fr_footer_bg_type'] == "Vertical-Repeat Image"):
		$footer_bg_image_type = ' url(' . $frugal_upload_dir . $footer_bg_image_name . ') repeat-y';
		elseif ($content_design['fr_footer_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$footer_bg_image_type = ' url(' . $frugal_upload_dir . $footer_bg_image_name . ') repeat';
		else:
		$footer_bg_image_type = '';
		endif;
		
		if ($content_design['fr_footer_bg_type'] != "Transparent"):
		$footer_bg = 'background: #' . $footer_bg_color . $footer_bg_image_type . ';';
		else:
		$footer_bg = 'background: transparent;';
		endif;
		
		$cw1_bg_color = $feature_design['fr_cw1_bg_color'];
		$cw1_bg_image_name = $feature_design['fr_cw1_bg_image_name'];
		
		if ($feature_design['fr_cw1_bg_type'] == "No-Repeat Image (Left)"):
		$cw1_bg_image_type = ' url(' . $frugal_upload_dir . $cw1_bg_image_name . ') no-repeat';
		elseif ($feature_design['fr_cw1_bg_type'] == "No-Repeat Image (Center)"):
		$cw1_bg_image_type = ' url(' . $frugal_upload_dir . $cw1_bg_image_name . ') top center no-repeat';
		elseif ($feature_design['fr_cw1_bg_type'] == "Horizontal-Repeat Image"):
		$cw1_bg_image_type = ' url(' . $frugal_upload_dir . $cw1_bg_image_name . ') repeat-x';
		elseif ($feature_design['fr_cw1_bg_type'] == "Vertical-Repeat Image"):
		$cw1_bg_image_type = ' url(' . $frugal_upload_dir . $cw1_bg_image_name . ') repeat-y';
		elseif ($feature_design['fr_cw1_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$cw1_bg_image_type = ' url(' . $frugal_upload_dir . $cw1_bg_image_name . ') repeat';
		else:
		$cw1_bg_image_type = '';
		endif;
		
		if ($feature_design['fr_cw1_bg_type'] != "Transparent"):
		$cw1_bg = 'background: #' . $cw1_bg_color . $cw1_bg_image_type . ' !important;';
		else:
		$cw1_bg = 'background: transparent !important;';
		endif;
		
		$cw2_bg_color = $feature_design['fr_cw2_bg_color'];
		$cw2_bg_image_name = $feature_design['fr_cw2_bg_image_name'];
		
		if ($feature_design['fr_cw2_bg_type'] == "No-Repeat Image (Left)"):
		$cw2_bg_image_type = ' url(' . $frugal_upload_dir . $cw2_bg_image_name . ') no-repeat';
		elseif ($feature_design['fr_cw2_bg_type'] == "No-Repeat Image (Center)"):
		$cw2_bg_image_type = ' url(' . $frugal_upload_dir . $cw2_bg_image_name . ') top center no-repeat';
		elseif ($feature_design['fr_cw2_bg_type'] == "Horizontal-Repeat Image"):
		$cw2_bg_image_type = ' url(' . $frugal_upload_dir . $cw2_bg_image_name . ') repeat-x';
		elseif ($feature_design['fr_cw2_bg_type'] == "Vertical-Repeat Image"):
		$cw2_bg_image_type = ' url(' . $frugal_upload_dir . $cw2_bg_image_name . ') repeat-y';
		elseif ($feature_design['fr_cw2_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$cw2_bg_image_type = ' url(' . $frugal_upload_dir . $cw2_bg_image_name . ') repeat';
		else:
		$cw2_bg_image_type = '';
		endif;
		
		if ($feature_design['fr_cw2_bg_type'] != "Transparent"):
		$cw2_bg = 'background: #' . $cw2_bg_color . $cw2_bg_image_type . ' !important;';
		else:
		$cw2_bg = 'background: transparent !important;';
		endif;
		
		$cw3_bg_color = $feature_design['fr_cw3_bg_color'];
		$cw3_bg_image_name = $feature_design['fr_cw3_bg_image_name'];
		
		if ($feature_design['fr_cw3_bg_type'] == "No-Repeat Image (Left)"):
		$cw3_bg_image_type = ' url(' . $frugal_upload_dir . $cw3_bg_image_name . ') no-repeat';
		elseif ($feature_design['fr_cw3_bg_type'] == "No-Repeat Image (Center)"):
		$cw3_bg_image_type = ' url(' . $frugal_upload_dir . $cw3_bg_image_name . ') top center no-repeat';
		elseif ($feature_design['fr_cw3_bg_type'] == "Horizontal-Repeat Image"):
		$cw3_bg_image_type = ' url(' . $frugal_upload_dir . $cw3_bg_image_name . ') repeat-x';
		elseif ($feature_design['fr_cw3_bg_type'] == "Vertical-Repeat Image"):
		$cw3_bg_image_type = ' url(' . $frugal_upload_dir . $cw3_bg_image_name . ') repeat-y';
		elseif ($feature_design['fr_cw3_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$cw3_bg_image_type = ' url(' . $frugal_upload_dir . $cw3_bg_image_name . ') repeat';
		else:
		$cw3_bg_image_type = '';
		endif;
		
		if ($feature_design['fr_cw3_bg_type'] != "Transparent"):
		$cw3_bg = 'background: #' . $cw3_bg_color . $cw3_bg_image_type . ' !important;';
		else:
		$cw3_bg = 'background: transparent !important;';
		endif;
		
		$cw4_bg_color = $feature_design['fr_cw4_bg_color'];
		$cw4_bg_image_name = $feature_design['fr_cw4_bg_image_name'];
		
		if ($feature_design['fr_cw4_bg_type'] == "No-Repeat Image (Left)"):
		$cw4_bg_image_type = ' url(' . $frugal_upload_dir . $cw4_bg_image_name . ') no-repeat';
		elseif ($feature_design['fr_cw4_bg_type'] == "No-Repeat Image (Center)"):
		$cw4_bg_image_type = ' url(' . $frugal_upload_dir . $cw4_bg_image_name . ') top center no-repeat';
		elseif ($feature_design['fr_cw4_bg_type'] == "Horizontal-Repeat Image"):
		$cw4_bg_image_type = ' url(' . $frugal_upload_dir . $cw4_bg_image_name . ') repeat-x';
		elseif ($feature_design['fr_cw4_bg_type'] == "Vertical-Repeat Image"):
		$cw4_bg_image_type = ' url(' . $frugal_upload_dir . $cw4_bg_image_name . ') repeat-y';
		elseif ($feature_design['fr_cw4_bg_type'] == "Horizontal & Vertical-Repeat Image"):
		$cw4_bg_image_type = ' url(' . $frugal_upload_dir . $cw4_bg_image_name . ') repeat';
		else:
		$cw4_bg_image_type = '';
		endif;
		
		if ($feature_design['fr_cw4_bg_type'] != "Transparent"):
		$cw4_bg = 'background: #' . $cw4_bg_color . $cw4_bg_image_type . ' !important;';
		else:
		$cw4_bg = 'background: transparent !important;';
		endif;
		
		//** Misc Body Styles **//
		
		$border_color = $content_design['fr_border_color'];
		$container_border_color = $content_design['fr_container_border_color'];
		$top_margin = $content_design['fr_top_margin'];
		$bottom_margin = $content_design['fr_bottom_margin'];

		$header_border_color = $header_design['fr_header_border_color'];
		$navbar_top_border_thickness = $header_design['fr_navbar_top_border_thickness'];
		$navbar_bottom_border_thickness = $header_design['fr_navbar_bottom_border_thickness'];
		$navbar_page_top_border_thickness = $header_design['fr_navbar_page_top_border_thickness'];
		$navbar_page_bottom_border_thickness = $header_design['fr_navbar_page_bottom_border_thickness'];
		$navbar_page_left_border_thickness = $header_design['fr_navbar_page_left_border_thickness'];
		$navbar_page_right_border_thickness = $header_design['fr_navbar_page_right_border_thickness'];
		$navbar_top_border_color = $header_design['fr_navbar_top_border_color'];
		$navbar_bottom_border_color = $header_design['fr_navbar_bottom_border_color'];
		$navbar_page_border_color = $header_design['fr_navbar_page_border_color'];
		$navbar_page_hover_border_color = $header_design['fr_navbar_page_hover_border_color'];
		$navbar_cp_border_color = $header_design['fr_navbar_cp_border_color'];
		$navbar_sub_border_color = $header_design['fr_navbar_sub_border_color'];
		$subnav_top_border_color = $header_design['fr_subnav_top_border_color'];
		$subnav_bottom_border_color = $header_design['fr_subnav_bottom_border_color'];
		$subnav_right_border_color = $header_design['fr_subnav_right_border_color'];
		$subnav_sub_border_color = $header_design['fr_subnav_sub_border_color'];
		$subnav_top_border_thickness = $header_design['fr_subnav_top_border_thickness'];
		$subnav_bottom_border_thickness = $header_design['fr_subnav_bottom_border_thickness'];
		$subnav_right_border_thickness = $header_design['fr_subnav_right_border_thickness'];
		
		$title_font_color = $header_design['fr_logo_font_color'];
		$title_font_hover_color = $header_design['fr_logo_font_hover_color'];
		if($header_design['fr_custom_logo_font'] != ""): $title_font = $header_design['fr_custom_logo_font']; else: $title_font = $header_design['fr_logo_font']; endif;
		$title_font_size = $header_design['fr_logo_font_size'];
		$title_letter_spacing = $header_design['fr_logo_letter_spacing'];
		$tag_font_color = $header_design['fr_logo_tag_font_color'];
		if($header_design['fr_custom_logo_tag_font'] != ""): $tag_font = $header_design['fr_custom_logo_tag_font']; else: $tag_font = $header_design['fr_logo_tag_font']; endif;
		$tag_font_size = $header_design['fr_logo_tag_font_size'];
		$tag_letter_spacing = $header_design['fr_logo_tag_letter_spacing'];
		if($header_design['fr_custom_navbar_font'] != ""): $navbar_font = $header_design['fr_custom_navbar_font']; else: $navbar_font = $header_design['fr_navbar_font']; endif;
		$navbar_font_size = $header_design['fr_navbar_font_size'];
		$navbar_font_weight = $header_design['fr_navbar_font_weight'];
		$navbar_font_color = $header_design['fr_navbar_font_color'];
		$navbar_text_hover_color = $header_design['fr_navbar_text_hover_color'];
		$navbar_sub_font_color = $header_design['fr_navbar_sub_font_color'];
		$navbar_sub_text_hover_color = $header_design['fr_navbar_sub_text_hover_color'];
		$navbar_cp_font_color = $header_design['fr_navbar_cp_font_color'];
		$navbar_letter_spacing = $header_design['fr_navbar_letter_spacing'];
		if($header_design['fr_custom_navbar_right_font'] != ""): $navbar_right_font = $header_design['fr_custom_navbar_right_font']; else: $navbar_right_font = $header_design['fr_navbar_right_font']; endif;
		$navbar_right_font_size = $header_design['fr_navbar_right_font_size'];
		$navbar_right_font_color = $header_design['fr_navbar_right_font_color'];
		$navbar_right_link_color = $header_design['fr_navbar_right_link_color'];
		if($header_design['fr_custom_subnav_font'] != ""): $subnav_font = $header_design['fr_custom_subnav_font']; else: $subnav_font = $header_design['fr_subnav_font']; endif;
		$subnav_font_size = $header_design['fr_subnav_font_size'];
		$subnav_font_weight = $header_design['fr_subnav_font_weight'];
		$subnav_font_color = $header_design['fr_subnav_font_color'];
		$subnav_sub_font_color = $header_design['fr_subnav_sub_font_color'];
		$subnav_text_hover_color = $header_design['fr_subnav_text_hover_color'];
		$subnav_sub_text_hover_color = $header_design['fr_subnav_sub_text_hover_color'];
		$subnav_letter_spacing = $header_design['fr_subnav_letter_spacing'];
		if($header_design['fr_custom_subnavbar_right_font'] != ""): $subnavbar_right_font = $header_design['fr_custom_subnavbar_right_font']; else: $subnavbar_right_font = $header_design['fr_subnavbar_right_font']; endif;
		$subnavbar_right_font_size = $header_design['fr_subnavbar_right_font_size'];
		$subnavbar_right_font_color = $header_design['fr_subnavbar_right_font_color'];
		$subnavbar_right_link_color = $header_design['fr_subnavbar_right_link_color'];
		if($header_design['fr_custom_search_box_font'] != ""): $search_box_font = $header_design['fr_custom_search_box_font']; else: $search_box_font = $header_design['fr_search_box_font']; endif;
		$search_box_font_size = $header_design['fr_search_box_font_size'];
		$search_box_border_color = $header_design['fr_search_box_border_color'];
		$search_box_text_color = $header_design['fr_search_box_text_color'];
		$search_box_width = $header_design['fr_search_box_width'];
		
		//** Misc Navbar Dimensions **//
		
		if ($content_design['fr_head_foot_fluid'] == "Navbar Only" || $content_design['fr_head_foot_fluid'] == "Header & Navbar Only" || $content_design['fr_head_foot_fluid'] == "Navbar & Footer Only" || $content_design['fr_head_foot_fluid'] == "All"):
		$nav_left_margin = 'auto';
		else:
		$nav_left_margin = $header_design['fr_navbar_left_margin'] . 'px';
		endif;
		
		$nav_page_left_margin = $header_design['fr_navbar_page_left_margin'];
		$nav_page_right_margin = $header_design['fr_navbar_page_right_margin'];
		$nav_page_lr_padding = $header_design['fr_navbar_page_lr_padding'];
		$nav_page_tb_padding = $header_design['fr_navbar_page_tb_padding'];
		$nav_page_tb_padding_combined = $nav_page_tb_padding * 2;
		$nav_sub_lr_padding = $header_design['fr_navbar_sub_lr_padding'];
		$nav_sub_tb_padding = $header_design['fr_navbar_sub_tb_padding'];
		$nav_sub_tb_padding_combined = $nav_sub_tb_padding * 2;
		$nav_sub_lr_padding_combined = $nav_sub_lr_padding * 2;
		$nav_height = $navbar_font_size + $nav_page_tb_padding_combined + $navbar_page_top_border_thickness + $navbar_page_bottom_border_thickness;
		$nav_sub_box_width = $header_design['fr_navbar_sub_box_width'];
		$nav_liulul_left_margin = $nav_sub_box_width + $nav_sub_lr_padding_combined + 1;
		$nav_liulul_top_margin = (1 + $navbar_font_size + $nav_sub_tb_padding_combined) * -1;
		
		//** Misc Category Navbar Dimensions **//
		
		if ($header_design['fr_subnav_location'] == "Above Header" && $content_design['fr_head_foot_fluid'] == "Navbar Only" || $header_design['fr_subnav_location'] == "Above Header" && $content_design['fr_head_foot_fluid'] == "Header & Navbar Only" || $header_design['fr_subnav_location'] == "Above Header" && $content_design['fr_head_foot_fluid'] == "Navbar & Footer Only" || $header_design['fr_subnav_location'] == "Above Header" && $content_design['fr_head_foot_fluid'] == "All"):
		$subnav_left_margin = 'auto';
		elseif ($header_design['fr_subnav_location'] == "Below Header" && $content_design['fr_head_foot_fluid'] == "Navbar Only" || $header_design['fr_subnav_location'] == "Below Header" && $content_design['fr_head_foot_fluid'] == "Header & Navbar Only" || $header_design['fr_subnav_location'] == "Below Header" && $content_design['fr_head_foot_fluid'] == "Navbar & Footer Only" || $header_design['fr_subnav_location'] == "Below Header" && $content_design['fr_head_foot_fluid'] == "All"):
		$subnav_left_margin = 'auto';
		else:
		$subnav_left_margin = $header_design['fr_subnav_left_margin'] . 'px';
		endif;
		
		$subnav_page_lr_padding = $header_design['fr_subnav_page_lr_padding'];
		$subnav_page_tb_padding = $header_design['fr_subnav_page_tb_padding'];
		$subnav_page_tb_padding_combined = $subnav_page_tb_padding * 2;
		$subnav_sub_lr_padding = $header_design['fr_subnav_sub_lr_padding'];
		$subnav_sub_tb_padding = $header_design['fr_subnav_sub_tb_padding'];
		$subnav_sub_tb_padding_combined = $subnav_sub_tb_padding * 2;
		$subnav_sub_lr_padding_combined = $subnav_sub_lr_padding * 2;
		$subnav_height = $subnav_font_size + $subnav_page_tb_padding_combined;
		$subnav_sub_box_width = $header_design['fr_subnav_sub_box_width'];
		$subnav_liulul_left_margin = $subnav_sub_box_width + $subnav_sub_lr_padding_combined + 1;
		$subnav_liulul_top_margin = (1 + $subnav_font_size + $subnav_sub_tb_padding_combined) * -1;
		
		$navbar_caps = $header_design['fr_navbar_caps'];
		$navbar_font_variant = $header_design['fr_navbar_font_variant'];
		$subnav_caps = $header_design['fr_subnav_caps'];
		$subnav_font_variant = $header_design['fr_subnav_font_variant'];
		$sb_heading_text_caps = $content_design['fr_sb_heading_text_caps'];
		$sb_heading_font_variant = $content_design['fr_sb_heading_font_variant'];
		
		if ($header_design['fr_navbar_text_hover_underline'] == "Yes"):
		$navbar_text_hover_underline = 'underline';
		else:
		$navbar_text_hover_underline = 'none';
		endif;
		
		if ($header_design['fr_subnav_text_hover_underline'] == "Yes"):
		$subnav_text_hover_underline = 'underline';
		else:
		$subnav_text_hover_underline = 'none';
		endif;
		
		$header_border_style = $header_design['fr_header_border_style'];
		$header_border_thickness = $header_design['fr_header_border_thickness'];
		$header_border_padding = $header_border_thickness * 2;
		
		if ($header_design['fr_header_border_type'] == "Bottom"):
		$header_border_type = 'border-bottom';
		$header_width = $container_width;
		else:
		$header_border_type = 'border';
		$header_width = $container_width - $header_border_padding;
		endif;
		
		if ($header_design['fr_logo_type'] == "Text FULL" || $header_design['fr_logo_type'] == "Image FULL"):
		$logo_width = $header_width;
		else:
		$logo_width = $header_design['fr_logo_width'];
		endif;
		
		$header_height = $header_design['fr_header_height'];
		$logo_image_top_margin = $header_design['fr_logo_image_top_margin'];
		
		$logo_image_align = $header_design['fr_logo_image_align'];
		$logo_text_align = $header_design['fr_logo_text_align'];
		
		if ($content_design['fr_head_foot_fluid'] == "Header Only" || $content_design['fr_head_foot_fluid'] == "Header & Navbar Only" || $content_design['fr_head_foot_fluid'] == "Header & Footer Only" || $content_design['fr_head_foot_fluid'] == "All"):
		$header_fluidity = "Active";
		else:
		$header_fluidity = "Inactive";
		endif;
		
		if ($header_fluidity == "Active"):
		$header_wrap_width = '100%';
		else:
		$header_wrap_width = $header_width . 'px';
		endif;
		
		$logo_text_top_padding = $header_design['fr_logo_text_top_padding'];
		$logo_text_right_padding = $header_design['fr_logo_text_right_padding'];
		$logo_text_bottom_padding = $header_design['fr_logo_text_bottom_padding'];
		$logo_text_left_padding = $header_design['fr_logo_text_left_padding'];
		$logo_tag_top_padding = $header_design['fr_logo_tag_top_padding'];
		$logo_tag_right_padding = $header_design['fr_logo_tag_right_padding'];
		$logo_tag_bottom_padding = $header_design['fr_logo_tag_bottom_padding'];
		$logo_tag_left_padding = $header_design['fr_logo_tag_left_padding'];
		
		if ($header_design['fr_logo_type'] == "Text FULL" || $header_design['fr_logo_type'] == "Image FULL")
		{
			$logo_width = $header_width;
			$logo_text_width = $header_width;
		}
		else
		{
			$logo_width = $header_design['fr_logo_width'];
			$logo_text_width = $logo_width - $logo_text_right_padding - $logo_text_left_padding;
		}
		
		$navbar_right_top_padding = $header_design['fr_navbar_right_top_padding'];
		$navbar_right_right_padding = $header_design['fr_navbar_right_right_padding'];
		$navbar_right_bottom_padding = $header_design['fr_navbar_right_bottom_padding'];
		$navbar_right_left_padding = $header_design['fr_navbar_right_left_padding'];
		$subnavbar_right_top_padding = $header_design['fr_subnavbar_right_top_padding'];
		$subnavbar_right_right_padding = $header_design['fr_subnavbar_right_right_padding'];
		$subnavbar_right_bottom_padding = $header_design['fr_subnavbar_right_bottom_padding'];
		$subnavbar_right_left_padding = $header_design['fr_subnavbar_right_left_padding'];
		$logo_image_name = $header_design['fr_logo_image_name'];
		$header_right_top_padding = $header_design['fr_header_right_top_padding'];
		$header_right_right_padding = $header_design['fr_header_right_right_padding'];
		$header_right_bottom_padding = $header_design['fr_header_right_bottom_padding'];
		$header_right_left_padding = $header_design['fr_header_right_left_padding'];
		
		if ($header_design['fr_logo_type'] == "Text FULL" || $header_design['fr_logo_type'] == "Image FULL")
		{
			$header_right_width = 0;
		}
		else
		{
			$header_right_width = $header_width - $logo_width - $header_right_left_padding - $header_right_right_padding;
		}
		
		if ($header_design['fr_nav_location'] == "Beside Header")
		{
			$navbar_width = $header_right_width;
		}
		else
		{
			$navbar_width = $container_width;
		}
		
		// Universal font options
		if($content_design['fr_custom_universal_font'] != ""): $universal_font = $content_design['fr_custom_universal_font']; else: $universal_font = $content_design['fr_universal_font']; endif;
		$universal_font_color = $content_design['fr_universal_font_color'];
		$universal_link_color = $content_design['fr_universal_link_color'];
		$universal_link_hover_color = $content_design['fr_universal_link_hover_color'];
		
		// Universal list style
		$universal_list_style = $content_design['fr_universal_list_style'];
		
		if ($content_design['fr_universal_fonts_active'] == "Yes"):
		$content_title_font = $universal_font;
		$content_title_font_color = $universal_font_color;
		$content_title_font_hover_color = $universal_link_hover_color;
		$content_title_font_color_h2 = $universal_font_color;
		$content_title_font_hover_color_h2 = $universal_link_hover_color;
		$post_subhead_font = $universal_font;
		$post_subhead_font_color = $universal_font_color;
		$main_content_font = $universal_font;
		$main_content_font_color = $universal_font_color;
		$main_content_font_link_color = $universal_link_color;
		$main_content_font_link_hover_color = $universal_link_hover_color;
		$caption_font = $universal_font;
		$caption_font_color = $universal_font_color;
		$commentmeta_font = $universal_font;
		$comment_sub_font = $universal_font;
		$comment_main_font = $universal_font;
		$commenter_font = $universal_font;
		$comment_font_color = $universal_font_color;
		$comment_link_color = $universal_link_color;
		$sb_heading_font = $universal_font;
		$sb_heading_font_color = $universal_font_color;
		$sb_content_font = $universal_font;
		$sb_content_font_color = $universal_font_color;
		$sb_content_font_link_color = $universal_link_color;
		$sb_content_font_link_hover_color = $universal_link_hover_color;
		$sb_pages_font = $universal_font;
		$sb_pages_font_color = $universal_font_color;
		$sb_pages_font_link_color = $universal_link_color;
		$sb_pages_font_link_hover_color = $universal_link_hover_color;
		$fbox_headline_font = $universal_font;
		$fbox_headline_font_color = $universal_font_color;
		$fbox_content_font = $universal_font;
		$fbox_content_font_color = $universal_font_color;
		$fbox_content_link_color = $universal_link_color;
		$fbox_content_link_hover_color = $universal_link_hover_color;
		$ft_widget_title_font = $universal_font;
		$ft_widget_title_font_color = $universal_font_color;
		$fb_widget_title_font = $universal_font;
		$fb_widget_title_font_color = $universal_font_color;
		$home_excerpt_title_font = $universal_font;
		$home_excerpt_title_font_color = $universal_font_color;
		$home_excerpt_title_font_hover_color = $universal_link_hover_color;
		$home_excerpt_font = $universal_font;
		$home_excerpt_font_color = $universal_font_color;
		$feature_widget_content_font = $universal_font;
		$feature_widget_content_font_color = $universal_font_color;
		$feature_widget_content_font_link_color = $universal_link_color;
		$feature_widget_content_font_link_hover_color = $universal_link_hover_color;
		$home_excerpt_bylinemeta_font = $universal_font;
		$home_excerpt_bylinemeta_font_color = $universal_font_color;
		$cw1_headline_font = $universal_font;
		$cw1_headline_font_color = $universal_font_color;
		$cw1_content_font = $universal_font;
		$cw1_content_font_color = $universal_font_color;
		$cw1_content_link_color = $universal_link_color;
		$cw1_content_link_hover_color = $universal_link_hover_color;
		$cw2_headline_font = $universal_font;
		$cw2_headline_font_color = $universal_font_color;
		$cw2_content_font = $universal_font;
		$cw2_content_font_color = $universal_font_color;
		$cw2_content_link_color = $universal_link_color;
		$cw2_content_link_hover_color = $universal_link_hover_color;
		$cw3_headline_font = $universal_font;
		$cw3_headline_font_color = $universal_font_color;
		$cw3_content_font = $universal_font;
		$cw3_content_font_color = $universal_font_color;
		$cw3_content_link_color = $universal_link_color;
		$cw3_content_link_hover_color = $universal_link_hover_color;
		$cw4_headline_font = $universal_font;
		$cw4_headline_font_color = $universal_font_color;
		$cw4_content_font = $universal_font;
		$cw4_content_font_color = $universal_font_color;
		$cw4_content_link_color = $universal_link_color;
		$cw4_content_link_hover_color = $universal_link_hover_color;
		else:
		if($content_design['fr_custom_content_title_font'] != ""): $content_title_font = $content_design['fr_custom_content_title_font']; else: $content_title_font = $content_design['fr_content_title_font']; endif;
		$content_title_font_color = $content_design['fr_content_title_font_color'];
		$content_title_font_hover_color = $content_design['fr_content_title_font_hover_color'];
		$content_title_font_color_h2 = $content_design['fr_content_title_font_color_h2'];
		$content_title_font_hover_color_h2 = $content_design['fr_content_title_font_hover_color_h2'];
		if($content_design['fr_custom_post_subhead_font'] != ""): $post_subhead_font = $content_design['fr_custom_post_subhead_font']; else: $post_subhead_font = $content_design['fr_post_subhead_font']; endif;
		$post_subhead_font_color = $content_design['fr_post_subhead_font_color'];
		if($content_design['fr_custom_main_content_font'] != ""): $main_content_font = $content_design['fr_custom_main_content_font']; else: $main_content_font = $content_design['fr_main_content_font']; endif;
		$main_content_font_color = $content_design['fr_main_content_font_color'];
		$main_content_font_link_color = $content_design['fr_main_content_font_link_color'];
		$main_content_font_link_hover_color = $content_design['fr_main_content_font_link_hover_color'];
		if($content_design['fr_custom_caption_font'] != ""): $caption_font = $content_design['fr_custom_caption_font']; else: $caption_font = $content_design['fr_caption_font']; endif;
		$caption_font_color = $content_design['fr_caption_font_color'];
		if($content_design['fr_custom_commentmeta_font'] != ""): $commentmeta_font = $content_design['fr_custom_commentmeta_font']; else: $commentmeta_font = $content_design['fr_commentmeta_font']; endif;
		if($content_design['fr_custom_comment_sub_font'] != ""): $comment_sub_font = $content_design['fr_custom_comment_sub_font']; else: $comment_sub_font = $content_design['fr_comment_sub_font']; endif;
		if($content_design['fr_custom_comment_main_font'] != ""): $comment_main_font = $content_design['fr_custom_comment_main_font']; else: $comment_main_font = $content_design['fr_comment_main_font']; endif;
		if($content_design['fr_custom_comment_font'] != ""): $commenter_font = $content_design['fr_custom_comment_font']; else: $commenter_font = $content_design['fr_commenter_font']; endif;
		$comment_font_color = $content_design['fr_comment_font_color'];
		$comment_link_color = $content_design['fr_comment_link_color'];
		if($content_design['fr_custom_sb_heading_font'] != ""): $sb_heading_font = $content_design['fr_custom_sb_heading_font']; else: $sb_heading_font = $content_design['fr_sb_heading_font']; endif;
		$sb_heading_font_color = $content_design['fr_sb_heading_font_color'];
		if($content_design['fr_custom_sb_content_font'] != ""): $sb_content_font = $content_design['fr_custom_sb_content_font']; else: $sb_content_font = $content_design['fr_sb_content_font']; endif;
		$sb_content_font_color = $content_design['fr_sb_content_font_color'];
		$sb_content_font_link_color = $content_design['fr_sb_content_font_link_color'];
		$sb_content_font_link_hover_color = $content_design['fr_sb_content_font_link_hover_color'];
		if($content_design['fr_custom_sb_pages_font'] != ""): $sb_pages_font = $content_design['fr_custom_sb_pages_font']; else: $sb_pages_font = $content_design['fr_sb_pages_font']; endif;
		$sb_pages_font_color = $content_design['fr_sb_pages_font_color'];
		$sb_pages_font_link_color = $content_design['fr_sb_pages_font_link_color'];
		$sb_pages_font_link_hover_color = $content_design['fr_sb_pages_font_link_hover_color'];
		if($feature_design['fr_custom_fbox_headline_font'] != ""): $fbox_headline_font = $feature_design['fr_custom_fbox_headline_font']; else: $fbox_headline_font = $feature_design['fr_fbox_headline_font']; endif;
		$fbox_headline_font_color = $feature_design['fr_fbox_headline_font_color'];
		if($feature_design['fr_custom_fbox_content_font'] != ""): $fbox_content_font = $feature_design['fr_custom_fbox_content_font']; else: $fbox_content_font = $feature_design['fr_fbox_content_font']; endif;
		$fbox_content_font_color = $feature_design['fr_fbox_content_font_color'];
		$fbox_content_link_color = $feature_design['fr_fbox_content_link_color'];
		$fbox_content_link_hover_color = $feature_design['fr_fbox_content_link_hover_color'];
		if($feature_design['fr_custom_ft_widget_title_font'] != ""): $ft_widget_title_font = $feature_design['fr_custom_ft_widget_title_font']; else: $ft_widget_title_font = $feature_design['fr_ft_widget_title_font']; endif;
		$ft_widget_title_font_color = $feature_design['fr_ft_widget_title_font_color'];
		if($feature_design['fr_custom_fb_widget_title_font'] != ""): $fb_widget_title_font = $feature_design['fr_custom_fb_widget_title_font']; else: $fb_widget_title_font = $feature_design['fr_fb_widget_title_font']; endif;
		$fb_widget_title_font_color = $feature_design['fr_fb_widget_title_font_color'];
		if($feature_design['fr_custom_home_excerpt_title_font'] != ""): $home_excerpt_title_font = $feature_design['fr_custom_home_excerpt_title_font']; else: $home_excerpt_title_font = $feature_design['fr_home_excerpt_title_font']; endif;
		$home_excerpt_title_font_color = $feature_design['fr_home_excerpt_title_font_color'];
		$home_excerpt_title_font_hover_color = $feature_design['fr_home_excerpt_title_font_hover_color'];
		if($feature_design['fr_custom_home_excerpt_content_font'] != ""): $home_excerpt_content_font = $feature_design['fr_custom_home_excerpt_content_font']; else: $home_excerpt_content_font = $feature_design['fr_home_excerpt_content_font']; endif;
		$home_excerpt_content_font_color = $feature_design['fr_home_excerpt_content_font_color'];
		if($feature_design['fr_custom_feature_widget_content_font'] != ""): $feature_widget_content_font = $feature_design['fr_custom_feature_widget_content_font']; else: $feature_widget_content_font = $feature_design['fr_feature_widget_content_font']; endif;
		$feature_widget_content_font_color = $feature_design['fr_feature_widget_content_font_color'];
		$feature_widget_content_font_link_color = $feature_design['fr_feature_widget_content_font_link_color'];
		$feature_widget_content_font_link_hover_color = $feature_design['fr_feature_widget_content_font_link_hover_color'];
		if($feature_design['fr_custom_home_excerpt_bylinemeta_font'] != ""): $home_excerpt_bylinemeta_font = $feature_design['fr_custom_home_excerpt_bylinemeta_font']; else: $home_excerpt_bylinemeta_font = $feature_design['fr_home_excerpt_bylinemeta_font']; endif;
		$home_excerpt_bylinemeta_font_color = $feature_design['fr_home_excerpt_bylinemeta_font_color'];
		if($feature_design['fr_custom_cw1_headline_font'] != ""): $cw1_headline_font = $feature_design['fr_custom_cw1_headline_font']; else: $cw1_headline_font = $feature_design['fr_cw1_headline_font']; endif;
		$cw1_headline_font_color = $feature_design['fr_cw1_headline_font_color'];
		if($feature_design['fr_custom_cw1_content_font'] != ""): $cw1_content_font = $feature_design['fr_custom_cw1_content_font']; else: $cw1_content_font = $feature_design['fr_cw1_content_font']; endif;
		$cw1_content_font_color = $feature_design['fr_cw1_content_font_color'];
		$cw1_content_link_color = $feature_design['fr_cw1_content_link_color'];
		$cw1_content_link_hover_color = $feature_design['fr_cw1_content_link_hover_color'];
		if($feature_design['fr_custom_cw2_headline_font'] != ""): $cw2_headline_font = $feature_design['fr_custom_cw2_headline_font']; else: $cw2_headline_font = $feature_design['fr_cw2_headline_font']; endif;
		$cw2_headline_font_color = $feature_design['fr_cw2_headline_font_color'];
		if($feature_design['fr_custom_cw2_content_font'] != ""): $cw2_content_font = $feature_design['fr_custom_cw2_content_font']; else: $cw2_content_font = $feature_design['fr_cw2_content_font']; endif;
		$cw2_content_font_color = $feature_design['fr_cw2_content_font_color'];
		$cw2_content_link_color = $feature_design['fr_cw2_content_link_color'];
		$cw2_content_link_hover_color = $feature_design['fr_cw2_content_link_hover_color'];
		if($feature_design['fr_custom_cw3_headline_font'] != ""): $cw3_headline_font = $feature_design['fr_custom_cw3_headline_font']; else: $cw3_headline_font = $feature_design['fr_cw3_headline_font']; endif;
		$cw3_headline_font_color = $feature_design['fr_cw3_headline_font_color'];
		if($feature_design['fr_custom_cw3_content_font'] != ""): $cw3_content_font = $feature_design['fr_custom_cw3_content_font']; else: $cw3_content_font = $feature_design['fr_cw3_content_font']; endif;
		$cw3_content_font_color = $feature_design['fr_cw3_content_font_color'];
		$cw3_content_link_color = $feature_design['fr_cw3_content_link_color'];
		$cw3_content_link_hover_color = $feature_design['fr_cw3_content_link_hover_color'];
		if($feature_design['fr_custom_cw4_headline_font'] != ""): $cw4_headline_font = $feature_design['fr_custom_cw4_headline_font']; else: $cw4_headline_font = $feature_design['fr_cw4_headline_font']; endif;
		$cw4_headline_font_color = $feature_design['fr_cw4_headline_font_color'];
		if($feature_design['fr_custom_cw4_content_font'] != ""): $cw4_content_font = $feature_design['fr_custom_cw4_content_font']; else: $cw4_content_font = $feature_design['fr_cw4_content_font']; endif;
		$cw4_content_font_color = $feature_design['fr_cw4_content_font_color'];
		$cw4_content_link_color = $feature_design['fr_cw4_content_link_color'];
		$cw4_content_link_hover_color = $feature_design['fr_cw4_content_link_hover_color'];
		endif;

		if ($main_options['fr_author_meta_display'] == "No" && $main_options['fr_date_meta_display'] == "No" && $main_options['fr_comment_meta_display'] == "No" && $main_options['fr_cat_meta_display'] == "No") {
			$byline_p_tag = 'display:none;';
		}
		else
		{
			$byline_p_tag = '';
		}
		
		if ($feature_options['fr_fp_author_meta_display'] == "No" && $feature_options['fr_fp_date_meta_display'] == "No" && $feature_options['fr_fp_comment_meta_display'] == "No" && $feature_options['fr_fp_cat_meta_display'] == "No") {
			$byline_home_p_tag = 'display:none;';
		}
		else
		{
			$byline_home_p_tag = '';
		}
		
		if ($feature_options['fr_feature_author_meta_display'] == "No" && $feature_options['fr_feature_date_meta_display'] == "No" && $feature_options['fr_feature_comment_meta_display'] == "No" && $feature_options['fr_feature_cat_meta_display'] == "No") {
			$home_excerpt_byline_p_tag = 'display:none;';
		}
		else
		{
			$home_excerpt_byline_p_tag = '';
		}
		
		$body_line_height = $content_design['fr_body_line_height'];
		$bylinemeta_line_height = $content_design['fr_bylinemeta_line_height'];
		$content_title_line_height = $content_design['fr_content_title_line_height'];
		$post_subhead_line_height = $content_design['fr_post_subhead_line_height'];
		$main_content_line_height = $content_design['fr_main_content_line_height'];
		$sb_heading_line_height = $content_design['fr_sb_heading_line_height'];
		$sb_content_line_height = $content_design['fr_sb_content_line_height'];
		$sb_pages_line_height = $content_design['fr_sb_pages_line_height'];
		$ft_widget_title_line_height = $feature_design['fr_ft_widget_title_line_height'];
		$fb_widget_title_line_height = $feature_design['fr_fb_widget_title_line_height'];
		$home_excerpt_title_text_align = $feature_design['fr_home_excerpt_title_text_align'];
		$home_excerpt_title_line_height = $feature_design['fr_home_excerpt_title_line_height'];
		$home_excerpt_content_font_size = $feature_design['fr_home_excerpt_content_font_size'];
		$home_excerpt_content_line_height = $feature_design['fr_home_excerpt_content_line_height'];
		$home_excerpt_bylinemeta_line_height = $feature_design['fr_home_excerpt_bylinemeta_line_height'];
		$feature_widget_content_line_height = $feature_design['fr_feature_widget_content_line_height'];
		$fbox_headline_line_height = $feature_design['fr_fbox_headline_line_height'];
		$fbox_content_line_height = $feature_design['fr_fbox_content_line_height'];

		$content_title_font_size = $content_design['fr_content_title_font_size'];
		$content_title_font_size_h2 = $content_design['fr_content_title_font_size_h2'];
		$content_title_letter_spacing = $content_design['fr_content_title_letter_spacing'];
		$content_title_text_align = $content_design['fr_content_title_text_align'];
		$post_subhead_font_size_h3 = $content_design['fr_post_subhead_font_size_h3'];
		$post_subhead_font_size_h4 = $content_design['fr_post_subhead_font_size_h4'];
		$post_subhead_letter_spacing = $content_design['fr_post_subhead_letter_spacing'];
		$main_content_font_size = $content_design['fr_main_content_font_size'];
		if($content_design['fr_custom_bylinemeta_font'] != ""): $bylinemeta_font = $content_design['fr_custom_bylinemeta_font']; else: $bylinemeta_font = $content_design['fr_bylinemeta_font']; endif;
		$bylinemeta_font_size = $content_design['fr_bylinemeta_font_size'];
		$bylinemeta_font_color = $content_design['fr_bylinemeta_font_color'];
		$bylinemeta_text_link_color = $content_design['fr_bylinemeta_text_link_color'];
		$bylinemeta_text_link_hover_color = $content_design['fr_bylinemeta_text_link_hover_color'];
		$commentmeta_font_size = $content_design['fr_commentmeta_font_size'];
		$commentmeta_font_color = $content_design['fr_commentmeta_font_color'];
		$commentmeta_font_hover_color = $content_design['fr_commentmeta_font_hover_color'];
		$comment_font_size = $content_design['fr_comment_font_size'];
		$comment_sub_width = $content_design['fr_comment_sub_width'];
		$comment_sub_font_size = $content_design['fr_comment_sub_font_size'];
		$comment_sub_font_weight = $content_design['fr_comment_sub_font_weight'];
		$comment_sub_border_color = $content_design['fr_comment_sub_border_color'];
		$comment_sub_text_color = $content_design['fr_comment_sub_text_color'];
		$alt_comment_reply_bg_color = $content_design['fr_alt_comment_reply_bg_color'];
		$alt_comment_bg_color = $content_design['fr_alt_comment_bg_color'];
		$comment_border_color = $content_design['fr_comment_border_color'];
		$comment_box_border_color = $content_design['fr_comment_box_border_color'];
		$comment_box_text_color = $content_design['fr_comment_box_text_color'];
		
		if ($content_design['fr_comment_box_width'] == ""):
		$comment_box_width = "100%";
		else:
		$comment_box_width = $content_design['fr_comment_box_width'] . 'px';
		endif;
		
		$cc_border_color = $content_design['fr_cc_border_color'];
		$byline_top_margin = $main_options['fr_byline_top_margin'];
		$byline_bottom_padding = $main_options['fr_byline_bottom_padding'];
		$post_banner_border_color = $content_design['fr_post_banner_border_color'];
		$post_banner_text_color = $content_design['fr_post_banner_text_color'];
		$post_border_thickness = $content_design['fr_post_border_thickness'];
		$post_border_color = $content_design['fr_post_border_color'];
		
		$blockquote_border_style = $content_design['fr_blockquote_border_style'];
		$blockquote_border_thickness = $content_design['fr_blockquote_border_thickness'];
		$blockquote_border_color = $content_design['fr_blockquote_border_color'];
		
		if ($content_design['fr_blockquote_border_type'] == "Top/Bottom"):
		$blockquote_border_type = 'border-top: ' . $blockquote_border_thickness . 'px ' . $blockquote_border_style . ' #' . $blockquote_border_color . '; border-bottom: ' . $blockquote_border_thickness . 'px ' . $blockquote_border_style . ' #' . $blockquote_border_color . ';';
		else:
		$blockquote_border_type = 'border: ' . $blockquote_border_thickness . 'px ' . $blockquote_border_style . ' #' . $blockquote_border_color . ';';
		endif;
		
		$widepost_width = $content_width - $cc_border_padding - 20 - $cc_with_border_padding;
		
		$postarea_padding = 20;
		
		$cc_padded_width = $cc_width + $postarea_padding + $cc_with_border_padding;
		$cms_pagearea_width = $content_width - $sb_cms_width - $sb_cms_w_border_padding - $sb_cms_border_padding - $cc_border_padding - 50 - $cc_with_border_padding;
		$cms_cc_padded_width = $cms_pagearea_width + $postarea_padding + $cc_with_border_padding;
		$post_banner_width = $cc_width - 20;
		
		$cc_tb_margin = $content_design['fr_cc_tb_margin'];
		
		if ($content_design['fr_layout_type'] == "Double Sidebar"):
		$cc_alt_margin = $cc_tb_margin . 'px ' . 10 . 'px ' . $cc_tb_margin . 'px ' . 10 . 'px';
		$h_cc_alt_margin = $cc_tb_margin . 'px ' . 0 . 'px ' . $cc_tb_margin . 'px ' . 0 . 'px';
		elseif ($content_design['fr_layout_type'] == "Left Sidebar" || $content_design['fr_layout_type'] == "Double Left Sidebar"):
		$cc_alt_margin = $cc_tb_margin . 'px ' . 0 . 'px ' . $cc_tb_margin . 'px ' . 10 . 'px';
		$h_cc_alt_margin = $cc_tb_margin . 'px ' . 0 . 'px ' . $cc_tb_margin . 'px ' . 0 . 'px';
		else:
		$cc_alt_margin = $cc_tb_margin . 'px ' . 10 . 'px ' . $cc_tb_margin . 'px ' . 0 . 'px';
		$h_cc_alt_margin = $cc_tb_margin . 'px ' . 0 . 'px ' . $cc_tb_margin . 'px ' . 0 . 'px';
		endif;
		
		if ($content_design['fr_cms_layout_type'] == "Double Sidebar"):
		$cms_cc_alt_margin = $cc_tb_margin . 'px ' . 10 . 'px ' . $cc_tb_margin . 'px ' . 10 . 'px';
		elseif ($content_design['fr_cms_layout_type'] == "Left Sidebar"):
		$cms_cc_alt_margin = $cc_tb_margin . 'px ' . 0 . 'px ' . $cc_tb_margin . 'px ' . 10 . 'px';
		else:
		$cms_cc_alt_margin = $cc_tb_margin . 'px ' . 10 . 'px ' . $cc_tb_margin . 'px ' . 0 . 'px';
		endif;
		
		$cc_wide_alt_margin = $cc_tb_margin . 'px ' . 0 . 'px ' . $cc_tb_margin . 'px ' . 0 . 'px';
		
		$sb_tb_margin = $content_design['fr_sb_tb_margin'];
		$fbox_top_margin = $feature_design['fr_fbox_top_margin'];
		$fbox_bottom_margin = $feature_design['fr_fbox_bottom_margin'];
		$hfbox_top_margin = $feature_design['fr_hfbox_top_margin'];
		$hfbox_bottom_margin = $feature_design['fr_hfbox_bottom_margin'];
		$sb_h_tb_margin = $feature_design['fr_sb_h_tb_margin'];
		$sb_alt_margin = $sb_tb_margin . 'px ' . 0 . 'px ' . $sb_tb_margin . 'px ' . 0 . 'px';
		$sb_h_alt_margin = $sb_h_tb_margin . 'px ' . 0 . 'px ' . $sb_h_tb_margin . 'px ' . 0 . 'px';
		$fbox_alt_margin = $fbox_top_margin . 'px ' . 0 . 'px ' . $fbox_bottom_margin . 'px ' . 0 . 'px';
		$hfbox_alt_margin = $hfbox_top_margin . 'px ' . 0 . 'px ' . $hfbox_bottom_margin . 'px ' . 0 . 'px';
		
		if ($content_design['fr_layout_type'] == "Left Sidebar" && $content_design['fr_cc_border_thickness'] == "0" || $content_design['fr_layout_type'] == "Double Left Sidebar" && $content_design['fr_cc_border_thickness'] == "0"):
		$comments_alt_padding = "10px 0px 10px 10px";
		elseif ($content_design['fr_layout_type'] == "Left Sidebar" && $content_design['fr_cc_border_thickness'] != "0" || $content_design['fr_layout_type'] == "Double Left Sidebar" && $content_design['fr_cc_border_thickness'] != "0"):
		$comments_alt_padding = "10px 5px 10px 15px";
		elseif ($content_design['fr_layout_type'] != "Left Sidebar" && $content_design['fr_layout_type'] != "Double Left Sidebar" && $content_design['fr_cc_border_thickness'] == "0"):
		$comments_alt_padding = "10px";
		elseif ($content_design['fr_layout_type'] != "Left Sidebar" && $content_design['fr_layout_type'] != "Double Left Sidebar" && $content_design['fr_cc_border_thickness'] != "0"):
		$comments_alt_padding = "10px 15px 10px 15px";
		endif;
		
		if ($content_design['fr_layout_type'] == "Left Sidebar" || $content_design['fr_layout_type'] == "Double Left Sidebar"):
		$cc_float = 'right';
		else:
		$cc_float = 'left';
		endif;
		
		if ($content_design['fr_cms_layout_type'] == "Left Sidebar"):
		$cms_cc_float = 'right';
		else:
		$cms_cc_float = 'left';
		endif;
		
		if ($content_design['fr_cms_layout_type'] == "Left Sidebar" || $content_design['fr_cms_layout_type'] == "Double Sidebar"):
		$sb_cms_1_float = 'left';
		else:
		$sb_cms_1_float = 'right';
		endif;
		
		if ($header_design['fr_navbar_right_text_link_underline'] == "On Hover"):
		$navbar_right_text_link_underline_visited = 'none';
		$navbar_right_text_link_underline_hover = 'underline';
		elseif ($header_design['fr_navbar_right_text_link_underline'] == "Off Hover"):
		$navbar_right_text_link_underline_visited = 'underline';
		$navbar_right_text_link_underline_hover = 'none';
		elseif ($header_design['fr_navbar_right_text_link_underline'] == "Always"):
		$navbar_right_text_link_underline_visited = 'underline';
		$navbar_right_text_link_underline_hover = 'underline';
		else:
		$navbar_right_text_link_underline_visited = 'none';
		$navbar_right_text_link_underline_hover = 'none';
		endif;
		
		if ($header_design['fr_subnavbar_right_text_link_underline'] == "On Hover"):
		$subnavbar_right_text_link_underline_visited = 'none';
		$subnavbar_right_text_link_underline_hover = 'underline';
		elseif ($header_design['fr_subnavbar_right_text_link_underline'] == "Off Hover"):
		$subnavbar_right_text_link_underline_visited = 'underline';
		$subnavbar_right_text_link_underline_hover = 'none';
		elseif ($header_design['fr_subnavbar_right_text_link_underline'] == "Always"):
		$subnavbar_right_text_link_underline_visited = 'underline';
		$subnavbar_right_text_link_underline_hover = 'underline';
		else:
		$subnavbar_right_text_link_underline_visited = 'none';
		$subnavbar_right_text_link_underline_hover = 'none';
		endif;
		
		if ($content_design['fr_content_title_text_link_underline'] == "On Hover"):
		$content_title_text_link_underline_visited = 'none';
		$content_title_text_link_underline_hover = 'underline';
		elseif ($content_design['fr_content_title_text_link_underline'] == "Off Hover"):
		$content_title_text_link_underline_visited = 'underline';
		$content_title_text_link_underline_hover = 'none';
		elseif ($content_design['fr_content_title_text_link_underline'] == "Always"):
		$content_title_text_link_underline_visited = 'underline';
		$content_title_text_link_underline_hover = 'underline';
		else:
		$content_title_text_link_underline_visited = 'none';
		$content_title_text_link_underline_hover = 'none';
		endif;
		
		if ($content_design['fr_main_content_text_link_underline'] == "On Hover"):
		$main_content_text_link_underline_visited = 'none';
		$main_content_text_link_underline_hover = 'underline';
		elseif ($content_design['fr_main_content_text_link_underline'] == "Off Hover"):
		$main_content_text_link_underline_visited = 'underline';
		$main_content_text_link_underline_hover = 'none';
		elseif ($content_design['fr_main_content_text_link_underline'] == "Always"):
		$main_content_text_link_underline_visited = 'underline';
		$main_content_text_link_underline_hover = 'underline';
		else:
		$main_content_text_link_underline_visited = 'none';
		$main_content_text_link_underline_hover = 'none';
		endif;
		
		if ($content_design['fr_bylinemeta_text_link_underline'] == "On Hover"):
		$bylinemeta_text_link_underline_visited = 'none';
		$bylinemeta_text_link_underline_hover = 'underline';
		elseif ($content_design['fr_bylinemeta_text_link_underline'] == "Off Hover"):
		$bylinemeta_text_link_underline_visited = 'underline';
		$bylinemeta_text_link_underline_hover = 'none';
		elseif ($content_design['fr_bylinemeta_text_link_underline'] == "Always"):
		$bylinemeta_text_link_underline_visited = 'underline';
		$bylinemeta_text_link_underline_hover = 'underline';
		else:
		$bylinemeta_text_link_underline_visited = 'none';
		$bylinemeta_text_link_underline_hover = 'none';
		endif;
		
		if ($content_design['fr_commentmeta_text_link_underline'] == "On Hover"):
		$commentmeta_text_link_underline_visited = 'none';
		$commentmeta_text_link_underline_hover = 'underline';
		elseif ($content_design['fr_commentmeta_text_link_underline'] == "Off Hover"):
		$commentmeta_text_link_underline_visited = 'underline';
		$commentmeta_text_link_underline_hover = 'none';
		elseif ($content_design['fr_commentmeta_text_link_underline'] == "Always"):
		$commentmeta_text_link_underline_visited = 'underline';
		$commentmeta_text_link_underline_hover = 'underline';
		else:
		$commentmeta_text_link_underline_visited = 'none';
		$commentmeta_text_link_underline_hover = 'none';
		endif;
		
		if ($content_design['fr_comment_text_link_underline'] == "On Hover"):
		$comment_text_link_underline_visited = 'none';
		$comment_text_link_underline_hover = 'underline';
		elseif ($content_design['fr_comment_text_link_underline'] == "Off Hover"):
		$comment_text_link_underline_visited = 'underline';
		$comment_text_link_underline_hover = 'none';
		elseif ($content_design['fr_comment_text_link_underline'] == "Always"):
		$comment_text_link_underline_visited = 'underline';
		$comment_text_link_underline_hover = 'underline';
		else:
		$comment_text_link_underline_visited = 'none';
		$comment_text_link_underline_hover = 'none';
		endif;

		$sb_border_color = $content_design['fr_sb_border_color'];
		$sb_heading_border_style = $content_design['fr_sb_heading_border_style'];
		$sb_heading_border_thickness = $content_design['fr_sb_heading_border_thickness'];
		$sb_heading_border_color = $content_design['fr_sb_heading_border_color'];
		$sb_heading_font_size = $content_design['fr_sb_heading_font_size'];
		$sb_heading_letter_spacing = $content_design['fr_sb_heading_letter_spacing'];
		$sb_content_border_style = $content_design['fr_sb_content_border_style'];
		$sb_content_border_thickness = $content_design['fr_sb_content_border_thickness'];
		$sb_content_border_color = $content_design['fr_sb_content_border_color'];
		$sb_content_font_size = $content_design['fr_sb_content_font_size'];
		$sb_content_font_weight = $content_design['fr_sb_content_font_weight'];
		$sb_content_letter_spacing = $content_design['fr_sb_content_letter_spacing'];
		$sb_pages_font_size = $content_design['fr_sb_pages_font_size'];
		$sb_pages_font_weight = $content_design['fr_sb_pages_font_weight'];
		$sb_pages_letter_spacing = $content_design['fr_sb_pages_letter_spacing'];
		$sb_title_text_align = $content_design['fr_sb_title_text_align'];
		
		$sb_list_style = $content_design['fr_sb_list_style'];
		
		if ($content_design['fr_sb_list_style'] == "none" && $content_design['fr_sb_content_border_thickness'] == "0" || $content_design['fr_sb_list_style'] == "none" && $content_design['fr_sb_content_design_active'] == "No"):
		$sb_content_left_padding_thickness = 0;
		$sb_ul_5_padding_thickness = 5;
		$sb_content_right_padding_thickness = 0;
		$sb_content_lr_p_padding_thickness = 5;
		$sb_content_top_padding_thickness = 0;
		$sb_content_bottom_p_padding_thickness = 0;
		elseif ($content_design['fr_sb_list_style'] == "none" && $content_design['fr_sb_content_border_thickness'] != "0" && $content_design['fr_sb_content_design_active'] == "Yes"):
		$sb_content_left_padding_thickness = 5;
		$sb_ul_5_padding_thickness = 5;
		$sb_content_right_padding_thickness = 5;
		$sb_content_lr_p_padding_thickness = 10;
		$sb_content_top_padding_thickness = 7;
		$sb_content_bottom_p_padding_thickness = 5;
		elseif ($content_design['fr_sb_list_style'] != "none" && $content_design['fr_sb_content_border_thickness'] == "0" || $content_design['fr_sb_list_style'] != "none" && $content_design['fr_sb_content_design_active'] == "No"):
		$sb_content_left_padding_thickness = 20;
		$sb_ul_5_padding_thickness = 0;
		$sb_content_right_padding_thickness = 0;
		$sb_content_lr_p_padding_thickness = 5;
		$sb_content_top_padding_thickness = 0;
		$sb_content_bottom_p_padding_thickness = 0;
		elseif ($content_design['fr_sb_list_style'] != "none" && $content_design['fr_sb_content_border_thickness'] != "0" && $content_design['fr_sb_content_design_active'] == "Yes"):
		$sb_content_left_padding_thickness = 22;
		$sb_ul_5_padding_thickness = 0;
		$sb_content_right_padding_thickness = 7;
		$sb_content_lr_p_padding_thickness = 10;
		$sb_content_top_padding_thickness = 7;
		$sb_content_bottom_p_padding_thickness = 5;
		endif;
		
		if ($content_design['fr_sb_heading_border_type'] == "Bottom"):
		$sb_heading_border_type = 'border-bottom';
		else:
		$sb_heading_border_type = 'border';
		endif;
		
		if ($content_design['fr_sb_content_border_thickness'] == "0" || $content_design['fr_sb_content_design_active'] == "No"):
		$sb_heading_margins = '0px 0px 7px 0px';
		$sb_content_border_right = '';
		$sb_content_border_bottom = '';
		$sb_content_border_left = '';
		else:
		$sb_heading_margins = '0px';
		$sb_content_border_right = 'border-right: ' . $sb_content_border_thickness . 'px ' . $sb_content_border_style . ' #' . $sb_content_border_color . ';';
		$sb_content_border_bottom = 'border-bottom: ' . $sb_content_border_thickness . 'px ' . $sb_content_border_style . ' #' . $sb_content_border_color . ';';
		$sb_content_border_left = 'border-left: ' . $sb_content_border_thickness . 'px ' . $sb_content_border_style . ' #' . $sb_content_border_color . ';';
		endif;
		
		if ($content_design['fr_sb_heading_border_type'] == "Full" && $content_design['fr_sb_heading_border_thickness'] != "0"):
		$sb_heading_tb_padding_thickness = 5;
		$sb_heading_lr_padding_thickness = 10;
		else:
		$sb_heading_tb_padding_thickness = 3;
		$sb_heading_lr_padding_thickness = 5;
		endif;
		
		if ($content_design['fr_layout_type'] == "Double Right Sidebar" || $content_design['fr_layout_type'] == "Double Left Sidebar"):
		$sb_wrap_width = $sb_1 + $sb_2 + $sb_with_border_padding + 40;
		elseif ($content_design['fr_layout_type'] == "Double Sidebar"):
		$sb_wrap_width = $sb_2 + $sb_with_border_padding + $ds_extra_padding + 20;
		else:
		$sb_wrap_width = $sb_1 + $sb_with_border_padding + 20;
		endif;
		
		if ($content_design['fr_layout_type'] == "Left Sidebar" || $content_design['fr_layout_type'] == "Double Left Sidebar"):
		$sb_wrap_float = 'left';
		else:
		$sb_wrap_float = 'right';
		endif;

		if ($content_design['fr_layout_type'] == "Double Sidebar"):
		$sb_1_border_thickness = $sb_border_thickness;
		$sb_1_bg = $sb_bg;
		$sb_1_alt_margin = $sb_tb_margin . 'px ' . 0 . 'px ' . $sb_tb_margin . 'px ' . 0 . 'px';
		else:
		$sb_1_border_thickness = 0;
		$sb_1_bg = '';
		$sb_1_alt_margin = '0px';
		endif;
		
		if ($content_design['fr_sb_text_link_underline'] == "On Hover"):
		$sb_text_link_underline_visited = 'none';
		$sb_text_link_underline_hover = 'underline';
		elseif ($content_design['fr_sb_text_link_underline'] == "Off Hover"):
		$sb_text_link_underline_visited = 'underline';
		$sb_text_link_underline_hover = 'none';
		elseif ($content_design['fr_sb_text_link_underline'] == "Always"):
		$sb_text_link_underline_visited = 'underline';
		$sb_text_link_underline_hover = 'underline';
		else:
		$sb_text_link_underline_visited = 'none';
		$sb_text_link_underline_hover = 'none';
		endif;
		
		if ($content_design['fr_sb_pages_link_underline'] == "On Hover"):
		$sb_pages_link_underline_visited = 'none';
		$sb_pages_link_underline_hover = 'underline';
		elseif ($content_design['fr_sb_pages_link_underline'] == "Off Hover"):
		$sb_pages_link_underline_visited = 'underline';
		$sb_pages_link_underline_hover = 'none';
		elseif ($content_design['fr_sb_pages_link_underline'] == "Always"):
		$sb_pages_link_underline_visited = 'underline';
		$sb_pages_link_underline_hover = 'underline';
		else:
		$sb_pages_link_underline_visited = 'none';
		$sb_pages_link_underline_hover = 'none';
		endif;
		
		if ($content_design['fr_sb_pages_heading_display'] == "No"):
		$sb_pages_heading_display = '.widget_pages h3 { display:none !important; }';
		else:
		$sb_pages_heading_display = '';
		endif;

		$title_font_weight = $header_design['fr_logo_font_weight'];
		$tag_font_weight = $header_design['fr_logo_tag_font_weight'];
		$ft_widget_title_font_weight = $feature_design['fr_ft_widget_title_font_weight'];
		$fb_widget_title_font_weight = $feature_design['fr_fb_widget_title_font_weight'];
		$home_excerpt_title_font_weight = $feature_design['fr_home_excerpt_title_font_weight'];
		$content_title_font_weight = $content_design['fr_content_title_font_weight'];
		$post_subhead_font_weight = $content_design['fr_post_subhead_font_weight'];	
		$fbox_headline_font_weight = $feature_design['fr_fbox_headline_font_weight'];
		$sb_heading_font_weight = $content_design['fr_sb_heading_font_weight'];
		
		$sb_h_float = $feature_options['fr_home_sb_float'];

		if ($feature_design['fr_sb_h_border_type'] == "Left"):
		$sb_h_border_padding = $sb_h_border_thickness;
		else:
		$sb_h_border_padding = $sb_h_border_thickness * 2;
		endif;
		
		$sb_h_heading_border_color = $feature_design['fr_sb_h_heading_border_color'];
		$sb_h_heading_border_thickness = $feature_design['fr_sb_h_heading_border_thickness'];
		
		if ($feature_design['fr_sb_h_bg_type'] == "Color"):
		$sb_h_heading_bg = 'background: #' . $sb_h_bg_color . ';';
		$sb_h_content_bg = 'background: #' . $sb_h_bg_color . ';';
		$sb_h_heading_border = 'border-bottom: ' . $sb_h_heading_border_thickness . 'px solid #' . $sb_h_heading_border_color . ';';
		$sb_h_content_border_right = 'border-right: 0px solid #ddd;';
		$sb_h_content_border_bottom = 'border-bottom: 0px solid #ddd;';
		$sb_h_content_border_left = 'border-left: 0px solid #ddd;';
		elseif ($feature_design['fr_sb_h_bg_type'] == "Inherit Sidebars"):
		$sb_h_heading_bg = $sb_heading_bg;
		$sb_h_content_bg = $sb_content_bg;
		$sb_h_heading_border = $sb_heading_border_type . ': ' . $sb_heading_border_thickness . 'px ' . $sb_heading_border_style . ' #' . $sb_heading_border_color . ';';
		$sb_h_content_border_right = 'border-right: ' . $sb_content_border_thickness . 'px ' . $sb_content_border_style . ' #' . $sb_content_border_color . ';';
		$sb_h_content_border_bottom = 'border-bottom: ' . $sb_content_border_thickness . 'px ' . $sb_content_border_style . ' #' . $sb_content_border_color . ';';
		$sb_h_content_border_left = 'border-left: ' . $sb_content_border_thickness . 'px ' . $sb_content_border_style . ' #' . $sb_content_border_color . ';';
		else:
		$sb_h_heading_bg = 'background: transparent;';
		$sb_h_content_bg = 'background: transparent;';
		$sb_h_heading_border = 'border-bottom: ' . $sb_h_heading_border_thickness . 'px solid #' . $sb_h_heading_border_color . ';';
		$sb_h_content_border_right = 'border-right: 0px solid #ddd;';
		$sb_h_content_border_bottom = 'border-bottom: 0px solid #ddd;';
		$sb_h_content_border_left = 'border-left: 0px solid #ddd;';
		endif;
		
		$ft_border_thickness = $feature_design['fr_ft_border_thickness'];
		$ft_border_padding = $ft_border_thickness * 2;
		$ft_border_style = $feature_design['fr_ft_border_style'];
		$ft_border_color = $feature_design['fr_ft_border_color'];
		$fb_border_thickness = $feature_design['fr_fb_border_thickness'];
		
		$fb_border_padding = $fb_border_thickness * 2;
		$fb_border_style = $feature_design['fr_fb_border_style'];
		$fb_border_color = $feature_design['fr_fb_border_color'];
		
		$ft_widget_title_font_size = $feature_design['fr_ft_widget_title_font_size'];
		$ft_widget_title_letter_spacing = $feature_design['fr_ft_widget_title_letter_spacing'];
		$ft_widget_title_text_align = $feature_design['fr_ft_widget_title_text_align'];
		$fb_widget_title_font_size = $feature_design['fr_fb_widget_title_font_size'];
		$fb_widget_title_letter_spacing = $feature_design['fr_fb_widget_title_letter_spacing'];
		$fb_widget_title_text_align = $feature_design['fr_fb_widget_title_text_align'];
		$home_excerpt_title_font_size = $feature_design['fr_home_excerpt_title_font_size'];
		$home_excerpt_title_letter_spacing = $feature_design['fr_home_excerpt_title_letter_spacing'];
		$home_excerpt_font_size = $feature_design['fr_home_excerpt_font_size'];
		$feature_widget_content_font_size = $feature_design['fr_feature_widget_content_font_size'];
		
		$home_excerpt_bylinemeta_font_size = $feature_design['fr_home_excerpt_bylinemeta_font_size'];
		
		$ft_widget_number = $feature_options['fr_ft_widget_number'];
		$fb_widget_number = $feature_options['fr_fb_widget_number'];
		$ht_widget_number = $feature_options['fr_ht_widget_number'];
		$hb_widget_number = $feature_options['fr_hb_widget_number'];
		$ft_top_margin = $feature_design['fr_ft_top_margin'];
		$ft_right_margin = $feature_design['fr_ft_right_margin'];
		$ft_bottom_margin = $feature_design['fr_ft_bottom_margin'];
		$ft_left_margin = $feature_design['fr_ft_left_margin'];
		$ft_horizontal_margin = $ft_right_margin + $ft_left_margin;
		$ft_top_padding = $feature_design['fr_ft_top_padding'];
		$ft_right_padding = $feature_design['fr_ft_right_padding'];
		$ft_bottom_padding = $feature_design['fr_ft_bottom_padding'];
		$ft_left_padding = $feature_design['fr_ft_left_padding'];
		$ft_horizontal_padding = $ft_right_padding + $ft_left_padding;
		$ft_widget_top_margin = $feature_design['fr_ft_widget_top_margin'];
		$ft_widget_right_margin = $feature_design['fr_ft_widget_right_margin'];
		$ft_widget_bottom_margin = $feature_design['fr_ft_widget_bottom_margin'];
		$ft_widget_left_margin = $feature_design['fr_ft_widget_left_margin'];
		$ft_widget_top_padding = $feature_design['fr_ft_widget_top_padding'];
		$ft_widget_right_padding = $feature_design['fr_ft_widget_right_padding'];
		$ft_widget_bottom_padding = $feature_design['fr_ft_widget_bottom_padding'];
		$ft_widget_left_padding = $feature_design['fr_ft_widget_left_padding'];
		$ft_widget_horizontal_padding = $ft_widget_right_margin + $ft_widget_left_margin + $ft_widget_right_padding + $ft_widget_left_padding;
		$fb_top_margin = $feature_design['fr_fb_top_margin'];
		$fb_right_margin = $feature_design['fr_fb_right_margin'];
		$fb_bottom_margin = $feature_design['fr_fb_bottom_margin'];
		$fb_left_margin = $feature_design['fr_fb_left_margin'];
		$fb_horizontal_margin = $fb_right_margin + $fb_left_margin;
		$fb_top_padding = $feature_design['fr_fb_top_padding'];
		$fb_right_padding = $feature_design['fr_fb_right_padding'];
		$fb_bottom_padding = $feature_design['fr_fb_bottom_padding'];
		$fb_left_padding = $feature_design['fr_fb_left_padding'];
		$fb_horizontal_padding = $fb_right_padding + $fb_left_padding;
		$fb_widget_top_margin = $feature_design['fr_fb_widget_top_margin'];
		$fb_widget_right_margin = $feature_design['fr_fb_widget_right_margin'];
		$fb_widget_bottom_margin = $feature_design['fr_fb_widget_bottom_margin'];
		$fb_widget_left_margin = $feature_design['fr_fb_widget_left_margin'];
		$fb_widget_top_padding = $feature_design['fr_fb_widget_top_padding'];
		$fb_widget_right_padding = $feature_design['fr_fb_widget_right_padding'];
		$fb_widget_bottom_padding = $feature_design['fr_fb_widget_bottom_padding'];
		$fb_widget_left_padding = $feature_design['fr_fb_widget_left_padding'];
		$fb_widget_horizontal_padding = $fb_widget_right_margin + $fb_widget_left_margin + $fb_widget_right_padding + $fb_widget_left_padding;
		$ht_top_margin = $feature_design['fr_ht_top_margin'];
		$ht_right_margin = $feature_design['fr_ht_right_margin'];
		$ht_bottom_margin = $feature_design['fr_ht_bottom_margin'];
		$ht_left_margin = $feature_design['fr_ht_left_margin'];
		$ht_top_padding = $feature_design['fr_ht_top_padding'];
		$ht_right_padding = $feature_design['fr_ht_right_padding'];
		$ht_bottom_padding = $feature_design['fr_ht_bottom_padding'];
		$ht_left_padding = $feature_design['fr_ht_left_padding'];
		$ht_horizontal_padding = $ht_right_padding + $ht_left_padding;
		$ht_widget_top_margin = $feature_design['fr_ht_widget_top_margin'];
		$ht_widget_right_margin = $feature_design['fr_ht_widget_right_margin'];
		$ht_widget_bottom_margin = $feature_design['fr_ht_widget_bottom_margin'];
		$ht_widget_left_margin = $feature_design['fr_ht_widget_left_margin'];
		$ht_widget_top_padding = $feature_design['fr_ht_widget_top_padding'];
		$ht_widget_right_padding = $feature_design['fr_ht_widget_right_padding'];
		$ht_widget_bottom_padding = $feature_design['fr_ht_widget_bottom_padding'];
		$ht_widget_left_padding = $feature_design['fr_ht_widget_left_padding'];
		$ht_widget_horizontal_padding = $ht_widget_right_margin + $ht_widget_left_margin + $ht_widget_right_padding + $ht_widget_left_padding;
		$htww_widget_top_margin = $feature_design['fr_htww_widget_top_margin'];
		$htww_widget_right_margin = $feature_design['fr_htww_widget_right_margin'];
		$htww_widget_bottom_margin = $feature_design['fr_htww_widget_bottom_margin'];
		$htww_widget_left_margin = $feature_design['fr_htww_widget_left_margin'];
		$htww_widget_top_padding = $feature_design['fr_htww_widget_top_padding'];
		$htww_widget_right_padding = $feature_design['fr_htww_widget_right_padding'];
		$htww_widget_bottom_padding = $feature_design['fr_htww_widget_bottom_padding'];
		$htww_widget_left_padding = $feature_design['fr_htww_widget_left_padding'];
		$htww_widget_horizontal_padding = $htww_widget_right_margin + $htww_widget_left_margin + $htww_widget_right_padding + $htww_widget_left_padding;
		$hb_top_margin = $feature_design['fr_hb_top_margin'];
		$hb_right_margin = $feature_design['fr_hb_right_margin'];
		$hb_bottom_margin = $feature_design['fr_hb_bottom_margin'];
		$hb_left_margin = $feature_design['fr_hb_left_margin'];
		$hb_horizontal_margin = $hb_right_margin + $hb_left_margin;
		$hb_top_padding = $feature_design['fr_hb_top_padding'];
		$hb_right_padding = $feature_design['fr_hb_right_padding'];
		$hb_bottom_padding = $feature_design['fr_hb_bottom_padding'];
		$hb_left_padding = $feature_design['fr_hb_left_padding'];
		$hb_horizontal_padding = $hb_right_padding + $hb_left_padding;
		$hb_widget_top_margin = $feature_design['fr_hb_widget_top_margin'];
		$hb_widget_right_margin = $feature_design['fr_hb_widget_right_margin'];
		$hb_widget_bottom_margin = $feature_design['fr_hb_widget_bottom_margin'];
		$hb_widget_left_margin = $feature_design['fr_hb_widget_left_margin'];
		$hb_widget_top_padding = $feature_design['fr_hb_widget_top_padding'];
		$hb_widget_right_padding = $feature_design['fr_hb_widget_right_padding'];
		$hb_widget_bottom_padding = $feature_design['fr_hb_widget_bottom_padding'];
		$hb_widget_left_padding = $feature_design['fr_hb_widget_left_padding'];
		$hb_widget_horizontal_padding = $hb_widget_right_margin + $hb_widget_left_margin + $hb_widget_right_padding + $hb_widget_left_padding;
		
		if ($feature_design['fr_ft_widget_display_block'] == 'Yes'):
		$ft_widget_display_block = 'display: block;';
		else:
		$ft_widget_display_block = '';
		endif;
		
		if ($feature_design['fr_fb_widget_display_block'] == 'Yes'):
		$fb_widget_display_block = 'display: block;';
		else:
		$fb_widget_display_block = '';
		endif;
		
		if ($feature_design['fr_htww_widget_display_block'] == 'Yes'):
		$htww_widget_display_block = 'display: block;';
		else:
		$htww_widget_display_block = '';
		endif;
		
		if ($feature_design['fr_ht_widget_display_block'] == 'Yes'):
		$ht_widget_display_block = 'display: block;';
		else:
		$ht_widget_display_block = '';
		endif;
		
		if ($feature_design['fr_hb_widget_display_block'] == 'Yes'):
		$hb_widget_display_block = 'display: block;';
		else:
		$hb_widget_display_block = '';
		endif;
		
		if ($content_design['fr_post_banner_display_block'] == 'Yes'):
		$post_banner_display_block = 'display: block;';
		else:
		$post_banner_display_block = '';
		endif;
		
		if ($feature_design['fr_cw1_display_block'] == 'Yes'):
		$cw1_display_block = 'display: block;';
		else:
		$cw1_display_block = '';
		endif;
		
		if ($feature_design['fr_cw2_display_block'] == 'Yes'):
		$cw2_display_block = 'display: block;';
		else:
		$cw2_display_block = '';
		endif;
		
		if ($feature_design['fr_cw3_display_block'] == 'Yes'):
		$cw3_display_block = 'display: block;';
		else:
		$cw3_display_block = '';
		endif;
		
		if ($feature_design['fr_cw4_display_block'] == 'Yes'):
		$cw4_display_block = 'display: block;';
		else:
		$cw4_display_block = '';
		endif;
		
		if ($feature_design['fr_ft_border_type'] == "Bottom"):
		$ft_border_type = 'border-bottom';
		$ft_width = $container_width - $ft_horizontal_padding - $ft_horizontal_margin - $container_lr_border_padding;
		$ft_widget_width = $container_width / $ft_widget_number - (($ft_horizontal_padding + $ft_horizontal_margin) / $ft_widget_number) - $ft_widget_horizontal_padding - ($container_lr_border_padding / $ft_widget_number);
		else:
		$ft_border_type = 'border';
		$ft_width = $container_width - $ft_border_padding - $ft_horizontal_padding - $ft_horizontal_margin - $container_lr_border_padding;
		$ft_widget_width = ($container_width - $ft_border_padding - $ft_horizontal_margin) / $ft_widget_number - ($ft_horizontal_padding / $ft_widget_number) - $ft_widget_horizontal_padding - ($container_lr_border_padding / $ft_widget_number);
		endif;
		
		if ($feature_design['fr_fb_border_type'] == "Top"):
		$fb_border_type = 'border-top';
		$fb_width = $container_width - $fb_horizontal_padding - $fb_horizontal_margin - $container_lr_border_padding;
		$hb_width = $container_width - $hb_horizontal_padding - $hb_horizontal_margin - $container_lr_border_padding;
		$fb_widget_width = $container_width / $fb_widget_number - (($fb_horizontal_padding + $fb_horizontal_margin) / $fb_widget_number) - $fb_widget_horizontal_padding - ($container_lr_border_padding / $ft_widget_number);
		$hb_widget_width = $container_width / $hb_widget_number - (($hb_horizontal_padding + $hb_horizontal_margin) / $hb_widget_number) - $hb_widget_horizontal_padding - ($container_lr_border_padding / $ft_widget_number);
		else:
		$fb_border_type = 'border';
		$fb_width = $container_width - $fb_border_padding - $fb_horizontal_padding - $fb_horizontal_margin - $container_lr_border_padding;
		$hb_width = $container_width - $fb_border_padding - $hb_horizontal_padding - $hb_horizontal_margin - $container_lr_border_padding;
		$fb_widget_width = ($container_width - $fb_border_padding - $fb_horizontal_margin) / $fb_widget_number - ($fb_horizontal_padding / $fb_widget_number) - $fb_widget_horizontal_padding - ($container_lr_border_padding / $ft_widget_number);
		$hb_widget_width = ($container_width - $fb_border_padding - $hb_horizontal_margin) / $hb_widget_number - ($hb_horizontal_padding / $hb_widget_number) - $hb_widget_horizontal_padding - ($container_lr_border_padding / $ft_widget_number);
		endif;
		
		$htww_tb_margin_thickness = $feature_design['fr_htww_tb_margin_thickness'];
		$htww_border_style = $feature_design['fr_htww_border_style'];
		$htww_border_padding = $feature_design['fr_htww_border_padding'];
		$htww_border_thickness = $feature_design['fr_htww_border_thickness'];
		$htww_border_color = $feature_design['fr_htww_border_color'];
		$htww_width = $content_width - $sb_h - $sb_h_with_border_padding - $sb_h_border_padding - $htww_border_thickness - $ht_horizontal_padding - $htww_widget_horizontal_padding - 21;
		$ht_width = $content_width - $ht_horizontal_padding;
		$ht_widget_width = $content_width / $ht_widget_number - ($ht_horizontal_padding / $ht_widget_number) - $ht_widget_horizontal_padding;
		
		if ($feature_options['fr_home_top_layout'] == "Featured Content/Home Sidebar"):
		$htll_width = $content_width - $sb_h - $sb_h_with_border_padding - $sb_h_border_padding - $cc_border_padding - 50 - $cc_with_border_padding - $ht_horizontal_padding;
		else:
		$htll_width = $content_width - $cc_border_padding - 20 - $cc_with_border_padding - $ht_horizontal_padding;
		endif;
		
		if ($feature_design['fr_htww_height'] == ""):
		$htww_height = "100%";
		else:
		$htww_height = $feature_design['fr_htww_height'] . 'px';
		endif;
		
		if ($feature_options['fr_home_sb_float'] == "right"):
		$ht_content_float = "left";
		$htww_border_type = "border-right";
		else:
		$ht_content_float = "right";
		$htww_border_type = "border-left";
		endif;

		$ft_widget_title_text_caps = $feature_design['fr_ft_widget_title_text_caps'];
		$fb_widget_title_text_caps = $feature_design['fr_fb_widget_title_text_caps'];
		$home_excerpt_title_text_caps = $feature_design['fr_home_excerpt_title_text_caps'];
		$fbox_headline_text_caps = $feature_design['fr_fbox_headline_text_caps'];
		$content_title_text_caps = $content_design['fr_content_title_text_caps'];
		$post_subhead_text_caps = $content_design['fr_post_subhead_text_caps'];
		$ft_widget_title_font_variant = $feature_design['fr_ft_widget_title_font_variant'];
		$fb_widget_title_font_variant = $feature_design['fr_fb_widget_title_font_variant'];
		$home_excerpt_title_font_variant = $feature_design['fr_home_excerpt_title_font_variant'];
		$fbox_headline_font_variant = $feature_design['fr_fbox_headline_font_variant'];
		$content_title_font_variant = $content_design['fr_content_title_font_variant'];
		$post_subhead_font_variant = $content_design['fr_post_subhead_font_variant'];
		
		$post_image_padding = $content_design['fr_post_image_padding'];
		$caption_bg_color = $content_design['fr_caption_bg_color'];
		$caption_border_style = $content_design['fr_caption_border_style'];
		$caption_border_thickness = $content_design['fr_caption_border_thickness'];
		$caption_border_color = $content_design['fr_caption_border_color'];
		$caption_font_size = $content_design['fr_caption_font_size'];
		$caption_font_weight = $content_design['fr_caption_font_weight'];
		$caption_font_style = $content_design['fr_caption_font_style'];
		$caption_line_height = $content_design['fr_caption_line_height'];
		
		if ($content_design['fr_caption_text_padding'] == "Yes"):
		$caption_alt_margin = '0';
		else:
		$caption_alt_margin = '-5';
		endif;
		
		$thumb_border_style = $feature_options['fr_thumb_border_style'];
		$thumb_border_thickness = $feature_options['fr_thumb_border_thickness'];
		$thumb_border_color = $feature_options['fr_thumb_border_color'];
		
		if ($feature_design['fr_home_excerpt_title_text_link_underline'] == "On Hover"):
		$home_excerpt_title_text_link_underline_visited = 'none';
		$home_excerpt_title_text_link_underline_hover = 'underline';
		elseif ($feature_design['fr_home_excerpt_title_text_link_underline'] == "Off Hover"):
		$home_excerpt_title_text_link_underline_visited = 'underline';
		$home_excerpt_title_text_link_underline_hover = 'none';
		elseif ($feature_design['fr_home_excerpt_title_text_link_underline'] == "Always"):
		$home_excerpt_title_text_link_underline_visited = 'underline';
		$home_excerpt_title_text_link_underline_hover = 'underline';
		else:
		$home_excerpt_title_text_link_underline_visited = 'none';
		$home_excerpt_title_text_link_underline_hover = 'none';
		endif;
		
		if ($feature_design['fr_feature_widget_content_text_link_underline'] == "On Hover"):
		$feature_widget_content_text_link_underline_visited = 'none';
		$feature_widget_content_text_link_underline_hover = 'underline';
		elseif ($feature_design['fr_feature_widget_content_text_link_underline'] == "Off Hover"):
		$feature_widget_content_text_link_underline_visited = 'underline';
		$feature_widget_content_text_link_underline_hover = 'none';
		elseif ($feature_design['fr_feature_widget_content_text_link_underline'] == "Always"):
		$feature_widget_content_text_link_underline_visited = 'underline';
		$feature_widget_content_text_link_underline_hover = 'underline';
		else:
		$feature_widget_content_text_link_underline_visited = 'none';
		$feature_widget_content_text_link_underline_hover = 'none';
		endif;
		
		if ($feature_design['fr_cw1_border_type'] == "Full"):
		$cw1_border_type = 'border';
		elseif ($feature_design['fr_cw1_border_type'] == "Top"):
		$cw1_border_type = 'border-top';
		else:
		$cw1_border_type = 'border-bottom';
		endif;
		
		$cw1_bg_color = $feature_design['fr_cw1_bg_color'];
		$cw1_top_margin = $feature_options['fr_cw1_top_margin'];
		$cw1_right_margin = $feature_options['fr_cw1_right_margin'];
		$cw1_bottom_margin = $feature_options['fr_cw1_bottom_margin'];
		$cw1_left_margin = $feature_options['fr_cw1_left_margin'];
		$cw1_top_padding = $feature_options['fr_cw1_top_padding'];
		$cw1_right_padding = $feature_options['fr_cw1_right_padding'];
		$cw1_bottom_padding = $feature_options['fr_cw1_bottom_padding'];
		$cw1_left_padding = $feature_options['fr_cw1_left_padding'];
		$cw1_float = $feature_options['fr_cw1_float'];
		$cw1_w_pixels = $feature_options['fr_cw1_width'];
		$cw1_h_pixels = $feature_options['fr_cw1_height'];
		$cw1_border_style = $feature_design['fr_cw1_border_style'];
		$cw1_border_thickness = $feature_design['fr_cw1_border_thickness'];
		$cw1_border_color = $feature_design['fr_cw1_border_color'];
		
		$cw1_headline_font_size = $feature_design['fr_cw1_headline_font_size'];
		$cw1_headline_font_weight = $feature_design['fr_cw1_headline_font_weight'];
		$cw1_headline_text_align = $feature_design['fr_cw1_headline_text_align'];
		$cw1_headline_text_caps = $feature_design['fr_cw1_headline_text_caps'];
		$cw1_headline_font_variant = $feature_design['fr_cw1_headline_font_variant'];
		$cw1_headline_letter_spacing = $feature_design['fr_cw1_headline_letter_spacing'];
		$cw1_headline_line_height = $feature_design['fr_cw1_headline_line_height'];
		$cw1_content_font_size = $feature_design['fr_cw1_content_font_size'];
		$cw1_content_line_height = $feature_design['fr_cw1_content_line_height'];
		
		if ($feature_design['fr_cw1_text_link_underline'] == "On Hover"):
		$cw1_text_link_underline_visited = 'none';
		$cw1_text_link_underline_hover = 'underline';
		elseif ($feature_design['fr_cw1_text_link_underline'] == "Off Hover"):
		$cw1_text_link_underline_visited = 'underline';
		$cw1_text_link_underline_hover = 'none';
		elseif ($feature_design['fr_cw1_text_link_underline'] == "Always"):
		$cw1_text_link_underline_visited = 'underline';
		$cw1_text_link_underline_hover = 'underline';
		else:
		$cw1_text_link_underline_visited = 'none';
		$cw1_text_link_underline_hover = 'none';
		endif;
		
		if($feature_options['fr_cw1_width'] != ""):
		$cw1_width = $cw1_w_pixels . 'px';
		else:
		$cw1_width = '100%';
		endif;
		
		if($feature_options['fr_cw1_height'] != ""):
		$cw1_height = $cw1_h_pixels . 'px';
		else:
		$cw1_height = '100%';
		endif;
		
		if ($feature_design['fr_cw2_border_type'] == "Full"):
		$cw2_border_type = 'border';
		elseif ($feature_design['fr_cw2_border_type'] == "Top"):
		$cw2_border_type = 'border-top';
		else:
		$cw2_border_type = 'border-bottom';
		endif;
		
		$cw2_bg_color = $feature_design['fr_cw2_bg_color'];
		$cw2_top_margin = $feature_options['fr_cw2_top_margin'];
		$cw2_right_margin = $feature_options['fr_cw2_right_margin'];
		$cw2_bottom_margin = $feature_options['fr_cw2_bottom_margin'];
		$cw2_left_margin = $feature_options['fr_cw2_left_margin'];
		$cw2_top_padding = $feature_options['fr_cw2_top_padding'];
		$cw2_right_padding = $feature_options['fr_cw2_right_padding'];
		$cw2_bottom_padding = $feature_options['fr_cw2_bottom_padding'];
		$cw2_left_padding = $feature_options['fr_cw2_left_padding'];
		$cw2_float = $feature_options['fr_cw2_float'];
		$cw2_w_pixels = $feature_options['fr_cw2_width'];
		$cw2_h_pixels = $feature_options['fr_cw2_height'];
		$cw2_border_style = $feature_design['fr_cw2_border_style'];
		$cw2_border_thickness = $feature_design['fr_cw2_border_thickness'];
		$cw2_border_color = $feature_design['fr_cw2_border_color'];
		
		$cw2_headline_font_size = $feature_design['fr_cw2_headline_font_size'];
		$cw2_headline_font_weight = $feature_design['fr_cw2_headline_font_weight'];
		$cw2_headline_text_align = $feature_design['fr_cw2_headline_text_align'];
		$cw2_headline_text_caps = $feature_design['fr_cw2_headline_text_caps'];
		$cw2_headline_font_variant = $feature_design['fr_cw2_headline_font_variant'];
		$cw2_headline_letter_spacing = $feature_design['fr_cw2_headline_letter_spacing'];
		$cw2_headline_line_height = $feature_design['fr_cw2_headline_line_height'];
		$cw2_content_font_size = $feature_design['fr_cw2_content_font_size'];
		$cw2_content_line_height = $feature_design['fr_cw2_content_line_height'];
		
		if ($feature_design['fr_cw2_text_link_underline'] == "On Hover"):
		$cw2_text_link_underline_visited = 'none';
		$cw2_text_link_underline_hover = 'underline';
		elseif ($feature_design['fr_cw2_text_link_underline'] == "Off Hover"):
		$cw2_text_link_underline_visited = 'underline';
		$cw2_text_link_underline_hover = 'none';
		elseif ($feature_design['fr_cw2_text_link_underline'] == "Always"):
		$cw2_text_link_underline_visited = 'underline';
		$cw2_text_link_underline_hover = 'underline';
		else:
		$cw2_text_link_underline_visited = 'none';
		$cw2_text_link_underline_hover = 'none';
		endif;
		
		if($feature_options['fr_cw2_width'] != ""):
		$cw2_width = $cw2_w_pixels . 'px';
		else:
		$cw2_width = '100%';
		endif;
		
		if($feature_options['fr_cw2_height'] != ""):
		$cw2_height = $cw2_h_pixels . 'px';
		else:
		$cw2_height = '100%';
		endif;
		
		if ($feature_design['fr_cw3_border_type'] == "Full"):
		$cw3_border_type = 'border';
		elseif ($feature_design['fr_cw3_border_type'] == "Top"):
		$cw3_border_type = 'border-top';
		else:
		$cw3_border_type = 'border-bottom';
		endif;
		
		$cw3_bg_color = $feature_design['fr_cw3_bg_color'];
		$cw3_top_margin = $feature_options['fr_cw3_top_margin'];
		$cw3_right_margin = $feature_options['fr_cw3_right_margin'];
		$cw3_bottom_margin = $feature_options['fr_cw3_bottom_margin'];
		$cw3_left_margin = $feature_options['fr_cw3_left_margin'];
		$cw3_top_padding = $feature_options['fr_cw3_top_padding'];
		$cw3_right_padding = $feature_options['fr_cw3_right_padding'];
		$cw3_bottom_padding = $feature_options['fr_cw3_bottom_padding'];
		$cw3_left_padding = $feature_options['fr_cw3_left_padding'];
		$cw3_float = $feature_options['fr_cw3_float'];
		$cw3_w_pixels = $feature_options['fr_cw3_width'];
		$cw3_h_pixels = $feature_options['fr_cw3_height'];
		$cw3_border_style = $feature_design['fr_cw3_border_style'];
		$cw3_border_thickness = $feature_design['fr_cw3_border_thickness'];
		$cw3_border_color = $feature_design['fr_cw3_border_color'];
		
		$cw3_headline_font_size = $feature_design['fr_cw3_headline_font_size'];
		$cw3_headline_font_weight = $feature_design['fr_cw3_headline_font_weight'];
		$cw3_headline_text_align = $feature_design['fr_cw3_headline_text_align'];
		$cw3_headline_text_caps = $feature_design['fr_cw3_headline_text_caps'];
		$cw3_headline_font_variant = $feature_design['fr_cw3_headline_font_variant'];
		$cw3_headline_letter_spacing = $feature_design['fr_cw3_headline_letter_spacing'];
		$cw3_headline_line_height = $feature_design['fr_cw3_headline_line_height'];
		$cw3_content_font_size = $feature_design['fr_cw3_content_font_size'];
		$cw3_content_line_height = $feature_design['fr_cw3_content_line_height'];
		
		if ($feature_design['fr_cw3_text_link_underline'] == "On Hover"):
		$cw3_text_link_underline_visited = 'none';
		$cw3_text_link_underline_hover = 'underline';
		elseif ($feature_design['fr_cw3_text_link_underline'] == "Off Hover"):
		$cw3_text_link_underline_visited = 'underline';
		$cw3_text_link_underline_hover = 'none';
		elseif ($feature_design['fr_cw3_text_link_underline'] == "Always"):
		$cw3_text_link_underline_visited = 'underline';
		$cw3_text_link_underline_hover = 'underline';
		else:
		$cw3_text_link_underline_visited = 'none';
		$cw3_text_link_underline_hover = 'none';
		endif;
		
		if($feature_options['fr_cw3_width'] != ""):
		$cw3_width = $cw3_w_pixels . 'px';
		else:
		$cw3_width = '100%';
		endif;
		
		if($feature_options['fr_cw3_height'] != ""):
		$cw3_height = $cw3_h_pixels . 'px';
		else:
		$cw3_height = '100%';
		endif;
		
		if ($feature_design['fr_cw4_border_type'] == "Full"):
		$cw4_border_type = 'border';
		elseif ($feature_design['fr_cw4_border_type'] == "Top"):
		$cw4_border_type = 'border-top';
		else:
		$cw4_border_type = 'border-bottom';
		endif;
		
		$cw4_bg_color = $feature_design['fr_cw4_bg_color'];
		$cw4_top_margin = $feature_options['fr_cw4_top_margin'];
		$cw4_right_margin = $feature_options['fr_cw4_right_margin'];
		$cw4_bottom_margin = $feature_options['fr_cw4_bottom_margin'];
		$cw4_left_margin = $feature_options['fr_cw4_left_margin'];
		$cw4_top_padding = $feature_options['fr_cw4_top_padding'];
		$cw4_right_padding = $feature_options['fr_cw4_right_padding'];
		$cw4_bottom_padding = $feature_options['fr_cw4_bottom_padding'];
		$cw4_left_padding = $feature_options['fr_cw4_left_padding'];
		$cw4_margin = $feature_options['fr_cw4_margin'];
		$cw4_padding = $feature_options['fr_cw4_padding'];
		$cw4_float = $feature_options['fr_cw4_float'];
		$cw4_w_pixels = $feature_options['fr_cw4_width'];
		$cw4_h_pixels = $feature_options['fr_cw4_height'];
		$cw4_border_style = $feature_design['fr_cw4_border_style'];
		$cw4_border_thickness = $feature_design['fr_cw4_border_thickness'];
		$cw4_border_color = $feature_design['fr_cw4_border_color'];
		
		$cw4_headline_font_size = $feature_design['fr_cw4_headline_font_size'];
		$cw4_headline_font_weight = $feature_design['fr_cw4_headline_font_weight'];
		$cw4_headline_text_align = $feature_design['fr_cw4_headline_text_align'];
		$cw4_headline_text_caps = $feature_design['fr_cw4_headline_text_caps'];
		$cw4_headline_font_variant = $feature_design['fr_cw4_headline_font_variant'];
		$cw4_headline_letter_spacing = $feature_design['fr_cw4_headline_letter_spacing'];
		$cw4_headline_line_height = $feature_design['fr_cw4_headline_line_height'];
		$cw4_content_font_size = $feature_design['fr_cw4_content_font_size'];
		$cw4_content_line_height = $feature_design['fr_cw4_content_line_height'];
		
		if ($feature_design['fr_cw4_text_link_underline'] == "On Hover"):
		$cw4_text_link_underline_visited = 'none';
		$cw4_text_link_underline_hover = 'underline';
		elseif ($feature_design['fr_cw4_text_link_underline'] == "Off Hover"):
		$cw4_text_link_underline_visited = 'underline';
		$cw4_text_link_underline_hover = 'none';
		elseif ($feature_design['fr_cw4_text_link_underline'] == "Always"):
		$cw4_text_link_underline_visited = 'underline';
		$cw4_text_link_underline_hover = 'underline';
		else:
		$cw4_text_link_underline_visited = 'none';
		$cw4_text_link_underline_hover = 'none';
		endif;
		
		if($feature_options['fr_cw4_width'] != ""):
		$cw4_width = $cw4_w_pixels . 'px';
		else:
		$cw4_width = '100%';
		endif;
		
		if($feature_options['fr_cw4_height'] != ""):
		$cw4_height = $cw4_h_pixels . 'px';
		else:
		$cw4_height = '100%';
		endif;

		$fbox_bg_color = $feature_design['fr_fbox_bg_color'];
		$fbox_headline_font_size = $feature_design['fr_fbox_headline_font_size'];
		$fbox_headline_letter_spacing = $feature_design['fr_fbox_headline_letter_spacing'];
		$fbox_content_font_size = $feature_design['fr_fbox_content_font_size'];
		
		if ($feature_design['fr_fbox_text_link_underline'] == "On Hover"):
		$fbox_text_link_underline_visited = 'none';
		$fbox_text_link_underline_hover = 'underline';
		elseif ($feature_design['fr_fbox_text_link_underline'] == "Off Hover"):
		$fbox_text_link_underline_visited = 'underline';
		$fbox_text_link_underline_hover = 'none';
		elseif ($feature_design['fr_fbox_text_link_underline'] == "Always"):
		$fbox_text_link_underline_visited = 'underline';
		$fbox_text_link_underline_hover = 'underline';
		else:
		$fbox_text_link_underline_visited = 'none';
		$fbox_text_link_underline_hover = 'none';
		endif;
		
		$fbox_outer_border_color = $feature_design['fr_fbox_outer_border_color'];
		$fbox_inner_border_color = $feature_design['fr_fbox_inner_border_color'];
		$hfbox_outer_border_color = $feature_design['fr_hfbox_outer_border_color'];
		$hfbox_inner_border_color = $feature_design['fr_hfbox_inner_border_color'];
		
		$sb_fbox_border_padding = $sb_border_thickness * 2;
		
		if ($feature_options['fr_fbox_display'] == "Outside"):
		$fbox_wrap_width = $sb_wrap_width + $sb_fbox_border_padding;
		$fbox_width = $sb_wrap_width + $sb_fbox_border_padding - 20;
		else:
		$fbox_wrap_width = $sb_wrap_width;
		$fbox_width = $sb_wrap_width - 20;
		endif;
		
		if ($feature_options['fr_home_fb_display'] == "Outside"):
		$hfbox_wrap_width = $sb_h + $sb_h_with_border_padding + $sb_h_border_padding + 20;
		$hfbox_width = $sb_h + $sb_h_with_border_padding + $sb_h_border_padding;
		$hfbox_float = $sb_h_float;
		elseif ($feature_options['fr_home_fb_display'] == "Full Screen"):
		$hfbox_wrap_width = $container_div_width - $ht_horizontal_padding - $ht_widget_horizontal_padding - 20;
		$hfbox_width = $container_div_width - $ht_horizontal_padding - $ht_widget_horizontal_padding - 20;
		$hfbox_float = 'left';
		else:
		$hfbox_wrap_width = $sb_h + $sb_h_with_border_padding + $sb_h_border_padding - 10;
		$hfbox_width = $sb_h - 20;
		$hfbox_float = $sb_h_float;
		endif;
		
		//** Footer Misc Options **//
		
		if ($main_options['fr_footer_text_layout'] == "Custom Text | frugal Link"):
		$footer_left_float = 'left';
		$footer_right_float = 'right';
		else:
		$footer_left_float = 'right';
		$footer_right_float = 'left';
		endif;
		
		//** Footer Top Border Styles **//
		
		$footer_top_border_color = $content_design['fr_footer_top_border_color'];
		$footer_top_border_style = $content_design['fr_footer_top_border_style'];
		$footer_top_border_thickness = $content_design['fr_footer_top_border_thickness'];
		
		//** Footer Font Styles **//
		
		if($content_design['fr_custom_footer_font'] != ""): $footer_font = $content_design['fr_custom_footer_font']; else: $footer_font = $content_design['fr_footer_font']; endif;
		$footer_font_size = $content_design['fr_footer_font_size'];
		$footer_font_color = $content_design['fr_footer_font_color'];

		//** Footer Hyperlink Styles **//
		
		$footer_link_color = $content_design['fr_footer_link_color'];
		$footer_link_hover_color = $content_design['fr_footer_link_hover_color'];
		
		if ($content_design['fr_footer_text_link_underline'] == "On Hover"):
		$footer_text_link_underline_visited = 'none';
		$footer_text_link_underline_hover = 'underline';
		elseif ($content_design['fr_footer_text_link_underline'] == "Off Hover"):
		$footer_text_link_underline_visited = 'underline';
		$footer_text_link_underline_hover = 'none';
		elseif ($content_design['fr_footer_text_link_underline'] == "Always"):
		$footer_text_link_underline_visited = 'underline';
		$footer_text_link_underline_hover = 'underline';
		else:
		$footer_text_link_underline_visited = 'none';
		$footer_text_link_underline_hover = 'none';
		endif;
		
		//** Class Styles **//
		
		$remove_page_titles = $main_options['fr_remove_page_titles'];
		if ($main_options['fr_remove_page_titles'] != ""):
		$remove_page_titles_css = ' { display: none; }';
		endif;
		
		$this->css .= '
/************************* 
	Dynamic Styles 
*************************/

/*** Frame ***/

body { 
	background: #' . $bg_color . $bg_image_type . ';
	line-height: ' . $body_line_height . '%;
}
#wrap {
	' . $wrap_bg . '
	border-top: ' . $tb_border_thickness . 'px ' . $border_style . ' #' . $border_color . ';
	border-bottom: ' . $tb_border_thickness . 'px ' . $border_style . ' #' . $border_color . ';
	border-left: ' . $lr_border_thickness . 'px ' . $border_style . ' #' . $border_color . ';
	border-right: ' . $lr_border_thickness . 'px ' . $border_style . ' #' . $border_color . ';
	width: ' . $container_width . 'px;
	margin: ' . $top_margin . 'px auto ' . $bottom_margin . 'px;
	padding-top: ' . $tb_padding_thickness . 'px;
	padding-bottom: ' . $tb_padding_thickness . 'px;
	padding-left: ' . $lr_padding_thickness . 'px;
	padding-right: ' . $lr_padding_thickness . 'px;
}

/*** Image Captions ***/

img.alignnone {
	margin: 0px 0px ' . $post_image_padding . 'px 0px;
}
img.alignleft {
	margin: 0px ' . $post_image_padding . 'px ' . $post_image_padding . 'px 0px;
}
img.centered {
	margin-bottom: ' . $post_image_padding . 'px;
}
img.alignright {
	margin: 0px 0px ' . $post_image_padding . 'px ' . $post_image_padding . 'px;
}
.alignleft {
	margin: 0px ' . $post_image_padding . 'px ' . $post_image_padding . 'px 0px;
}
.aligncenter {
	margin-bottom: ' . $post_image_padding . 'px;
}
.alignright {
	margin: 0px 0px ' . $post_image_padding . 'px ' . $post_image_padding . 'px;
}
.wp-caption {
	background: #' . $caption_bg_color . ';
	border: ' . $caption_border_thickness . 'px ' . $caption_border_style . ' #' . $caption_border_color . ';
}
.wp-caption p.wp-caption-text {
	margin: 0px 0px ' . $caption_alt_margin . 'px 0px;
	font-size: ' . $caption_font_size . 'px;
	font-family: ' . $caption_font . ';
	color: #' . $caption_font_color . ' !important;
	font-weight: ' . $caption_font_weight . ';
	font-style: ' . $caption_font_style . ';
	line-height: ' . $caption_line_height . '%;
}

/*** UL ***/

ul {
	list-style-type: ' . $universal_list_style . ';
}
ul li {
	list-style-type: ' . $universal_list_style . ';
}
ul ul {
	list-style-type: ' . $universal_list_style . ';
}

/*** Thumbnails ***/

.wp-post-image {
	border: ' . $thumb_border_thickness . 'px ' . $thumb_border_style . ' #' . $thumb_border_color . ';
}

/************************* 
	Header 
*************************/

#header_wrap {
	' . $header_bg . '
	width: ' . $header_wrap_width . ';
	' . $header_border_type . ': ' . $header_border_thickness . 'px ' . $header_border_style . ' #' . $header_border_color . ';
}
#header {
	width: ' . $header_width . 'px;
	height: ' . $header_height . 'px;
}
#title {
	color: #' . $title_font_color . ';
	font-family: ' . $title_font . ';
	font-size: ' . $title_font_size . 'px;
	font-weight: ' . $title_font_weight . ';
	letter-spacing: ' . $title_letter_spacing . 'px;
}
#title a, #title a:visited {
	color: #' . $title_font_color . ';
}
#title a:hover {
	color: #' . $title_font_hover_color . ';
}
#tagline {
	color: #' . $tag_font_color . ';
	font-family: ' . $tag_font . ';
	font-size: ' . $tag_font_size . 'px;
	font-weight: ' . $tag_font_weight . ';
	letter-spacing: ' . $tag_letter_spacing . 'px;
	padding: ' . $logo_tag_top_padding . 'px ' . $logo_tag_right_padding . 'px ' . $logo_tag_bottom_padding . 'px ' . $logo_tag_left_padding . 'px !important;
}
#logotext {
	text-align: ' . $logo_text_align . ';
	width: ' . $logo_text_width . 'px;
	padding: ' . $logo_text_top_padding . 'px ' . $logo_text_right_padding . 'px ' . $logo_text_bottom_padding . 'px ' . $logo_text_left_padding . 'px;
}
#logoimage {
	width: ' . $logo_width . 'px;
	background: url(' . $frugal_upload_dir . $logo_image_name . ') ' . $logo_image_align . ' top no-repeat;
	margin-top: ' . $logo_image_top_margin . 'px;
}
#logoimage a {	
	width: ' . $logo_width . 'px;
	height: ' . $header_height . 'px;
}
.headerright {
	width: ' . $header_right_width . 'px;
	padding: ' . $header_right_top_padding . 'px ' . $header_right_right_padding . 'px ' . $header_right_bottom_padding . 'px ' . $header_right_left_padding . 'px;
}

/************************* 
	Navigation 
*************************/

/*** Search Box ***/

#searchbox {
	' . $search_box_bg . '
	border: 1px solid #' . $search_box_border_color . ';
	width: ' . $search_box_width . 'px;
	color: #' . $search_box_text_color . ';
	font-family: ' . $search_box_font . ';
	font-size: ' . $search_box_font_size . 'px;
}

/*** Navbar ***/

#navbar_wrap {
	' . $navbar_bg . '
	height: ' . $nav_height . 'px;
	border-top: ' . $navbar_top_border_thickness . 'px solid #' . $navbar_top_border_color . ';
	border-bottom: ' . $navbar_bottom_border_thickness . 'px solid #' . $navbar_bottom_border_color . ';
}
#navbar {
	height: ' . $nav_height . 'px;
	width: ' . $navbar_width . 'px;
	margin: 0px auto 0px ' . $nav_left_margin . ';
	color: #' . $navbar_font_color . ';
	font-size: ' . $navbar_font_size . 'px;
	font-family: ' . $navbar_font . ';
	font-weight: ' . $navbar_font_weight . ';
	text-transform: ' . $navbar_caps . ';
	font-variant: ' . $navbar_font_variant . ';
}
#navbar_left {
	letter-spacing: ' . $navbar_letter_spacing . 'px;
}
#navbar_right {
	color: #' . $navbar_right_font_color . ';
	font-family: ' . $navbar_right_font . ';
	font-size: ' . $navbar_right_font_size . 'px;
	padding: ' . $navbar_right_top_padding . 'px ' . $navbar_right_right_padding . 'px ' . $navbar_right_bottom_padding . 'px ' . $navbar_right_left_padding . 'px;
}
#navbar_right a, #navbar_right a:visited{
	color: #' . $navbar_right_link_color . ';
	text-decoration: ' . $navbar_right_text_link_underline_visited . ';
}
#navbar_right a:hover{
	color: #' . $navbar_right_link_color . ';
	text-decoration: ' . $navbar_right_text_link_underline_hover . ';
}
#nav li a, #nav li a:link, #nav li a:visited {
	' . $navbar_non_cp_bg . '
	border-top: ' . $navbar_page_top_border_thickness . 'px solid #' . $navbar_page_border_color . ';
	border-right: ' . $navbar_page_right_border_thickness . 'px solid #' . $navbar_page_border_color . ';
	border-bottom: ' . $navbar_page_bottom_border_thickness . 'px solid #' . $navbar_page_border_color . ';
	border-left: ' . $navbar_page_left_border_thickness . 'px solid #' . $navbar_page_border_color . ';
	color: #' . $navbar_font_color . ';
	margin: 0px ' . $nav_page_right_margin . 'px 0px ' . $nav_page_left_margin . 'px;
	padding: ' . $nav_page_tb_padding . 'px ' . $nav_page_lr_padding . 'px ' . $nav_page_tb_padding . 'px ' . $nav_page_lr_padding . 'px;
}
#nav li a:hover, #nav li a:active {
	' . $navbar_non_cp_hover_bg . '
	border-top: ' . $navbar_page_top_border_thickness . 'px solid #' . $navbar_page_hover_border_color . ';
	border-right: ' . $navbar_page_right_border_thickness . 'px solid #' . $navbar_page_hover_border_color . ';
	border-bottom: ' . $navbar_page_bottom_border_thickness . 'px solid #' . $navbar_page_hover_border_color . ';
	border-left: ' . $navbar_page_left_border_thickness . 'px solid #' . $navbar_page_hover_border_color . ';
	color: #' . $navbar_text_hover_color . ';
	text-decoration: ' . $navbar_text_hover_underline . ';
}
#nav li li a, #nav li li a:link, #nav li li a:visited {
	background: #' . $navbar_sub_bg_color . $navbar_sub_bg_image_type . ';
	border-left: 1px solid #' . $navbar_sub_border_color . ' !important;
	border-bottom: 1px solid #' . $navbar_sub_border_color . ' !important;
	border-right: 1px solid #' . $navbar_sub_border_color . ' !important;
	width: ' . $nav_sub_box_width . 'px;
	margin: 0px 0px 0px ' . $nav_page_left_margin . 'px;
	padding: ' . $nav_sub_tb_padding . 'px ' . $nav_sub_lr_padding . 'px ' . $nav_sub_tb_padding . 'px ' . $nav_sub_lr_padding . 'px;
	color: #' . $navbar_sub_font_color . ';
}
#nav li li a:hover, #nav li li a:active {
	background: #' . $navbar_sub_hover_bg_color . $navbar_sub_hover_bg_image_type . ';
	color: #' . $navbar_sub_text_hover_color . ';
	text-decoration: ' . $navbar_text_hover_underline . ';
}
#nav li ul ul {
	margin: ' . $nav_liulul_top_margin . 'px 0 0 ' . $nav_liulul_left_margin . 'px;
}
#nav li.current_page_item a, #nav li.current_page_item a:link, #nav li.current_page_item a:visited, #nav li.current_page_ancestor a {
	' . $navbar_cp_bg . '
	color: #' . $navbar_cp_font_color . ';
	border-top: ' . $navbar_page_top_border_thickness . 'px solid #' . $navbar_cp_border_color . ';
	border-right: ' . $navbar_page_right_border_thickness . 'px solid #' . $navbar_cp_border_color . ';
	border-bottom: ' . $navbar_page_bottom_border_thickness . 'px solid #' . $navbar_cp_border_color . ';
	border-left: ' . $navbar_page_left_border_thickness . 'px solid #' . $navbar_cp_border_color . ';
}
#nav li.current_page_item a:hover, #nav li.current_page_item a:active {
	' . $navbar_cp_bg . '
	color: #' . $navbar_cp_font_color . ';
}
#nav li.current_page_item ul a, #nav li.current_page_item ul a:link, #nav li.current_page_item ul a:visited {
	background: #' . $navbar_sub_bg_color . $navbar_sub_bg_image_type . ';
	color: #' . $navbar_sub_font_color . ';
}
#nav li.current_page_item ul a:hover, #nav li.current_page_item ul a:active {
	background: #' . $navbar_sub_hover_bg_color . $navbar_sub_hover_bg_image_type . ';
	color: #' . $navbar_sub_text_hover_color . ';
	text-decoration: ' . $navbar_text_hover_underline . ';
}
#nav li li.current_page_item a, #nav li li.current_page_item a:link, #nav li li.current_page_item a:visited {
	background: #' . $navbar_sub_cp_bg_color . $navbar_sub_cp_bg_image_type . ';
	color: #' . $navbar_cp_font_color . ';
}
#nav li li.current_page_item a:hover, #nav li li.current_page_item a:active {
	background: #' . $navbar_sub_cp_bg_color . $navbar_sub_cp_bg_image_type . ';
	color: #' . $navbar_cp_font_color . ';
}

#nav li a, #nav li a:link, #nav li a:visited {
	' . $navbar_non_cp_bg . '
	border-top: ' . $navbar_page_top_border_thickness . 'px solid #' . $navbar_page_border_color . ';
	border-right: ' . $navbar_page_right_border_thickness . 'px solid #' . $navbar_page_border_color . ';
	border-bottom: ' . $navbar_page_bottom_border_thickness . 'px solid #' . $navbar_page_border_color . ';
	border-left: ' . $navbar_page_left_border_thickness . 'px solid #' . $navbar_page_border_color . ';
	color: #' . $navbar_font_color . ';
	margin: 0px ' . $nav_page_right_margin . 'px 0px ' . $nav_page_left_margin . 'px;
	padding: ' . $nav_page_tb_padding . 'px ' . $nav_page_lr_padding . 'px ' . $nav_page_tb_padding . 'px ' . $nav_page_lr_padding . 'px;
}
#nav li a:hover, #nav li a:active {
	' . $navbar_non_cp_hover_bg . '
	border-top: ' . $navbar_page_top_border_thickness . 'px solid #' . $navbar_page_hover_border_color . ';
	border-right: ' . $navbar_page_right_border_thickness . 'px solid #' . $navbar_page_hover_border_color . ';
	border-bottom: ' . $navbar_page_bottom_border_thickness . 'px solid #' . $navbar_page_hover_border_color . ';
	border-left: ' . $navbar_page_left_border_thickness . 'px solid #' . $navbar_page_hover_border_color . ';
	color: #' . $navbar_text_hover_color . ';
	text-decoration: ' . $navbar_text_hover_underline . ';
}
#nav li li a, #nav li li a:link, #nav li li a:visited {
	background: #' . $navbar_sub_bg_color . $navbar_sub_bg_image_type . ';
	border-left: 1px solid #' . $navbar_sub_border_color . ' !important;
	border-bottom: 1px solid #' . $navbar_sub_border_color . ' !important;
	border-right: 1px solid #' . $navbar_sub_border_color . ' !important;
	width: ' . $nav_sub_box_width . 'px;
	margin: 0px 0px 0px ' . $nav_page_left_margin . 'px;
	padding: ' . $nav_sub_tb_padding . 'px ' . $nav_sub_lr_padding . 'px ' . $nav_sub_tb_padding . 'px ' . $nav_sub_lr_padding . 'px;
	color: #' . $navbar_sub_font_color . ';
}
#nav li li a:hover, #nav li li a:active {
	background: #' . $navbar_sub_hover_bg_color . $navbar_sub_hover_bg_image_type . ';
	color: #' . $navbar_sub_text_hover_color . ';
	text-decoration: ' . $navbar_text_hover_underline . ';
}
#nav li ul ul {
	margin: ' . $nav_liulul_top_margin . 'px 0 0 ' . $nav_liulul_left_margin . 'px;
}
#nav li.current_page_item a, #nav li.current_page_item a:link, #nav li.current_page_item a:visited, #nav li.current_page_ancestor a {
	' . $navbar_cp_bg . '
	color: #' . $navbar_cp_font_color . ';
	border-top: ' . $navbar_page_top_border_thickness . 'px solid #' . $navbar_cp_border_color . ';
	border-right: ' . $navbar_page_right_border_thickness . 'px solid #' . $navbar_cp_border_color . ';
	border-bottom: ' . $navbar_page_bottom_border_thickness . 'px solid #' . $navbar_cp_border_color . ';
	border-left: ' . $navbar_page_left_border_thickness . 'px solid #' . $navbar_cp_border_color . ';
}
#nav li.current_page_item a:hover, #nav li.current_page_item a:active {
	' . $navbar_cp_bg . '
	color: #' . $navbar_cp_font_color . ';
}
#nav li.current_page_item ul a, #nav li.current_page_item ul a:link, #nav li.current_page_item ul a:visited {
	background: #' . $navbar_sub_bg_color . $navbar_sub_bg_image_type . ';
	color: #' . $navbar_sub_font_color . ';
}
#nav li.current_page_item ul a:hover, #nav li.current_page_item ul a:active {
	background: #' . $navbar_sub_hover_bg_color . $navbar_sub_hover_bg_image_type . ';
	color: #' . $navbar_sub_text_hover_color . ';
	text-decoration: ' . $navbar_text_hover_underline . ';
}
#nav li li.current_page_item a, #nav li li.current_page_item a:link, #nav li li.current_page_item a:visited {
	background: #' . $navbar_sub_cp_bg_color . $navbar_sub_cp_bg_image_type . ';
	color: #' . $navbar_cp_font_color . ';
}
#nav li li.current_page_item a:hover, #nav li li.current_page_item a:active {
	background: #' . $navbar_sub_cp_bg_color . $navbar_sub_cp_bg_image_type . ';
	color: #' . $navbar_cp_font_color . ';
}

#navbar_left .menu li a, #navbar_left .menu li a:link, #navbar_left .menu li a:visited {
	' . $navbar_non_cp_bg . '
	border-top: ' . $navbar_page_top_border_thickness . 'px solid #' . $navbar_page_border_color . ';
	border-right: ' . $navbar_page_right_border_thickness . 'px solid #' . $navbar_page_border_color . ';
	border-bottom: ' . $navbar_page_bottom_border_thickness . 'px solid #' . $navbar_page_border_color . ';
	border-left: ' . $navbar_page_left_border_thickness . 'px solid #' . $navbar_page_border_color . ';
	color: #' . $navbar_font_color . ';
	margin: 0px ' . $nav_page_right_margin . 'px 0px ' . $nav_page_left_margin . 'px;
	padding: ' . $nav_page_tb_padding . 'px ' . $nav_page_lr_padding . 'px ' . $nav_page_tb_padding . 'px ' . $nav_page_lr_padding . 'px;
}
#navbar_left .menu li a:hover, #navbar_left .menu li a:active {
	' . $navbar_non_cp_hover_bg . '
	border-top: ' . $navbar_page_top_border_thickness . 'px solid #' . $navbar_page_hover_border_color . ';
	border-right: ' . $navbar_page_right_border_thickness . 'px solid #' . $navbar_page_hover_border_color . ';
	border-bottom: ' . $navbar_page_bottom_border_thickness . 'px solid #' . $navbar_page_hover_border_color . ';
	border-left: ' . $navbar_page_left_border_thickness . 'px solid #' . $navbar_page_hover_border_color . ';
	color: #' . $navbar_text_hover_color . ';
	text-decoration: ' . $navbar_text_hover_underline . ';
}
#navbar_left .menu li li a, #navbar_left .menu li li a:link, #navbar_left .menu li li a:visited {
	background: #' . $navbar_sub_bg_color . $navbar_sub_bg_image_type . ';
	border-left: 1px solid #' . $navbar_sub_border_color . ' !important;
	border-bottom: 1px solid #' . $navbar_sub_border_color . ' !important;
	border-right: 1px solid #' . $navbar_sub_border_color . ' !important;
	width: ' . $nav_sub_box_width . 'px;
	margin: 0px 0px 0px ' . $nav_page_left_margin . 'px;
	padding: ' . $nav_sub_tb_padding . 'px ' . $nav_sub_lr_padding . 'px ' . $nav_sub_tb_padding . 'px ' . $nav_sub_lr_padding . 'px;
	color: #' . $navbar_sub_font_color . ';
}
#navbar_left .menu li li a:hover, #navbar_left .menu li li a:active {
	background: #' . $navbar_sub_hover_bg_color . $navbar_sub_hover_bg_image_type . ';
	color: #' . $navbar_sub_text_hover_color . ';
	text-decoration: ' . $navbar_text_hover_underline . ';
}
#navbar_left .menu li ul ul {
	margin: ' . $nav_liulul_top_margin . 'px 0 0 ' . $nav_liulul_left_margin . 'px;
}
#navbar_left .menu li.current-menu-item a, #navbar_left .menu li.current-menu-item a:link, #navbar_left .menu li.current-menu-item a:visited, #navbar_left .menu li.current_page_ancestor a {
	' . $navbar_cp_bg . '
	color: #' . $navbar_cp_font_color . ';
	border-top: ' . $navbar_page_top_border_thickness . 'px solid #' . $navbar_cp_border_color . ';
	border-right: ' . $navbar_page_right_border_thickness . 'px solid #' . $navbar_cp_border_color . ';
	border-bottom: ' . $navbar_page_bottom_border_thickness . 'px solid #' . $navbar_cp_border_color . ';
	border-left: ' . $navbar_page_left_border_thickness . 'px solid #' . $navbar_cp_border_color . ';
}
#navbar_left .menu li.current-menu-item a:hover, #navbar_left .menu li.current-menu-item a:active {
	' . $navbar_cp_bg . '
	color: #' . $navbar_cp_font_color . ';
}
#navbar_left .menu li.current-menu-item ul a, #navbar_left .menu li.current-menu-item ul a:link, #navbar_left .menu li.current-menu-item ul a:visited {
	background: #' . $navbar_sub_bg_color . $navbar_sub_bg_image_type . ';
	color: #' . $navbar_sub_font_color . ';
}
#navbar_left .menu li.current-menu-item ul a:hover, #navbar_left .menu li.current-menu-item ul a:active {
	background: #' . $navbar_sub_hover_bg_color . $navbar_sub_hover_bg_image_type . ';
	color: #' . $navbar_sub_text_hover_color . ';
	text-decoration: ' . $navbar_text_hover_underline . ';
}
#navbar_left .menu li li.current-menu-item a, #navbar_left .menu li li.current-menu-item a:link, #navbar_left .menu li li.current-menu-item a:visited {
	background: #' . $navbar_sub_cp_bg_color . $navbar_sub_cp_bg_image_type . ';
	color: #' . $navbar_cp_font_color . ';
}
#navbar_left .menu li li.current-menu-item a:hover, #navbar_left .menu li li.current-menu-item a:active {
	background: #' . $navbar_sub_cp_bg_color . $navbar_sub_cp_bg_image_type . ';
	color: #' . $navbar_cp_font_color . ';
}

/*** Sub-Navbar ***/

#subnavbar_wrap {
	' . $subnav_bg . '
	height: ' . $subnav_height . 'px;
	border-top: ' . $subnav_top_border_thickness . 'px solid #' . $subnav_top_border_color . ';
	border-bottom: ' . $subnav_bottom_border_thickness . 'px solid #' . $subnav_bottom_border_color . ';
}
#subnavbar {
	width: ' . $container_width . 'px;
	margin: 0px auto 0px ' . $subnav_left_margin . ';
	font-size: ' . $subnav_font_size . 'px;
	font-family: ' . $subnav_font . ';
	font-weight: ' . $subnav_font_weight . ';
	text-transform: ' . $subnav_caps . ';
	font-variant: ' . $subnav_font_variant . ';
}
#subnavbar_left {
	letter-spacing: ' . $subnav_letter_spacing . 'px;
}
#subnavbar_right {
	color: #' . $subnavbar_right_font_color . ';
	font-family: ' . $subnavbar_right_font . ';
	font-size: ' . $subnavbar_right_font_size . 'px;
	padding: ' . $subnavbar_right_top_padding . 'px ' . $subnavbar_right_right_padding . 'px ' . $subnavbar_right_bottom_padding . 'px ' . $subnavbar_right_left_padding . 'px;
}
#subnavbar_right a, #subnavbar_right a:visited{
	color: #' . $subnavbar_right_link_color . ';
	text-decoration: ' . $subnavbar_right_text_link_underline_visited . ';
}
#subnavbar_right a:hover{
	color: #' . $subnavbar_right_link_color . ';
	text-decoration: ' . $subnavbar_right_text_link_underline_hover . ';
}
#subnav li {
	color: #' . $subnav_font_color . ';
}
#subnav li a, #subnav li a:link, #subnav li a:visited {
	' . $subnav_page_bg . '
	border-right: ' . $subnav_right_border_thickness . 'px solid #' . $subnav_right_border_color . ';
	color: #' . $subnav_font_color . ';
	font-size: ' . $subnav_font_size . 'px;
	padding: ' . $subnav_page_tb_padding . 'px ' . $subnav_page_lr_padding . 'px ' . $subnav_page_tb_padding . 'px ' . $subnav_page_lr_padding . 'px;
}
#subnav li a:hover, #subnav li a:active {
	' . $subnav_page_hover_bg . '
	color: #' . $subnav_text_hover_color . ';
	text-decoration: ' . $subnav_text_hover_underline . ';
}
#subnav li li a, #subnav li li a:link, #subnav li li a:visited {
	background: #' . $subnav_sub_bg_color . $subnav_sub_bg_image_type . ';
	border-left: 1px solid #' . $subnav_sub_border_color . ';
	border-bottom: 1px solid #' . $subnav_sub_border_color . ';
	border-right: 1px solid #' . $subnav_sub_border_color . ';
	width: ' . $subnav_sub_box_width . 'px;
	padding: ' . $subnav_sub_tb_padding . 'px ' . $subnav_sub_lr_padding . 'px ' . $subnav_sub_tb_padding . 'px ' . $subnav_sub_lr_padding . 'px;
	color: #' . $subnav_sub_font_color . ';
}
#subnav li li a:hover, #subnav li li a:active {
	background: #' . $subnav_sub_hover_bg_color . $subnav_sub_hover_bg_image_type . ';
	color: #' . $subnav_sub_text_hover_color . ';
	text-decoration: ' . $subnav_text_hover_underline . ';
}
#subnav li ul ul {
	margin: ' . $subnav_liulul_top_margin . 'px 0 0 ' . $subnav_liulul_left_margin . 'px;
}

#subnavbar_left .menu li {
	color: #' . $subnav_font_color . ';
}
#subnavbar_left .menu li a, #subnavbar_left .menu li a:link, #subnavbar_left .menu li a:visited {
	' . $subnav_page_bg . '
	border-right: ' . $subnav_right_border_thickness . 'px solid #' . $subnav_right_border_color . ';
	color: #' . $subnav_font_color . ';
	font-size: ' . $subnav_font_size . 'px;
	padding: ' . $subnav_page_tb_padding . 'px ' . $subnav_page_lr_padding . 'px ' . $subnav_page_tb_padding . 'px ' . $subnav_page_lr_padding . 'px;
}
#subnavbar_left .menu li a:hover, #subnavbar_left .menu li a:active {
	' . $subnav_page_hover_bg . '
	color: #' . $subnav_text_hover_color . ';
	text-decoration: ' . $subnav_text_hover_underline . ';
}
#subnavbar_left .menu li li a, #subnavbar_left .menu li li a:link, #subnavbar_left .menu li li a:visited {
	background: #' . $subnav_sub_bg_color . $subnav_sub_bg_image_type . ';
	border-left: 1px solid #' . $subnav_sub_border_color . ';
	border-bottom: 1px solid #' . $subnav_sub_border_color . ';
	border-right: 1px solid #' . $subnav_sub_border_color . ';
	width: ' . $subnav_sub_box_width . 'px;
	padding: ' . $subnav_sub_tb_padding . 'px ' . $subnav_sub_lr_padding . 'px ' . $subnav_sub_tb_padding . 'px ' . $subnav_sub_lr_padding . 'px;
	color: #' . $subnav_sub_font_color . ';
}
#subnavbar_left .menu li li a:hover, #subnavbar_left .menu li li a:active {
	background: #' . $subnav_sub_hover_bg_color . $subnav_sub_hover_bg_image_type . ';
	color: #' . $subnav_sub_text_hover_color . ';
	text-decoration: ' . $subnav_text_hover_underline . ';
}
#subnavbar_left .menu li ul ul {
	margin: ' . $subnav_liulul_top_margin . 'px 0 0 ' . $subnav_liulul_left_margin . 'px;
}

/************************* 
	Featured 
*************************/

/*** Feature Top ***/

#featuretop h2 {
	color: #' . $ft_widget_title_font_color . ' !important;
	font-family: ' . $ft_widget_title_font . ';
	font-size: ' . $ft_widget_title_font_size . 'px !important;
	font-weight: ' . $ft_widget_title_font_weight . ' !important;
	text-align: ' . $ft_widget_title_text_align . ' !important;
	text-transform: ' . $ft_widget_title_text_caps . ' !important;
	font-variant: ' . $ft_widget_title_font_variant . ' !important;
	letter-spacing: ' . $ft_widget_title_letter_spacing . 'px !important;
	line-height: ' . $ft_widget_title_line_height . '% !important;
}
#featuretop {
	' . $ft_bg . '
	width: ' . $ft_width . 'px;
	' . $ft_border_type . ': ' . $ft_border_thickness . 'px ' . $ft_border_style . ' #' . $ft_border_color . ';
	margin: ' . $ft_top_margin . 'px ' . $ft_right_margin . 'px ' . $ft_bottom_margin . 'px ' . $ft_left_margin . 'px;
	padding: ' . $ft_top_padding . 'px ' . $ft_right_padding . 'px ' . $ft_bottom_padding . 'px ' . $ft_left_padding . 'px;
}
.featuretopwidget {
	width: ' . $ft_widget_width . 'px;
	margin: ' . $ft_widget_top_margin . 'px ' . $ft_widget_right_margin . 'px ' . $ft_widget_bottom_margin . 'px ' . $ft_widget_left_margin . 'px;
	padding: ' . $ft_widget_top_padding . 'px ' . $ft_widget_right_padding . 'px ' . $ft_widget_bottom_padding . 'px ' . $ft_widget_left_padding . 'px;
	color: #' . $feature_widget_content_font_color . ';
	font-family: ' . $feature_widget_content_font . ';
	font-size: ' . $feature_widget_content_font_size . 'px;
	line-height: ' . $feature_widget_content_line_height . '% !important;
}
.featuretopwidget h3, .featuretopwidget h4, .featuretopwidget h5, .featuretopwidget h6 {
	color: #' . $feature_widget_content_font_color . ';
}
.featuretopwidget img {
' . $ft_widget_display_block . '
}

/*** Feature Bottom ***/

#featurebottom h2 {
	color: #' . $fb_widget_title_font_color . ' !important;
	font-family: ' . $fb_widget_title_font . ';
	font-size: ' . $fb_widget_title_font_size . 'px !important;
	font-weight: ' . $fb_widget_title_font_weight . ' !important;
	text-align: ' . $fb_widget_title_text_align . ' !important;
	text-transform: ' . $fb_widget_title_text_caps . ' !important;
	font-variant: ' . $fb_widget_title_font_variant . ' !important;
	letter-spacing: ' . $fb_widget_title_letter_spacing . 'px !important;
	line-height: ' . $fb_widget_title_line_height . '% !important;
}
#featurebottom {
	' . $fb_bg . '
	width: ' . $fb_width . 'px;
	' . $fb_border_type . ': ' . $fb_border_thickness . 'px ' . $fb_border_style . ' #' . $fb_border_color . ';
	margin: ' . $fb_top_margin . 'px ' . $fb_right_margin . 'px ' . $fb_bottom_margin . 'px ' . $fb_left_margin . 'px;
	padding: ' . $fb_top_padding . 'px ' . $fb_right_padding . 'px ' . $fb_bottom_padding . 'px ' . $fb_left_padding . 'px;
}
.featurebottomwidget {
	width: ' . $fb_widget_width . 'px;
	margin: ' . $fb_widget_top_margin . 'px ' . $fb_widget_right_margin . 'px ' . $fb_widget_bottom_margin . 'px ' . $fb_widget_left_margin . 'px;
	padding: ' . $fb_widget_top_padding . 'px ' . $fb_widget_right_padding . 'px ' . $fb_widget_bottom_padding . 'px ' . $fb_widget_left_padding . 'px;
	color: #' . $feature_widget_content_font_color . ';
	font-family: ' . $feature_widget_content_font . ';
	font-size: ' . $feature_widget_content_font_size . 'px;
	line-height: ' . $feature_widget_content_line_height . '% !important;
}
.featurebottomwidget h3, .featurebottomwidget h4, .featurebottomwidget h5, .featurebottomwidget h6 {
	color: #' . $feature_widget_content_font_color . ';
}
.featurebottomwidget img {
' . $fb_widget_display_block . '
}

/*** Homepage ***/

#homecontainer {
	' . $ht_bg . '
	width: ' . $container_div_width . 'px;
	border-top: ' . $container_tb_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
	border-bottom: ' . $container_tb_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
	border-left: ' . $container_lr_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
	border-right: ' . $container_lr_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
}
#home {
	width: ' . $content_width . 'px;
}
.feature_link a, .feature_link a:visited {
	color: #' . $feature_widget_content_font_link_color . ';
	text-decoration: ' . $feature_widget_content_text_link_underline_visited . ';
}
.feature_link a:hover {
	color: #' . $feature_widget_content_font_link_hover_color . ';
	text-decoration: ' . $feature_widget_content_text_link_underline_hover . ';
}
#hometop {
	width: ' . $ht_width . 'px;
	margin: ' . $ht_top_margin . 'px ' . $ht_right_margin . 'px ' . $ht_bottom_margin . 'px ' . $ht_left_margin . 'px;
	padding: ' . $ht_top_padding . 'px ' . $ht_right_padding . 'px ' . $ht_bottom_padding . 'px ' . $ht_left_padding . 'px;
}
.ht_widget h2 {
	color: #' . $ft_widget_title_font_color . ' !important;
	font-family: ' . $ft_widget_title_font . ';
	font-size: ' . $ft_widget_title_font_size . 'px !important;
	font-weight: ' . $ft_widget_title_font_weight . ' !important;
	text-align: ' . $ft_widget_title_text_align . ' !important;
	text-transform: ' . $ft_widget_title_text_caps . ' !important;
	font-variant: ' . $ft_widget_title_font_variant . ' !important;
	letter-spacing: ' . $ft_widget_title_letter_spacing . 'px !important;
	line-height: ' . $ft_widget_title_line_height . '% !important;
}
.hometopleftwidget {
	' . $ht_bg . '
	width: ' . $htww_width . 'px;
	height: ' . $htww_height . ';
	' . $htww_border_type . ': ' . $htww_border_thickness . 'px ' . $htww_border_style . ' #' . $htww_border_color . ';
	margin: ' . $htww_widget_top_margin . 'px ' . $htww_widget_right_margin . 'px ' . $htww_widget_bottom_margin . 'px ' . $htww_widget_left_margin . 'px;
	padding: ' . $htww_widget_top_padding . 'px ' . $htww_widget_right_padding . 'px ' . $htww_widget_bottom_padding . 'px ' . $htww_widget_left_padding . 'px;
	float: ' . $ht_content_float . ';
	color: #' . $feature_widget_content_font_color . ';
	font-family: ' . $feature_widget_content_font . ';
	font-size: ' . $feature_widget_content_font_size . 'px;
	line-height: ' . $feature_widget_content_line_height . '% !important;
}
.hometopleftwidget h3, .hometopleftwidget h4, .hometopleftwidget h5, .hometopleftwidget h6 {
	color: #' . $feature_widget_content_font_color . ';
}
.hometopleftwidget img {
' . $htww_widget_display_block . '
}
.hometopleftlatest {
	' . $cc_bg . '
	border: ' . $cc_border_thickness . 'px ' . $cc_border_style . ' #' . $cc_border_color . ';
	width: ' . $htll_width . 'px;
	margin: ' . $h_cc_alt_margin . ';
	padding: ' . $cc_padding_style . ';
	color: #' . $main_content_font_color . ';
	font-family: ' . $main_content_font . ';
	font-size: ' . $main_content_font_size . 'px;
	float: ' . $ht_content_float . ';
	line-height: ' . $main_content_line_height . '%;
}
.hometopleftlatest h2 {
	font-family: ' . $content_title_font . ' !important;
	font-size: ' . $content_title_font_size_h2 . 'px !important;
	color: #' . $content_title_font_color_h2 . ' !important;
	font-weight: ' . $content_title_font_weight . ' !important;
	text-transform: ' . $content_title_text_caps . ' !important;
	font-variant: ' . $content_title_font_variant . ' !important;
	text-align: ' . $content_title_text_align . ' !important;
	letter-spacing: ' . $content_title_letter_spacing . 'px !important;
	line-height: ' . $content_title_line_height . '% !important;
}
.hometopleftlatest h2 a, .hometopleftlatest h2 a:visited {
	color: #' . $content_title_font_color . ' !important;
	text-decoration: ' . $content_title_text_link_underline_visited . ' !important;
}
.hometopleftlatest h2 a:hover {
	color: #' . $content_title_font_hover_color . ' !important;
	text-decoration: ' . $content_title_text_link_underline_hover . ' !important;
}
.hometopleftlatest h3 {
	color: #' . $post_subhead_font_color . ' !important;
	font-family: ' . $post_subhead_font . ';
	font-size: ' . $post_subhead_font_size_h3 . 'px !important;
	font-weight: ' . $post_subhead_font_weight . ' !important;
	letter-spacing: ' . $post_subhead_letter_spacing . 'px;
	line-height: ' . $post_subhead_line_height . '% !important;
}
.hometopleftlatest h4 {
	color: #' . $post_subhead_font_color . ' !important;
	font-family: ' . $post_subhead_font . ';
	font-size: ' . $post_subhead_font_size_h4 . 'px !important;
	font-weight: ' . $post_subhead_font_weight . ' !important;
	letter-spacing: ' . $post_subhead_letter_spacing . 'px;
	line-height: ' . $post_subhead_line_height . '% !important;
}
.hometopwidget {
	width: ' . $ht_widget_width . 'px;
	margin: ' . $ht_widget_top_margin . 'px ' . $ht_widget_right_margin . 'px ' . $ht_widget_bottom_margin . 'px ' . $ht_widget_left_margin . 'px;
	padding: ' . $ht_widget_top_padding . 'px ' . $ht_widget_right_padding . 'px ' . $ht_widget_bottom_padding . 'px ' . $ht_widget_left_padding . 'px;
	color: #' . $feature_widget_content_font_color . ';
	font-family: ' . $feature_widget_content_font . ';
	font-size: ' . $feature_widget_content_font_size . 'px;
	line-height: ' . $feature_widget_content_line_height . '% !important;
}
.hometopwidget h3, .hometopwidget h4, .hometopwidget h5, .hometopwidget h6 {
	color: #' . $feature_widget_content_font_color . ';
}
.hometopwidget img {
' . $ht_widget_display_block . '
}
.home_excerpt_bylinemeta {
	color: #' . $home_excerpt_bylinemeta_font_color . ' !important;
	font-size: ' . $home_excerpt_bylinemeta_font_size . 'px;
}
.home_excerpt_bylinemeta a, .home_excerpt_bylinemeta a:visited {
	color: #' . $home_excerpt_bylinemeta_font_color . ' !important;
}
.home_excerpt_bylinemeta a:hover {
	color: #' . $home_excerpt_bylinemeta_font_color . ' !important;
}
.home_excerpt_byline {
	font-family: ' . $home_excerpt_bylinemeta_font . ';
	text-align: ' . $home_excerpt_title_text_align . ' !important;
	line-height: ' . $home_excerpt_bylinemeta_line_height . '% !important;
	' . $home_excerpt_byline_p_tag . '
}
#homebottom {
	' . $fb_bg . '
	width: ' . $hb_width . 'px;
	' . $fb_border_type . ': ' . $fb_border_thickness . 'px ' . $fb_border_style . ' #' . $fb_border_color . ';
	margin: ' . $hb_top_margin . 'px ' . $hb_right_margin . 'px ' . $hb_bottom_margin . 'px ' . $hb_left_margin . 'px;
	padding: ' . $hb_top_padding . 'px ' . $hb_right_padding . 'px ' . $hb_bottom_padding . 'px ' . $hb_left_padding . 'px;
}
.hb_widget h2 {
	color: #' . $fb_widget_title_font_color . ' !important;
	font-family: ' . $fb_widget_title_font . ';
	font-size: ' . $fb_widget_title_font_size . 'px !important;
	font-weight: ' . $fb_widget_title_font_weight . ' !important;
	text-align: ' . $fb_widget_title_text_align . ' !important;
	text-transform: ' . $fb_widget_title_text_caps . ' !important;
	font-variant: ' . $fb_widget_title_font_variant . ' !important;
	letter-spacing: ' . $fb_widget_title_letter_spacing . 'px !important;
	line-height: ' . $fb_widget_title_line_height . '% !important;
}
.homebottomwidget {
	width: ' . $hb_widget_width . 'px;
	margin: ' . $hb_widget_top_margin . 'px ' . $hb_widget_right_margin . 'px ' . $hb_widget_bottom_margin . 'px ' . $hb_widget_left_margin . 'px;
	padding: ' . $hb_widget_top_padding . 'px ' . $hb_widget_right_padding . 'px ' . $hb_widget_bottom_padding . 'px ' . $hb_widget_left_padding . 'px;
	color: #' . $feature_widget_content_font_color . ';
	font-family: ' . $feature_widget_content_font . ';
	font-size: ' . $feature_widget_content_font_size . 'px;
	line-height: ' . $feature_widget_content_line_height . '% !important;
}
.homebottomwidget h3, .homebottomwidget h4, .homebottomwidget h5, .homebottomwidget h6 {
	color: #' . $feature_widget_content_font_color . ';
}
.homebottomwidget img {
' . $hb_widget_display_block . '
}

/*** Home Excerpt Posts ***/

.home_excerpt_posts {
	color: #' . $home_excerpt_content_font_color . ' !important;
	font-family: ' . $home_excerpt_content_font . ' !important;
	font-size: ' . $home_excerpt_content_font_size . 'px !important;
	line-height: ' . $home_excerpt_content_line_height . '% !important;
}
.home_excerpt_posts h2 {
	color: #' . $home_excerpt_title_font_color . ' !important;
	font-family: ' . $home_excerpt_title_font . ' !important;
	font-size: ' . $home_excerpt_title_font_size . 'px !important;
	font-weight: ' . $home_excerpt_title_font_weight . ' !important;
	text-transform: ' . $home_excerpt_title_text_caps . ' !important;
	font-variant: ' . $home_excerpt_title_font_variant . ' !important;
	letter-spacing: ' . $home_excerpt_title_letter_spacing . 'px !important;
	text-align: ' . $home_excerpt_title_text_align . ' !important;
	line-height: ' . $home_excerpt_title_line_height . '% !important;
}
.home_excerpt_posts h2 a, .home_excerpt_posts h2 a:visited{
	color: #' . $home_excerpt_title_font_color . ' !important;
	text-decoration: ' . $home_excerpt_title_text_link_underline_visited . ' !important;
}
.home_excerpt_posts h2 a:hover {
	color: #' . $home_excerpt_title_font_hover_color . ' !important;
	text-decoration: ' . $home_excerpt_title_text_link_underline_hover . ' !important;
}

/************************* 
	Content 
*************************/

#container {
	' . $container_bg . '
	width: ' . $container_div_width . 'px;
	border-top: ' . $container_tb_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
	border-bottom: ' . $container_tb_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
	border-left: ' . $container_lr_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
	border-right: ' . $container_lr_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
}
#widecontainer {
	' . $wide_container_bg . '
	width: ' . $container_div_width . 'px;
	border-top: ' . $container_tb_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
	border-bottom: ' . $container_tb_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
	border-left: ' . $container_lr_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
	border-right: ' . $container_lr_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
}
#cmscontainer {
	' . $cms_container_bg . '
	width: ' . $container_div_width . 'px;
	border-top: ' . $container_tb_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
	border-bottom: ' . $container_tb_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
	border-left: ' . $container_lr_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
	border-right: ' . $container_lr_border_thickness . 'px ' . $container_border_style . ' #' . $container_border_color . ';
}
#content {
	width: ' . $content_width . 'px;
	padding: 0px ' . $content_area_padding . 'px 0px ' . $content_area_padding . 'px;
}
#content h1 {
	font-family: ' . $content_title_font . ';
	font-size: ' . $content_title_font_size . 'px;
	color: #' . $content_title_font_color . ';
	font-weight: ' . $content_title_font_weight . ';
	text-transform: ' . $content_title_text_caps . ';
	font-variant: ' . $content_title_font_variant . ';
	text-align: ' . $content_title_text_align . ';
	letter-spacing: ' . $content_title_letter_spacing . 'px;
	line-height: ' . $content_title_line_height . '%;
}
#content h1 a, #content h1 a:visited {
	color: #' . $content_title_font_color . ';
	text-decoration: ' . $content_title_text_link_underline_visited . ';
}
#content h1 a:hover {
	color: #' . $content_title_font_hover_color . ';
	text-decoration: ' . $content_title_text_link_underline_hover . ';
}
#content h2 {
	font-family: ' . $content_title_font . ';
	font-size: ' . $content_title_font_size_h2 . 'px;
	color: #' . $content_title_font_color_h2 . ';
	font-weight: ' . $content_title_font_weight . ';
	text-transform: ' . $content_title_text_caps . ';
	font-variant: ' . $content_title_font_variant . ';
	text-align: ' . $content_title_text_align . ';
	letter-spacing: ' . $content_title_letter_spacing . 'px;
	line-height: ' . $content_title_line_height . '%;
}
#content h2 a, #content h2 a:visited {
	color: #' . $content_title_font_color_h2 . ';
	text-decoration: ' . $content_title_text_link_underline_visited . ';
}
#content h2 a:hover {
	color: #' . $content_title_font_hover_color_h2 . ';
	text-decoration: ' . $content_title_text_link_underline_hover . ';
}
#content_column {
	' . $cc_bg . '
	border: ' . $cc_border_thickness . 'px ' . $cc_border_style . ' #' . $cc_border_color . ';
	width: ' . $cc_padded_width . 'px;
	margin: ' . $cc_alt_margin . ';
	float: ' . $cc_float . ';
}
.postarea h3 {
	color: #' . $post_subhead_font_color . ';
	font-family: ' . $post_subhead_font . ';
	font-size: ' . $post_subhead_font_size_h3 . 'px !important;
	font-weight: ' . $post_subhead_font_weight . ';
	text-transform: ' . $post_subhead_text_caps . ' !important;
	font-variant: ' . $post_subhead_font_variant . ' !important;
	letter-spacing: ' . $post_subhead_letter_spacing . 'px;
	line-height: ' . $post_subhead_line_height . '%;
}
.postarea h4 {
	color: #' . $post_subhead_font_color . ';
	font-family: ' . $post_subhead_font . ';
	font-size: ' . $post_subhead_font_size_h4 . 'px !important;
	font-weight: ' . $post_subhead_font_weight . ';
	text-transform: ' . $post_subhead_text_caps . ' !important;
	font-variant: ' . $post_subhead_font_variant . ' !important;
	letter-spacing: ' . $post_subhead_letter_spacing . 'px;
	line-height: ' . $post_subhead_line_height . '%;
}
.postarea {
	width: ' . $cc_width . 'px;
	padding: ' . $cc_padding_style . ';
}
.postarea p {
	color: #' . $main_content_font_color . ';
	font-family: ' . $main_content_font . ';
	font-size: ' . $main_content_font_size . 'px;
	line-height: ' . $main_content_line_height . '%;
}
.postarea ul {
	color: #' . $main_content_font_color . ' !important;
	font-family: ' . $main_content_font . ';
	font-size: ' . $main_content_font_size . 'px;
	line-height: ' . $main_content_line_height . '%;
}
.postarea ol {
	color: #' . $main_content_font_color . ' !important;
	font-family: ' . $main_content_font . ';
	font-size: ' . $main_content_font_size . 'px;
	line-height: ' . $main_content_line_height . '%;
}
#cms_content_column {
	' . $cms_cc_bg . '
	border: ' . $cc_border_thickness . 'px ' . $cc_border_style . ' #' . $cc_border_color . ';
	width: ' . $cms_cc_padded_width . 'px;
	margin: ' . $cms_cc_alt_margin . ';
	float: ' . $cms_cc_float . ';
}
.cms_postarea h3 {
	color: #' . $post_subhead_font_color . ';
	font-family: ' . $post_subhead_font . ';
	font-size: ' . $post_subhead_font_size_h3 . 'px !important;
	font-weight: ' . $post_subhead_font_weight . ';
	text-transform: ' . $post_subhead_text_caps . ' !important;
	font-variant: ' . $post_subhead_font_variant . ' !important;
	letter-spacing: ' . $post_subhead_letter_spacing . 'px;
	line-height: ' . $post_subhead_line_height . '%;
}
.cms_postarea h4 {
	color: #' . $post_subhead_font_color . ';
	font-family: ' . $post_subhead_font . ';
	font-size: ' . $post_subhead_font_size_h4 . 'px !important;
	font-weight: ' . $post_subhead_font_weight . ';
	text-transform: ' . $post_subhead_text_caps . ' !important;
	font-variant: ' . $post_subhead_font_variant . ' !important;
	letter-spacing: ' . $post_subhead_letter_spacing . 'px;
	line-height: ' . $post_subhead_line_height . '%;
}
.cms_postarea {
	width: ' . $cms_pagearea_width . 'px;
	padding: ' . $cc_padding_style . ';
}
.cms_postarea p {
	color: #' . $main_content_font_color . ';
	font-family: ' . $main_content_font . ';
	font-size: ' . $main_content_font_size . 'px;
	line-height: ' . $main_content_line_height . '%;
}
.cms_postarea ul {
	color: #' . $main_content_font_color . ' !important;
	font-family: ' . $main_content_font . ';
	font-size: ' . $main_content_font_size . 'px;
	line-height: ' . $main_content_line_height . '%;
}
.cms_postarea ol {
	color: #' . $main_content_font_color . ' !important;
	font-family: ' . $main_content_font . ';
	font-size: ' . $main_content_font_size . 'px;
	line-height: ' . $main_content_line_height . '%;
}
.postareawide h3 {
	color: #' . $post_subhead_font_color . ';
	font-family: ' . $post_subhead_font . ';
	font-size: ' . $post_subhead_font_size_h3 . 'px !important;
	font-weight: ' . $post_subhead_font_weight . ';
	text-transform: ' . $post_subhead_text_caps . ' !important;
	font-variant: ' . $post_subhead_font_variant . ' !important;
	letter-spacing: ' . $post_subhead_letter_spacing . 'px;
	line-height: ' . $post_subhead_line_height . '%;
}
.postareawide h4 {
	color: #' . $post_subhead_font_color . ';
	font-family: ' . $post_subhead_font . ';
	font-size: ' . $post_subhead_font_size_h4 . 'px !important;
	font-weight: ' . $post_subhead_font_weight . ';
	text-transform: ' . $post_subhead_text_caps . ' !important;
	font-variant: ' . $post_subhead_font_variant . ' !important;
	letter-spacing: ' . $post_subhead_letter_spacing . 'px;
	line-height: ' . $post_subhead_line_height . '%;
}
.postareawide {
	' . $wide_cc_bg . '
	border: ' . $cc_border_thickness . 'px ' . $cc_border_style . ' #' . $cc_border_color . ';
	width: ' . $widepost_width . 'px;
	margin: ' . $cc_wide_alt_margin . ';
	padding: ' . $cc_padding_style . ';
}
.postareawide p {
	color: #' . $main_content_font_color . ';
	font-family: ' . $main_content_font . ';
	font-size: ' . $main_content_font_size . 'px;
	line-height: ' . $main_content_line_height . '%;
}
.postareawide ul {
	color: #' . $main_content_font_color . ' !important;
	font-family: ' . $main_content_font . ';
	font-size: ' . $main_content_font_size . 'px;
	line-height: ' . $main_content_line_height . '%;
}
.postareawide ol {
	color: #' . $main_content_font_color . ' !important;
	font-family: ' . $main_content_font . ';
	font-size: ' . $main_content_font_size . 'px;
	line-height: ' . $main_content_line_height . '%;
}
a, a:visited {
	color: #' . $main_content_font_link_color . ';
}
a:hover {
	color: #' . $main_content_font_link_hover_color . ';
}
.postlinks a, .postlinks a:visited {
	color: #' . $main_content_font_link_color . ';
	text-decoration: ' . $main_content_text_link_underline_visited . ';
}
.postlinks a:hover {
	color: #' . $main_content_font_link_hover_color . ';
	text-decoration: ' . $main_content_text_link_underline_hover . ';
}
.byline {
	margin: ' . $byline_top_margin . 'px 0px 0px 0px;
	padding: 0px 0px ' . $byline_bottom_padding . 'px 0px;
}
.byline p {
	font-family: ' . $bylinemeta_font . ';
	line-height: ' . $bylinemeta_line_height . '% !important;
	text-align: ' . $content_title_text_align . ';
	' . $byline_p_tag . '
}
.byline_home {
	margin: ' . $byline_top_margin . 'px 0px 0px 0px;
	padding: 0px 0px ' . $byline_bottom_padding . 'px 0px;
}
.byline_home p {
	font-family: ' . $bylinemeta_font . ';
	line-height: ' . $bylinemeta_line_height . '% !important;
	text-align: ' . $content_title_text_align . ';
	' . $byline_home_p_tag . '
}
blockquote {
	' . $blockquote_bg . '
	' . $blockquote_border_type . '
}
.postbanner {
	' . $post_banner_bg . '
	border-top: 1px solid #' . $post_banner_border_color . ';
	border-bottom: 1px solid #' . $post_banner_border_color . ';
	width: ' . $post_banner_width . 'px;
	color: #' . $post_banner_text_color . ';
}
.postbanner img {
	' . $post_banner_display_block . ';
}

/*** Meta Classes ***/

.commentmeta {
	width: ' . $cc_width . 'px;
	border-bottom: ' . $post_border_thickness . 'px solid #' . $post_border_color . ';
}
.commentmeta p {
	color: #' . $commentmeta_font_color . ';
	font-family: ' . $commentmeta_font . ';
	font-size: ' . $commentmeta_font_size . 'px;
}
.commentmeta a, .commentmeta a:visited {
	color: #' . $commentmeta_font_color . ';
	text-decoration: ' . $commentmeta_text_link_underline_visited . ';
}
.commentmeta a:hover {
	color: #' . $commentmeta_font_hover_color . ';
	text-decoration: ' . $commentmeta_text_link_underline_hover . ';
}
.commentmeta_home {
	border-bottom: ' . $post_border_thickness . 'px solid #' . $post_border_color . ';
	color: #' . $commentmeta_font_color . ';
	font-family: ' . $commentmeta_font . ';
	font-size: ' . $commentmeta_font_size . 'px;
}
.commentmeta_home a, .commentmeta_home a:visited {
	color: #' . $commentmeta_font_color . ';
	text-decoration: ' . $commentmeta_text_link_underline_visited . ';
}
.commentmeta_home a:hover {
	color: #' . $commentmeta_font_hover_color . ';
	text-decoration: ' . $commentmeta_text_link_underline_hover . ';
}
.tagmeta {
	border-top: ' . $post_border_thickness . 'px solid #' . $post_border_color . ';
	color: #' . $main_content_font_color . ' !important;
	font-family: ' . $main_content_font . ';
	font-size: ' . $main_content_font_size . 'px;
}
.bylinemeta {
	color: #' . $bylinemeta_font_color . ' !important;
	font-size: ' . $bylinemeta_font_size . 'px;
}
.bylinemeta a, .bylinemeta a:visited {
	color: #' . $bylinemeta_text_link_color . ' !important;
	text-decoration: ' . $bylinemeta_text_link_underline_visited . ' !important;
}
.bylinemeta a:hover {
	color: #' . $bylinemeta_text_link_hover_color . ' !important;
	text-decoration: ' . $bylinemeta_text_link_underline_hover . ' !important;
}
.allpostsmeta {
	color: #' . $commentmeta_font_color . ' !important;
	font-family: ' . $commentmeta_font . ' !important;
	font-size: ' . $commentmeta_font_size . 'px !important;
}
.allpostsmeta a, .allpostsmeta a:visited {
	color: #' . $commentmeta_font_color . ';
	text-decoration: ' . $commentmeta_text_link_underline_visited . ' !important;
}
.allpostsmeta a:hover {
	color: #' . $commentmeta_font_hover_color . ';
	text-decoration: ' . $commentmeta_text_link_underline_hover . ' !important;
}

/************************* 
	Sidebars
*************************/

/*** Sidebar Wrap ***/

#sb_fbox_wrap {
	width: ' . $fbox_wrap_width . 'px;
	float: ' . $sb_wrap_float . ';
}
#sidebar_wrap {
	' . $sb_bg . '
	border: ' . $sb_border_thickness . 'px ' . $sb_border_style . ' #' . $sb_border_color . ';
	width: ' . $sb_wrap_width . 'px;
	margin: ' . $sb_alt_margin . ';
	float: ' . $sb_wrap_float . ';
}

/*** Feature Box ***/

#feature_box_wrap {
	width: ' . $fbox_wrap_width . 'px;
	float: ' . $sb_wrap_float . ';
}
#feature_box {
	background: #' . $fbox_outer_border_color . ';
	width: ' . $fbox_width . 'px;
	margin: ' . $fbox_alt_margin . ';
}
.feature_box {
	background: #' . $fbox_bg_color . ';
	border: 1px solid #' . $fbox_inner_border_color . ';
}
.feature_box a, .feature_box a:visited {
	color: #' . $fbox_content_link_color . ';
	text-decoration: ' . $fbox_text_link_underline_visited . ';
}
.feature_box a:hover {
	color: #' . $fbox_content_link_hover_color . ';
	text-decoration: ' . $fbox_text_link_underline_hover . ';
}
.feature_box h2 {
	color: #' . $fbox_headline_font_color . ' !important;
	font-family: ' . $fbox_headline_font . ' !important;
	font-size: ' . $fbox_headline_font_size . 'px !important;
	font-weight: ' . $fbox_headline_font_weight . ' !important;
	letter-spacing: ' . $fbox_headline_letter_spacing . 'px !important;
	text-transform: ' . $fbox_headline_text_caps . ' !important;
	font-variant: ' . $fbox_headline_font_variant . ' !important;
	line-height: ' . $fbox_headline_line_height . '% !important;
}
.feature_box p {
	background: #' . $fbox_bg_color . ' !important;
	color: #' . $fbox_content_font_color . ';
	font-family: ' . $fbox_content_font . ';
	font-size: ' . $fbox_content_font_size . 'px;
	line-height: ' . $fbox_content_line_height . '% !important;
}

/*** Home Feature Box ***/

#home_feature_box_wrap {
	width: ' . $hfbox_wrap_width . 'px;
	float: ' . $hfbox_float . ';
}
#home_feature_box {
	background: #' . $hfbox_outer_border_color . ';
	width: ' . $hfbox_width . 'px;
	margin: ' . $hfbox_alt_margin . ';
	float: ' . $hfbox_float . ';
}
.home_feature_box {
	background: #' . $fbox_bg_color . ';
	border: 1px solid #' . $hfbox_inner_border_color . ';
}
.home_feature_box a, .home_feature_box a:visited {
	color: #' . $fbox_content_link_color . ' !important;
	text-decoration: ' . $fbox_text_link_underline_visited . ' !important;
}
.home_feature_box a:hover {
	color: #' . $fbox_content_link_hover_color . ' !important;
	text-decoration: ' . $fbox_text_link_underline_hover . ' !important;
}
.home_feature_box h2 {
	color: #' . $fbox_headline_font_color . ' !important;
	font-family: ' . $fbox_headline_font . ' !important;
	font-size: ' . $fbox_headline_font_size . 'px !important;
	font-weight: ' . $fbox_headline_font_weight . ' !important;
	letter-spacing: ' . $fbox_headline_letter_spacing . 'px !important;
	text-transform: ' . $fbox_headline_text_caps . ' !important;
	line-height: ' . $fbox_headline_line_height . '% !important;
}
.home_feature_box p {
	background: #' . $fbox_bg_color . ' !important;
	color: #' . $fbox_content_font_color . ';
	font-family: ' . $fbox_content_font . ';
	font-size: ' . $fbox_content_font_size . 'px;
	line-height: ' . $fbox_content_line_height . '% !important;
}

/*** Sidebar 1 ***/

#sidebar_1 {
	' . $sb_1_bg . '
	border: ' . $sb_1_border_thickness . 'px ' . $sb_border_style . ' #' . $sb_border_color . ';
	width: ' . $sb_1 . 'px;
	margin: ' . $sb_1_alt_margin . ';
	padding: ' . $sb_1_alt_padding . ';
	color: #' . $sb_content_font_color . ';
	font-family: ' . $sb_content_font . ';
	font-size: ' . $sb_content_font_size . 'px;
	font-weight: ' . $sb_content_font_weight . ';
	letter-spacing: ' . $sb_content_letter_spacing . 'px;
	line-height: ' . $sb_content_line_height . '%;
}
#sidebar_1 a, #sidebar_1 a:visited {
	color: #' . $sb_content_font_link_color . ';
	text-decoration: ' . $sb_text_link_underline_visited . ';
}
#sidebar_1 a:hover {
	color: #' . $sb_content_font_link_hover_color . ';
	text-decoration: ' . $sb_text_link_underline_hover . ';
}
#sidebar_1 .widget {
	padding: ' . $sb_widget_alt_padding . ';
}
#sidebar_1 h3 {
	' . $sb_heading_bg . '
	' . $sb_heading_border_type . ': ' . $sb_heading_border_thickness . 'px ' . $sb_heading_border_style . ' #' . $sb_heading_border_color . ';
	margin: ' . $sb_heading_margins . ';
	padding: ' . $sb_heading_tb_padding_thickness . 'px ' . $sb_heading_lr_padding_thickness . 'px ' . $sb_heading_tb_padding_thickness . 'px ' . $sb_heading_lr_padding_thickness . 'px;
	color: #' . $sb_heading_font_color . ';
	font-family: ' . $sb_heading_font . ';
	font-size: ' . $sb_heading_font_size . 'px;
	font-weight: ' . $sb_heading_font_weight . ';
	text-transform: ' . $sb_heading_text_caps . ' !important;
	font-variant: ' . $sb_heading_font_variant . ' !important;
	letter-spacing: ' . $sb_heading_letter_spacing . 'px;
	text-align: ' . $sb_title_text_align . ';
	line-height: ' . $sb_heading_line_height . '%;
}
#sidebar_1 p {
	' . $sb_content_bg . '
	padding: ' . $sb_content_top_padding_thickness . 'px ' . $sb_content_lr_p_padding_thickness . 'px ' . $sb_content_bottom_p_padding_thickness . 'px ' . $sb_content_lr_p_padding_thickness . 'px;
	' . $sb_content_border_right . '
	' . $sb_content_border_bottom . '
	' . $sb_content_border_left . '
}
#sidebar_1 ul ul {
	' . $sb_content_bg . '
	padding: ' . $sb_content_top_padding_thickness . 'px ' . $sb_content_right_padding_thickness . 'px 0px ' . $sb_content_left_padding_thickness . 'px;
	' . $sb_content_border_right . '
	' . $sb_content_border_bottom . '
	' . $sb_content_border_left . '
}
#sidebar_1 ul ul li {
	list-style-type: ' . $sb_list_style . ';
}
#sidebar_1 ul li li {
	padding: 0px 0px 5px ' . $sb_ul_5_padding_thickness . 'px;
}
#sidebar_1 ul li ul li {
	padding: 0px 0px 5px ' . $sb_ul_5_padding_thickness . 'px;
}

/*** Sidebar 2 ***/

#sidebar_2 {
	width: ' . $sb_2 . 'px;
	padding: ' . $sb_2_alt_padding . ';
	color: #' . $sb_content_font_color . ';
	font-family: ' . $sb_content_font . ';
	font-size: ' . $sb_content_font_size . 'px;
	font-weight: ' . $sb_content_font_weight . ';
	letter-spacing: ' . $sb_content_letter_spacing . 'px;
	line-height: ' . $sb_content_line_height . '%;
}
#sidebar_2 a, #sidebar_2 a:visited {
	color: #' . $sb_content_font_link_color . ';
	text-decoration: ' . $sb_text_link_underline_visited . ';
}
#sidebar_2 a:hover {
	color: #' . $sb_content_font_link_hover_color . ';
	text-decoration: ' . $sb_text_link_underline_hover . ';
}
#sidebar_2 .widget {
	padding: ' . $sb_widget_alt_padding . ';
}
#sidebar_2 h3 {
	' . $sb_heading_bg . '
	' . $sb_heading_border_type . ': ' . $sb_heading_border_thickness . 'px ' . $sb_heading_border_style . ' #' . $sb_heading_border_color . ';
	margin: ' . $sb_heading_margins . ';
	padding: ' . $sb_heading_tb_padding_thickness . 'px ' . $sb_heading_lr_padding_thickness . 'px ' . $sb_heading_tb_padding_thickness . 'px ' . $sb_heading_lr_padding_thickness . 'px;
	color: #' . $sb_heading_font_color . ';
	font-family: ' . $sb_heading_font . ';
	font-size: ' . $sb_heading_font_size . 'px;
	font-weight: ' . $sb_heading_font_weight . ';
	text-transform: ' . $sb_heading_text_caps . ' !important;
	font-variant: ' . $sb_heading_font_variant . ' !important;
	letter-spacing: ' . $sb_heading_letter_spacing . 'px;
	text-align: ' . $sb_title_text_align . ';
	line-height: ' . $sb_heading_line_height . '%;
}
#sidebar_2 p {
	' . $sb_content_bg . '
	padding: ' . $sb_content_top_padding_thickness . 'px ' . $sb_content_lr_p_padding_thickness . 'px ' . $sb_content_bottom_p_padding_thickness . 'px ' . $sb_content_lr_p_padding_thickness . 'px;
	' . $sb_content_border_right . '
	' . $sb_content_border_bottom . '
	' . $sb_content_border_left . '
}
#sidebar_2 ul ul {
	' . $sb_content_bg . '
	padding: ' . $sb_content_top_padding_thickness . 'px ' . $sb_content_right_padding_thickness . 'px 0px ' . $sb_content_left_padding_thickness . 'px;
	' . $sb_content_border_right . '
	' . $sb_content_border_bottom . '
	' . $sb_content_border_left . '
}
#sidebar_2 ul ul li {
	list-style-type: ' . $sb_list_style . ';
}
#sidebar_2 ul li li {
	padding: 0px 0px 5px ' . $sb_ul_5_padding_thickness . 'px;
}
#sidebar_2 ul li ul li {
	padding: 0px 0px 5px ' . $sb_ul_5_padding_thickness . 'px;
}

/*** Home Sidebar ***/

#sidebar_h {
	' . $sb_h_bg . '
	border: ' . $sb_h_border_thickness . 'px ' . $sb_h_border_style . ' #' . $sb_h_border_color . ';
	width: ' . $sb_h . 'px;
	margin: ' . $sb_h_alt_margin . ';
	padding: ' . $sb_h_alt_padding . ';
	color: #' . $sb_content_font_color . ';
	font-family: ' . $sb_content_font . ';
	font-size: ' . $sb_content_font_size . 'px;
	font-weight: ' . $sb_content_font_weight . ';
	letter-spacing: ' . $sb_content_letter_spacing . 'px;
	float: ' . $sb_h_float . ';
	line-height: ' . $sb_content_line_height . '%;
}
#sidebar_h a, #sidebar_h a:visited {
	color: #' . $sb_content_font_link_color . ';
	text-decoration: ' . $sb_text_link_underline_visited . ';
}
#sidebar_h a:hover {
	color: #' . $sb_content_font_link_hover_color . ';
	text-decoration: ' . $sb_text_link_underline_hover . ';
}
#sidebar_h .widget {
	padding: ' . $sb_h_widget_alt_padding . ';
}
#sidebar_h h3 {
	' . $sb_h_heading_bg . '
	' . $sb_h_heading_border . '
	margin: ' . $sb_heading_margins . ';
	padding: ' . $sb_heading_tb_padding_thickness . 'px ' . $sb_heading_lr_padding_thickness . 'px ' . $sb_heading_tb_padding_thickness . 'px ' . $sb_heading_lr_padding_thickness . 'px;
	color: #' . $sb_heading_font_color . ';
	font-family: ' . $sb_heading_font . ';
	font-size: ' . $sb_heading_font_size . 'px;
	font-weight: ' . $sb_heading_font_weight . ';
	text-transform: ' . $sb_heading_text_caps . ' !important;
	font-variant: ' . $sb_heading_font_variant . ' !important;
	letter-spacing: ' . $sb_heading_letter_spacing . 'px;
	text-align: ' . $sb_title_text_align . ';
	line-height: ' . $sb_heading_line_height . '%;
}
#sidebar_h p {
	' . $sb_h_content_bg . '
	padding: ' . $sb_content_top_padding_thickness . 'px ' . $sb_content_lr_p_padding_thickness . 'px ' . $sb_content_bottom_p_padding_thickness . 'px ' . $sb_content_lr_p_padding_thickness . 'px;
	' . $sb_h_content_border_right . '
	' . $sb_h_content_border_bottom . '
	' . $sb_h_content_border_left . '
}
#sidebar_h ul ul {
	' . $sb_h_content_bg . '
	padding: ' . $sb_content_top_padding_thickness . 'px ' . $sb_content_right_padding_thickness . 'px 0px ' . $sb_content_left_padding_thickness . 'px;
	' . $sb_h_content_border_right . '
	' . $sb_h_content_border_bottom . '
	' . $sb_h_content_border_left . '
}
#sidebar_h ul ul li {
	list-style-type: ' . $sb_list_style . ';
}
#sidebar_h ul li li {
	padding: 0px 0px 5px ' . $sb_ul_5_padding_thickness . 'px;
}
#sidebar_h ul li ul li {
	padding: 0px 0px 5px ' . $sb_ul_5_padding_thickness . 'px;
}

/*** Sidebar CMS 1 ***/

#sidebar_cms_1 {
	' . $cms_sb_bg . '
	border: ' . $sb_border_thickness . 'px ' . $sb_border_style . ' #' . $sb_border_color . ';
	width: ' . $sb_cms_1 . 'px;
	margin: ' . $sb_alt_margin . ';
	padding: ' . $sb_cms_alt_padding . ';
	color: #' . $sb_content_font_color . ';
	font-family: ' . $sb_content_font . ';
	font-size: ' . $sb_content_font_size . 'px;
	font-weight: ' . $sb_content_font_weight . ';
	letter-spacing: ' . $sb_content_letter_spacing . 'px;
	float: ' . $sb_cms_1_float . ';
	line-height: ' . $sb_content_line_height . '%;
}
#sidebar_cms_1 a, #sidebar_cms_1 a:visited {
	color: #' . $sb_content_font_link_color . ';
	text-decoration: ' . $sb_text_link_underline_visited . ';
}
#sidebar_cms_1 a:hover {
	color: #' . $sb_content_font_link_hover_color . ';
	text-decoration: ' . $sb_text_link_underline_hover . ';
}
#sidebar_cms_1 .widget {
	padding: ' . $sb_cms_widget_alt_padding . ';
}
#sidebar_cms_1 h3 {
	' . $sb_heading_bg . '
	' . $sb_heading_border_type . ': ' . $sb_heading_border_thickness . 'px ' . $sb_heading_border_style . ' #' . $sb_heading_border_color . ';
	margin: ' . $sb_heading_margins . ';
	padding: ' . $sb_heading_tb_padding_thickness . 'px ' . $sb_heading_lr_padding_thickness . 'px ' . $sb_heading_tb_padding_thickness . 'px ' . $sb_heading_lr_padding_thickness . 'px;
	color: #' . $sb_heading_font_color . ';
	font-family: ' . $sb_heading_font . ';
	font-size: ' . $sb_heading_font_size . 'px;
	font-weight: ' . $sb_heading_font_weight . ';
	text-transform: ' . $sb_heading_text_caps . ' !important;
	font-variant: ' . $sb_heading_font_variant . ' !important;
	letter-spacing: ' . $sb_heading_letter_spacing . 'px;
	text-align: ' . $sb_title_text_align . ';
	line-height: ' . $sb_heading_line_height . '%;
}
#sidebar_cms_1 p {
	' . $sb_content_bg . '
	padding: ' . $sb_content_top_padding_thickness . 'px ' . $sb_content_lr_p_padding_thickness . 'px ' . $sb_content_bottom_p_padding_thickness . 'px ' . $sb_content_lr_p_padding_thickness . 'px;
	' . $sb_content_border_right . '
	' . $sb_content_border_bottom . '
	' . $sb_content_border_left . '
}
#sidebar_cms_1 ul ul {
	' . $sb_content_bg . '
	padding: ' . $sb_content_top_padding_thickness . 'px ' . $sb_content_right_padding_thickness . 'px 0px ' . $sb_content_left_padding_thickness . 'px;
	' . $sb_content_border_right . '
	' . $sb_content_border_bottom . '
	' . $sb_content_border_left . '
}
#sidebar_cms_1 ul ul li {
	list-style-type: ' . $sb_list_style . ';
}
#sidebar_cms_1 ul li li {
	padding: 0px 0px 5px ' . $sb_ul_5_padding_thickness . 'px;
}
#sidebar_cms_1 ul li ul li {
	padding: 0px 0px 5px ' . $sb_ul_5_padding_thickness . 'px;
}

/*** Sidebar CMS 2 ***/

#sidebar_cms_2 {
	' . $cms_sb_bg . '
	border: ' . $sb_border_thickness . 'px ' . $sb_border_style . ' #' . $sb_border_color . ';
	width: ' . $sb_cms_2 . 'px;
	margin: ' . $sb_alt_margin . ';
	padding: ' . $sb_cms_alt_padding . ';
	color: #' . $sb_content_font_color . ';
	font-family: ' . $sb_content_font . ';
	font-size: ' . $sb_content_font_size . 'px;
	font-weight: ' . $sb_content_font_weight . ';
	letter-spacing: ' . $sb_content_letter_spacing . 'px;
	line-height: ' . $sb_content_line_height . '%;
}
#sidebar_cms_2 a, #sidebar_cms_2 a:visited {
	color: #' . $sb_content_font_link_color . ';
	text-decoration: ' . $sb_text_link_underline_visited . ';
}
#sidebar_cms_2 a:hover {
	color: #' . $sb_content_font_link_hover_color . ';
	text-decoration: ' . $sb_text_link_underline_hover . ';
}
#sidebar_cms_2 .widget {
	padding: ' . $sb_cms_widget_alt_padding . ';
}
#sidebar_cms_2 h3 {
	' . $sb_heading_bg . '
	' . $sb_heading_border_type . ': ' . $sb_heading_border_thickness . 'px ' . $sb_heading_border_style . ' #' . $sb_heading_border_color . ';
	margin: ' . $sb_heading_margins . ';
	padding: ' . $sb_heading_tb_padding_thickness . 'px ' . $sb_heading_lr_padding_thickness . 'px ' . $sb_heading_tb_padding_thickness . 'px ' . $sb_heading_lr_padding_thickness . 'px;
	color: #' . $sb_heading_font_color . ';
	font-family: ' . $sb_heading_font . ';
	font-size: ' . $sb_heading_font_size . 'px;
	font-weight: ' . $sb_heading_font_weight . ';
	text-transform: ' . $sb_heading_text_caps . ' !important;
	font-variant: ' . $sb_heading_font_variant . ' !important;
	letter-spacing: ' . $sb_heading_letter_spacing . 'px;
	text-align: ' . $sb_title_text_align . ';
	line-height: ' . $sb_heading_line_height . '%;
}
#sidebar_cms_2 p {
	' . $sb_content_bg . '
	padding: ' . $sb_content_top_padding_thickness . 'px ' . $sb_content_lr_p_padding_thickness . 'px ' . $sb_content_bottom_p_padding_thickness . 'px ' . $sb_content_lr_p_padding_thickness . 'px;
	' . $sb_content_border_right . '
	' . $sb_content_border_bottom . '
	' . $sb_content_border_left . '
}
#sidebar_cms_2 ul ul {
	' . $sb_content_bg . '
	padding: ' . $sb_content_top_padding_thickness . 'px ' . $sb_content_right_padding_thickness . 'px 0px ' . $sb_content_left_padding_thickness . 'px;
	' . $sb_content_border_right . '
	' . $sb_content_border_bottom . '
	' . $sb_content_border_left . '
}
#sidebar_cms_2 ul ul li {
	list-style-type: ' . $sb_list_style . ';
}
#sidebar_cms_2 ul li li {
	padding: 0px 0px 5px ' . $sb_ul_5_padding_thickness . 'px;
}
#sidebar_cms_2 ul li ul li {
	padding: 0px 0px 5px ' . $sb_ul_5_padding_thickness . 'px;
}

/*** Sidebar Pages Widget ***/

.widget_pages {
	color: #' . $sb_pages_font_color . ';
	font-family: ' . $sb_pages_font . ';
	font-size: ' . $sb_pages_font_size . 'px;
	font-weight: ' . $sb_pages_font_weight . ';
	letter-spacing: ' . $sb_pages_letter_spacing . 'px;
	line-height: ' . $sb_pages_line_height . '%;
}
.widget_pages a, .widget_pages a:visited {
	color: #' . $sb_pages_font_link_color . ' !important;
	text-decoration: ' . $sb_pages_link_underline_visited . ' !important;
}
.widget_pages a:hover {
	color: #' . $sb_pages_font_link_hover_color . ' !important;
	text-decoration: ' . $sb_pages_link_underline_hover . ' !important;
}
' . $sb_pages_heading_display . '

/************************* 
	Comments 
*************************/

#comment {
	' . $comment_box_bg . '
	border: 1px solid #' . $comment_box_border_color . ';
	color: #' . $comment_box_text_color . ';
}
#submit {
	' . $comment_sub_bg . '
	border: 1px solid #' . $comment_sub_border_color . ';
	color: #' . $comment_sub_text_color . ';
	font-family: ' . $comment_sub_font . ';
	font-size: ' . $comment_sub_font_size . 'px;
	font-weight: ' . $comment_sub_font_weight . ';
}
.comments h3 {
	color: #' . $comment_font_color . ';
	font-family: ' . $comment_main_font . ';
}
.comments h4 {
	color: #' . $comment_font_color . ';
	font-family: ' . $comment_main_font . ';
}
.comments {
	width: ' . $cc_width . 'px;
	padding: ' . $comments_alt_padding . ';
	color: #' . $comment_font_color . ';
	font-family: ' . $comment_main_font . ';
}
.commentlist li ul li {
	background: #' . $alt_comment_reply_bg_color . ';
	border: 1px solid #' . $comment_border_color . ';
}
.commentlist li ul li ul li {
	' . $cc_bg . '
	border-top: 1px solid #' . $comment_border_color . ';
	border-bottom: 1px solid #' . $comment_border_color . ';
	border-left: 1px solid #' . $comment_border_color . ';
	border-right: 0px solid #' . $comment_border_color . ';
}
.commentlist li ul li ul li ul li{
	background: #' . $alt_comment_reply_bg_color . ';
	border-top: 1px solid #' . $comment_border_color . ';
	border-bottom: 1px solid #' . $comment_border_color . ';
	border-left: 1px solid #' . $comment_border_color . ';
	border-right: 0px solid #' . $comment_border_color . ';
}
.commentlist li ul li ul li ul li ul li{
	' . $cc_bg . '
	border-top: 1px solid #' . $comment_border_color . ';
	border-bottom: 1px solid #' . $comment_border_color . ';
	border-left: 1px solid #' . $comment_border_color . ';
	border-right: 0px solid #' . $comment_border_color . ';
}
.commentlist p {
	color: #' . $comment_font_color . ';
	font-family: ' . $commenter_font . ';
	font-size: ' . $comment_font_size . 'px;
}
.commentlist a, .commentlist a:visited {
	color: #' . $comment_link_color . ';
	text-decoration: ' . $comment_text_link_underline_visited . ';
}
.commentlist a:hover {
	color: #' . $comment_link_color . ';
	text-decoration: ' . $comment_text_link_underline_hover . ';
}
#commentform p {
	color: #' . $comment_font_color . ';
	font-family: ' . $comment_main_font . ';
}
#commentform a, #commentform a:visited {
	color: #' . $comment_link_color . ';
}
#commentform a:hover {
	color: #' . $comment_link_color . ';
}
#commentform textarea {
	width: ' . $comment_box_width . ';
}
.thread-alt {
	background: #' . $alt_comment_bg_color . ';
}
.thread-even {
	border-top: 1px solid #' . $comment_border_color . ';
	border-bottom: 1px solid #' . $comment_border_color . ';
}
.depth-1 {
	border-top: 1px solid #' . $comment_border_color . ';
	border-bottom: 1px solid #' . $comment_border_color . ';
}
.even, .alt {
	border-top: 1px solid #' . $comment_border_color . ';
	border-bottom: 1px solid #' . $comment_border_color . ';
}

/************************* 
	Footer 
*************************/

#footer_wrap {
	' . $footer_bg . '
	border-top: ' . $footer_top_border_thickness . 'px ' . $footer_top_border_style . ' #' . $footer_top_border_color . ';
}
#footer {
	width: ' . $container_width . 'px;
}
#footer p {
	color: #' . $footer_font_color . ';
	font-family: ' . $footer_font . ';
	font-size: ' . $footer_font_size . 'px;
}
#footer a, #footer a:visited {
	color: #' . $footer_link_color . ';
	text-decoration: ' . $footer_text_link_underline_visited . ';
}
#footer a:hover {
	color: #' . $footer_link_hover_color . ';
	text-decoration: ' . $footer_text_link_underline_hover . ';
}
.footer_left {
	float: ' . $footer_left_float . ';
}
.footer_right {
	float: ' . $footer_right_float . ';
}

/************************* 
	Custom 
*************************/

#custom_widget_1 {
	' . $cw1_bg . '
	' . $cw1_border_type . ': ' . $cw1_border_thickness . 'px ' . $cw1_border_style . ' #' . $cw1_border_color . ' !important;
	width: ' . $cw1_width . ' !important;
	height: ' . $cw1_height . ' !important;
	margin: ' . $cw1_top_margin . 'px ' . $cw1_right_margin . 'px ' . $cw1_bottom_margin . 'px ' . $cw1_left_margin . 'px !important;
	float: ' . $cw1_float . ' !important;
}
.customwidget1 {
	padding: ' . $cw1_top_padding . 'px ' . $cw1_right_padding . 'px ' . $cw1_bottom_padding . 'px ' . $cw1_left_padding . 'px !important;
}
#custom_widget_1 h2 {
	color: #' . $cw1_headline_font_color . ' !important;
	font-family: ' . $cw1_headline_font . ' !important;
	font-size: ' . $cw1_headline_font_size . 'px !important;
	font-weight: ' . $cw1_headline_font_weight . ' !important;
	text-align: ' . $cw1_headline_text_align . ' !important;
	letter-spacing: ' . $cw1_headline_letter_spacing . 'px !important;
	text-transform: ' . $cw1_headline_text_caps . ' !important;
	font-variant: ' . $cw1_headline_font_variant . ' !important;
	line-height: ' . $cw1_headline_line_height . '% !important;
}
#custom_widget_1 {
	color: #' . $cw1_content_font_color . ' !important;
	font-family: ' . $cw1_content_font . ' !important;
	font-size: ' . $cw1_content_font_size . 'px !important;
	line-height: ' . $cw1_content_line_height . '% !important;
}
#custom_widget_1 p {
	color: #' . $cw1_content_font_color . ' !important;
	font-family: ' . $cw1_content_font . ' !important;
	font-size: ' . $cw1_content_font_size . 'px !important;
	line-height: ' . $cw1_content_line_height . '% !important;
}
#custom_widget_1 a, #custom_widget_1 a:visited {
	color: #' . $cw1_content_link_color . ' !important;
	text-decoration: ' . $cw1_text_link_underline_visited . ' !important;
}
#custom_widget_1 a:hover {
	color: #' . $cw1_content_link_hover_color . ' !important;
	text-decoration: ' . $cw1_text_link_underline_hover . ' !important;
}
#custom_widget_1 ul {
	color: #' . $cw1_content_font_color . ' !important;
	font-family: ' . $cw1_content_font . ' !important;
	font-size: ' . $cw1_content_font_size . 'px !important;
}
.customwidget1 img {
' . $cw1_display_block . ';
}
#custom_widget_2 {
	' . $cw2_bg . '
	' . $cw2_border_type . ': ' . $cw2_border_thickness . 'px ' . $cw2_border_style . ' #' . $cw2_border_color . ' !important;
	width: ' . $cw2_width . ' !important;
	height: ' . $cw2_height . ' !important;
	margin: ' . $cw2_top_margin . 'px ' . $cw2_right_margin . 'px ' . $cw2_bottom_margin . 'px ' . $cw2_left_margin . 'px !important;
	float: ' . $cw2_float . ' !important;
}
.customwidget2 {
	padding: ' . $cw2_top_padding . 'px ' . $cw2_right_padding . 'px ' . $cw2_bottom_padding . 'px ' . $cw2_left_padding . 'px !important;
}
#custom_widget_2 h2 {
	color: #' . $cw2_headline_font_color . ' !important;
	font-family: ' . $cw2_headline_font . ' !important;
	font-size: ' . $cw2_headline_font_size . 'px !important;
	font-weight: ' . $cw2_headline_font_weight . ' !important;
	text-align: ' . $cw2_headline_text_align . ' !important;
	letter-spacing: ' . $cw2_headline_letter_spacing . 'px !important;
	text-transform: ' . $cw2_headline_text_caps . ' !important;
	font-variant: ' . $cw2_headline_font_variant . ' !important;
	line-height: ' . $cw2_headline_line_height . '% !important;
}
#custom_widget_2 p {
	color: #' . $cw2_content_font_color . ' !important;
	font-family: ' . $cw2_content_font . ' !important;
	font-size: ' . $cw2_content_font_size . 'px !important;
	line-height: ' . $cw2_content_line_height . '% !important;
}
#custom_widget_2 a, #custom_widget_2 a:visited {
	color: #' . $cw2_content_link_color . ' !important;
	text-decoration: ' . $cw2_text_link_underline_visited . ' !important;
}
#custom_widget_2 a:hover {
	color: #' . $cw2_content_link_hover_color . ' !important;
	text-decoration: ' . $cw2_text_link_underline_hover . ' !important;
}
#custom_widget_2 ul {
	color: #' . $cw2_content_font_color . ' !important;
	font-family: ' . $cw2_content_font . ' !important;
	font-size: ' . $cw2_content_font_size . 'px !important;
}
.customwidget2 img {
' . $cw2_display_block . ';
}
#custom_widget_3 {
	' . $cw3_bg . '
	' . $cw3_border_type . ': ' . $cw3_border_thickness . 'px ' . $cw3_border_style . ' #' . $cw3_border_color . ' !important;
	width: ' . $cw3_width . ' !important;
	height: ' . $cw3_height . ' !important;
	margin: ' . $cw3_top_margin . 'px ' . $cw3_right_margin . 'px ' . $cw3_bottom_margin . 'px ' . $cw3_left_margin . 'px !important;
	float: ' . $cw3_float . ' !important;
}
.customwidget3 {
	padding: ' . $cw3_top_padding . 'px ' . $cw3_right_padding . 'px ' . $cw3_bottom_padding . 'px ' . $cw3_left_padding . 'px !important;
}
#custom_widget_3 h2 {
	color: #' . $cw3_headline_font_color . ' !important;
	font-family: ' . $cw3_headline_font . ' !important;
	font-size: ' . $cw3_headline_font_size . 'px !important;
	font-weight: ' . $cw3_headline_font_weight . ' !important;
	text-align: ' . $cw3_headline_text_align . ' !important;
	letter-spacing: ' . $cw3_headline_letter_spacing . 'px !important;
	text-transform: ' . $cw3_headline_text_caps . ' !important;
	font-variant: ' . $cw3_headline_font_variant . ' !important;
	line-height: ' . $cw3_headline_line_height . '% !important;
}
#custom_widget_3 p {
	color: #' . $cw3_content_font_color . ' !important;
	font-family: ' . $cw3_content_font . ' !important;
	font-size: ' . $cw3_content_font_size . 'px !important;
	line-height: ' . $cw3_content_line_height . '% !important;
}
#custom_widget_3 a, #custom_widget_3 a:visited {
	color: #' . $cw3_content_link_color . ' !important;
	text-decoration: ' . $cw3_text_link_underline_visited . ' !important;
}
#custom_widget_3 a:hover {
	color: #' . $cw3_content_link_hover_color . ' !important;
	text-decoration: ' . $cw3_text_link_underline_hover . ' !important;
}
#custom_widget_3 ul {
	color: #' . $cw3_content_font_color . ' !important;
	font-family: ' . $cw3_content_font . ' !important;
	font-size: ' . $cw3_content_font_size . 'px !important;
}
.customwidget3 img {
' . $cw3_display_block . ';
}
#custom_widget_4 {
	' . $cw4_bg . '
	' . $cw4_border_type . ': ' . $cw4_border_thickness . 'px ' . $cw4_border_style . ' #' . $cw4_border_color . ' !important;
	width: ' . $cw4_width . ' !important;
	height: ' . $cw4_height . ' !important;
	margin: ' . $cw4_top_margin . 'px ' . $cw4_right_margin . 'px ' . $cw4_bottom_margin . 'px ' . $cw4_left_margin . 'px !important;
	float: ' . $cw4_float . ' !important;
}
.customwidget4 {
	padding: ' . $cw4_top_padding . 'px ' . $cw4_right_padding . 'px ' . $cw4_bottom_padding . 'px ' . $cw4_left_padding . 'px !important;
}
#custom_widget_4 h2 {
	color: #' . $cw4_headline_font_color . ' !important;
	font-family: ' . $cw4_headline_font . ' !important;
	font-size: ' . $cw4_headline_font_size . 'px !important;
	font-weight: ' . $cw4_headline_font_weight . ' !important;
	text-align: ' . $cw4_headline_text_align . ' !important;
	letter-spacing: ' . $cw4_headline_letter_spacing . 'px !important;
	text-transform: ' . $cw4_headline_text_caps . ' !important;
	font-variant: ' . $cw4_headline_font_variant . ' !important;
	line-height: ' . $cw4_headline_line_height . '% !important;
}
#custom_widget_4 p {
	color: #' . $cw4_content_font_color . ' !important;
	font-family: ' . $cw4_content_font . ' !important;
	font-size: ' . $cw4_content_font_size . 'px !important;
	line-height: ' . $cw4_content_line_height . '% !important;
}
#custom_widget_4 a, #custom_widget_4 a:visited {
	color: #' . $cw4_content_link_color . ' !important;
	text-decoration: ' . $cw4_text_link_underline_visited . ' !important;
}
#custom_widget_4 a:hover {
	color: #' . $cw4_content_link_hover_color . ' !important;
	text-decoration: ' . $cw4_text_link_underline_hover . ' !important;
}
#custom_widget_4 ul {
	color: #' . $cw4_content_font_color . ' !important;
	font-family: ' . $cw4_content_font . ' !important;
	font-size: ' . $cw4_content_font_size . 'px !important;
}
.customwidget4 img {
' . $cw4_display_block . ';
}

/************************* 
	Class Styles
*************************/

' . $remove_page_titles . $remove_page_titles_css;
	}
}

function frugal_dynamic_styles() {
$upload_options = get_option('frugal_upload_options');
$frugal_dyn_css = new frugal_dyn_CSS;
$frugal_dyn_css->build();
if (is_writable(FRUGAL_DYNAMIC_CSS) && $upload_options['fr_dynamic_stylesheet_format'] == "CSS"):
	$door = @fopen(FRUGAL_DYNAMIC_CSS, 'w');
	@fwrite($door, $frugal_dyn_css->css);
	@fclose($door);
else:
	echo apply_filters('frugal_dynamic_styles', $frugal_dyn_css->css);
endif;
}

$upload_options = get_option('frugal_upload_options');
if ($upload_options['fr_dynamic_stylesheet_format'] == "PHP"):
frugal_dynamic_styles(); endif;