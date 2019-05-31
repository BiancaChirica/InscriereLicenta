<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard: Edit License</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/edit_news.css') }}" >
    <link rel="stylesheet"  href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/label-input.css') }}">
    <script src="{{ asset('js/JQuery.js') }}"  ></script> 
    <script src="{{ asset('js/responsive-dashboard.js') }}" ></script>
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

                <div class="card" style="height: 31rem;">
                    <h5 class="card-header bg-info text-center">
                        Edit license info
                    </h5>

                    <div class="card-body px-lg-5 pt-0">


                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            <ul>

                                <li>{{ Session::pull('messageInfo', 'default') }}</li>

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

                        @if(!isset($data))
                        <form action="{{URL::to('/edit_license')}}" method="POST" class="text-left" style="color: #757575;" id="add-news-form">
                          {{ csrf_field() }}

                          <div class="md-form">

                            <label for="materialLoginFormEmail">News id:</label>
                            <textarea name="News-id" class="form-control" id="ta-id" rows="1" ></textarea>
                        </div>

                        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">
                            Edit
                        </button>
                    </form>
                    @endif

                    @if(isset($data))
                    <form action=" {{URL::to('/edit_license/save')}} " method="POST" class="text-left" style="color: #757575;" id="add-news-form">
                      {{ csrf_field() }}

                      <input type="hidden" name="ta-id" value = "{{ $data->id }} ">

                      <div class="md-form">

                        <label for="materialLoginFormEmail">Title:</label>
                        <textarea name="title" class="form-control" id="ta-title" rows="1"> {{ $data->titlu}}</textarea>
                    </div>


                    <div class="md-form">

                        <label for="materialLoginFormPassword">Content:</label>
                        <textarea name="content" class="form-control" id="ta-content" rows="3">{{ $data->content}}</textarea>

                    </div>

                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">
                        Save
                    </button>
                    <button formaction="{{URL::to('/edit_license/delete')}}" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">
                        Delete
                    </button>




                </form>
                @endif
            </div>
        </div>

    </div>
</div>
</div>

<div class="footer">
    <p>© 1992-2019 Faculty of Computer Science, University "Alexandru Ioan Cuza" from Iasi, Romania.</p>
    <p>All rights reserved.</p>
</div>

<script src="{{ asset('js/login-box.js') }}"></script>

</body>

</html>
