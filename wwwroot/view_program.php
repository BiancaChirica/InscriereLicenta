<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: View program</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/label-input.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/view_program.css">

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
                <li><a class="selected" href="profs_dashboard.php">Dashboard</a></li>
                <li><a href="view_program.php">Professor Program</a></li>
                <li><a href="edit_students.php">Edit Students</a></li>
                <li><a href="index.php">Log out</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Professor Program</h1>
            <p>Here you can see programmed students, plus information about the committee and day the exam is held.</p>

            <div class="information-prof">
                <div class="group-info"><label class="label-info">Name: </label>
                    <div>Diac Mihai</div>
                </div>
                <div class="group-info"><label class="label-info">Email: </label>
                    <div>diac.mihai@info.uaic.ro</div>
                </div>
                <div class="group-info"><label class="label-info">Committee: </label>
                    <div>Committee 1</div>
                </div>
                <div class="group-info"><label class="label-info">Composition: </label>
                    <div>
                        <div class="committee-info"><p class="p-name">Diac Mihai</p>
                            <p class="p-degree">President</p></div>
                        <div class="committee-info"><p class="p-name">Gatu Cristian</p>
                            <p class="p-degree">Member</p></div>
                        <div class="committee-info"><p class="p-name">Gavrilut Dragos</p>
                            <p class="p-degree">Member</p></div>
                        <div class="committee-info"><p class="p-name">Iacob Florin</p>
                            <p class="p-degree">Secretary</p></div>
                    </div>
                </div>
            </div>
            <div class="composition-students">
                <h3>Students from the committee</h3>

                <div class="table" style="overflow-x:auto;">
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Group</th>
                            <th>Scheduling Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="column">Lupoae Eduard</td>
                            <td class="column">amunail at yahoo dot com</td>
                            <td class="column">II B5</td>
                            <td class="column">9:00</td>
                        </tr>
                        <tr>
                            <td class="column">Lupoae Eduard</td>
                            <td class="column">amunail at yahoo dot com</td>
                            <td class="column">II B5</td>
                            <td class="column">9:30</td>
                        </tr>
                        <tr>
                            <td class="column">Lupoae Eduard</td>
                            <td class="column">amunail at yahoo dot com</td>
                            <td class="column">II B5</td>
                            <td class="column">10:00</td>
                        </tr>
                        <tr>
                            <td class="column">Lupoae Eduard</td>
                            <td class="column">amunail at yahoo dot com</td>
                            <td class="column">II B5</td>
                            <td class="column">10:30</td>
                        </tr>
                        <tr>
                            <td class="column">Lupoae Eduard</td>
                            <td class="column">amunail at yahoo dot com</td>
                            <td class="column">II B5</td>
                            <td class="column">11:00</td>
                        </tr>
                        <tr>
                            <td class="column">Lupoae Eduard</td>
                            <td class="column">amunail at yahoo dot com</td>
                            <td class="column">II B5</td>
                            <td class="column">11:30</td>
                        </tr>
                        <tr>
                            <td class="column">Lupoae Eduard</td>
                            <td class="column">amunail at yahoo dot com</td>
                            <td class="column">II B5</td>
                            <td class="column">12:00</td>
                        </tr>
                        <tr>
                            <td class="column">Lupoae Eduard</td>
                            <td class="column">amunail at yahoo dot com</td>
                            <td class="column">II B5</td>
                            <td class="column">12:30</td>
                        </tr>
                        <tr>
                            <td class="column">Lupoae Eduard</td>
                            <td class="column">amunail at yahoo dot com</td>
                            <td class="column">II B5</td>
                            <td class="column">13:00</td>
                        </tr>
                        <tr>
                            <td class="column">Lupoae Eduard</td>
                            <td class="column">amunail at yahoo dot com</td>
                            <td class="column">II B5</td>
                            <td class="column">13:30</td>
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
