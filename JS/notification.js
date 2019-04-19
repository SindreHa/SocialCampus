
/*
    Funksjon for meldingboks. Skrevet i ren JavaScript for å kunne laste inn i starten av alle sider uten å
    laste inn hele jQuery biblioteket som kan gjøre innlasting av side tregere.
    Kalles på med parameter for hva melding skal være. Bruker timer for timeout på når den skal
    skjules av seg selv. Bruker kan også krysse ut ved trykk på tooltipExit som er krysset i boksen.    
*/

function TooltipMessage(text) { 
    var timer = 4000; 
    var tooltip = document.getElementById("notification-box"); 
    var tooltipText = document.getElementById("notification-boxID");
  var tooltipExit = document.getElementById("notification-exitID")
         
    tooltipText.innerHTML = text; 

    if(tooltip.classList){
        tooltip.classList.add("tooltip-show");
    }
    else{
        tooltip.className += ' ' + "tooltip-show";
    }
 
            tooltipExit.onclick = function(){ 
                if(timer){ 
                    clearTimeout(timer); 
                    timer = 0; 
                } 
                tooltip.classList.remove("tooltip-show");
            } 
             timer = setTimeout(function() { 
                tooltip.classList.remove("tooltip-show");
             }, timer); 
    }; 