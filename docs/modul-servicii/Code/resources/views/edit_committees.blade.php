<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard: Edit committees</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}" >
    <link rel="stylesheet" href="{{asset('css/edit_committees.css')}}">
    <link rel="stylesheet" href="{{asset('css/label-input.css')}}">
    <link rel="stylesheet" href="{{asset('css/table.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{asset('js/JQuery.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.js"></script>
    <script type="text/javascript" src="{{asset('js/API.js')}}"></script>

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


            <div class="full-area-loader" id="page-loader">
                LOADING...
            </div>

            <div class="full-area-loader semi-transparent hidden" id="save-loader">
                LOADING...
            </div>
            

            <h1>Edit committees</h1>
            <p>Insert information here..</p>
            @if(isset($mesaj_2))
<div class="alert alert-warning"> {{ $mesaj_2 }} </div>
@endif
            @if(Session::get('mesaj'))
        <div class="alert alert-success">
          <ul>
            <li>{{ Session::get('mesaj') }}</li>
          </ul>
        </div>
        @endif

            <div class="button-class">
                <a href=" {{route('edit.committees',1)}}" type="button"> LICENSE </a> 
                <a href=" {{route('edit.committees',0)}}" type="button"> DISSERTATION </a> 
            </div>
            @if(isset($professors))

            <div class="select-committees">


                <div class="status" id="ajax-status">
                </div>

                <form method="post" action="{{URL::to('/submitCommittee')}}">
                    {{csrf_field()}}
                    <div class="check-box">
                        <label class="container">License
                            <input type="radio" checked="checked" name="radio" class="check-mark" id="type-license" value="License">
                        </label>
                        <label class="container">Dissertation
                            <input type="radio" name="radio" class="check-mark" id="type-disertation" value="Dissertation">
                        </label>
                        <label>
                            Sala<input type="text" name="sala"/>
                            Ora incepere<input type="time" name="time1"/>
                            Ora sfarsire<input type="time" name="time2"/>
                        </label>
                    </div>
                    <select class="select-license" id="choose-license" name="choose-license[]" multiple>
                        <?php foreach($professors as $professor) :?>
                        <option><?= $professor->nume .' '. $professor->prenume; ?></option>
                         <?php endforeach;?>
                    </select>
                    <div class="button-select-div">
                        <button type="submit" class="button-select">Submit</button>
                    </div>
                </form>

            </div>
            @endif
            @if(isset($committees_p))
            <div style="overflow-x:auto; display: block">
                <?php $x=-1; ?>
                <?php foreach($committees_p as $committee) : ?>
                  <?php $x++; ?>

                                  <div class="table-license">
                        <div class="header-table">
                           <h3></h3>
                           <div class="table-edit-delete">
                           </div> 
                       </div> 
                       <table> 
                       <thead> 
                           <tr> 
                               <th>Name</th> 
                               <th>Email</th> 
                               <th>Degree</th> 
                               <th>Committee</th>
                               <th>Nume sala</th>
                               <th>Ora incepere</th>
                               <th>Ora sfarsire</th>
                           </tr> 
                       </thead> 
                        <tbody> 
                         @if(isset($committees_print))
                        <?php foreach($committee as $proffesors) :?>
                           <tr>
                           <td class="column"> <?= $proffesors->nume .' '. $proffesors->prenume; ?> </td>
                           <td class="column"> <?= $proffesors->email; ?> </td> 
                           <td class="column"> <?= $proffesors->grad_didactic; ?> </td> 
                           <td class="column"> <?= $proffesors->id_comisie; ?> </td> 
                           <?php foreach($committees_print as $committees_print2) :?>
                            @if($committees_print2->id == $proffesors->id_comisie)
                           <td class="column"> <?= $committees_print2->nume_sala; ?> </td>
                           <td class="column"> <?= $committees_print2->start_time; ?></td>
                           <td class="column"> <?= $committees_print2->end_time; ?></td>
                            @endif
                        <?php endforeach;?>
                           </tr> 
                        <?php endforeach;?>
                        @endif
                        <a href=" {{route('committee.delete', $proffesors->id_comisie)}}" class='btn btn-danger'> DELETE </a> 
                        
                        

                        </tbody>
                        </table>
                    </div>
    
                    <?php endforeach; ?>
            </div>
            @endif

            <div id="tables-dissertation" style="overflow-x:auto; display: none">

            </div>
        </div>
    </div>
</div>
<footer>

</footer>


<script>
    $(document).ready(function () {
        $("#choose-license").chosen();
    });
</script>

<script src="{{asset('js/responsive-dashboard.js')}}"></script>

    <script src="{{asset('js/edit_committees.js')}}"></script>

</body>
</html>
