var $j = jQuery.noConflict();

$j(function() {

	$j('.column').sortable({
		connectWith: ['.column'],
		stop: function(){
			var this_page = $j('#frugal_this_page').text();
			var positions = '';
			var yindex = 0;
			$j('.portlet').each(function(){yindex++;positions+=($j(this).parent().attr('id') + ':::' + yindex + ':::' +$j(this).attr('id') + ':::' +  $j(this).children('.portlet-content').is(':visible') + ':|:');});
			var data = {
				action: 'frugal_menusave',
				this_page: this_page,
				positions: positions
			};
			
			jQuery.post(ajaxurl, data);
		}
	}); 

	$j('.portlet').addClass('ui-widget ui-widget-content ui-helper-clearfix ui-corner-all')
		.find('.portlet-header')
			.addClass('ui-widget-header ui-corner-all')
			.prepend('<span class=\"ui-icon ui-icon-minusthick\"></span>')
			.end()
		.find('.portlet-content');
	
	$j('.portlet-content:hidden').prevAll('.portlet-header').find('span').toggleClass('ui-icon-minusthick').toggleClass('ui-icon-plusthick');

	$j('.portlet-header .ui-icon').click(function() {
		$j(this).toggleClass('ui-icon-minusthick').toggleClass('ui-icon-plusthick');
		$j(this).parents('.portlet:first').find('.portlet-content').toggle();
		
		var this_page = $j('#frugal_this_page').text();
		var positions = '';
		var yindex = 0;
		$j('.portlet').each(function(){yindex++;positions+=($j(this).parent().attr('id') + ':::' + yindex + ':::' +$j(this).attr('id') + ':::' +  $j(this).children('.portlet-content').is(':visible') + ':|:');});
		var data = {
			action: 'frugal_menusave',
			this_page: this_page,
			positions: positions
		};
		
		jQuery.post(ajaxurl, data);
	});
	
});