<?php
use Illuminate\Support\Facades\Input as input;
use App\User;

Route::post('change/password', function(){
	$user= User::find(Auth::user()->id);
	if (Hash::check(Input::get('passwordold'), $user['password']) && Input::get('password') == Input::get('password_confirmation')) {
		$user->password = bcrypt(Input::get('password'));
		$user->save();
		return redirect()->back()->with('success', 'Password Changed');
	}else {
		return redirect()->back()->with('error', 'Password NOT Changed!!');
	}
});



Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('myprofile/{email}/settings', 'ProfileController@index')->name('profile');
Route::get('myprofile/{email}/', 'ProfileController@index')->name('profile');
Route::get('myprofile/{email}/{id}', 'ProfileController@viewprofile')->name('profile');
Route::post('myprofile/update/profiles', 'ProfileController@update')->name('profile');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/{dept}/{row}', 'HomeController@chart')->name('home');
Route::resource('/announcements', 'AnnouncementController');
Route::get('/announcements/{link_id}/{notif_id}', 'AnnouncementController@viewann');
Route::get('/users', 'HomeController@users');
Route::get('/notif', 'HomeController@notif');




Route::get('report/dept={id}/4th', 'ReportController@fourth');
Route::get('report/dept={id}/3rd', 'ReportController@third');
Route::get('report/dept={id}/2nd', 'ReportController@second');
Route::get('report/dept={id}/1st', 'ReportController@first');
Route::get('report/dept={id}/yearly', 'ReportController@yearly');
Route::get('report/dept={id}', 'ReportController@monthly')->name('report');
Route::post('report/create', 'ReportController@store')->name('report');
Route::get('report/dept={id}/create', 'ReportController@report')->name('report');
Route::get('report/dept={ids}/edit/{id}', 'ReportController@edit');
Route::post('report/dept={ids}/edit/{id}', 'ReportController@update')->name('report');

Route::get('/yearlyPDF/{id}/{year}/Yearly_Report','ReportController@yearlyPDF');
Route::get('/yearlyPDF/{id}/{year}/1st_Quarter','ReportController@firstPDF');
Route::get('/yearlyPDF/{id}/{year}/2nd_Quarter','ReportController@secondPDF');
Route::get('/yearlyPDF/{id}/{year}/3rd_Quarter','ReportController@thirdPDF');
Route::get('/yearlyPDF/{id}/{year}/4th_Quarter','ReportController@fourthPDF');
Route::get('/downloadPDF/{year}/{month}/{id}/Monthly_Report','ReportController@monthlyPDF');

Route::get('report/dept={ids}/{link_id}/{notif_id}', 'ReportController@viewreport')->name('report');

Route::get('chat','ChatController@chat');
Route::post('send','ChatController@send');
Route::post('saveToSession','ChatController@saveToSession');
Route::post('deleteSession','ChatController@deleteSession');
Route::post('getOldMessage','ChatController@getOldMessage');
Route::get('check',function(){
	return session('chat');
});

