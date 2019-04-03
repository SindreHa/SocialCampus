/*
    Fila inneholder primært funksjoner som sørger for at diverse knapper blir deaktivert
    om ikke visse tekstfelt inneholder noen/nok ord.
*/

var maxOrd = 850;
var ord = document.getElementById("ord-teller-ID");

/*
    publishToggle blir aktivert hver gang bruker trykker en tast
*/
$("#text-area-ID, #post-title-ID").keyup(function()
{
    publishToggle();
});

/*
    publishToggle kontrollerer at knappen for å poste innlegg er deaktivert eller ikke under kondisjonen
    om at både tekst-area og tittel må ha innhold.
*/
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
    
/*
    Funksjonen sjekker om tekstfeltet innholder tekst, om ikke, return false;
*/
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

/*
    Funksjonen sjekker om tittelen innholder tekst, om ikke, return false;
*/
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

/*
    Funksjonen sjekker om kommentarfeltet inneholder tekst, om ikke, return false;
*/
$('body').on('keyup', '#comment-input', function(event)
{
    var textRegex = /^\s*$/;
    if (!$(this).val().match(textRegex)) {
        $(this).closest(".inputContainer").find(".submit-comment").prop('disabled', false)
    }
    else {
        $(this).closest(".inputContainer").find(".submit-comment").prop('disabled', true)
    }
});