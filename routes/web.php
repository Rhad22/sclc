<?php
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// Route::group(['prefix'=>'myprofile','as'=>'profile'], function() {
//    Route::get('{email}/settings', 'ProfileController@index');
//    Route::get('{email}', 'ProfileController@index');
//    Route::post('update/profiles', 'ProfileController@update');
// });
Route::get('myprofile/{email}/settings', 'ProfileController@index')->name('profile');
Route::get('myprofile/{email}/', 'ProfileController@index')->name('profile');
Route::post('myprofile/update/profiles', 'ProfileController@update')->name('profile');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'HomeController@users');
Route::get('/messenger.chatbox', 'HomeController@chatbox');
Route::resource('/announcements', 'AnnouncementController');

Route::resource('/communication', 'CommunicationController');

Route::get('report/dept={id}/4th', 'ReportController@fourth');
Route::get('report/dept={id}/3rd', 'ReportController@third');
Route::get('report/dept={id}/2nd', 'ReportController@second');
Route::get('report/dept={id}/1st', 'ReportController@first');
Route::get('report/dept={id}/monthly', 'ReportController@monthly');

Route::get('report/dept={id}', 'ReportController@yearly')->name('report');
Route::post('report/create', 'ReportController@store')->name('report');
Route::get('report/dept={id}/create', 'ReportController@report')->name('report');