<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin', function(){
	return view ('admin.index');
});


Route::group(['middleware'=>'admin'], function(){

	Route::resource('admin/users', 'AdminUsersController');

	Route::resource('admin/clients', 'AdminClientsController');

	Route::resource('admin/lists/business', 'AdminBusinessesController');

	Route::resource('admin/lists/coa', 'AdminCoasController');

});




Route::group(['middleware'=>'auth'], function(){

	Route::resource('admin/lists/vat', 'AdminVatsController');

	Route::resource('user/accounting/vat', 'UserVatsController');

	Route::resource('user/payable/vendor', 'UserVendorsController');

});

Route::get('/logbook', 'test@index');

Route::get('/documents-log', 'UIController@sample');

Route::get('/project-scheduling', function () {
    return view('proj-sched');
});
