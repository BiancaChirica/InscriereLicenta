<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: Individual Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 -->

    <link rel="stylesheet" href="{{ asset('css/global.css')}}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{ asset('css/edit_committees.css')}}">
    <link rel="stylesheet" href="{{ asset('css/label-input.css')}}">
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
    <link rel="stylesheet" href="{{ asset('css/table.css')}}">

    <script src="{{ asset('js/JQuery.js') }}"></script>
    <script src="{{ asset('js/responsive-dashboard.js') }}"></script>


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
                <h1>Individual results are as follows:</h1>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                @if(isset($message))
                <div class="alert alert-warning"> {{ $message }} </div>
                @endif

                @if(isset($Errormessage))
                <div class="alert alert-danger"> {{ $Errormessage }} </div>
                @endif


                @if(isset($profs))
                <h1>The committee that assessed your license project</h1>
                <div class="table-students" style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>Last name</th>
                                <th>First name </th>
                                <th>Email</th>
                                <th>Degree</th>
                            </tr>
                        </thead>
                        <tbody>


                         <?php foreach($profs as $prof) :  ?>
                            <tr>
                                <td class="column"><?= $prof->nume ?></td>
                                <td class="column"><?= $prof->prenume ?></td>
                                <td class="column"><?= $prof->email ?></td>
                                <td class="column"><?= $prof->grad_didactic ?></td>
                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>

                @endif


                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                @if(isset($grade))
                <h1>Grades</h1>
                <div class="table-students" style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                              <th>Specializarea</th>
                              <th>Nota Teorie</th>
                              <th>Nota lucrare</th>
                              <th>Nota finala</th>
                              <th>Rezultat</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="column">Informatica</td>
                          <td class="column"> <?= $grade['nota_teorie'] ?> </td>
                          <td class="column"><?= $grade['nota_lucrare'] ?></td>
                          <td class="column"><?= $grade['nota_finala'] ?></td>
                          <td class="column"><?= $grade['rezultat'] ?></td>
                      </tr>
                  </tbody>
              </table>
          </div>
          @endif
      </div>
  </div>


<div class="footer">
    <p>© 1992-2019 Faculty of Computer Science, University "Alexandru Ioan Cuza" from Iasi, Romania.</p>
    <p>All rights reserved.</p>
</div>


</body>
</html>
