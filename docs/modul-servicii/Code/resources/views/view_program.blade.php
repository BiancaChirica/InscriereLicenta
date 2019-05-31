<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: View program</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/label-input.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/view_program.css') }}">

</head>
<body>
<div id="dashboard-content">
    <div id="header">
        <div class="logo"><a href=""><img src={{ asset('image/logo-university.png') }} alt="Logo-license"></a></div>
    </div>

    <div class="close-bar">
        <a class="home">HOME</a>
    </div>

    <div class="container-admin" id="container">
        <div class="left-bar" style="font-family: 'Roboto Condensed', sans-serif;">
            <ul id="nav">
                <li><a class="selected" href="profs_dashboard">Dashboard</a></li>
                <li><a href="#">Professor Program</a></li>
                <li><a href="edit_students">Edit Students</a></li>
                <li><a href="index">Log out</a></li>
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
                <div>Committee {{$profesor->comisie->id}}</div>
                </div>
                <div class="group-info"><label class="label-info">Composition: </label>
                    <div>
                        @foreach ($profesor->comisie->profesori as $prof)
                            <div class="committee-info"><p class="p-name">{{$prof->nume}} {{$prof->prenume}}</p>
                            <p class="p-degree">{{$prof->rol}}</p></div>
                        @endforeach
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
                        @foreach ($profesor->comisie->studenti as $student)
                            <tr>
                            <td class="column">{{$student->nume}} {{$student->prenume}}</td>
                                <td class="column">{{$student->email}}</td>
                                <td class="column">B5</td>
                                <td class="column">{{$student->orar->ora}}</td>
                            </tr>
                        @endforeach
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
