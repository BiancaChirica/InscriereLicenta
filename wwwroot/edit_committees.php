<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: Edit committees</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/edit_committees.css">
    <link rel="stylesheet" href="css/label-input.css">
    <link rel="stylesheet" href="css/table.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="javascript/JQuery.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.js"></script>
    <script type="text/javascript" src="javascript/API.js"></script>

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

            <div class="full-area-loader" id="page-loader">
                LOADING...
            </div>

            <div class="full-area-loader semi-transparent hidden" id="save-loader">
                LOADING...
            </div>

            <h1>Edit committees</h1>
            <p>Insert information here..</p>

            <div class="button-class">
                <button type="button" onclick="checkLicense()">License</button>
                <button type="button" onclick="checkDissertation()">Dissertation</button>
            </div>

            <div class="select-committees" style="display: block;">


                <div class="status" id="ajax-status">
                </div>

                <form id="form-create-comitee">
                    <div class="check-box">
                        <label class="container">License
                            <input type="radio" checked="checked" name="radio" class="check-mark" id="type-license">
                        </label>
                        <label class="container">Dissertation
                            <input type="radio" name="radio" class="check-mark" id="type-disertation">
                        </label>
                    </div>
                    <select class="select-license" id="choose-license" multiple>
                        <option value="Diac Mihai">Diac Mihai</option>
                        <option value="Gatu Cristian">Gatu Cristian</option>
                        <option value="Gavrilut Dragos">Gavrilut Dragos</option>
                        <option value="Iacob Florin">Iacob Florin</option>
                        <option value="Gatu Cristian">Gatu Cristian</option>
                        <option value="Gavrilut Dragos">Gavrilut Dragos</option>
                        <option value="Iacob Florin">Iacob Florin</option>
                    </select>
                    <div class="button-select-div">
                        <button type="submit" class="button-select">Submit</button>
                    </div>
                </form>

            </div>

            <div id="tables-license" style="overflow-x:auto; display: block">

            </div>

            <div id="tables-dissertation" style="overflow-x:auto; display: none">

            </div>
        </div>
    </div>
</div>
<div class="footer">
    <p>© 1992-2019 Faculty of Computer Science, University "Alexandru Ioan Cuza" from Iasi, Romania.</p>
    <p>All rights reserved.</p>
</div>

<script>
    $(document).ready(function () {
        $("#choose-license").chosen();
    });
</script>
<script src="javascript/responsive-dashboard.js"></script>
<script src="javascript/edit_committees.js"></script>
</body>
</html>
