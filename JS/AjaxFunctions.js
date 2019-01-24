$(document).ready(function () 
{
    $("#Username-ID").keyup(checkUsernameLength);
    $("#Email-ID").keyup(validateEmail);
    $("#Password-ID").keyup(checkPasswordLength);
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

function checkPasswordLength()
{
    var password = $("#Password-ID").val();
    if(password.length >= 8 && password.length <= 20){
        $("#input-error-password").css("display", "none");
        $("#input-approved-password").css("display", "inline-block");
    }
    else
    {
        $("#input-error-password").css("display", "inline-block");
        $("#input-approved-password").css("display", "none");
    }
    $('#Password-ID').on('blur', function(){
        
        if(this.value.length < 8 && this.value.length > 0)
        { 
            $("#input-error-password").css("display", "inline-block");
            $("#input-approved-password").css("display", "none");
            // Bruker vil ikke kunne fylle ut et annet felt før passord er 8 eller 0 langt (kan eventuelt fjernes)
            $(this).focus(); 
        return false; 
        }
        else
        {
            $("#input-error-password").css("display", "none");
            $("#input-approved-password").css("display", "inline-block");
        }
    });
}



