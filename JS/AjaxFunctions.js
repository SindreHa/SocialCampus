$(document).ready(function () 
{
    $("#Username-ID").keyup(checkUsernameLength);
    $("#Email-ID").keyup(validateEmail);
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

function validateEmail()
{
    var email = $("#Email-ID").val();
    if (validateEmailCheck(email)) 
    {
        $("#input-error-email").css("display", "none"); 
        $("#input-approved-email").css("display", "inline-block");
    } 
    else 
    {
        $("#input-error-email").css("display", "inline-block"); 
        $("#input-approved-email").css("display", "none");
    return false;
    }
}

function validateEmailCheck(email) 
{
    var regex = /\S+@\S+\.\S+/;
    return regex.test(email);
}

