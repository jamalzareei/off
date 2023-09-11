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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'mainController@index');
Route::get('', 'mainController@index');

// Route::get('offs', 'indexoffController@index');
Route::get('offer',function(){
	return \App\Http\Controllers\indexoffController::index();
	// return response()->download('offs/img/backgrounds/keyboard.jpg', 'jamal.jpg', 'image/jpeg');
});

Route::get('shop/{type?}/{search?}',function($type= null,$search=null){
	return \App\Http\Controllers\shopoffController::index($type,$search);
});

Route::post('addcomment',function(){
	return \App\Http\Controllers\productoffController::addComment();
});

Route::post('addcard',function(){
	return \App\Http\Controllers\cardController::addCard();
});
Route::post('addwishlist',function(){
	return \App\Http\Controllers\cardController::addWishlist();
});
Route::post('deletecard',function(){
	return \App\Http\Controllers\cardController::deleteCard();
});
Route::post('updatecountcard',function(){
	return \App\Http\Controllers\cardController::updateCountCard();
});

Route::get('product/{id_product}/{name_product?}',function($id_product, $name_product= null){
	// return 'jj';
	return \App\Http\Controllers\productoffController::index($id_product,$name_product);
});

Route::get('card',function(){
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
Route::post('updateuser',function(){
	return \App\Http\Controllers\userController::updateUser();
});

Route::post('login',function(){
	return \App\Http\Controllers\userController::login();
});

Route::get('admin/masoud/index',function(){
	return \App\Http\Controllers\admin\adminController::index();
});
Route::get('admin/masoud/list',function(){
	return \App\Http\Controllers\admin\adminController::listProduct();
});
Route::get('admin/masoud/login',function(){
	return \App\Http\Controllers\admin\adminController::login();
});
Route::get('admin/masoud/logout',function(){
	// return \App\Http\Controllers\admin\adminController::login();

	Cookie::queue('admin', '', 0);
	return redirect()->to('admin/masoud/login');
});
Route::get('admin/masoud/addpost/{id_product?}',function($id_product = null){
	// return $id_product;
	return \App\Http\Controllers\admin\adminController::addpost($id_product);
});
// Route::get('admin/masoud/{addpost}',function(){
// 	return \App\Http\Controllers\admin\adminController::editPost();
// });
Route::post('admin/masoud/addpost',function(){
	return \App\Http\Controllers\admin\adminController::addpost_post();
});
Route::post('admin/masoud/updateproduct',function(){
	return \App\Http\Controllers\admin\adminController::updateProduct();
});
Route::post('admin/masoud/insertdate',function(){
	return \App\Http\Controllers\admin\adminController::insertDate();
});
Route::post('admin/masoud/insertprice',function(){
	return \App\Http\Controllers\admin\adminController::insertPrice();
});
Route::post('admin/masoud/insertseller',function(){
	return \App\Http\Controllers\admin\adminController::insertSeller();
});
Route::post('admin/masoud/insertproperty',function(){
	return \App\Http\Controllers\admin\adminController::insertProperty();
});
Route::post('admin/masoud/publish',function(){
	return \App\Http\Controllers\admin\adminController::publish();
});
Route::post('admin/masoud/deleteproperty',function(){
	return \App\Http\Controllers\admin\adminController::deleteProperty();
});
Route::post('admin/masoud/deletephoto',function(){
	return \App\Http\Controllers\admin\adminController::deletePhoto();
});

Route::post('admin/masoud/login-admin', function(){
	return \App\Http\Controllers\admin\adminController::login_admin();
});
Route::post('admin/masoud/sosial', function(){
	return \App\Http\Controllers\admin\adminController::sosial();
});
Route::post('admin/masoud/active', function(){
	return \App\Http\Controllers\admin\adminController::active();
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

Route::get('telegram',function(){
	return \App\Http\Controllers\TelegramController::getUpdates();
});
// Route::get('request-bank',function(){
// 	try {

// 		$gateway = \Gateway::zarinpal();
// 		$gateway->setCallback(url('callback/from/bank'));
// 		$gateway->price(1000)->ready();
// 		$refId =  $gateway->refId();
// 		$transID = $gateway->transactionId();

// 		// Your code here

// 		return $gateway->redirect();

// 	} catch (Exception $e) {

// 		echo $e->getMessage();
// 	}
// });
