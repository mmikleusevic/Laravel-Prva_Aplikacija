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

Route::get('/', 'HomeController@index' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

// rute, zadatak za vježbu
Route::get('/stranica', 'MyController@metodajedan')->middleware('auth');
Route::get('/broj', 'MyController@metodadva')->middleware('auth');
Route::get('/znamenka', 'MyController@metodatri')->middleware('auth');

Route::get('/dashboard',[
    'uses'=> 'DashboardController@index',
    'as' => 'Admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::post('/dashboard',[
    'uses'=> 'DashboardController@assignRole',
    'as' => 'dashboard',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::post('/dashboard',[
    'uses'=> 'DashboardController@storeUser',
    'as' => 'dashboard',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
