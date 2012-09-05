jQuery(document).ready(function($) {
	
	// Variables
	var catalyst_options_nav_all = $('.catalyst-options-nav-all');
	var catalyst_all_options = $('.catalyst-all-options');
	
	catalyst_options_nav_all.click(function() {
		var nav_id = $(this).attr('id');
		catalyst_all_options.hide();
		$('#'+nav_id+'-box').show();
		catalyst_options_nav_all.removeClass('catalyst-options-nav-active');
		$('#'+nav_id).addClass('catalyst-options-nav-active');
	});
	
	function show_message(response) {
		$('#ajax-save-throbber').hide();
		$('#ajax-save-no-throb').show();
		$('#catalyst-core-saved').html(response).center().fadeIn('slow');
		window.setTimeout(function(){
			$('#catalyst-core-saved').fadeOut('slow'); 
		}, 2222);
	}
	
	$('form#core-options-form').submit(function() {
		$('#ajax-save-no-throb').hide();
		$('#ajax-save-throbber').show();
		var data = $(this).serialize();
		jQuery.post(ajaxurl, data, function(response) {
			if(response) {
				show_message(response);
			}
		});
		return false;
	});
	
	$('#catalyst-logo-links-to').change(function() {
		var logo_links_to = $('#catalyst-logo-links-to').val();
		if( logo_links_to != 'custom_url' ) {
			$('#catalyst-logo-links-to-box').animate({"height": "hide"}, { duration: 300 });
		} else {
			$('#catalyst-logo-links-to-box').animate({"height": "show"}, { duration: 300 });
		}
	});
	
	$('#catalyst-logo-links-to').change();
	
	$('#catalyst-nav1-type').change(function() {
		var default_content_type = $('#catalyst-nav1-type').val();
		if( default_content_type == 'Default' ) {
			$('#catalyst-display-default-nav1-box').animate({"height": "show"}, { duration: 300 });
		} else {
			$('#catalyst-display-default-nav1-box').animate({"height": "hide"}, { duration: 300 });
		}
	});
	
	$('#catalyst-nav1-type').change();
	
	$('#catalyst-nav2-type').change(function() {
		var default_content_type = $('#catalyst-nav2-type').val();
		if( default_content_type == 'Default' ) {
			$('#catalyst-display-default-nav2-box').animate({"height": "show"}, { duration: 300 });
		} else {
			$('#catalyst-display-default-nav2-box').animate({"height": "hide"}, { duration: 300 });
		}
	});
	
	$('#catalyst-nav2-type').change();
	
	$('#catalyst-nav1-right-content').change(function() {
		var default_content_type = $('#catalyst-nav1-right-content').val();
		if( default_content_type == 'Text' ) {
			$('#catalyst-display-nav1-text-box').animate({"height": "show"}, { duration: 300 });
		} else {
			$('#catalyst-display-nav1-text-box').animate({"height": "hide"}, { duration: 300 });
		}
	});
	
	$('#catalyst-nav1-right-content').change();
	
	$('#catalyst-nav2-right-content').change(function() {
		var default_content_type = $('#catalyst-nav2-right-content').val();
		if( default_content_type == 'Text' ) {
			$('#catalyst-display-nav2-text-box').animate({"height": "show"}, { duration: 300 });
		} else {
			$('#catalyst-display-nav2-text-box').animate({"height": "hide"}, { duration: 300 });
		}
	});
	
	$('#catalyst-nav2-right-content').change();
	
	$('#catalyst-default-content-type').change(function() {
		var default_content_type = $('#catalyst-default-content-type').val();
		if( default_content_type == 'Hybrid' ) {
			$('#catalyst-display-default-hybrid-box').animate({"height": "show"}, { duration: 300 });
		} else {
			$('#catalyst-display-default-hybrid-box').animate({"height": "hide"}, { duration: 300 });
		}
	});
	
	$('#catalyst-default-content-type').change();
	
	$('#catalyst-archive-content-type').change(function() {
		var archive_content_type = $('#catalyst-archive-content-type').val();
		if( archive_content_type == 'Hybrid' ) {
			$('#catalyst-display-archive-hybrid-box').animate({"height": "show"}, { duration: 300 });
		} else {
			$('#catalyst-display-archive-hybrid-box').animate({"height": "hide"}, { duration: 300 });
		}
	});
	
	$('#catalyst-archive-content-type').change();
	
	$('#catalyst-footer-content').keyup(function() {
		var $this = $(this), the_length = $this.val().length, last_char = $this.val().charAt(the_length-1);
		if( last_char == ']' ) {
			var val = $this.val();
			$this.val(val + ' ');
		}
	});
	
	$('#catalyst-remove-all-page-titles').change(function() {
		var remove_all_page_titles = $('#catalyst-remove-all-page-titles:checked').val();
		if( remove_all_page_titles ) {
			$('#catalyst-remove-all-page-titles-box').animate({"height": "hide"}, { duration: 300 });
		} else {
			$('#catalyst-remove-all-page-titles-box').animate({"height": "show"}, { duration: 300 });
		}
	});
	
	$('#catalyst-remove-all-page-titles').change();
	
	$('.catalyst-custom-fonts-button').click(function() {
		var $this = $(this), font_css_id = $this.attr('id');
		$('#'+font_css_id+'-box').animate({"height": "toggle"}, { duration: 300 });
		hilight_custom();
	});
	
});