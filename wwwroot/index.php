<!DOCTYPE html>
<html lang="en">
<head>
    <title>UAIC licenta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/label-input.css">
</head>
<body>

<div id="header">
    <div class="logo"><a href="index.php"><img src="image/logo-university-small.png" alt="Logo-license"></a></div>
    <div class="header-right">
        <a class="button" onclick="document.getElementById('login').style.display='block'">Login</a>
        <a class="button" href="register.php">Register</a>
    </div>
</div>

<div id="login" class="box">
    <form class="box-content animate">
        <div class="container-login">
            <div class="content-login">
                <h1 align="center">Login</h1>
                <hr>
            </div>
            <div class="form">
                <input type="text" name="username" placeholder="" autocomplete="off" required/>
                <label class="label">
                    <span class="content-span">Username</span>
                </label>
            </div>
            <div class="form">
                <input type="password" name="password" placeholder="" autocomplete="off" required/>
                <label class="label">
                    <span class="content-span">Password</span>
                </label>
            </div>
            <span class="forgot-pass"><a href="#">Forgot password?</a></span>
            <button type="submit" style="width: 100%">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
        <div class="register_using">
            <span>Or Register Using</span>
            <span><a href="register.php">REGISTER</a></span>
        </div>
    </form>
</div>
<div id="main" class="main">
    <div id="main-content" class="main-content">
        <div class="main-title">
            <h2>Inscriere pentru examenul de finalizare a studiilor de licenta</h2>
            <hr>
        </div>
        <div class="all-news">
            <div class="news">
                <div class="news-top">News</div>
                <div class="news-info">
                    <h3>Rezultate examenului de finalizare: </h3>
                    <div class="comisie-rezultate">
                        <a href="#">Comisie 1</a>
                        <a href="#">Comisie 2</a>
                        <a href="#">Comisie 3</a>
                        <a href="#">Comisie 4</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="all-information">
            <div class="information-license">
                <h2>Inscrierea pentru examenul de finalizare a studiilor de licenta</h2>
                <div class="information-content">
                    <p>Candidatii trebuie sa se autentifice pe site cu un cont valid al domeniului facultatii de
                        informatica si trebuie sa completeze formularul online de inscriere, termen:
                        <a> 12/12/2019, ora 12:00</a>. In formular vor trebui mentionate, intre alte informatii,
                        optiunile pentru disciplinele la care se va sustine proba orala.</p>
                </div>
                <h2>Conditii de inscriere</h2>
                <div class="information-content">
                    <ul><> Promovarea tuturor disciplinelor, conform planului de invatamant</ul>
                    <ul><> Achitarea integrala a tuturor categoriilor de taxe (taxe de scolarizare, de refacere
                        activitate
                        didactica etc. -dupa caz).
                    </ul>
                </div>
            </div>
            <div class="all-committees" style="margin-bottom: 100px">
                <h2 class="subtitle">Committees composition</h2>
                <div class="committees-info">
                    <div class="committee">
                        <h4 class="committee-number">Committees 1</h4>
                        <div class="composition-committee" style="display: none;">
                            <p>Conf. dr. Stefan CIOBACA - presedinte</p>
                            <p>Lect. dr. Paula ONOFREI - secretar</p>
                            <p>Conf. dr. Madalina RASCHIP - membru</p>
                            <p>Lect. dr. Vlad RADULESCU - membru</p>
                        </div>
                    </div>
                    <div class="committee">
                        <h4 class="committee-number">Committees 2</h4>
                        <div class="composition-committee" style="display: none;">
                            <p>Conf. dr. Stefan CIOBACA - presedinte</p>
                            <p>Lect. dr. Paula ONOFREI - secretar</p>
                            <p>Conf. dr. Madalina RASCHIP - membru</p>
                            <p>Lect. dr. Vlad RADULESCU - membru</p>
                        </div>
                    </div>
                    <div class="committee">
                        <h4 class="committee-number">Committees 3</h4>
                        <div class="composition-committee" style="display: none;">
                            <p>Conf. dr. Stefan CIOBACA - presedinte</p>
                            <p>Lect. dr. Paula ONOFREI - secretar</p>
                            <p>Conf. dr. Madalina RASCHIP - membru</p>
                            <p>Lect. dr. Vlad RADULESCU - membru</p>
                            <p>Prof. dr. Andrei Arusoaie - membru</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="footer">
    <p>© 1992-2019 Faculty of Computer Science, University "Alexandru Ioan Cuza" from Iasi, Romania.</p>
    <p>All rights reserved.</p>
</div>

<script src="javascript/login-box.js"></script>
<script src="javascript/index.js"></script>
</body>
</html>
