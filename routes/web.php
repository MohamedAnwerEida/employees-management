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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group([  'prefix'=>'/employees'],function(){
    Route::get('/', 'EmployeesManagementController@index');
    Route::get('/add', 'EmployeesManagementController@add');
    Route::post('/insert', 'EmployeesManagementController@insert');
    Route::get('/edit/{id}', 'EmployeesManagementController@edit');
    Route::get('/delete/{id}', 'EmployeesManagementController@delete');
    Route::post('/update/{id}', 'EmployeesManagementController@update');
});
Route::group([  'prefix'=>'/reports'],function(){
    Route::get('/', 'ReportsController@index');
    Route::get('/view/{id}', 'ReportsController@view');
    Route::get('/export/{id}', 'ReportsController@export');
});
Route::group(['middleware' => [ 'auth' ], 'prefix'=>'/registration'],function(){
    Route::get('/', 'RegistrationController@index');
    Route::get('/attendance_registration', 'RegistrationController@attendance_registration');
    Route::get('/exist_registration', 'RegistrationController@exist_registration');
    Route::get('/temprory_out_registration', 'RegistrationController@temprory_out_registration');
    Route::get('/return_registration', 'RegistrationController@return_registration');
});

