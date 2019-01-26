window.onload = function()
{
    document.getElementById('Submit-Toggle').setAttribute("disabled","disabled");
}



$(document).ready(function () 
{
    $("#Username-ID").keyup(checkUsernameLength);
    $("#Email-ID").keyup(validateEmail);
    $("#Password-ID").keyup(checkPasswordLength);
    $("#ConfirmPassword-ID").keyup(checkPasswordMatch);
    $("#Username-ID, #Email-ID, #Password-ID, #ConfirmPassword-ID").keyup(SubmitToggle);
});

function checkUsernameLength()
{
    var username = $("#Username-ID").val();
    if(username.length > 4 && username.length < 20){
        $("#input-error-username").css("display", "none");
        $("#input-approved-username").css("display", "inline-block");
        return true;
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
        return true;
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
    checkPasswordMatch();
    var password = $("#Password-ID").val();
    if(password.length >= 8 && password.length <= 20)
    {
        $("#input-error-password").css("display", "none");
        $("#input-approved-password").css("display", "inline-block");
        return true;
    }
    else if(password.length == 0)
    {
        $("#input-error-password").css("display", "none");
        $("#input-approved-password").css("display", "none");
    }
    else
    {
        $("#input-error-password").css("display", "inline-block");
        $("#input-approved-password").css("display", "none");
    }
    $('#Password-ID').on('blur', function()
    {
        
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
        if(this.value.length == 0)
        {
            $("#input-error-password").css("display", "none");
            $("#input-approved-password").css("display", "none");
        } 
    });
}

function checkPasswordMatch() 
{
    var password = $("#Password-ID").val();
    var confirmPassword = $("#ConfirmPassword-ID").val();

    if (password != confirmPassword)
    {
        $("#input-error-confirmPassword").css("display", "inline-block");
        $("#input-approved-confirmPassword").css("display", "none");
        return false;
    }
    else if(password.length == 0)
    {
        $("#input-error-confirmPassword").css("display", "none");
        $("#input-approved-confirmPassword").css("display", "none");
    }
    else
    {
        $("#input-error-confirmPassword").css("display", "none");
        $("#input-approved-confirmPassword").css("display", "inline-block");
        return true;
    }
    
}

function SubmitToggle()
{
    if(checkUsernameLength() && validateEmail() && checkPasswordLength() && checkPasswordMatch()){
        document.getElementById('Submit-Toggle').removeAttribute("disabled");
    }
    else
    {
        document.getElementById('Submit-Toggle').setAttribute("disabled","disabled"); 
    }  
}


