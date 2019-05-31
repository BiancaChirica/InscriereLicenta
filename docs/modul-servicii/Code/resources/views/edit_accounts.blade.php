<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DashBoard: Edit accounts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

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
                <h1>Edit account</h1>

                <div class="button-class">
                  <form >
                    {{ csrf_field() }}

                    <button type="submit" formmethod="GET" formaction="{{URL::to('/edit_accounts_profesori')}}" class="button-table">Professors</button>

                    <button formmethod="GET" formaction="{{URL::to('/edit_accounts_studenti')}}" type="submit" class="button-table">Students</button>

                </form>
            </div>

  @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                  
                        
@if(isset($mesaj))
<div class="alert alert-warning"> {{ $mesaj }} </div>
@endif


 @if(Session::has('messageEditAccounts'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ Session::pull('messageEditAccounts', 'default') }}</li>
                            </ul>
                        </div>
                        @endif


            @if(isset($accounts_p))

            <div class="table" style="overflow-x:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Id_comisie</th>
                            <th>Nume</th>
                            <th>Prenume</th>
                            <th>Grad didactic</th>
                            <th>Rol</th>
                            <th>Email</th>
                            <th>Option</th> 

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($accounts_p as $accountp) : ?>
                            <tr>

                                <td class="column"> <?= $accountp->id_comisie; ?> </td>
                                <td class="column"> <?= $accountp->nume; ?> </td>
                                <td class="column">  <?=$accountp->prenume; ?> </td>
                                <td class="column"> <?= $accountp->grad_didactic; ?> </td>
                                <td class="column"> <?= $accountp->rol; ?> </td>
                                <td class="column"> <?= $accountp->email; ?> </td>
                                <td class="column-delete">
                                    
  <a href=" {{route('accountp.edit', $accountp->id)}} " class="btn btn-info"> EDIT  </a> 
  <a href=" {{route('accountp.delete', $accountp->id)}}" class='btn btn-danger'> DELETE </a>        

                                </td>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            @endif



            @if(isset($accounts_s))

            <div class="table" style="overflow-x:auto;">
                <table>
                    <thead>
                        <tr>
                           <th>Id comisie</th>
                           <th>Id profesor</th>
                           <th>Numar matricol</th>
                           <th>Nume</th>
                           <th>Prenume</th>
                           <th>Repository</th>
                           <th>Email</th>
                           <th>Email optional</th>                   
                           <th>Option</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php  foreach($accounts_s as $account) : ?>
                        <tr>


                          <td class="column"> <?= $account->id_comisie; ?> </td>
                          <td class="column">  <?= $account->id_prof; ?> </td>
                          <td class="column"> <?= $account->nr_matricol; ?></td>
                          <td class="column"> <?= $account->nume; ?></td>
                          <td class="column"><?=  $account->prenume; ?></td>
                          <td class="column"> <?=  $account->repository; ?></td>
                          <td class="column"><?=    $account->email; ?></td>
                          <td class="column"><?=    $account->email_optional; ?></td>
                          <td class="column-delete">
         <a href=" {{route('accounts.edit', $account->id)}} " class="btn btn-info"> EDIT  </a> 
          <a href=" {{route('accounts.delete', $account->id)}}" class='btn btn-danger'> DELETE </a>        

                          </td>


                      </tr>

                  <?php endforeach; ?>

              </tbody>
          </table>
      </div>
      @endif
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
