<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: Create New Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/create_new_account.css">
    <link rel="stylesheet" href="css/label-input.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/table.css">
    <script src="javascript/JQuery.js"></script>
    <script src="javascript/API.js"></script>
    <script src="javascript/responsive-dashboard.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            getData();
            registerSubmitEvent();
        });

        var getData = function () {
            $.ajax({
                url: window.API.baseUrl + 'prof_accounts.json',
                method: "GET",
                success: function (response) {
                    if (window.API.validateResponse(response)) {
                        var container = $('#table-profesori tbody');
                        response.data.forEach(function (prof, index) {
                            container.append(
                                '<tr>' +
                                '<td class="column">' + prof.first_name + ' ' + prof.last_name + '</td>' +
                                '<td class="column">' + prof.email + '</td>' +
                                '<td class="column">' + prof.degree + '</td>' +
                                '</tr>'
                            );
                        });
                        $('#page-loader').addClass('hidden');
                    } else {
                        $('#page-loader').html('ERROR! Please refresh the page!</br>[ ' + response.message + ' ]');
                    }
                },
                error: function () {
                    $('#page-loader').html('ERROR! Please refresh the page!');
                }
            });
        };


        var registerSubmitEvent = function () {
            $('#add-prof-form').off('submit').on('submit', function (event) {
                event.preventDefault();
                $("#form-loader").removeClass("hidden");

                var formData = $(this).serializeArray();

                var data = {};

                formData.forEach(function (item, index) {
                    data[item.name.replace('-', '_')] = item.value;
                });

                $.ajax({
                    url: window.API.baseUrl + 'add_prof.php',
                    method: "POST",
                    data: data,
                    success: function (response) {
                        if (window.API.validateResponse(response)) {
                            var container = $('#table-profesori tbody');
                            $('#add-account').hide();
                            $('#form-loader').addClass('hidden');
                            prof = response.data;
                            container.append(
                                '<tr>' +
                                '<td class="column">' + prof.first_name + ' ' + prof.last_name + '</td>' +
                                '<td class="column">' + prof.email + '</td>' +
                                '<td class="column">' + prof.degree + '</td>' +
                                '</tr>'
                            );
                        } else {
                            $('#form-loader').addClass('hidden');
                            $('#form-error').html('ERROR! ' + response.message);
                        }
                    },
                    error: function () {
                        $('#form-loader').addClass('hidden');
                        $('#form-error').html('ERROR! ' + response.message);
                    }
                });
            });
        }
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

            <div class="full-area-loader" id="page-loader">
                LOADING...
            </div>

            <h1>Create new account</h1>
            <p>Create account for new professor.</p>
            <div class="content-button-add">
                <button onclick="document.getElementById('add-account').style.display='block'" type="button"
                        class="button-add">Add new account
                </button>
            </div>

            <div id="add-account" class="box">
                <form class="box-content animate" id="add-prof-form">
                    <div class="container-login">

                        <div class="full-area-loader semi-transparent hidden" id="form-loader">
                            LOADING...
                        </div>

                        <div class="content-login">
                            <h1 align="center">Add new account professor</h1>
                            <hr>
                        </div>

                        <div id="form-error">
                        </div>

                        <div class="form">
                            <input type="text" name="last-name" placeholder="" autocomplete="off" required/>
                            <label class="label">
                                <span class="content-span">First name</span>
                            </label>
                        </div>
                        <div class="form">
                            <input type="text" name="first-name" placeholder="" autocomplete="off" required/>
                            <label class="label">
                                <span class="content-span">Last name</span>
                            </label>
                        </div>
                        <div class="form">
                            <input type="text" name="degree" placeholder="" autocomplete="off" required/>
                            <label class="label">
                                <span class="content-span">Didactic degree</span>
                            </label>
                        </div>
                        <div class="form">
                            <input type="text" name="email" placeholder="" autocomplete="off" required/>
                            <label class="label">
                                <span class="content-span">E-mail</span>
                            </label>
                        </div>
                        <div class="form">
                            <input type="text" name="password" placeholder="" autocomplete="off" required/>
                            <label class="label">
                                <span class="content-span">Password</span>
                            </label>
                        </div>
                        <button type="submit" class="button-append">Append</button>
                    </div>
                </form>
            </div>

            <div class="content-table" style="overflow-x:auto;">
                <table id="table-profesori">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Degree</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
