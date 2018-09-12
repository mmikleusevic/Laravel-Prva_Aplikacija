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


Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web','auth']],function(){
    Route::get('/home', function(){
        return view('/home');
    });
    Route::get('/dashboard', function(){
        if(Auth::user()->user_role == "Admin"){
            return view('/dashobard');
        }else{
            $users['users'] = \App\User::all();
            return view('/home', $users);
        }
    });

});
