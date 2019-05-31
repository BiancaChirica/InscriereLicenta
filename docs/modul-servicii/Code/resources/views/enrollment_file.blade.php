<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: Enrollment File</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit_committees.css') }}">
    <link rel="stylesheet" href="{{ asset('css/label-input.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/acc_manager.css') }}">
    <link rel="stylesheet" href="{{ asset('css/enrollment_file.css') }}">

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
            <h1>Dosarul de înscriere</h1>
            <p>Va conține următoarele acte pentru susținerea licenței:</p>
            <ol class="steps">
                <li>Cerere de înscriere (formularul poate fi ridicat de la secretariat sau se poate descărca de <a
                            href="http://profs.info.uaic.ro/~webdata/anunturi/formular%20inscriere%20LICENTA%20feb%202019.doc">aici</a>
                    ).
                </li>
                <li>Fișa de lichidare (formularul poate fi ridicat de la secretariat sau se poate descărca de <a
                            href="http://profs.info.uaic.ro/~webdata/anunturi/fisa%20de%20lichidare.doc">aici</a> ).
                </li>
                <li>Copie după certificatul de naștere.</li>
                <li>Copie după certificatul de căsătorie sau documentul care atestă schimbarea numelui.</li>
                <li>Copie după actul de identitate.</li>
                <li>Situația școlară (se eliberează de la Baze de date, cam. 201 - document ce se folosește doar în
                    vederea susținerii examenului de licență).
                </li>
                <li>Diploma de bacalaureat, în original.</li>
                <li>Chitanța de plata a taxei de repetare a examenului de licență (unde este cazul).</li>
                <li>Un exemplar din lucrarea de licență - format A4, broșat, cu paginile numerotate (lucrarea se
                    redactează și se susține în limba de predare a programului de studii), avizată de coordonatorul
                    științific și însoțită de <a
                            href="http://profs.info.uaic.ro/~webdata/anunturi/Anexa%201%20-%20Declaratie%20plagiat.docx">Declarația
                        de originalitate</a>; aceasta este identică cu Anexa 4 din Ghidul de Licență.
                </li>
                <li>Dosar plic.</li>
                <li>Candidații trebuie să completeze obligatoriu și formularul online de înscriere care poate fi gasit
                    <a href="license_form">aici</a>.
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="footer">
    <p>© 1992-2019 Faculty of Computer Science, University "Alexandru Ioan Cuza" from Iasi, Romania.</p>
    <p>All rights reserved.</p>
</div>
</body>
</html>
