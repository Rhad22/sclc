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

// Authentication Routes...
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Profile...
// Route::get('/myprofile', 'ProfileController@myprofile');
// Route::get('/myprofile/settings', 'ProfileController@myprofile');
// Route::post('/myprofile/edit', 'ProfileController@update');
Route::get('/myprofile/{email}/settings', [
    'uses' => 'ProfileController@index',
    'as' => 'profile'
    ]);
Route::get('/myprofile/{email}', [
    'uses' => 'ProfileController@index',
    'as' => 'profile'
    ]);

// Dashboard...
Route::get('/home', 'HomeController@index')->name('home');

// Users...
Route::get('/users', 'HomeController@users');
Route::get('/show', 'HomeController@show');

// Announcement...
Route::resource('/announcements', 'AnnouncementController');

// Communication...
Route::resource('/communication', 'CommunicationController');

