/*
 * Tooltip script 
 * powered by jQuery (http://www.jquery.com)
 * 
 * written by Alen Grakalic (http://cssglobe.com)
 * 
 * for more info visit http://cssglobe.com/post/1695/easiest-tooltip-and-image-preview-using-jquery
 *
 */
 
var $j = jQuery.noConflict();

this.tooltip = function(){	
	/* CONFIG */		
		xOffset = -12;
		yOffset = -140;		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result		
	/* END CONFIG */		
	$j("a.tooltip").hover(function(e){											  
		this.t = this.title;
		this.title = "";									  
		$j("body").append("<p id='tooltip'>"+ this.t +"</p>");
		$j("#tooltip")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("fast");		
    },
	function(){
		this.title = this.t;		
		$j("#tooltip").remove();
    });	
	$j("a.tooltip").mousemove(function(e){
		$j("#tooltip")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});			
};



// starting the script on page load
$j(document).ready(function(){
	tooltip();
});