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

//Route::get('/', function () {
//    return view('auth.login');
//});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
    Route::resource('profiles', 'ProfilesController');
    Route::resource('companies', 'CompaniesController');
    Route::resource('clients', 'ClientsController');
    Route::resource('comments', 'CommentsController');
    Route::resource('tasks', 'TasksController');
    Route::resource('orders', 'OrdersController');
    Route::post('searchclient', 'SearchController@searchClient');
    Route::get('clients/sbyl/{letter}', 'ClientsController@searchByLetter')->name('sbyl');
    Route::resource('files', 'FilesController');
    Route::post('changepassword/{id}', 'UsersController@changePassword');
});