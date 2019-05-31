<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: Edit students</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/edit_students.css">

    <link rel="stylesheet" href="css/label-input.css">
    <link rel="stylesheet" href="css/table.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.css" rel="stylesheet" type="text/css">
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
            <h1>Edit Students</h1>
            <p>You can add or delete new students from your committee.</p>

            <form id="form-students">
                <select data-placeholder="Choose student..." id="choose-student">
                    <option value></option>
                    <option value="Lupoae Eduard">Lupoae Eduard</option>
                    <option value="Vlad Adelin">Vlad Adelin</option>
                    <option value="Ilie Paul">Ilie Paul</option>
                    <option value="Antal Cosmin">Antal Cosmin</option>
                    <option value="Lupoae Eduard">Lupoae Eduard</option>
                    <option value="Vlad Adelin">Vlad Adelin</option>
                    <option value="Ilie Paul">Ilie Paul</option>
                    <option value="Antal Cosmin">Antal Cosmin</option>
                </select>
                <div class="button-select-div">
                    <button type="submit" id="button-select">Add</button>
                </div>
            </form>

            <div class="table-students" style="overflow-x:auto;">
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Group</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="column">Lupoae Eduard</td>

                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>

                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
                        <td class="column">II B5</td>
                        <td class="column-delete">DELETE</td>
                    </tr>
                    <tr>
                        <td class="column">Lupoae Eduard</td>
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
<script>
    $(document).ready(function () {
        $("#choose-student").chosen({no_results_text: "Oops, nothing found!"});
    });
</script>

<script src="javascript/responsive-dashboard.js"></script>
</body>
</html>
