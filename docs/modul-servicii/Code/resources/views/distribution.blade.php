<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: Distribution</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/label-input.css">
    <link rel="stylesheet" href="css/acc_manager.css">
    <link rel="stylesheet" href="css/distribution.css">
    <script src="javascript/JQuery.js"></script>
    <script src="javascript/responsive-dashboard.js"></script>
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
                <li><a class="selected" href="admin_dashboard">Dashboard</a></li>
                <li><a href="account_manager">Account Manager</a></li>
                <li><a href="create_new_account">Create new account</a></li>
                <li><a href="edit_committees">Edit committees</a></li>
                <li><a href="edit_accounts">Edit accounts</a></li>
                <li><a href="add_news">Add news</a></li>
                <li><a href="edit_news">Edit news</a></li>
                <li><a href="distribution">Distribution</a></li>
                <li><a href="index">Log out</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Distribution</h1>
            <p>Here you can choose date for license and use algorithm for students and committees distribution.</p>
            <br>

            <div class="all-content-dist">
                <div class="date-selection">
                    <label for="start-license">Date start license:</label>
                    <input class="input-dist" id="start-license" type="date">
                    <label for="finish-license">Date finish license:</label>
                    <input class="input-dist" id="finish-license" type="date">
                    <div class="check-box">
                        <label class="container">License
                            <input type="radio" checked="checked" name="radio" class="check-mark" id="type-license">
                        </label>
                        <label class="container">Dissertation
                            <input type="radio" name="radio" class="check-mark" id="type-disertation">
                        </label>
                    </div>
                    <button class="button-dist-submit" type="submit">Submit</button>
                </div>
                <div class="button-dist-zone">
                    <br>
                    <br>
                    <h3>Select distribution method:</h3>
                    <button class="button-dist-g" type="button" onclick="greedydistribution()">Greedy Distribution</button>
                    <button class="button-dist-g" type="button" onclick="geneticdistribution()">Genetic distribution</button>
                </div>
            </div>
        </div>
    </div>
</div>
    
<!--
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

$process = new Process(['ls', '-lsa']);
$process->run();

// executes after the command finishes
if (!$process->isSuccessful()) {
    throw new ProcessFailedException($process);
}

echo $process->getOutput();
-->
<div class="footer">
    <p>© 1992-2019 Faculty of Computer Science, University "Alexandru Ioan Cuza" from Iasi, Romania.</p>
    <p>All rights reserved.</p>
</div>
</body>
</html>
