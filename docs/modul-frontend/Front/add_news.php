<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard: Insert License Info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/add_news.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/label-input.css">
    <script src="javascript/JQuery.js"></script>
    <script src="javascript/API.js"></script>
    <script src="javascript/responsive-dashboard.js"></script>
    <script type="application/javascript">
        $(document).ready(function () {
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
                <li><a class="selected" href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="account_manager.php">Account Manager</a></li>
                <li><a href="create_new_account.php">Create new account</a></li>
                <li><a href="edit_committees.php">Edit committees</a></li>
                <li><a href="edit_accounts.php">Edit accounts</a></li>
                <li><a href="add_news.php">Add news</a></li>
                <li><a href="edit_news.php">Edit news</a></li>
                <li><a href="index.php">Log out</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>Add news</h1>
            <p>You write some news for all students & professors...</p>
            <div class="full-area-loader semi-transparent hidden" id="page-loader">
                LOADING...
            </div>

            <div class="status" id="ajax-status"></div>
            <div class="all-content">
                <div class="card">
                    <form class="text-left" id="add-news-form">
                        <label for="ta-title">Title:</label>
                        <input class="form-control" id="ta-title">

                        <label for="ta-content">Content news:</label>
                        <textarea class="form-control" id="ta-content"
                                  placeholder="Enter your news here..."></textarea>
                        <div class="button-zone-news">
                            <button class="button-post" type="submit">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <p>© 1992-2019 Faculty of Computer Science, University "Alexandru Ioan Cuza" from Iasi, Romania.</p>
    <p>All rights reserved.</p>
</div>
<script src="javascript/login-box.js"></script>
</body>
</html>
