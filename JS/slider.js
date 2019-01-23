/* ----------- Må gjøres dynamisk etterhvert ---------- */ 

var bilde;
var width = document.getElementById("slider-container").offsetWidth;
var status;
var timer = 3000;

window.onload = function(){
    bilde = document.getElementsByClassName("slide");
    status = 0;
    bildeLoop();
}

var startLoop = setInterval(function(){
    bildeLoop();
}, timer);

// Slider tar pause fra auto-mode når man holder over
document.getElementById("slider-container").onmouseenter = function(){
    clearInterval(startLoop);
}
// Slider starter igjen når man ikke holder over
document.getElementById("slider-container").onmouseleave = function(){
    startLoop = setInterval(function(){
        bildeLoop();
    }, timer);
}

function bildeLoop(){
    if(status == 0)
    byttBilde(0);

    else if(status == 1)
    byttBilde(1);

    else if(status == 2)
    byttBilde(2);
}
/* */
function byttBilde(index){
       console.log("width = " + width);
            if(index == 0)
            {     
                bilde[index+1].style.opacity = "0";
                setTimeout(function(){
                    bilde[index].style.right = "0px";
                    bilde[index+1].style.right = -width + "px";
                    bilde[index+2].style.right = width + "px";
                }, 500);

                setTimeout(function(){
                    bilde[index+1].style.opacity = "1";
                }, 1000);
            }
            else if(index == 1)
            {
                bilde[index+1].style.opacity = "0";
                setTimeout(function(){
                    bilde[index].style.right = "0px";
                    bilde[index+1].style.right = -width + "px";
                    bilde[index-1].style.right = width + "px";
                }, 500);

                setTimeout(function(){
                    bilde[index+1].style.opacity = "1";
                }, 1000);
            }
            else if(index == 2)
            {
                bilde[index-2].style.opacity = "0";
                setTimeout(function(){
                    bilde[index].style.right = "0px";
                    bilde[index-2].style.right = -width + "px";
                    bilde[index-1].style.right = width + "px";
                }, 500);

                setTimeout(function(){
                    bilde[index-2].style.opacity = "1";
                }, 1000);
            }

        
        status = index+1
        if(status == 3){
            status = 0;
        }
        
}