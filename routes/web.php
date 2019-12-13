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
Route::post('/', 'FilterController@filterWelcome');
/* Login en registratie van studenten & bedrijven */
/* Login */
Route::get('/companies/login', 'CompanyController@login');
Route::post('/companies/login', 'CompanyController@handleLogin');
Route::get('/students/login', 'StudentController@login');
Route::post('/students/login', 'StudentController@handleLogin');
/* Register students */
Route::get('/students/register', 'StudentController@register');
Route::post('/students/register', 'StudentController@handleRegister');
/* Register */
Route::get('/companies/register', 'CompanyController@register');
Route::post('/companies/register', 'CompanyController@handleRegister');
// --------   enkel als je ingelogd bent kunnen deze routes ingeladen worden --------//
    Route::group(['middleware' => 'auth'], function () {
        /*----------------COMPANIES------------------------- */

        /*create company*/
        Route::get('/companies/detail', 'CompanyController@create');
        Route::post('/companies/detail', 'CompanyController@handlecreate');

        /*companies index and detail page*/
        Route::get('/companies', 'CompanyController@index');
        Route::post('/companies', 'FilterController@filterCompany');
        Route::get('/companies/{company}', 'CompanyController@show');

        /* edit company details */
        Route::get('/companies/profile/{company}', 'CompanyController@showProfile');
        Route::get('/companies/{company}/edit', 'CompanyController@edit');

        /*----------------REVIEWS------------------------- */
        Route::post('/companies/{company}', 'ReviewController@handleCreate');

        /*----------------STUDENTS------------------------- */
        /* profielpagina */
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
        Route::put('/students/imageUpload/{student}', 'StudentController@imageUploadPost');
        Route::put('/students/updateIntro/{student}', 'StudentController@updateIntro');
        Route::put('/students/updateSkills/{student}', 'StudentController@updateSkills');
        Route::put('/students/deleteSkills/{student}', 'StudentController@deleteSkills');
        Route::put('/students/updateSocial/{student}', 'StudentController@updateSocial');
        Route::put('/students/deleteSocial/{student}', 'StudentController@deleteSocial');
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
        Route::post('/internships', 'FilterController@filterInternships');

        // Route::get('/internships', 'InternshipController@index');

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
    });
