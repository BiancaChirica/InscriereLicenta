<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAIC: Register</title>
    <link rel="stylesheet" href="css/label-input.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.js"></script>
    <script type="text/javascript" src = "javascript/register_index.js"></script>



</head>

<body>
    <div id="register" class="box-register">
        <form onsubmit="return false" method="POST" class="box-content animate" id = "register_form">
            <div class="container-login">
                <div class="content-login">
                    <h1 align="center">Register</h1>
                    <hr>
                </div>
                <div class="form">
                    <input type="text" name="first-name" placeholder="" autocomplete="off" required />
                    <label class="label">
                        <span class="content-span">First name</span>
                    </label>
                </div>
                <div class="form">
                    <input type="text" name="last-name" placeholder="" autocomplete="off" required />
                    <label class="label">
                        <span class="content-span">Last name</span>
                    </label>
                </div>
                <div class="form">
                    <input type="text" name="u_email" id="u_email" placeholder="" autocomplete="off" required/>
                    <label class="label">
                        <span class="content-span">E-mail</span>
                    </label>
                </div>
                <div class="mail-error"></div>
                <div class="form">
                    <input type="text" name="nr_matricol" placeholder="" autocomplete="off" required />
                    <label class="label">
                        <span class="content-span">Registration number</span>
                    </label>
                </div>
                <div class="form">
                    <input type="password" name="password" placeholder="" autocomplete="off" required />
                    <label class="label">
                        <span class="content-span">Password</span>
                    </label>
                </div>
                <div class="form">
                    <input type="password" name="password2" placeholder="" autocomplete="off" required />
                    <label class="label">
                        <span class="content-span">Confirm password</span>
                    </label>
                </div>
                <div class="button-zone">
                    <button onclick="location.href='index.php'" type="button" class="button-back">Back</button>
                    <button type="submit" class="button-register">Register me</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html> 