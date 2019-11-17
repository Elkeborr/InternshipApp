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

/* Welcome page */
Route::get('/', 'InternshipController@welcomeIndex');

/*COMPANIES*/
/* Register */
Route::get('/companies/register', 'CompanyController@register');
Route::post('/companies/register', 'CompanyController@handleRegister');

/* Login */
Route::get('/companies/login', 'CompanyController@login');
Route::post('/companies/login', 'CompanyController@handleLogin');

/*Create company*/
Route::get('/companies/detail', 'CompanyController@create');
Route::post('/companies/detail', 'CompanyController@handlecreate');

/* Companies */
Route::get('/companies', 'CompanyController@index');

Route::get('/companies/myinternships', 'CompanyController@showMyInternships');
Route::get('/companies/myinternships/create', 'CompanyController@create');
Route::post('/companies/myinternships', 'CompanyController@store');

Route::get('/companies/{company}', 'CompanyController@show');

/* LOGIN & REGISTER */
//Route::get('/login', 'LoginController@index');
//Route::get('/register', 'RegisterController@index');

/*Users */
Route::get('/students', 'StudentController@index');
Route::get('/students/{student}', 'StudentController@show');
Route::get('/students/{student}/edit', 'StudentController@edit');
Route::get('/students/{student}/edit-intro', 'StudentController@editIntro');
Route::get('/students/{student}/edit-kwaliteiten', 'StudentController@editKwaliteiten');
Route::get('/students/{student}/edit-social', 'StudentController@editSocial');
Route::put('/students/{student}', 'StudentController@update');
Auth::routes();

/* Internships */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/internships/{internship}', 'InternshipController@show');
Route::get('/internships', 'InternshipController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/internships', 'InternshipController@index');
});

/* Apply */
Route::get('/internships/{internship}/apply', 'JobApplicationController@apply');

/* Company internships & applies */
Route::get('/companies/myinternships/{internship}/applications', 'JobApplicationController@applications');
Route::post('/{id}/save', 'JobApplicationController@save');

/* Facebook login */
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');
