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
Route::get('/companies/{company}', 'CompanyController@show');

/* LOGIN & REGISTER */
Route::get('/login', 'LoginController@index');
Route::get('/register', 'RegisterController@index');

/*Users */
Route::get('/students', 'StudentController@index');
Route::get('/students/{student}', 'StudentController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/internships', function () {
    $data = [
        'title' => 'Internships',
        'internships' => [
            [
                'function' => 'Front-End Developer',
                'name' => 'Cronos',
                'city' => 'Antwerpen',
                'discription' => 'lorem ipsum dolor sit amet...',
            ], [
                'function' => 'Back-End Developer',
                'name' => 'Apple',
                'city' => 'Brussel',
                'discription' => 'lorem ipsum dolor sit amet...',
            ],
        ],
    ];

    return view('internships', $data);
});

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');
