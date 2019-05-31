<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard: Insert License Info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/insert_license_info.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="javascript/JQuery.js"></script>
    <script src="javascript/API.js"></script>
    <script src="javascript/responsive-dashboard.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="application/javascript">
        $( document ).ready(function(){
            bindFormSubmit();
        });

        var bindFormSubmit = function () {
            $('#add-news-form').off('submit').on('submit', function (event) {
                event.preventDefault();
                $('#page-loader').removeClass('hidden');
                var status = $('#ajax-status');

                var data = {
                    "content": $('#ta-content').val(),
                    "title": $('#ta-title').val()
                };

                $.ajax({
                    url: window.API.baseUrl + 'create_news.php',
                    method: 'POST',
                    data: data,
                    success: function (response) {
                        if (window.API.validateResponse(response)) {
                            $('#page-loader').addClass('hidden');
                            status.html('New saved!');
                            status.removeClass('error');
                            status.addClass('success');
                            $('#ta-title').val('');
                            $('#ta-content').val('');
                        } else {
                            $('#page-loader').addClass('hidden');
                            status.html('ERROR! ' + response.message);
                            status.removeClass('success');
                            status.addClass('error');
                        }
                    },
                    error: function () {
                        $('#page-loader').addClass('hidden');
                        status.html('ERROR!');
                        status.removeClass('success');
                        status.addClass('error');
                    }
                });
            });
        };
    </script>
</head>

<body>
    <div id="dashboard-content">
        <div id="header">
            <div class="logo"><a href="#"><img src="image/logo-university.png" alt="Logo-license"></a></div>
        </div>

        <div class="close-bar">
            <a class="home">HOME</a>
        </div>


        <div class="container-admin" id="container">
            <div class="left-bar" style="font-family: 'Roboto Condensed', sans-serif;">
                <ul id="nav">
                    <li><a class="selected" href="admin_dashboard">Dashboard</a></li>
                    <li><a href="account_manager">Account Manager</a></li>
                    <li><a href="create_new_account">Create new account</a></li>
					<li><a href="edit_accounts">Edit accounts</a></li>
                    <li><a href="insert_license_info">Insert license info</a></li>
                    <li><a href="edit_license">Edit license info</a></li>
                    <li><a href="edit_committees">Edit committees</a></li>
                    <li><a href="index">Log out</a></li>
                </ul>
            </div>




            <div class="content">

                <div class="full-area-loader semi-transparent hidden" id="page-loader">
                    LOADING...
                </div>

                <div class="status" id="ajax-status">
                </div>

                <div class="card" style="height: 23rem;">
                    <h5 class="card-header bg-info text-center">
                        Insert license Info
                    </h5>

                    <div class="card-body px-lg-5 pt-0">

                        <form class="text-left" style="color: #757575;" id="add-news-form">


                            <div class="md-form">

                                <label for="materialLoginFormEmail">Title:</label>
                                <textarea class="form-control" id="ta-title" rows="1"></textarea>
                            </div>


                            <div class="md-form">

                                <label for="materialLoginFormPassword">Content:</label>
                                <textarea class="form-control" id="ta-content" rows="3"></textarea>

                            </div>

                            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">
                                Post
                            </button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="javascript/login-box.js"></script>

</body>

</html>
