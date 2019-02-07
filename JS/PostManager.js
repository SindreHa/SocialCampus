
var maxOrd = 256;
var ord = document.getElementById("ord-teller-ID");
var ordBoks = document.getElementById("text-area-ID");
var tittel = document.getElementById("post-title-ID")


$("#text-area-ID, #post-title-ID").keyup(function()
{
    publishToggle();
});

function publishToggle()
{
    if(!checkCharactersLength() || !checkTitleLength())
    {
        document.getElementById("post-submit-ID").disabled = true;
    }
    else
    {
        document.getElementById("post-submit-ID").disabled = false; 
    }  
}
    
function checkCharactersLength()
{
    if(ordBoks.value.length == 0)
    {
        return false;    
    }
    else
    {
        ord.innerHTML = ordBoks.value.length + "/" + maxOrd;
        return true;       
    }        
}

function checkTitleLength()
{
    if(tittel.value.length == 0)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function loadMoreComments(){
    alert("Funksjon under arbeid");
    
}

function IncrementPostLikes(element)
{
    var currentLikes = element.children[1].innerHTML;
    element.children[1].innerHTML++;
}

function DecrementPostLikes(element)
{
    var stats = element.parentElement;
    var dislikeButton = stats.children[0];
    dislikeButton.children[1].innerHTML--;
}