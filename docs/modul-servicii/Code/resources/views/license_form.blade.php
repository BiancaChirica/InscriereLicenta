<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard: License Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit_license.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/license_form.css') }}">
    <script src="javascript/JQuery.js"></script>
    <script src="javascript/responsive-dashboard.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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


        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <h3>FII - Înscriere online la examenul de finalizare a studiilor de licență, sesiunea februarie
                        2019</h3>
                    <p>Acesta este un formular de înscriere online a candidaţilor pentru examenul de finalizare a
                        studiilor de licență din sesiunea iulie 2019, la Facultatea de Informatică, Universitatea
                        "Alexandru Ioan Cuza" din Iaşi. Înscrierea online NU înlocuieşte înscrierea la secretariatul
                        facultăţii.
                        Motivul pentru care vă înscrieți și electronic este legat de buna desfășurare și organizare
                        a examenului de licență, pentru procesarea mai rapidă a rezultatelor dumneavoastră.


                        Datele cu caracter personal colectate în urma înscrierii online vor fi păstrate doar pe
                        durata desfășurării examenului de licență. Nu vom partaja datele dumneavoastră cu caracter
                        personal cu terțe părți.</p>
                </div>
                <div class="col-md-9 register-right">
                    <div class="tab-content" id="myTabContent">
                        <h3 class="register-heading">Formular de inscriere</h3>
                        <div class="row register-form">
                            <div class="col-md-12">
                                <p class="subtitle fancy"><span>Adresa de email de pe info.uaic.ro
                                        </span></p>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email address *"
                                           value=""/>
                                </div>
                                <p class="subtitle fancy"><span>Date personale despre candidat
                                        </span></p>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Numele de familie (conform certificatului de naștere) *"
                                           value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Prenumele complet, exact cum apare în cartea dumneavoastră de identitate *"
                                           value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Numele de familie (după căsătorie, dacă e cazul)*" value=""/>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Inițiala tatălui (mamei, în caz special) *</option>
                                        <option value="1">A</option>
                                        <option value="2">B</option>
                                        <option value="3">C</option>
                                        <option value="4">D</option>
                                        <option value="5">E</option>
                                        <option value="6">F</option>
                                        <option value="7">G</option>
                                        <option value="8">H</option>
                                        <option value="9">I</option>
                                        <option value="10">J</option>
                                        <option value="11">K</option>
                                        <option value="12">L</option>
                                        <option value="13">M</option>
                                        <option value="14">N</option>
                                        <option value="15">O</option>
                                        <option value="16">P</option>
                                        <option value="17">Q</option>
                                        <option value="18">R</option>
                                        <option value="19">S</option>
                                        <option value="20">T</option>
                                        <option value="21">U</option>
                                        <option value="22">V</option>
                                        <option value="23">W</option>
                                        <option value="24">X</option>
                                        <option value="25">Y</option>
                                        <option value="26">Z</option>

                                    </select>
                                </div>
                                <p class="subtitle fancy"><span>Date de contact ale candidatului
                                        </span></p>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Adresa de e-mail alternativă (Gmail, Yahoo etc) *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="10" maxlength="10" name="txtEmpPhone"
                                           class="form-control" placeholder="Număr de telefon *" value=""/>
                                </div>
                                <p class="subtitle fancy"><span>Date despre lucrarea de licența
                                        </span></p>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Titlul lucrării de licență *
                                            " value=""/>
                                </div>
                                <select class="custom-select" id="inputGroupSelect02">
                                    <option selected>Îndrumătorul lucrării de licenţă</option>
                                    <option value="1">Lenuta Alboaie(Conf.dr.)</option>
                                    <option value="2">Nicoleta Armanu(Lect.dr.)</option>
                                    <option value="3">Razvan Benchea(Lect.dr.)</option>
                                </select>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Link către repository/folder unde se poate găsi online arhiva cu lucrarea de licență *"
                                           value=""/>
                                </div>
                                <p class="subtitle fancylong"><span>Discipline la alegere pentru susținerea probei
                                            orale
                                        </span></p>
                                <div class="form-group">
                                    <p>Pentru susținerea probei orale a examenului de licență, va trebui să alegeți
                                        exact patru discipline diferite din lista de mai jos. Comisia va alege două
                                        discipline (dintre acestea), de unde veți primi câte o întrebare (pentru
                                        5-10 minute).</p>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Algoritmica grafurilor</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Arhitectura calculatoarelor şi
                                            sisteme de operare</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Baze de date</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Calcul numeric</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Fundamente algebrice ale
                                            informaticii</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Grafică pe calculator</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Ingineria programării</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Inteligență artificială</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Învățare automată</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Limbaje formale, automate şi
                                            compilatoare</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Logică pentru informatică</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Probabilităţi şi statistică</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Programare avansată</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Programare orientată-obiect</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Proiectarea algoritmilor</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Reţele de calculatoare</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Securitatea informaţiei</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Sisteme de operare</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Structuri de date</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""> Tehnologii web</label>
                                    </div>
                                </div>
                                <input type="submit" class="btnRegister" value="Submit"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>


<div class="footer">
    <p>© 1992-2019 Faculty of Computer Science, University "Alexandru Ioan Cuza" from Iasi, Romania.</p>
    <p>All rights reserved.</p>
</div>

<script src="javascript/login-box.js"></script>

</body>

</html>
