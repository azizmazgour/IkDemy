/**
 * The script is encapsulated in an self-executing anonymous function,
 * to avoid conflicts with other libraries
 */
(function($) {
	/**
	 * Declare 'use strict' to the more restrictive code and a bit safer,
	 * sparing future problems
	 */
	"use strict";

	/***********************************************************************/
	/*****************************  $Content  ******************************/
	/**
	* + Content
	* + Animate Itemas on Start
	* + FancyBox
	* + Gmaps
	* + Login Animation
	* + One Page Scroll
	* + Owl Carousel - Patners
	* + Owl Carousel - Testimonials
	* + Parallax
	* + Preloader
	* + Send Forms
	* + Tootips
	*/

	/*********************  $Animate Items on Start  ***********************/
	$('.animated').appear(function() {
		var elem = $(this);
		var animation = elem.data('animation');
		if ( !elem.hasClass('visible') ) {
			var animationDelay = elem.data('animation-delay');
			
			if ( animationDelay ) {
				setTimeout(function(){
					elem.addClass( animation + " visible" );
				}, animationDelay);

			} else {
				elem.addClass( animation + " visible" );

			}
		}
	});
	/*************************  $Background Video  *************************/
	$('.bgvideo').bgYtVideo();

	/****************************  FancyBox  *******************************/
	if ($('.fancybox').length) {
		$('a[data-rel]').each(function() {
			$(this).attr('rel', $(this).data('rel'));
		});
		
		$(".fancybox").fancybox({
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	}



	/*****************************  $GMaps  33.574722, -7.625492 
	var map = new GMaps({ 
		div: '#map', 
		lat: 33.574722, 
		lng: -7.625492,
		disableDefaultUI: true,
	});
	
	map.addMarker({ lat: 33.574722, lng: -7.625492  });********************************/
	


	/*************************  $Login Animation  **************************/
	//http://tympanus.net/Development/ButtonComponentMorph/
	var docElem = window.document.documentElement, didScroll, scrollPosition;

	// trick to prevent scrolling when opening/closing button
	function noScrollFn() {
		window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
	}

	function noScroll() {
		window.removeEventListener( 'scroll', scrollHandler );
		window.addEventListener( 'scroll', noScrollFn );
	}

	function scrollFn() {
		window.addEventListener( 'scroll', scrollHandler );
	}

	function canScroll() {
		window.removeEventListener( 'scroll', noScrollFn );
		scrollFn();
	}

	function scrollHandler() {
		if( !didScroll ) {
			didScroll = true;
			setTimeout( function() { scrollPage(); }, 60 );
		}
	};

	function scrollPage() {
		scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
		didScroll = false;
	};

	scrollFn();

	[].slice.call( document.querySelectorAll( '.login-button' ) )
		.forEach( function( bttn ) {
			new UIMorphingButton( bttn, {
				closeEl : '.icon-cancel',
				onBeforeOpen : function() { noScroll(); }, // don't allow to scroll
				onAfterOpen : function() { canScroll(); }, // can scroll again
				onBeforeClose : function() { noScroll(); }, // don't allow to scroll
				onAfterClose : function() { canScroll(); } // can scroll again
			} );
		} );

	

	/*************************  $One Page Scroll  **************************/
	$('.navbar-nav').onePageNav({
		currentClass: 'active',
		filter: ':not(.exclude)',
	});



	/*********************  $Owl Carousel - Partners  **********************/
	var owl = $("#owl-patners");

	owl.owlCarousel({
		items : 5,
		responsive: {
			0: {
				items: 1
			},
			470: {
				items: 2
			},
			650: {
				items: 3
			},
			992: {
				items: 5
			}
		},
		dots: false,
		nav: true,
		navText: ['',''],
		pagination: false,
		navigationText: ["",""]
	});



	/*******************  $Owl Carousel - Testimonials  ********************/
	var $owlElement = $("#owl-testimonials");

	owl = $owlElement.owlCarousel({
		loop: true,
		dots: false,
		autoplay: true,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 3
			},

		},		
	});

	owl.on('changed.owl.carousel', function(e){
		var curNumber = e.item.index,
			$curItem  = $($owlElement.find('.owl-item')[curNumber]);

		$owlElement.find('.owl-item').removeClass('current');
		$curItem.addClass('current');
	})

	$($owlElement.find('.owl-item')[3]).addClass('current');



	/*****************************  $Parallax  *****************************/
	$('.parallax').each(function(){ 
		//http://mrbool.com/how-to-create-parallax-effect-with-css-and-jquery/27274#ixzz34LPRngy6
		var $obj = $(this);
		$(window).scroll(function() { 
			if($(document).width() > 500) {
				var yPos = -($(window).scrollTop() / $obj.data('speed'));
				var bgpos = '50% '+ yPos + 'px';
				$obj.css('background-position', bgpos );
			}
		});
	});



	/****************************  $Preloader  *****************************/
	$(window).load(function() {
		$('#preloader').fadeOut('slow'); 
	});



	/**************************  $Send Forms  ******************************/
	var $form = $('form');

	$form.on( 'submit' , function(e){ 
		if ( $(this).data('ajax') == 1 ) {
			e.preventDefault();
			sendForm( $(this) );
		} 
	})

	function sendForm($form){
		var fieldsData = getFieldsData($form),
			url = $form.attr('action'),
			method = $form.attr('method');

		sendData(url, method, fieldsData, $form, showResults)
		//console.log(url, method, fieldsData, $form, showResults)
	}

	
	function getFieldsData($form) {
		var $fields = $form.find('input, button, textarea, select'),
			fieldsData = {};

		$fields.each( function(){
			var name = $(this).attr('name'),
				val  = $(this).val(),
				type = $(this).attr('type');

			if ( typeof name !== 'undefined' ){
				
				if 	( type == 'checkbox' || type == 'radio' ){

					if ( $(this).is(':checked') ){
						fieldsData[name] = val;
					}
				} else {
					fieldsData[name] = val;
				}
					
			}
		});

		return fieldsData
	}

	function sendData(url, method, data, $form, callback){
		var $btn = $form.find('[type=submit]'),
			$response = $form.find('.form-response');

		$.ajax({
			beforeSend: function(objeto){ 
				$response.html('');
				$btn.button('loading'); 
			},
			complete: function(objeto, exito){ $btn.button('reset'); },
			data: data,
			success: function(dat){  callback(dat, $response); },
			type: method,
			url: url,
		});
	}

	function showResults(data, $response){
		 $response.html(data);
		 $response.find('.alert').slideDown('slow');
	}



	/*****************************  $Tootips  ******************************/
	function changeTooltipColorTo(color) {
		//solution from: http://stackoverflow.com/questions/12639708/modifying-twitter-bootstraps-tooltip-colors-based-on-position
		$('.tooltip-inner').css('background-color', color)
		$('.tooltip.top .tooltip-arrow').css('border-top-color', color);
		$('.tooltip.right .tooltip-arrow').css('border-right-color', color);
		$('.tooltip.left .tooltip-arrow').css('border-left-color', color);
		$('.tooltip.bottom .tooltip-arrow').css('border-bottom-color', color);
	}

	$('.social a').tooltip({placement: 'top'})
	$('.social a').hover(function() {changeTooltipColorTo('#ff5335')});







})(jQuery);
