
/* Variabler */

// Class toggle
var logInDropdown = document.getElementById("dropdown");


// Kart
var map, infoWindow;

//Telling av klasser
$(document).ready(function()
{
var numClasses = $('.group-post-box').length + 1;
document.documentElement.style.setProperty('--postNumber', numClasses);
});

//Variabler brukt for å hindre GMaps i å hente inn egen font
var head = document.getElementsByTagName( 'head' )[0];
var insertBefore = head.insertBefore;

/* Funksjoner */

	/*Vis og skjul logg in boks*/
	window.addEventListener('click', function(e)
	{
	var element2 = document.getElementById("dropdown");
		if (document.getElementById('click').contains(e.target))
		{
	  		logInDropdown.classList.add("hide");
	  	} 
	  	else {
			logInDropdown.classList.remove("hide");
	  	}
	})

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