jQuery.noConflict();

jQuery(document).ready(function(){  
	jQuery("a[rel^='prettyPhoto']").prettyPhoto();
	
	jQuery('.boxs .imag').hover(
		function() {
			jQuery(this).find('ul').fadeIn('normal');
			jQuery(this).find('img').fadeTo('normal', 0.7);
			},
		function() {
				jQuery(this).find('ul').fadeOut(400);
				jQuery(this).find('img').fadeTo('normal', 1);
		}
	);  

	jQuery("ul.children").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled (Adds empty span tag after ul.subnav*)  
	jQuery(".menu ul li span").click(function() { //When trigger is clicked...
		//Following events are applied to the subnav itself (moving subnav up and down)
		jQuery(this).parent().find("ul.children").slideDown('fast').show(); //Drop down the subnav on click
 
		jQuery(this).parent().find("ul.children").hover(function() {
		}, function(){	
			jQuery(this).parent().find("ul.children").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up
		});
 
		//Following events are applied to the trigger (Hover events for the trigger)
		}).hover(function() { 
			jQuery(this).addClass("subhover"); //On hover over, add class "subhover"
		}, function(){	//On Hover Out
			jQuery(this).removeClass("subhover"); //On hover out, remove class "subhover"
    });  
  
});  