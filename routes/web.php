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

/*COMPANIES*/
Route::get('/companies', 'CompanyController@index');

/* LOGIN & REGISTER */
Route::get('/login', 'LoginController@index');
Route::get('/register', 'RegisterController@index');

/*Users */
Route::get('/users', function () {
    $user = \DB::table('users')->get();
    dd($user);

    return view('users/users', $data);
});
