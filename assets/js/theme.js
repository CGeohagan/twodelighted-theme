/****************
  Theme Scripts 
****************/

// Script to allow the use of $ instead of jQuery
var $ = jQuery.noConflict();

/********* Header Scripts **********/
// Slide down the search form when the search button is clicked
// Hide search button and show exit button
$(".header-search-button").click(function() {
	$(".header-search-button").hide();
	$(".header-exit-button").show();
	$(".header-search").slideDown("500");
});

//Slide up the search form and show the search button again
$(".header-exit-button").click(function() {
	$(".header-search-button").show();
	$(".header-exit-button").hide();
	$(".header-search").slideUp("500");
});

//

//Toggle the mobile menu on and off when clicking the mobile menu button
$(".menu-button").click(function() {
	$(".mobile-menu").toggle("500");
});

//Toggle the mobile submenu on and off when clicking corresponding list item
$(".mobile-access li").click(function(){
	$(this).children('ul').toggle("500");
});



/********* Scripts for the "to top" and "primary-click-menu" button **********/
//Hide "to top" and "primary-click-menu" button until scrolltop is past 500px on the page
var $toTop = $(".to-top");
var $showHeaderButton = $(".primary-click-menu");
var $hideHeaderButton = $(".primary-close-menu");

function topSlide() {
	var scroll_top = $(window).scrollTop();

	if (scroll_top <= 500) {
	    $toTop.hide();
	    $showHeaderButton.hide();
	} else {
	    $toTop.show();
	    if(!$(".main-header").hasClass("show-header") && document.documentElement.clientWidth > 740) {
	    	$showHeaderButton.show();
	    }
	}
}

//When you click the toTop button, the window scrolls to the top
$(window).scroll(topSlide);
$toTop.click( function() {
	$("html, body").animate({
        scrollTop: 0
    }, 300);
    $hideHeaderButton.hide();
    $(".main-header").removeClass("show-header");
    return false;
});

//Function to show the main header (in both nav and large screens) when you click showHeaderButton
function showHeader() {
	$showHeaderButton.hide();
	$hideHeaderButton.show();
	$(".main-header").addClass("show-header");
}

//Function to hide the main header when you click showHeaderButton
function hideHeader() {
	$hideHeaderButton.hide();
	$showHeaderButton.show();	
	$(".main-header").removeClass("show-header");
}

$showHeaderButton.click(function(){
	showHeader();
});

$hideHeaderButton.click(function(){
	hideHeader();
});



