window.onload = function()
{
    document.getElementById('Submit-Toggle').setAttribute("disabled","disabled");
}

$(document).ready(function () 
{
    $("#Username-ID").keyup(checkUsernameLength);
    $("#Email-ID").keyup(validateEmail);
    $("#full_name-ID").keyup(checkNameLength);
    $("#Password-ID").keyup(checkPasswordLength);
    $("#ConfirmPassword-ID").keyup(checkPasswordMatch);
    $("#Username-ID, #Email-ID, #Password-ID, #ConfirmPassword-ID").keyup(SubmitToggle);
});

function checkUsernameLength()
{
    var username = $("#Username-ID").val();
    var usernameRegex = /^[ÆØÅæøåA-Za-z0-9_-]{4,50}$/;
    if(username.match(usernameRegex)){
        $("#input-error-username").css("right", "-40px");
        $("#input-approved-username").css("right", "0px");
        return true;
    }
    else if(username.length == 0)
    {
        $("#input-error-username").css("right", "-40px");
        $("#input-approved-username").css("right", "-40px");
    }
    else
    {
        $("#input-error-username").css("right", "0px");
        $("#input-approved-username").css("right", "-40px");
    }
}

function checkNameLength()
{
    var name = $("#full_name-ID").val();
    var nameRegex = /^[ÆØÅæøåa-zA-Z]+[ ]+[ÆØÅæøåa-zA-Z]{1,50}$/; 
    if (name.match(nameRegex)) {
        $("#input-error-full_name").css("right", "-40px");
        $("#input-approved-full_name").css("right", "0px");
        return true;
    }
    else if(name.length == 0)
    {
        $("#input-error-full_name").css("right", "-40px");
        $("#input-approved-full_name").css("right", "-40px");
    }
    else
    {
        $("#input-error-full_name").css("right", "0px");
        $("#input-approved-full_name").css("right", "-40px");
    }
}

function validateEmail()
{
    var email = $("#Email-ID").val();
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/; 
    if (email.match(emailRegex)) 
    {
        $("#input-error-email").css("right", "-40px"); 
        $("#input-approved-email").css("right", "0px");
        return true;
    } 
    else if(email.length == 0)
    {
        $("#input-error-email").css("right", "-40px");
        $("#input-approved-email").css("right", "-40px");
    }
    else 
    {
        $("#input-error-email").css("right", "0px"); 
        $("#input-approved-email").css("right", "-40px");
        return false;
    }
}

function checkPasswordLength()
{
    checkPasswordMatch();
    var password = $("#Password-ID").val();
    var passwordRegex = /^[ÆØÅæøåa-z0-9_-]{8,50}$/;
    if(password.match(passwordRegex))
    {
        $("#input-error-password").css("right", "-40px");
        $("#input-approved-password").css("right", "0px");
        return true;
    }
    else if(password.length == 0)
    {
        $("#input-error-password").css("right", "-40px");
        $("#input-approved-password").css("right", "-40px");
    }
    else
    {
        $("#input-error-password").css("right", "0px");
        $("#input-approved-password").css("right", "-40px");
    }
}

function checkPasswordMatch() 
{
    var password = $("#Password-ID").val();
    var confirmPassword = $("#ConfirmPassword-ID").val();

    if (password != confirmPassword)
    {
        $("#input-error-confirmPassword").css("right", "0px");
        $("#input-approved-confirmPassword").css("right", "-40px");
        return false;
    }
    else if(password.length == 0)
    {
        $("#input-error-confirmPassword").css("right", "-40px");
        $("#input-approved-confirmPassword").css("right", "-40px");
    }
    else
    {
        $("#input-error-confirmPassword").css("right", "-40px");
        $("#input-approved-confirmPassword").css("right", "0px");
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