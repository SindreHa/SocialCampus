
/* Variabler */

// Class toggle
var btnOne = document.getElementById("click");
btnOne.addEventListener("click", toggleClass);

// Kart
var map, infoWindow;

//Telling av klasser
$(document).ready(function()
{
var numClasses = $('.group-post-box').length;
document.documentElement.style.setProperty('--postNumber', numClasses);
});

/* Funksjoner */

	function toggleClass() 
	{
		var element1 = document.getElementById("dropdown");
		element1.classList.toggle('hide');
		// var element2 = document.getElementById("darken");
		// element2.classList.toggle('show');
	}
var head = document.getElementsByTagName( 'head' )[0];

	// Save the original method
	var insertBefore = head.insertBefore;

	// Replace it!
	head.insertBefore = function( newElement, referenceElement ) {

	    if ( newElement.href && newElement.href.indexOf( 'https://fonts.googleapis.com/css?family=Roboto' ) === 0 ) {
	        return;
	    }

	    insertBefore.call( head, newElement, referenceElement );
	};

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