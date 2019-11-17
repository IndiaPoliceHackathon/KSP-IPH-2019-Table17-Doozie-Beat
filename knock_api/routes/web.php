<?php

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
return view('welcome');
});


Route::get('/', ['as' => 'home', 'uses' => 'knock\DashboardController@index', 'middleware' => ['auth']]);
Route::get('/fapp/{my_schedule_id}', ['as' => 'fapp', 'uses' => 'knock\DashboardController@fapp', 'middleware' => ['auth']]);

Route::group(['namespace' => 'Auth'], function () {
	Route::get('login', ['as' => 'login', 'uses' => 'AuthController@showLogin']);
	Route::post('login', ['as' => 'postLogin', 'uses' => 'AuthController@doLogin']);
	Route::get('sign_out', ['as' => 'sign_out', 'uses' => 'AuthController@signOut']);
	Route::get('change_password', ['as' => 'change_password', 'uses' => 'AuthController@changePassword']);
	Route::post('update_password', ['as' => 'updatePassword', 'uses' => 'AuthController@updatePassword']);
	Route::get('set_financial_year', ['as' => 'set_financial_year', 'uses' => 'AuthController@setFinancialYear']);
});
Route::group(['prefix' => 'knock', 'namespace' => 'knock'], function () {
Route::group(['prefix' => 'masters', 'namespace' => 'masters'], function () {
	Route::resource('designation', 'DesignationController');
	Route::resource('police_station', 'PoliceStationController');
	Route::resource('police_member', 'PoliceMemberController');
	Route::resource('beat', 'BeatController');
	Route::resource('schedule_beat', 'ScheduleBeatController');
});
Route::resource('my_schedule', 'MyScheduleController');
Route::group(['prefix' => 'reports', 'namespace' => 'reports'], function () {
	Route::resource('pending_beats', 'PendingBeatsController');
	Route::resource('completed_beats', 'CompletedBeatsController');
});

Route::post('/update_designation/', ['as' => 'designation.updateDesignation', 'uses' => 'DesignationController@updateDesignation']);
Route::get('/designation/deactivate/{id}', ['as' => 'designation.deactivate', 'uses' => 'DesignationController@deactivate']);
});

function getFormatedDate($date)
{
	$formated_date = date("d F Y", strtotime($date));
	return $formated_date;
}