<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DashBoard: Edit accounts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/create_new_account.css">
    <link rel="stylesheet" href="css/label-input.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/edit_accounts.css">
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
            <h1>Edit account</h1>
            <p>At this moment you can just delete accounts for students or professors.</p>
            <div class="button-class">
                <button type="button" class="button-table">Professors</button>
                <button type="button" class="button-table">Students</button>
            </div>

            <div class="table" style="overflow-x:auto; display: block">
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Degree</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="column">Ilie Paul</td>
                        <td class="column">nume at site dot ceva</td>
                        <td class="column">Profesor</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Vlad Adelin</td>
                        <td class="column">email at yahoo dot com</td>
                        <td class="column">Lector</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">amun.mail at yahoo dot com</td>
                        <td class="column">Inspector</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="table" style="overflow-x:auto; display: none">
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Group</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">amunail at yahoo dot com</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">amunail at yahoo dot com</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">amunail at yahoo dot com</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">amunail at yahoo dot com</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">amunail at yahoo dot com</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">amunail at yahoo dot com</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">amunail at yahoo dot com</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">amunail at yahoo dot com</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">amunail at yahoo dot com</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">amunail at yahoo dot com</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
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
<script src="javascript/JQuery.js"></script>
<script src="javascript/responsive-dashboard.js"></script>
<script src="javascript/hover-button.js"></script>

</body>
</html>
