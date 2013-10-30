// tweet.js function
jQuery(function($){
    $(".tweet").tweet({
    	modpath: '/assets/twitter/',
	    join_text: "auto",
	    avatar_size: 0,
	    count: 1,
		loading_text: "loading tweets..."
	 });
});

// rotate.js function
var terms = ["BRANDS", "IDENTITIES", "WEBSITES", "FILMS", "RELATIONSHIPS"];

function rotateTerm() {
 var ct = $("#rotate").data("term") || 0;
 $("#rotate").data("term", ct == terms.length -1 ? 0 : ct + 1).text(terms[ct]).fadeIn()
   	.delay(2000).fadeOut(200, rotateTerm);
}
	
$(rotateTerm);

// Lazy load 
$(document).ready(function () {
    $(".fade").hide();
    $(".fade").bind("load", function () { $(this).fadeIn(600); });
  });