<?php
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProfsEditStudents;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});
//Dashboards routes
Route::get('/admin_dashboard', 'NewsController@admin_index');
Route::get('/profs_dashboard', 'NewsController@prof_index');
Route::get('/user_dashboard', 'NewsController@stud_index');

Route::get('/register', function () {
    return view('register');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//account_manager_admin
Route::get('/account_manager', 'AccountManagerController@index_admin');//->middleware('auth');

Route::post('/account_manager', 'AccountManagerController@update_admin');//->middleware('auth');


//create new account routes
Route::get('/create_new_account','CreateNewAccountController@display_teachers');
Route::post('/create_new_account','CreateNewAccountController@create_new_account')->name('create_new_account');


//edit_committess
Route::POST('/submitCommittee','EditCommitteesController@submitCommittee');
Route::GET('/edit_committees{tip}','EditCommitteesController@display_committees')->name('edit.committees');
Route::GET('/edit_committees','EditCommitteesController@display_committees_all')->name('edit.committees.all');
Route::GET('/committee_delete{id}','EditCommitteesController@committee_delete')->name('committee.delete');

//for edit accounts
Route::get('/edit_accounts', 'EditAccountsController@edit_accounts');

// display
Route::get('/edit_accounts_profesori', 'EditAccountsController@display_accounts_p' );
Route::get('/edit_accounts_studenti', 'EditAccountsController@display_accounts_s' );



// for profs delete,edit,save
Route::get('/edit_accounts_delete_profs{id}', 'EditAccountsController@destroy_profs')->name('accountp.delete');
Route::get('/edit_accounts_edit_profs{id}', 'EditAccountsController@edit_profs')->name('accountp.edit');
Route::post('/edit_accounts_save_profs', 'EditAccountsController@save_acc_profs');



//for students delete, edit, save
Route::get('/edit_accounts_delete_studs{id}', 'EditAccountsController@destroy_studs')->name('accounts.delete');
Route::get('/edit_accounts_edit_studs{id}', 'EditAccountsController@edit_studs')->name('accounts.edit');
Route::post('/edit_accounts_save_studs', 'EditAccountsController@save_acc_studs');


//add_news
Route::get('/insert_license', 'AddNewsController@home');
Route::post('/insert_license', 'AddNewsController@insert_license_info');


//edit news
Route::get('/edit_news', 'infoController@edit_news');	
Route::post('/edit_news','infoController@search_news_info' );

Route::post('/edit_news_save', 'infoController@update_news_info');
Route::post('/edit_news_delete', 'infoController@delete_news_info' );

Route::get('/distribution',function () {
    return view('distribution');
});

//exam_rules
Route::get('/exam_rules',function () {
    return view('exam_rules');
});


//enrollment_file
Route::get('/enrollment_file',function () {
    return view('enrollment_file');
});


// individual results
Route::get('/individual_result', 'IndividualResultsController@individual_result');


//license_form
Route::get('/license_form',function () {
    return view('license_form');
});


//exam schedule
Route::get("/exam_schedule",'ComisiiController@display_comisii');


//account_manager_user
Route::get('/account_manager_user', 'AccountManagerController@index_user');//->middleware('auth');

Route::post('/account_manager_user', 'AccountManagerController@update_user');//->middleware('auth');


//Profs Routes
Route::get('/edit_students/{id}', 'ProfsEditStudents@show');

Route::get('/view_program', function () {
    return view('view_program');
});
Route::get('/view_program/{id}', 'ProfsProgramController@show');
