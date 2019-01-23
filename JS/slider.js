/* ----------- Må gjøres dynamisk etterhvert ---------- */ 

var bilde;
var width = document.getElementById("slider-container").offsetWidth;
var status;
var timer = 3000;

window.onload = function()
{
    bilde = document.getElementsByClassName("slide");
    status = 0;
    bildeLoop();
}

var startLoop = setInterval(function()
{
    bildeLoop();
}, timer);


function bildeLoop()
{
    if(status == 0)
    {
        bilde[1].style.opacity = "0";
        setTimeout(function()
        {
            bilde[0].style.right = "0px";
            bilde[1].style.right = -width + "px";
            bilde[2].style.right = width + "px";
        }, 500);

        setTimeout(function()
        {
            bilde[1].style.opacity = "1";
        }, 1000);

        status = 1;
    }
    
    else if(status == 1)
    {
        bilde[2].style.opacity = "0";
        setTimeout(function()
        {
            bilde[1].style.right = "0px";
            bilde[2].style.right = -width + "px";
            bilde[0].style.right = width + "px";
        }, 500);

        setTimeout(function()
        {
            bilde[2].style.opacity = "1";
        }, 1000);

        status = 2;
    }
    

    else if(status == 2)
    {
        bilde[0].style.opacity = "0";
        setTimeout(function()
        {
            bilde[2].style.right = "0px";
            bilde[0].style.right = -width + "px";
            bilde[1].style.right = width + "px";
        }, 500);

        setTimeout(function()
        {
            bilde[0].style.opacity = "1";
        }, 1000);

        status = 0;
    }

        
}
/* */



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

document.getElementById("knapp-hoyre").onclick = function()
{
    bildeLoop();
}


/* --------- Venstre knapp funksjon for slider ------------- */

/*
document.getElementById("knapp-venstre").onclick = function()
{
    if(status == 0)
        status = 1;
    
    else if(status == 1)   
        status = 2;
    
    else if(status == 2)
        status = 0;   
        
        bildeLoopReverse();
}


function bildeLoopReverse()
{
    if(status == 0)
    {
        bilde[2].style.opacity = "1";
        setTimeout(function()
        {
            bilde[2].style.right = "0px";
            bilde[1].style.right = -width + "px";
            bilde[0].style.right = width + "px";
        }, 500);

        setTimeout(function()
        {
            bilde[2].style.opacity = "1";
        }, 1000);

        status = 1;
    }
    
    else if(status == 1)
    {
        bilde[0].style.opacity = "1";
        setTimeout(function()
        {
            bilde[0].style.right = "0px";
            bilde[2].style.right = -width + "px";
            bilde[1].style.right = width + "px";
        }, 500);

        setTimeout(function()
        {
            bilde[0].style.opacity = "1";
        }, 1000);

        status = 2;
    }
    

    else if(status == 2)
    {
        bilde[1].style.opacity = "1";
        setTimeout(function()
        {
            bilde[1].style.right = "0px";
            bilde[0].style.right = -width + "px";
            bilde[2].style.right = width + "px";
        }, 500);

        setTimeout(function()
        {
            bilde[1].style.opacity = "1";
        }, 1000);

        status = 0;
    }

        
}
*/