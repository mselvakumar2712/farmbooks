$.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;


	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });
	$('.numberOnly').keypress(function(event) {
		if (event.which != 8 && event.which != 0 && (event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});
	$('.numberOnly').bind("cut copy paste",function(e) {
		if($(this).attr('id') != 'imei')
		  e.preventDefault();
	});
	$('.numberOnly').bind('contextmenu', function(e) {
		 return false;
	});
	
	var timeout = 3000; // in miliseconds (3*1000)
	$('.alert').delay(timeout).fadeOut(300);

});
function initnumberOnly(){
	$('.numberOnly').keypress(function(event) {
		if (event.which != 8 && event.which != 0 && (event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});
	$('.numberOnly').bind("cut copy paste",function(e) {
		if($(this).attr('id') != 'imei')
		  e.preventDefault();
	});
	$('.numberOnly').bind('contextmenu', function(e) {
		 return false;
	});
}