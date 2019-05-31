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
            <h1>Students must observe the following assignments</h1>
            <div style="background-color:lightblue; padding-left:15px;font-weight: bold;">
                <p>Studentii trebuie sa fie prezenti cu 30 de minute inaintea orei stabilite pentru prezentare si
                    examinare.</p>
                <p>Fiecare student va intra in sala la ora stabilita in tabelul de mai jos.</p>
                <p>Toate dispozitivele electronice trebuie depuse in locul special amenajat de catre secretarul
                    comisiei.</p>
                <p>La intrarea in sala fiecare student isi va pregati dispozitivele pentru prezentare.</p>
                <p>Apoi candidatul va extrage un subiect de examen din cele dou discipline alese.</p>
                <p>Timpul alocat unui student pentru licenta este de 40 de minute din care:</p>
                <p>-20 de minute pentru pregatirea raspunsurilor</p>
                <p>-20 de minute pentru examinare si prezentare</p>
                <p>In momentul in care un student isi incepe prezentarea urmatorul student va intra in sala.</p>
                <p>Penultimul student ramas inainte de pauza alocata comisiei sau finalizarea programului de examinare
                    va fi rugat sa asiste si la ultima prezentare.</p>
            </div>
            <h1>Comisia 1 Sala C309:</h1>
            <div class="table-students" style="overflow-x:auto;">
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Coordinator</th>
                        <th>Entrance time</th>
                        <th>Prject title & main idea</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="column">Vlad Adelin</td>
                        <td class="column">Lect. dr. Ionut Pistol</td>
                        <td class="column">8:40</td>
                        <td class="column">Project x - does that</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">Prof. dr. Dorel Lucanu</td>
                        <td class="column">9:00</td>
                        <td class="column">Project x - does that</td>
                    </tr>
                    <tr>
                        <td class="column">Darabana Robert</td>
                        <td class="column">Lect. dr. Cristian Frasinaru</td>
                        <td class="column">9:20</td>
                        <td class="column">Project x - does that</td>
                    </tr>
                    <tr>
                        <td class="column">Iie Paul</td>
                        <td class="column">Lect. dr. Alex Moruz</td>
                        <td class="column">10:00</td>
                        <td class="column">Project x - does that</td>
                    </tr>
                    </tbody>
                </table>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <h1>Comisia 2 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sala C309 :</h1>
                <div class="table-students" style="overflow-x:auto;">
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Coordinator</th>
                            <th>Entrance time</th>
                            <th>Prject title & main idea</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="column">Vlad Adelin</td>
                            <td class="column">Lect. dr. Ionut Pistol</td>
                            <td class="column">8:40</td>
                            <td class="column">Project x - does that</td>
                        </tr>
                        <tr>
                            <td class="column">Lupoae Eduard</td>
                            <td class="column">Prof. dr. Dorel Lucanu</td>
                            <td class="column">9:00</td>
                            <td class="column">Project x - does that</td>
                        </tr>
                        <tr>
                            <td class="column">Darabana Robert</td>
                            <td class="column">Lect. dr. Cristian Frasinaru</td>
                            <td class="column">9:20</td>
                            <td class="column">Project x - does that</td>
                        </tr>
                        <tr>
                            <td class="column">Iie Paul</td>
                            <td class="column">Lect. dr. Alex Moruz</td>
                            <td class="column">10:00</td>
                            <td class="column">Project x - does that</td>
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

<script src="javascript/responsive-dashboard.js"></script>
<script src="javascript/edit_committees.js"></script>
</body>
</html>
