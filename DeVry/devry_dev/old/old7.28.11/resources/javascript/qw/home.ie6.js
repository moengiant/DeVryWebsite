// ie6 only fixes for js
$(function() { //document.ready

	
	// fixes select field from appearing over the rollovers
	$(document).ready(function(){
	  $("li#keller").hover(function(){
	  	$(".select").css({ visibility: "hidden" });
	   },function(){
	  	$(".select").css({ visibility: "visible" });
		});
	  $("li#media").hover(function(){
	  	$(".select").css({ visibility: "hidden" });
	   },function(){
	  	$(".select").css({ visibility: "visible" });
		});
	});
	
});