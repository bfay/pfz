var $j = jQuery.noConflict();

$j(function(){

	function verify(){
	msg = "Are you absolutely sure that you want to delete all selected images?";
	return confirm(msg);
}