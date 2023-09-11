<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

Route::get('/', 'mainController@index');

// Route::get('offs', 'indexoffController@index');
Route::get('offer',function(){
	return \App\Http\Controllers\indexoffController::index();
	// return response()->download('offs/img/backgrounds/keyboard.jpg', 'jamal.jpg', 'image/jpeg');
});

Route::get('offer/shop',function(){
	return \App\Http\Controllers\shopoffController::index();
});

Route::get('offer/shop/{value1}',function($value1){
	return \App\Http\Controllers\productoffController::index($value1);
});

Route::get('offer/card',function(){
	return \App\Http\Controllers\cardoffController::index();
});

Route::get('account/edit',function(){
	return \App\Http\Controllers\accountController::account_edit();
});

Route::get('account/addressbook',function(){
	return \App\Http\Controllers\accountController::account_addressbook();
});

Route::get('account/orders',function(){
	return \App\Http\Controllers\accountController::account_orders();
});

Route::get('account/wishlist',function(){
	return \App\Http\Controllers\accountController::account_wishlist();
});

Route::post('register',function(){
	return \App\Http\Controllers\userController::register();
});

Route::post('login',function(){
	return \App\Http\Controllers\userController::login();
});

Route::get('admin/masoud/index',function(){
	return \App\Http\Controllers\admin\adminController::index();
});
Route::get('admin/masoud/login',function(){
	return \App\Http\Controllers\admin\adminController::login();
});
Route::get('admin/masoud/logout',function(){
	// return \App\Http\Controllers\admin\adminController::login();

	Cookie::queue('admin', '', 0);
	return redirect()->to('admin/masoud/login');
});
Route::get('admin/masoud/addpost',function(){
	return \App\Http\Controllers\admin\adminController::addpost();
});
Route::post('admin/masoud/addpost',function(){
	return \App\Http\Controllers\admin\adminController::addpost_post();
});
Route::post('admin/masoud/updateproduct',function(){
	return \App\Http\Controllers\admin\adminController::updateProduct();
});

Route::post('admin/masoud/login-admin', function(){
	return \App\Http\Controllers\admin\adminController::login_admin();
});

// Route::post('admin/masoud/upload', function(){
// 	return \App\Http\Controllers\admin\adminController::uploadTest();//uploadController
// });
// Route::post('upoad_test', function(){
// 	return \App\Http\Controllers\admin\adminController::dropzoneStore();
// });

Route::post('upload', 'uploadController@uploadFiles');

// Route::post('dropzone/store', ['as'=>'dropzone.store','uses'=>'HomeController@dropzoneStore']);
// Route::get('dropzone', 'admin\adminController@addpost');
// Route::post('dropzone/uploadFiles', 'admin\adminController@uploadFiles');
// Route::get('dropzone', 'admin\adminController@dropzone');
// Route::post('dropzone/store', ['as'=>'dropzone.store','uses'=>'admin\adminController@dropzoneStore']);


///////////////////////////
// Route::get('social/redirect/{provider}',   [  'uses' => 'Auth\SocialController@getSocialRedirect']);
// Route::get('/social/handle/{provider}',     [  'uses' => 'Auth\SocialController@getSocialHandle']);
// $s = 'social.';
// Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
// Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);
// Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\AuthController@getSocialRedirect']);
// Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\AuthController@getSocialHandle']);
///////////////////////////

Route::get('activeuser/{email}/{code_confirm_tell}/{code_confirm_email}',function($email,$code_confirm_tell,$code_confirm_email){
	return \App\Http\Controllers\userController::activeUser($email,$code_confirm_tell,$code_confirm_email);
});

Route::get('resetpassword/{email}/{confirm_tell}/{confirm_mail}', function($email,$confirm_tell,$confirm_mail){
	return \App\Http\Controllers\passwordController::resetPassword($email,$confirm_tell,$confirm_mail);
});

Route::post('setassword/{email}/{code_confirm_tell}/{code_confirm_email}', function($email,$code_confirm_tell,$code_confirm_email){
	return \App\Http\Controllers\passwordController::setPassword($email,$code_confirm_tell,$code_confirm_email);
});

Route::get('logout',function(){
	Cookie::queue('_token', '', 0);
	Cookie::queue('email', '', 0);
	Cookie::queue('password', '', 0);
	return redirect()->back();
});

Route::post('password-forget',function(){
	return \App\Http\Controllers\userController::forgetPassword();
});