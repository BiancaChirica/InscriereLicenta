$(document).ready(function () {

    $("#login_form").live("submit", function () {
        var log_email = $("#log_email").val();
        var log_password = $("#log_password").val();
        $.ajax({
            url: "includes/action_login.php",
            type: "POST",
            data : $("#login_form").serialize(),
            success:function(data){
                if(data == "Te-ai connectat cu succes!")
                {
                    window.location.replace("user_dashboard.php");
                }
                alert(data);
            }
        })
    })
    
})