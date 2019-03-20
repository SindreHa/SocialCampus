

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