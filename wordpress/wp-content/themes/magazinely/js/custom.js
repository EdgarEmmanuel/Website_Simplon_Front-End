/**
 * File custom.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

 ( function( $ ) {

    //Fix dot for main menu

    $( "#primary-menu li" ).has( "ul" ).addClass( "iot-dot-menu" );
    $( ".iot-dot-menu>a" ).addClass( "iot-dot-menu-a" );


    // Custom offcanvas menu

    $("#site-navigation").append('<button id="iot-open-menu-focus" class="iot-menu-left-open" ><span class="dashicons dashicons-menu"></span></button>');

    $("#mobile-nav-output").append('<aside id="iot-menu-left"><button class="iot-menu-left-close" ><span class="dashicons dashicons-menu"></span></button></aside><div class="iot-menu-left-filter"></div>');

    $clone_menu = $("#primary-menu").clone();
    $clone_menu.removeAttr("id class aria-expanded");
    $clone_menu.addClass( "iot-menu-left-ul" );

    $("#iot-menu-left").append($clone_menu);

    $(".iot-menu-left-ul ul, .iot-menu-left-ul li, .iot-menu-left-ul a").removeAttr("id class");
    $clone_menu.append('<li><a href="" id="accessibility-close-mobile-menu"></a></li>');

	///
	$(".iot-menu-left-open").on("click focus", function(e) {
		e.preventDefault();
		e.stopPropagation();
		e.stopImmediatePropagation();
		$("#iot-menu-left").animate({left: '0'});
		$(".iot-menu-left-filter").animate({left: '0'});
		$("body").animate({left: '250px'});
		$("body").css({"overflow": "hidden"});
	});

	$("#accessibility-close-mobile-menu").focusin(e => {
		$(".iot-menu-left-close").click();
	});

	///

	$(".iot-menu-left-filter, .iot-menu-left-close").click(function(){
		$("#iot-menu-left").animate({left: '-250px'});
		$(".iot-menu-left-filter").animate({left: '-100%'});
		$("body").animate({left: '0'});
		setTimeout( function() {
			$("body").css({"position":"","left":"","overflow":""});
		},405);
	});


	$( document ).on( 'keydown', function ( e ) {
		if ( e.keyCode === 27 ) { 
			$(".iot-menu-left-close").click();
			document.getElementById('iot-skip-to-content').focus();
		}

		$("#iot-open-menu-focus").on('keydown', function(e) {
			if (e.shiftKey && e.keyCode === 9) {
				document.getElementById('iot-skip-to-content').focus();
				$(".iot-menu-left-close").click();


			}
		});



	});



} )( jQuery );