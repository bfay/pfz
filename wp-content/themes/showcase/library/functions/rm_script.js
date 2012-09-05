    jQuery(document).ready(function(){
		jQuery('.rm_options').slideUp();
		
		jQuery('.rm_section h3').click(function(){		
			if(jQuery(this).parent().next('.rm_options').css('display')=='none')
				{	jQuery(this).removeClass('inactive');
					jQuery(this).addClass('active');
					jQuery(this).children('span').removeClass('inactive');
					jQuery(this).children('span').addClass('active');
					
				}
			else
				{	jQuery(this).removeClass('active');
					jQuery(this).addClass('inactive');		
					jQuery(this).children('span').removeClass('active');			
					jQuery(this).children('span').addClass('inactive');
				}
				
			jQuery(this).parent().next('.rm_options').slideToggle('slow');	
		});
});