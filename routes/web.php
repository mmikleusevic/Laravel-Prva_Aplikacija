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
/*
Route::get('/hello', function () {
    return '<h1>Hello World</h1>';
});
Route::get('/users/{id}/{name}', function($id,$name){
    return 'This is user '.$name.' with an id of '.$id;
});
*/


Route::get('/', 'HomeController@index' );

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// rute, zadatak za vježbu
Route::get('/stranica', 'MyController@metodajedan');
Route::get('/broj', 'MyController@metodadva');
Route::get('/znamenka', 'MyController@metodatri');


Route::get('/dashboard',[
    'uses'=> 'DashboardController@index',
    'as' => 'Admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::post('/dashboard/store',[
    'uses'=> 'DashboardController@assignRole',
    'as' => 'store',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);