
/* Variabler */

/* Funksjon som disabler hover state på touch enheter
function hasTouch() {
	return 'ontouchstart' in document.documentElement
				 || navigator.maxTouchPoints > 0
				 || navigator.msMaxTouchPoints > 0;
}

if (hasTouch()) { // remove all :hover stylesheets
	try { // prevent exception on browsers not supporting DOM styleSheets properly
			for (var si in document.styleSheets) {
					var styleSheet = document.styleSheets[si];
					if (!styleSheet.rules) continue;

					for (var ri = styleSheet.rules.length - 1; ri >= 0; ri--) {
							if (!styleSheet.rules[ri].selectorText) continue;

							if (styleSheet.rules[ri].selectorText.match(':hover')) {
									styleSheet.deleteRule(ri);
							}
					}
			}
	} catch (ex) {}
}
*/

// Kart
var map, infoWindow;


//Variabler brukt for å hindre GMaps i å hente inn egen font
var head = document.getElementsByTagName( 'head' )[0];
var insertBefore = head.insertBefore;

/* Funksjoner */


	/*Toggle class for responsiv navigasjonsbar*/
	$(".menyToggle").click(function() {
		$(this).closest(".main-nav").toggleClass('menu-show');
		$(".hamburger-icon").toggleClass('open');
		$(".menyToggle").toggleClass('menyToggle-darker');
	});

	/* Gjør så man kan trykke på strekene på Meny bar */
	$(".hamburger-icon span").click(function() {
		$(this).closest(".main-nav").toggleClass('menu-show');
		$(".hamburger-icon").toggleClass('open');
		$(".menyToggle").toggleClass('menyToggle-darker');
	});

	/*Gjør input felt aktivt ved trykk på tilhørende ikon*/
	$(".inputContainer i").click(function() {
	  $(this).next("input").focus();
	});

	/*Gjør første input felt aktivt på logg inn side load*/
	if (window.location.href.match(/login/)) {
		$( document ).ready(function() {
	    	$("input").first().focus();
		});
	}

$(function() {
	$('body').on('click', '.comment-collapse', function(e) {
		e.preventDefault(); 
		$(this).closest(".post-wrapper").next().find(".comment-toggle").slideToggle();
		$(this).toggleClass('comment-show');
		return false; 
	});
});
	

	/*Funskjoner for scrolling til topp knapp*/ 
	$(".toTop").click(function() {
		$("html, body").animate({ scrollTop: 0 }, "slow");
  	return false;
	});

	function getScrollPercent() {
    var h = document.documentElement, 
        b = document.body,
        st = 'scrollTop',
        sh = 'scrollHeight';
    return (h[st]||b[st]) / ((h[sh]||b[sh]) - h.clientHeight) * 100;
	}

	/*
	*	Viser og skjuler knapp, 
	*	posisjonerer også i forhold til høyde og bredde
	*/ 
	$(document).scroll(function() {
		var y = $(this).scrollTop();
		if (getScrollPercent() > 30) {
			$('.toTop').addClass('show-toTop');
		} else {
			$('.toTop').removeClass('show-toTop');
		}
		if(getScrollPercent() > 99 && screen.width < 1380 && screen.width > 550) {
			$('.toTop').css("bottom", "65px");
		} else {
			$('.toTop').css("bottom", "20px");
		}
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
						$('#img-upload-result')
								.attr('src', e.target.result)
				};

				reader.readAsDataURL(input.files[0]);
		}
	}

	/*Hinder GMaps i å hente egen font*/
	head.insertBefore = function( newElement, referenceElement ) {

	    if ( newElement.href && newElement.href.indexOf( 'https://fonts.googleapis.com/css?family=Roboto' ) === 0 ) {
	        return;
	    }

	    insertBefore.call( head, newElement, referenceElement );
	};

	/*Google maps*/
	function myMap() 
	{
		// Oppretter instans av kart fra Google api
		map = new google.maps.Map(document.getElementById('mapContainer'), 
		{
			center: {lat: 59.408640, lng: 9.059762}, zoom: 13,
		});
	    //Viser markør på USN
		var marker = new google.maps.Marker(
		{
			position: {lat: 59.408640, lng: 9.059762}, map: map,
	    });
	}

	function logginn(form)
	{
		empty(form);
			login(form);
	}

	function login(form)
	{
	 if(form.brukernavn.value == "test" && form.passord.value == "test")
	  {
	  	window.open('omoss.html'/*,'_self'*/);
	  }
	 else
	 {
		// document.getElementById("feil").style.display="block";
		// empty() = false;
	   // alert("Feil brukernavn eller passord")/*displays error message*/
	  }
	}

	function checkPsw(form) 
	{
	if (form.brukernavn.value != "test" || form.passord.value != "test") {
        document.getElementById("feil").style.display="block";
        return false;
    }
    else
    	login(form)
	}
	

/* Utkast av funksjoner */


	/*Viser og skjuler logg inn boks ved trykk på "logg inn" i navbar*/
	// function toggleClass() 
	// {
	// 	var element1 = document.getElementById("dropdown");
	// 	element1.classList.toggle('hide');
	// 	// var element2 = document.getElementById("darken");
	// 	// element2.classList.toggle('show');
	// }

	/* Automatisk posisjon i kart */

    /*infoWindow = new google.maps.InfoWindow;
    Henter posisjon, krever godkjenning fra bruker
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };

        // infoWindow.setPosition(pos);
        // infoWindow.setContent('Du er her');
        infoWindow.open(map);
        map.setCenter(pos);
      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
      });
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }

	function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	  infoWindow.setPosition(pos);
	  infoWindow.setContent(browserHasGeolocation ?
	                        'Error: Automatisk posisjon fungerer ikke' :
	                        'Error: Nettleseren din støtter ikke autmatisk posisjon');
	  infoWindow.open(map);
	}*/