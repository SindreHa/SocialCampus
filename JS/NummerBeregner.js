
var maxOrd = 256;
var ord = document.getElementById("ord-teller-ID");
var ordBoks = document.getElementById("text-area-ID");

$("#text-area-ID").keyup(function(e)
{
    checkCharactersLength(e);
});
    
function checkCharactersLength(e){
        ord.innerHTML = ordBoks.value.length + "/" + maxOrd;  
}

function IncrementPostLikes(element){
    var currentLikes = element.children[1].innerHTML;
    element.children[1].innerHTML++;
}

function DecrementPostLikes(element){
    var stats = element.parentElement;
    var dislikeButton = stats.children[0];
    dislikeButton.children[1].innerHTML--;
}