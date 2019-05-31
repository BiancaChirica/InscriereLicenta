<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="javascript/JQuery.js"></script>
    <script src="javascript/API.js"></script>
    {{-- <script src="javascript/responsive-dashboard.js"></script> --}}
    {{-- <script type="application/javascript">
        $(document).ready(function () {
            populateNews();
        });

        var populateNews = function () {
            $.ajax({
                url: window.API.baseUrl + 'news.json',
                method: "GET",
                success: function (response) {
                    if (window.API.validateResponse(response)) {
                        var container = $('#news-container');
                        response.data.forEach(function (news, index) {
                            container.append(
                                '<div class="box">' +
                                '    <div class="box-top">' + news.title + '</div>' +
                                '    <div class="box-info">' + news.content + '</div>' +
                                '</div>'
                            );
                        });
                        $('#page-loader').addClass('hidden');
                    } else {
                        $('#page-loader').html('ERROR! Please refresh the page!</br>[ ' + response.message + ' ]');
                    }
                },
                error: function () {
                    $('#page-loader').html('ERROR! Please refresh the page!');
                }
            });
        }
    </script> --}}
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
            {{-- <div class="full-area-loader" id="page-loader">
                LOADING...
            </div> --}}
            <h1>Dashboard</h1>
            <p>information stuff</p>

            {{-- <div id="news-container">

            </div> --}}
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
<div class="footer">
    <p>© 1992-2019 Faculty of Computer Science, University "Alexandru Ioan Cuza" from Iasi, Romania.</p>
    <p>All rights reserved.</p>
</div>
</body>
</html>
