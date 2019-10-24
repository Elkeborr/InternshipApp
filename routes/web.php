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
/* Register */
Route::get('/companies/register', 'CompanyController@register');
Route::post('/companies/register', 'CompanyController@handleRegister');

/* Login */
Route::get('/companies/login', 'CompanyController@login');
Route::post('/companies/login', 'CompanyController@handleLogin');

Route::get('/companies', 'CompanyController@index');
Route::get('/companies/{company}', 'CompanyController@show');

/* LOGIN & REGISTER */
Route::get('/login', 'LoginController@index');
Route::get('/register', 'RegisterController@index');

/*Users */
Route::get('/students', 'StudentController@index');
Route::get('/students/{student}', 'StudentController@show');

Auth::routes();

/* Internships */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/internships', 'InternshipController@index');
Route::get('/internships/{internship}', 'InternshipController@show');

/* Apply */
Route::get('/internships/{internship}/apply', 'JobApplicationController@apply');

/* Applies */
Route::get('/internships/applies', 'JobApplicationController@applies');

/* Facebook login */
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');
