<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset ('css/global.css')}}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="javascript/API.js"></script>
    <script src="javascript/JQuery.js"></script>
    {{-- <script src="javascript/responsive-dashboard.js"></script> --}}
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
        <div class="left-bar">
            <ul id="nav">
                   <li><a class="selected" href="admin_dashboard">Dashboard</a></li>
                <li><a href="account_manager">Account Manager</a></li>
                <li><a href="create_new_account">Create new account</a></li>
                <li><a href="edit_committees">Edit committees</a></li>
                <li><a href="edit_accounts">Edit accounts</a></li>
                <li><a href="insert_license">Add news</a></li>
                <li><a href="edit_news">Edit news</a></li>
                <li><a href="distribution">Distribution</a></li>
                <li><a href="index">Log out</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Dashboard</h1>
            <p>information stuff</p>
            @foreach($news as $newsItem)
            <div class="box">
                <div class="box-top">{{$newsItem->titlu}}</div>
                <div class="box-info">
                    {{$newsItem->content}}
                </div>
            </div>
            @endforeach
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
