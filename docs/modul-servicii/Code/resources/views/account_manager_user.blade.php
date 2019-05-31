<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: Account Manager User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit_committees.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/label-input.css') }}">
    <link rel="stylesheet" href="{{ asset('css/acc_manager.css') }}">


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
                <li><a class="selected" href="user_dashboard">Dashboard</a></li>
                <li><a href="exam_rules"> Exam rules</a></li>
                <li><a href="enrollment_file"> Enrollment file</a></li>
                <li><a href="individual_result"> Individual results</a></li>
                <li><a href="license_form"> License form</a></li>
                <li><a href="exam_schedule"> Exam schedule</a></li>
                <li><a href="account_manager_user">Account Manager</a></li>
                <li><a href="index">Log out</a></li>
            </ul>
        </div>


        <div class="content">
        <?php if(isset($student)) { ?>
            <h1>Account manager</h1>
            <p style="padding-left:10px;">Welcome. You have the possibility to change</p>
            <p style="padding-left:10px;">certain personal profile information.</p>
            <div style="text-align:center;padding-left:30px">
                <div class="card" style="float:center-right";>
                    <div class="card-header" style="background-image: url(image/student.png)">
                        <div class="card-header-slanted-edge">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 200">
                                <path class="polygon" d="M-20,200,1000,0V200Z"/>
                            </svg>
                            <!--
                            <a onclick="document.getElementById('add-account').style.display='block'"
                               class="btn-edit"><span>ADD</span></a>

                            <div id="add-account" class="box">
                                <form class="box-content animate">
                                    <div class="container-login">
                                        <div class="content-login">
                                            <h1 align="center">IMPORTANT</h1>
                                            <hr>
                                        </div>
                                        <div class="form">
                                            <input type="text" name="project-name" placeholder="" autocomplete="off" required/>
                                            <label class="label">
                                                <span class="content-span">Project name</span>
                                            </label>
                                        </div>
                                        <div class="form">
                                            <input type="text" name="first-name" placeholder="" autocomplete="off" required/>
                                            <label class="label">
                                                <span class="content-span">Repository Link</span>
                                            </label>
                                        </div>
                                        <button type="button" class="button-append">Append</button>
                                    </div>
                                </form>
                            </div>
                            -->

                        </div>
                    </div>


                        <div class="card-body">
                            <h2 class="name"> <?= $student->nume . ' ' . $student->prenume; ?> </h2>
                            <div><h2 class="name"> <?= $student->nr_matricol; ?> </h2></div>
                            <div><h2 class="name"> <?= $student->email; ?> </h2></div>
                            <div><h2 class="name"> <?= $student->id_comisie; ?> </h2></div>
                        </div>

                        <div class="card-footer">
                            <div class="stats">
                                <div class="stat">
                                    <span class="label">Registered</span>
                                    <span class="value">Date</span>
                                </div>
                                <div class="stat">
                                    <span class="label">Repository</span>
                                    <span class="value"><a href="<?= $student->repository; ?>">Link</a> </span>
                                </div>
                            </div>
                        </div>


                </div>
                        <div id="sc-password">
                            <h1>Change Password</h1>
                            <form method="POST" action="/account_manager_user">
                                {{ csrf_field() }}

                                <div class="sc-container" style="padding-bottom:100px";>
                                    <input type="text" placeholder="Enter new password" name="password" />
                                    <input type="submit" value="Set New Password" />
                                </div>
                            </form>
                        </div>

            </div>
        <?php }; ?>
        </div>

        @if(Session::has('message'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::pull('message', 'default') }}</li>
                </ul>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

    <div class="footer">
    <p>© 1992-2019 Faculty of Computer Science, University "Alexandru Ioan Cuza" from Iasi, Romania.</p>
    <p>All rights reserved.</p>
</div>
</body>
</html>
