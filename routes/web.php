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

Route::get('/companies/{company}', 'CompanyController@show');

/* LOGIN & REGISTER */
//Route::get('/login', 'LoginController@index');
//Route::get('/register', 'RegisterController@index');

/*Students */
Route::get('/students', 'StudentController@index');
Route::get('/students/{student}', 'StudentController@show');

/* studentprofile edit-information-form */
Route::get('/students/{student}/edit', 'StudentController@edit');
Route::get('/students/{student}/edit-intro', 'StudentController@editIntro');
Route::get('/students/{student}/edit-skills', 'StudentController@editSkills');
Route::get('/students/{student}/edit-social', 'StudentController@editSocial');

/* studentprofile add-information-form */
Route::get('/students/{student}/add-skills', 'StudentController@addSkills');
Route::get('/students/{student}/add-social', 'StudentController@addSocial');

/* studentprofile update info */
Route::put('/students/update/{student}', 'StudentController@update');
Route::put('/students/updateIntro/{student}', 'StudentController@updateIntro');
Route::put('/students/updateSkills/{student}', 'StudentController@updateSkills');
Route::put('/students/updateSocial/{student}', 'StudentController@updateSocial');

/* studentprofile add info */
Route::put('/students/addSkills/{student}', 'StudentController@saveSkills');
Route::put('/students/addSocial/{student}', 'StudentController@saveSocial');

Auth::routes();

/* Internships */
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/internships/myinternships', 'InternshipController@showMyInternships');
Route::get('/internships/myinternships/create', 'InternshipController@create');
Route::post('/internships/myinternships/create', 'InternshipController@handleCreate');

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
/* Search */
// Route::get('/', 'SearchController@index');
Route::post('/search', 'SearchController@search');
