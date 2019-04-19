
/* Variabler */
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

	/* Gjør så man kan trykke på hamburger ikonet på Meny bar */
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

	/*Funksjon for å vise/skjule kommentarfelt*/
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

	/*Kalkulerer om scrollposisjon til prosentverdi av siden*/
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

	/*Funksjon som sjekker størrelse på profilbildeopplastning, tillater maks 2MB*/
	function checkImgFileSize(inputFile) {
		var max =  2097152; // 2MB
		
		if (inputFile.files && inputFile.files[0].size > max) {
			TooltipMessage("Filen er for stor. Maks 2MB"); // Varsle bruker om for stor filstørrelse
			inputFile.value = null; // Klarer input
		   }
		else {
			$("#img-upload-post").submit();
		}
	};


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
		var pos = {lat: 59.408640, lng: 9.059762}
		// Oppretter instans av kart fra Google api
		map = new google.maps.Map(document.getElementById('mapContainer'), 
		{
			center: pos, zoom: 14,
		});
	    //Viser markør på USN
		var marker = new google.maps.Marker(
		{
			position: pos, 
			map: map,
		});

		var infoWindow = new google.maps.InfoWindow
		({
			content: 'Vi befinner oss her'
		});
			
			infoWindow.open(map, marker);
	}