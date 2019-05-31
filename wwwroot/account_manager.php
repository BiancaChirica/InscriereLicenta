<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: Account manager admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/label-input.css">
    <link rel="stylesheet" href="css/acc_manager.css">


</head>
<body>
<div id="dashboard-content">
    <div id="header">
        <div class="logo"><a href=""><img src="image/logo-university.png" alt="Logo-license"></a></div>
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
            <h1>Account manager</h1>
            <p>Here you can change your password</p>
            <br>
            <div class="all-content">
                <div class="change-password">
                    <form class="form-change-password">
                        <label for="cur-pass">Current password:</label>
                        <input class="form-control" id="cur-pass">

                        <label for="new-pass">New password:</label>
                        <input class="form-control" id="new-pass">
                        <label for="ret-pass">Retry password:</label>
                        <input class="form-control" id="ret-pass">
                        <div class="button-zone-change">
                            <button class="button-change" type="submit">Change</button>
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

</body>
</html>
