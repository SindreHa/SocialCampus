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
    if(username.length > 4 && username.length < 20){
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
    if(name.length > 1){
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


function validateNameCheck(name) 
{
    var regex = /\W+\S+\W+/;
    return regex.test(name);
}

function validateEmail()
{
    var email = $("#Email-ID").val();
    if (validateEmailCheck(email)) 
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
    $('#Password-ID').on('blur', function()
    {
        
        if(this.value.length < 8 && this.value.length > 0)
        { 
            $("#input-error-password").css("right", "0px");
            $("#input-approved-password").css("right", "-40px");
            return false; 
        }
        else
        {
            $("#input-error-password").css("right", "-40px");
            $("#input-approved-password").css("right", "0px");
        }
        if(this.value.length == 0)
        {
            $("#input-error-password").css("right", "-40px");
            $("#input-approved-password").css("right", "-40px");
        } 
    });
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


