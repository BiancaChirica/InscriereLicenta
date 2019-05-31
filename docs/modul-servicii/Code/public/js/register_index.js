$(document).ready(function () {

    function verify_email(email) {
        $(".mail-error").hide;
        if (email == "") {
            $(".mail-error").show();
            $(".mail-error").html("Enter your email adress please!").css("color","green");
        } else {
            $.ajax({
                url: "includes/action_register.php",
                type: "POST",
                data: { check_email: 1, email: email },
                success: function (data) {
                    $(".mail-error").show;
                    if (data == "Email already exist") {
                        $(".mail-error").html("Email Already Exists").css("color", "red");
                    } else if (data == "Invalid email") {
                        $(".mail-error").html("Invalid Email Adress").css("color", "red");
                    } else if (data == "Valid email") {
                        $(".mail-error").html("Valid Email Adress").css("color", "green");
                    }

                }
            })
        }
    }
    $("#u_email").focusout(function () {
        var email = $("#u_email").val();
        verify_email(email);

    })

    $("#register_form").live("submit", function () {
        $.ajax({
            url: "includes/action_register.php",
            type: "POST",
            data: $("#register_form").serialize(),
            success: function (data) {
                alert(data);
                if (data == "Record inserted succesfully") {
                    window.location.replace("index.php");
                }
            }
        })
    })
})