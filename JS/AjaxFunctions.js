$(document).ready(function () 
{
    $("#Username-ID").keyup(checkUsernameLength);
});

function checkUsernameLength()
{
    var username = $("#Username-ID").val();
    if(username.length > 4 && username.length < 20){
        $("#input-error-username").css("display", "none");
        $("#input-approved-username").css("display", "inline-block");
    }
    else
    {
        $("#input-error-username").css("display", "inline-block");
        $("#input-approved-username").css("display", "none");
    }
}



