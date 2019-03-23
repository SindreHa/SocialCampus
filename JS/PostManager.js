
var maxOrd = 850;
var ord = document.getElementById("ord-teller-ID");


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
    var ordBoks = $("#text-area-ID").val();
    var textRegex = /^\s*$/;
    if (ordBoks.match(textRegex)) {
        ord.innerHTML = "0/" + maxOrd;
        return false;
    }
    else
    {
        ord.innerHTML = ordBoks.length + "/" + maxOrd;
        return true;
    }
}

function checkTitleLength()
{
    var tittel = $("#post-title-ID").val();
    var textRegex = /^\s*$/;
    if (tittel.match(textRegex)) {
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