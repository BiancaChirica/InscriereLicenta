<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: Individual Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/edit_committees.css">
    <link rel="stylesheet" href="css/label-input.css">
    <link rel="stylesheet" href="css/table.css">
    <script src="javascript/JQuery.js"></script>
    <script src="javascript/responsive-dashboard.js"></script>
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
                <li><a class="selected" href="user_dashboard.php">Dashboard</a></li>
                <li><a href="exam_rules.php"> Exam rules</a></li>
                <li><a href="enrollment_file.php"> Enrollment file</a></li>
                <li><a href="individual_result.php"> Individual results</a></li>
                <li><a href="license_form.php"> License form</a></li>
                <li><a href="exam_schedule.php"> Exam schedule</a></li>
                <li><a href="account_manager_user.php">Account Manager</a></li>
                <li><a href="index.php">Log out</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Individual results are as follows:</h1>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <h1>The committee that assessed your license project</h1>
            <div class="table-students" style="overflow-x:auto;">
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Degree</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="column">Diac Mihai</td>
                        <td class="column">diac.mihai@email.com</td>
                        <td class="column">Profesor</td>
                    </tr>
                    <tr>
                        <td class="column">Iacob Florin</td>
                        <td class="column">iacob.florin@email.com</td>
                        <td class="column">Lector</td>
                    </tr>
                    <tr>
                        <td class="column">Gatu Cristian</td>
                        <td class="column">gatu.cristian@email.com</td>
                        <td class="column">Decan</td>
                    </tr>
                    <tr>
                        <td class="column">Gavrilut Dragos</td>
                        <td class="column">gavrilut.dragos@email.com</td>
                        <td class="column">Profesor</td>
                    </tr>
                    </tbody>
                </table>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <h1>Grades</h1>
                <div class="table-students" style="overflow-x:auto;">
                    <table>
                        <thead>
                        <tr>
                            <th>Specializarea</th>
                            <th>Nota ”Fundamentele Informaticii”</th>
                            <th>Nota lucrare</th>
                            <th>Nota finala</th>
                            <th>Rezultat</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="column">Informatica</td>
                            <td class="column">7.25</td>
                            <td class="column">8.50</td>
                            <td class="column">7.87</td>
                            <td class="column">Promovat</td>
                        </tr>
                        </tbody>
                    </table>
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
