
var maxOrd = 850;
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
        ord.innerHTML = "0/" + maxOrd;
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
    element.nextElementSibling.innerHTML++;
}

function DecrementPostLikes(element)
{
    element.parentElement.children[1].innerHTML--;
}