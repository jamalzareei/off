<?php 

namespace App\Http\Controllers;
use Validator, Request, Redirect, Toast, Hash, View;
// use Request;
use App\Http\Controllers\Controller;

class PasswordController extends Controller {

	public static function resetPassword($email,$code_confirm_tell,$code_confirm_email)
	{
		$userExit= \App\models\User::checkUserExit($email,$code_confirm_tell,$code_confirm_email);
		if($userExit){
			// $notification = array(
   //              'message' => "شما میتوانید رمز خود را از فرم زیر تنظیم نمایید.",
   //              'alert-type' => 'success'
   //          );
   //          session()->set('notification',$notification);
			return View::make('resetpassword', array(
				'email' => $email,
				'code_confirm_tell' => $code_confirm_tell,
				'code_confirm_email' => $code_confirm_email,
				));
		}else{
			$notification = array(
                'message' => "شما مجوز دسترسی ندارید.",
                'alert-type' => 'danger'
            );
            session()->set('notification',$notification);
            return Redirect::to('/');
		}
		// return view('resetpassword');
	}

	public static function setPassword($email,$code_confirm_tell,$code_confirm_email)
	{
		$input= Request::all();
		$userExit= \App\models\User::checkUserExit($email,$code_confirm_tell,$code_confirm_email);

		if($userExit->email==$input["email"] &&
			$userExit->code_confirm_email = $input["code_confirm_email"] &&
			$userExit->code_confirm_tell = $input["code_confirm_tell"])
		{
			$id_user=$userExit->id_user;
			$password= Hash::make($input["password"]);
			$password_confirmation= Hash::make($input["password_confirmation"]);
			$date_login= date("Y-m-d H:i:s");
			$device_login=get_current_user();
			$os_login=PHP_OS.': '.php_uname();
			$ip_user=$_SERVER['REMOTE_ADDR'];
			$browser_login=$_SERVER['HTTP_USER_AGENT'];
			$_token=$input["_token"].$userExit->code_confirm_email;
			// echo "<pre>";
			// echo $os_login. "<br>".$device_login. "<br>".$ip_user. "<br>".$browser_login; 
			// return;

			$messages = [
			    'required'    	=> 'فیلد الزامی است *',
			    'min'    		=> 'کاراکتر ها کمتر از حد مجاز است *',
			    'max' 			=> 'کاراکتر ها بیش از حد مجاز است *',
			    'email'      	=> 'ایمیل را به درستی وارد کنید *',
			    'confirmed'		=> 'رمز عبور با تکرار آن برابر نیست *',
			    'same'			=> 'رمز عبور با تکرار آن برابر نیست *',
			];

			$rules=array(
	                'email'  				=> 'required|email',
	                'code_confirm_email' 	=> 'required',
	                'code_confirm_tell' 	=> 'required',
	                'password' 				=> 'required|min:6',
	                'password_confirmation' => 'required|same:password',
	                );
	    	$validator = Validator::make(Request::all(),$rules,$messages);
	    	if($validator->fails()){
	    		$notification = array(
		            'message' => $validator->errors(),
		            'alert-type' => 'danger'
		        );
		        session()->set('notification',$notification);
	        	return redirect()->back()->withErrors($validator->errors())->withInput();
	    	}else{
	    		$setPass= \App\models\User::passwordUser($id_user,$password,$date_login,$device_login,$os_login,$ip_user,$browser_login);
	    		\App\models\User::changeToken($id_user,$_token);
	    		if($setPass){
		    		$notification = array(
			            'message' => 'هم اکنون میتوانید با ایمیل و رمز عبور خود وارد سایت شوید.',
			            'alert-type' => 'success'
			        );
			        session()->set('notification',$notification);
		    		return redirect()->to('/');	    			
	    		}else{
	    			$notification = array(
			            'message' => 'لطفا دوباره تلاش نمایید.',
			            'alert-type' => 'danger'
			        );
			        session()->set('notification',$notification);
		        	return redirect()->back()->withErrors($validator->errors())->withInput();
	    		}
	    	}

		}else{

		}


		
		
		echo "<pre>";
		var_dump($input);
		var_dump($userExit);
		return;

	}

}
