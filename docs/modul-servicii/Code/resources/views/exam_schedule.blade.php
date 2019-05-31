<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: Exam Schedule</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit_committees.css') }}">
    <link rel="stylesheet" href="{{ asset('css/label-input.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">

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
            @if(isset($mesaj))
                <div class="alert alert-warning"> {{ $mesaj }} </div>
            @endif
           
            @if(isset($programari) && isset($nr_comisie))
            <?php foreach ($nr_comisie as $nrcomisie) : ?>
            <h1>Comisia <?= $nrcomisie->id; ?> Sala <?= $nrcomisie->nume_sala; ?>:</h1>
            

            <div class="table-students" style="overflow-x:auto;">
                <table>
                    <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Coordonator</th>
                        <th>Ora</th>
                        <th>Data</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                        <?php foreach ($programari as $program) : ?>
                        <?php if($nrcomisie->id == $program->s_comisie) : ?>
                        <tr>
                        <td class="column"><?= $program->s_studn; ?> </td>
                        <td class="column"><?= $program->s_studp; ?></td>
                        <td class="column"><?= $program->p_profn; ?> <?= $program->p_profp; ?></td>
                        <td class="column"><?= $program->o_ora; ?></td>
                        <td class="column"><?= $program->o_data; ?></td> 
                    </tr>
                     <?php endif; ?>
                     <?php endforeach; ?>
                   
                    
                     </tbody>
                </table> 

             </div> 
            <?php endforeach; ?>
            @endif
        </div>
    </div>
</div>
<div class="footer">
    <p>© 1992-2019 Faculty of Computer Science, University "Alexandru Ioan Cuza" from Iasi, Romania.</p>
    <p>All rights reserved.</p>
</div>

<script src="js/responsive-dashboard.js"></script>
    <script src="js/edit_committees.js"></script>
</body>
</html>