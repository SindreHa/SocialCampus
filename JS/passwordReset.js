$(".password-reset").click(function() {
    var oldPassword = $("#oldPsw").val();
    var newPassword = $("#newPsw").val();
    var conPassword = $("#conPsw").val();
    $.ajax({
        url:'profil.php',
        data: { password: oldPassword, new_password: newPassword, confirm_password: conPassword},
        type:'post',
        success:function()
        {
            TooltipMessage("Passord byttet");
        }
    })
});