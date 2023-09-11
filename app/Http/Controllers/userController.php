<?php 
namespace App\Http\Controllers;
use Validator, Request, Redirect, Toast, Hash, Mail, View, Cookie, Auth;
use vendor\GuzzleHttp\Post\PostFile;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class userController extends Controller {

    public static function register()
    {
        // var_dump(gethostbyname("smtp.gmail.com"));
        // return;
        // $userAgent = $_SERVER["HTTP_USER_AGENT"];
        // $devicesTypes = array(
        //     "computer" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
        //     "tablet"   => array("tablet", "android", "ipad", "tablet.*firefox"),
        //     "mobile"   => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
        //     "bot"      => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
        // );
        // foreach($devicesTypes as $deviceType => $devices) {           
        //     foreach($devices as $device) {
        //         if(preg_match("/" . $device . "/i", $userAgent)) {
        //             $deviceName = $deviceType;
        //         }
        //     }
        // }
        // return ucfirst($deviceName);
        
        // return get_current_user();
        // Mail::send('emails.test', ['key' => 'value'], function($message)
        // {
        //     $message->to('jzcs89@gmail.com', 'John Smith')->subject('Welcome!');
        // });
        // return "ok";
        // $data = 'آموزش ارسال ایمیل در لاراول ۵٫۲';
        // $email = Mail::send('emails.test', ['data'=>$data], function ($message) use ($data){
        //     $message->from('jzcs89@gmail.com', $data);
        //     $message->to('jzcs89@gmail.com')->subject('Studio-design | Test Send Mail Laravel5.2');
        // });

        // if ($email){
        //     echo "ایمیل با موفقیت ارسال شد.";
        // }else{
        //     echo "خطا در ارسال ایمیل لطفا تلاش کنید.";
        // }
        // return ;
        ///////////////////////////////////
    	$input = Request::all();
    	Request::flash();
    	// echo "<pre>";var_dump(\Input::all());return;
    	$firstname=$input["firstname"];
    	$lastname=$input["lastname"];
    	$email=$input["email"];
        $tell=$input["tell"];
    	$sex=$input["sex"];
        $code_confirm_tell=(rand(1000,10000));
        $code_confirm_email=$input["_token"];
        $date_register=date("Y-m-d H:i:s");
        if(isset($input["get-offer"])){
            $get_offer=1;
        }else{
            $get_offer=0;
        }
    	// $password=Hash::make($input["password"]);
    	// $re_password=Hash::make($input["password_confirmation"]);
    	// $code_frim_email=Hash::make(rand(100000, 999999));

    	$messages = [
		    'required'    	=> 'فیلد الزامی است *',
		    'min'    		=> 'کاراکتر ها کمتر از حد مجاز است *',
		    'max' 			=> 'کاراکتر ها بیش از حد مجاز است *',
		    'email'      	=> 'ایمیل را به درستی وارد کنید *',
		    'confirmed'		=> 'رمز عبور با تکرار آن برابر نیست *',
		    'same'			=> 'رمز عبور با تکرار آن برابر نیست *',
            'unique'        => 'قبلا استفاده شده است *'
		];
        // |unique:posts|
		$rules=array(
                'firstname' => 'required|min:3|max:100',
                'lastname'  => 'required|min:3|max:100',
                'tell'  	=> 'required|min:10|max:11',
                'email' 	=> 'required|email|unique:tbl_user',
                '_token'   	=> 'required',
                'sex' 	    => 'required'
                );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		$notification = array(
	            'message' => $validator->errors(),
	            'alert-type' => 'danger'
	        );
	        session()->set('notification',$notification);
        	return redirect()->back()->withErrors($validator->errors())->withInput();
    	}else{
    		//barresi vojod email or tell tekrari
    		$userOld= \App\models\User::checkUser($email);
    		if($userOld){
    			// echo "<pre>";
    			// var_dump(\App\models\User::checkUser($email));

                $notification = array(
                    'message' => "با این ایمیل قبلا ثبت نام شده است.",
                    'alert-type' => 'danger'
                );
                session()->set('notification',$notification);
    			return redirect()->back()->withInput();
    		}else{
    			$register= \App\models\User::registerUser($firstname,$lastname,$email,$tell,$sex,$code_confirm_email,$code_confirm_tell,$get_offer,$date_register);
    			$userNew= \App\models\User::checkUser($email);
    			// \App\models\User::passwordUser($userNew->id_user,$password,$date_register,$os_login,$ip_login,$code_confirm);

	    		$notification = array(
		            'message' => "ثبت نام شما با موفقیت انجام گرفت!'<br>' لطفا ایمیل خود را چک و حساب خود را فعال نمایید.",
		            'alert-type' => 'success'
		        );
                session()->set('notification',$notification);
                // send mail active account user
                $data = $userNew->email."/".$userNew->code_confirm_tell."/".$userNew->code_confirm_email;

                $notification = array(
                    'message' => "ثبت نام شما با موفقیت انجام گرفت!'<br>' لطفا ایمیل خود را چک و حساب خود را فعال نمایید.",
                    'alert-type' => 'success'
                );
                session()->set('notification',$notification);
                $mailTo=$userNew->email;
                $email = Mail::send('emails.register', ['data'=>$data], function ($message) use ($data,$mailTo){
                    $message->from('jzcs89@gmail.com', $data);
                    $message->to($mailTo)->subject('سایت من | فعال سازی حساب کاربری');
                });

                // if ($email){
                // }else{
                //     $notification = array(
                //         'message' => "ایمیل فعال سازی ارسال نگردید! لطفا از لینک فراموشی رمز عبور برای فعال سازی حساب خود اقدام نمایید.",
                //         'alert-type' => 'danger'
                //     );
                //     session()->set('notification',$notification);
                //     return redirect()->back()->withInput();
                // }
                return redirect()->back();
    		}
    		// return $password."<br>".$re_password;

    		// return "register";
	    	// echo "<pre>";
	    	// var_dump($input);
    	}
        return redirect()->back();
    }

    public static function login(){
        $input= Request::all();
        Request::flash();
        // echo "<pre>";
        // var_dump($input);
        // return;

        $_token=$input["_token"];
        $email=$input["email-login"];
        $password=Hash::make($input["password-login"]);
        $minutes=3600*24*30;
        $messages = [
            'required'      => 'فیلد الزامی است *',
            'min'           => 'کاراکتر ها کمتر از حد مجاز است *',
            'max'           => 'کاراکتر ها بیش از حد مجاز است *',
            'email'         => 'ایمیل را به درستی وارد کنید *',
            'confirmed'     => 'رمز عبور با تکرار آن برابر نیست *',
            'same'          => 'رمز عبور با تکرار آن برابر نیست *',
            'unique'        => 'قبلا استفاده شده است *'
        ];
        // |unique:posts|
        $rules=array(
                'email-login'       => 'required|email',
                '_token'            => 'required',
                'password-login'    => 'required'
                );
        $validator = Validator::make(Request::all(),$rules,$messages);
        // echo '<pre>';var_dump($validator->errors());return;
        if($validator->fails()){
            $notification = array(
                'message' => $validator->errors(),
                'alert-type' => 'danger'
            );
            session()->set('notification',$notification);
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            $login_user = \App\models\User::checkUser($email);
            $login = \App\models\User::user($email);
            // echo "<pre>";
            // var_dump($login);
            if($login_user){
                if($login){
                    if($login->password){
                        if (Hash::check($input["password-login"], $login->password)) {
                           // The passwords match...

                            Cookie::queue('_token', $_token, $minutes);
                            Cookie::queue('email', $email, $minutes);
                            Cookie::queue('password', $password, $minutes);
                            if(Cookie::get('cookie_ip')){
                                $code_card=$login->id_user.'-'.date("-Ymd-his");
                                $update = \App\models\Card::upCard($login->id_user,$code_card,Cookie::get('cookie_ip'));
                            }
                            $notification = array(
                                'message' => htmlspecialchars('شما وارد سایت شدید.'.Cookie::get('email')),
                                'alert-type' => 'success'
                            );
                            session()->set('notification',$notification);
                            return redirect()->back();
                        }else{
                            $notification = array(
                                'message' => 'رمز عبور اشتباه است',
                                'alert-type' => 'danger'
                            );
                            session()->set('notification',$notification);
                            return redirect()->back()->withInput();
                        }
                    }else{
                        $notification = array(
                            'message' => 'حساب شما فعال نیست یا رمزی برای آن مشخص نکرده ای.',
                            'alert-type' => 'danger'
                        );
                        session()->set('notification',$notification);
                        return redirect()->back()->withInput();  
                    }
                }else{
                    $notification = array(
                        'message' => 'پسورد برای این حساب ایجاد نشده است، در صورت دریافت نکردن ایمیل فعال سازی از قسمت بازیابی رمز عبور اقدام نمایید.',
                        'alert-type' => 'danger'
                    );
                    session()->set('notification',$notification);
                    return redirect()->back()->withInput();
                }
            }else{
                $notification = array(
                    'message' => 'ایمیل وجود ندارد.',
                    'alert-type' => 'danger'
                );
                session()->set('notification',$notification);
                return redirect()->back()->withInput();                
            }
            // echo $password."<br>".$login->password."<br>";
            // return "jama";
            // Cookie::queue('_token', $_token, $minutes);
            // Cookie::queue('email', $email, $minutes);
            // Cookie::queue('password', $password, $minutes);
            // $_token_cookie = Cookie::get('_token');
            // $email_cookie = Cookie::get('email');
            // $password_cookie = Cookie::get('password');
            // if($_token_cookie){
            //     echo $email_cookie;
            // }else{
            //     echo "not cookie";
            // }
            // return;
        }
    }

    public static function activeUser($email,$code_confirm_tell,$code_confirm_email)
    {
        $userExit= \App\models\User::checkUserExit($email,$code_confirm_tell,$code_confirm_email);
        // echo "<pre>";
        // var_dump($userExit);
        // return;
        if($userExit){
            // return "jamal";
            $active= \App\models\User::activeUser($userExit->email,$userExit->code_confirm_tell,$userExit->code_confirm_email);
            if($active){
               $notification = array(
                    'message' => "حساب کاربری شما فعال شد. '<br>' رمز غبور خود را تعیین نمایید.",
                    'alert-type' => 'success'
                );
                session()->set('notification',$notification);
                // return redirect()->back();
                // return View::make('',array(
                //     '' => ,
                //     '' => ,
                //     '' => ,
                //     ));
            }else{
                $notification = array(
                    'message' => "حساب کاربری شما فعال شده است.",
                    'alert-type' => 'danger'
                );
                session()->set('notification',$notification);
                // return redirect()->back(); 
            }
            return Redirect::to('resetpassword/'.$userExit->email.'/'.$userExit->code_confirm_tell.'/'.$userExit->code_confirm_email);
            
        }
        else{
            $notification = array(
                'message' => "لینک معتبر نمیباشد.",
                'alert-type' => 'danger'
            );
            session()->set('notification',$notification);
            return redirect()->back();
        }
    }

    public static function forgetPassword(){
        $input= Request::all();
        Request::flash();
        $email= $input["email-forget"];
        // echo "<pre>";
        // var_dump($input);
        // return;

        $messages = [
            'required'      => 'فیلد الزامی است *',
            'min'           => 'کاراکتر ها کمتر از حد مجاز است *',
            'max'           => 'کاراکتر ها بیش از حد مجاز است *',
            'email'         => 'ایمیل را به درستی وارد کنید *',
            'confirmed'     => 'رمز عبور با تکرار آن برابر نیست *',
            'same'          => 'رمز عبور با تکرار آن برابر نیست *',
            'unique'        => 'قبلا استفاده شده است *'
        ];
        // |unique:posts|
        $rules=array(
                'email-forget'       => 'required|email',
                '_token'            => 'required'
                );
        $validator = Validator::make(Request::all(),$rules,$messages);
        // echo '<pre>';var_dump($validator->errors());return;
        if($validator->fails()){
            $notification = array(
                'message' => $validator->errors(),
                'alert-type' => 'danger'
            );
            session()->set('notification',$notification);
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            $userNew= \App\models\User::checkUser($email);
            $data = $userNew->email."/".$userNew->code_confirm_tell."/".$userNew->code_confirm_email;

            $mailTo=$userNew->email;
            $email = Mail::send('emails.register', ['data'=>$data], function ($message) use ($data,$mailTo){
                    $message->from('jzcs89@gmail.com', $data);
                    $message->to($mailTo)->subject('سایت من | بازیابی رمز عبور');
                });
            $notification = array(
                'message' => "ایممیل خود را چک نمایید.",
                'alert-type' => 'success'
            );
            session()->set('notification',$notification);
            return redirect()->back();
        }

    }

    public static function updateUser(){
        $input = Request::all();
        $_token =$input["_token"];
        $firstname =$input["firstname"];
        $lastname =$input["lastname"];
        $email =$input["email"];
        $tell =$input["tell"];
        $sex =$input["sex"];
        // $get_offer =0;
        
        if(isset($input["get-offer"])){
            $get_offer=1;
        }else{
            $get_offer=0;
        }
        // var_dump($input);
        // return;
        
        $messages = [
            'required'      => 'فیلد الزامی است *',
            'min'           => 'کاراکتر ها کمتر از حد مجاز است *',
            'max'           => 'کاراکتر ها بیش از حد مجاز است *',
            'email'         => 'ایمیل را به درستی وارد کنید *',
            'confirmed'     => 'رمز عبور با تکرار آن برابر نیست *',
            'same'          => 'رمز عبور با تکرار آن برابر نیست *',
            'unique'        => 'قبلا استفاده شده است *'
        ];
        // |unique:posts|
        $rules=array(
                '_token'    => 'required',
                'firstname' => 'required',
                'lastname'  => 'required',
                'email'     => 'required|exists:tbl_user',
                'tell'      => 'required',

                );
        $validator = Validator::make(Request::all(),$rules,$messages);
        // echo '<pre>';var_dump($validator->errors());return;
        if($validator->fails()){
            return $validator->errors();
        }else{
            // var_dump($input);
            $update= \App\models\User::updateUser($firstname,$lastname,$email,$tell,$sex,$get_offer);
            return $update;
        }
    }
}
