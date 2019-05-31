<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>DashBoard: Edit accounts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="{{ asset('css/global.css')}}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css')}}">
  <link rel="stylesheet" href="{{ asset('css/create_new_account.css')}}">
  <link rel="stylesheet" href="{{ asset('css/label-input.css')}}">
  <link rel="stylesheet" href="{{ asset('css/index.css')}}">
  <link rel="stylesheet" href="{{ asset('css/table.css')}}">
  <link rel="stylesheet" href="{{ asset('css/edit_accounts.css')}}">
</head>
<body>
  <div id="dashboard-content">
    <div id="header">
      <div class="logo"><a href="#"><img src="{{ asset('logo-university.png')}}" alt="Logo-license"></a></div>
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
                <li><a href="edit_news">Edit news</a></li>/
            <li><a href="distribution">Distribution</a></li>
                <li><a href="index">Log out</a></li>
        </ul>
      </div>


      <div class="content">
        <h1>Edit account students : </h1>



        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif


        @if(Session::has('messageEditAccounts'))
        <div class="alert alert-success">
          <ul>
            <li>{{ Session::pull('messageEditAccounts', 'default') }}</li>
          </ul>
        </div>
        @endif



        <?php
        if(isset($account_edit)) { ?>
        <div id="myDIV" >
         <form action="{{URL::to('/edit_accounts_save_studs')}}" method="post">
          {{ csrf_field() }}          
  
    <input type="hidden" name="id" value = " <?= $account_edit->id ; ?> ">
  <br>
   <label for="materialLoginFormEmail">Id comisie:</label> 
    <input type="text" class="form-control" name="id_comisie" value = " <?= $account_edit->id_comisie ; ?> ">
  <br>
 <label for="materialLoginFormEmail"> Id profesor: </label>
    <input type="text" class="form-control" name="id_prof" value = " <?= $account_edit->id_prof ; ?> ">
  <br>
  <label for="materialLoginFormEmail"> Numar matricol: </label>
    <input type="text" class="form-control" name="nr_matricol" value = " <?= $account_edit->nr_matricol ; ?> ">
  <br>
  <label for="materialLoginFormEmail">Nume:</label>

    <input type="text" class="form-control" name="nume" value = " <?= $account_edit->nume ; ?> ">
<br>
    <label for="materialLoginFormEmail">Prenume:</label>

    <input type="text" class="form-control" name="prenume" value = " <?= $account_edit->prenume ; ?> ">
<br>
<label for="materialLoginFormEmail">Repository:</label>

    <input type="text" class="form-control" name="repository" value = " <?= $account_edit->repository ; ?> ">
<br>

 <label for="materialLoginFormEmail"> Email:</label>

    <input type="text" class="form-control" name="email" value = " <?= $account_edit->email ; ?> ">
<br>
  <label for="materialLoginFormEmail"> Parola:</label>

    <input type="text" class="form-control" name="parola" value = " <?= $account_edit->parola; ?> ">
<br>
<label for="materialLoginFormEmail">Email optional:</label>

    <input type="text" class="form-control" name="email_optional" value = " <?= $account_edit->email_optional ; ?> ">

          <br>
           <button type="submit" value="Submit" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" > Save
           </button>
        </form> 
      </div>
      <?php }; ?>

    </div>
  </div>

</div>

<div class="footer">
    <p>© 1992-2019 Faculty of Computer Science, University "Alexandru Ioan Cuza" from Iasi, Romania.</p>
    <p>All rights reserved.</p>
</div>


<script src="{{ asset('js/responsive-dashboard.js')}}"></script>
<!--<script src="{{ asset('js/hover-button.js')}}"></script>
-->
</body>
</html>
