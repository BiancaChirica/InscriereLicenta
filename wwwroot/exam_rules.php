<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: Exam rules</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/exam_rules.css">
    <script src="javascript/JQuery.js"></script>
    <script src="javascript/responsive-dashboard.js"></script>
    <script src="javascript/pdfobject.min.js"></script>
    <script src="javascript/pdfobject.js"></script>
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
            <h1>Exam Rules</h1>
            <p>Here you can find all the information for the license.</p>
            <div id="view-pdf">
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <p>© 1992-2019 Faculty of Computer Science, University "Alexandru Ioan Cuza" from Iasi, Romania.</p>
    <p>All rights reserved.</p>
</div>

<script>
    let viewer = $('#view-pdf');
    PDFObject.embed('Exam_rules.pdf', viewer);
</script>

</body>
</html>
