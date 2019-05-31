<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard: Edit news</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/edit_news.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/label-input.css">
    <script src="javascript/JQuery.js"></script>
    <script src="javascript/responsive-dashboard.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="javascript/JQuery.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.js"></script>
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
            <h1>Edit news</h1>
            <p>You can edit or remove news...</p>

            <div class="all-content">
                <div class="box-edit-news">
                    <form id="form-news-edit">
                        <label for="choose-id-title">Select news:</label>
                        <select data-placeholder="Select id and title..." class="chosen" id="choose-id-title" required>
                            <option value=""></option>
                            <option value="1.Title">1.Title</option>
                            <option value="2.Title">2.Title</option>
                            <option value="3.Title">3.Title</option>
                            <option value="4.Title">4.Title</option>
                            <option value="5.Title">5.Title</option>
                        </select>
                        <label for="textarea-news">Content news:</label>
                        <textarea class="chosen" id="textarea-news" form="choose-id-title"
                                  placeholder="Enter your news here..."></textarea>

                        <div class="button-zone-news">
                            <button class="button-save" type="submit">Save</button>
                            <button class="button-delete" type="submit">Delete</button>
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
<script>
    $(document).ready(function () {
        $("#choose-id-title").chosen();
    });
</script>
</body>
</html>
