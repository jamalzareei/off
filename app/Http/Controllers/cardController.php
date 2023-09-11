<?php 
namespace App\Http\Controllers;
use Validator, Request, Redirect, Toast, Hash, Mail, View, Cookie, Auth;
use vendor\GuzzleHttp\Post\PostFile;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class cardController extends Controller {

	public static function addCard(){
		$input= Request::all();
		// return var_dump($input);
		$_token= $input["_token"];
		$id_product= $input["id_product"];
		$active_card=0;
		$cookie_ip=$_SERVER['REMOTE_ADDR'];
		$minutes=3600*24;
		$user=array();
	    if(Cookie::get('email')){
	        $user=\App\models\User::user(Cookie::get('email'));
	    }
	    

		$date_insert = date("Y-m-d H:i:s");
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
                '_token'   			=> 'required',
                'id_product'		=> 'required|exists:tbl_product',
                );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		// return 'aaa';
    		if($user){
    			// return var_dump($user);
    			$id_user=$user->id_user;
    			$code_card=$user->id_user.'-'.date("-Ymd-his");
	    		// return 'jamal';
	    		$exist = \App\models\Card::existCardUser($id_user,$id_product);
	    		if($exist){
	    			$exist = \App\models\Card::existUpCardUser($id_user,$id_product,$exist->count+1);
	    		}else{
		    		$insert = \App\models\Card::addCardUser($id_user,$id_product,$code_card,$date_insert,$active_card,$cookie_ip);
		    		return $insert;	    			
	    		}

    		}else{
	    		// return $id_product;
	    		$exist = \App\models\Card::existCard($id_product,$cookie_ip);
	    		if($exist){
	    			$exist = \App\models\Card::existUpCard($id_product,$cookie_ip,$exist->count+1);
	    		}else{
	    			$insert = \App\models\Card::addCard($id_product,$date_insert,$active_card,$cookie_ip);
	    			Cookie::queue('cookie_ip', $cookie_ip, $minutes);
		    		return $insert;
	    		}
    		}
    	}
	}

	public static function updateCountCard(){
		$input= Request::all();
		// return var_dump($input);
		$_token= $input["_token"];
		$id_card= $input["id_card"];
		$count= $input["count"];
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
                '_token'   	=> 'required',
                'id_card'	=> 'required|exists:tbl_card',
                'count'		=> 'required',
                );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		$update = \App\models\Card::updateCountCard($id_card,$count);
	    	// return $update;
	    	$card_user='';
			if(Cookie::get('email')){
		        $user=\App\models\User::user(Cookie::get('email'));
		        if($user){
		        	$card_user=\App\models\Card::getCardUser($user->id_user);
		        }
		    }else{
			    if(Cookie::get('cookie_ip')){
		            $card_user=\App\models\Card::getCardCookie(Cookie::get('cookie_ip'));
		        }	    	
		    }
		    // echo "<pre>";
		    // var_dump($card_user);
		    $date_now = date("Y-m-d H:i:s");
		    foreach ($card_user as $key) {
				# code...
				if ($date_now > $key->date->date_end){
					// echo "yes \t\n";
					$key->ended=1;
				}else{
					$key->ended=0;
				}
				// echo $key->date->date_end."<br>";
			}
		    $sum=0;
		    foreach ($card_user as $key) {
		    	# code...
		    	if($key->ended==0){
		    		$sum+= ($key->count*$key->price->discount_price);	    		
		    	}
		    	
		    }

		    return $sum;
    	}
	}

	public static function deleteCard(){
		$input= Request::all();
		// return var_dump($input);
		$_token= $input["_token"];
		$id_card= $input["id_card"];
	    

		$date_insert = date("Y-m-d H:i:s");
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
                '_token'   			=> 'required',
                'id_card'		=> 'required|exists:tbl_card',
                );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		// return $id_card;
    		$del = \App\models\Card::deleteCard($id_card);
    		return $del;
    	}
	}

	public static function addWishlist(){
		$input= Request::all();
		// return var_dump($input);
		$_token= $input["_token"];
		$id_product= $input["id_product"];
		$user='';
	    if(Cookie::get('email')){
	        $user=\App\models\User::user(Cookie::get('email'));
	    }
		$id_user= $user->id_user;//$input["id_user"];
		$wish= $input["wish"];
	    

		$date_insert = date("Y-m-d H:i:s");
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
                '_token'   			=> 'required',
                'id_user'		=> 'required|exists:tbl_user',
                'id_product'		=> 'required|exists:tbl_product',
                );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		// return $id_card;
    		$exist= \App\models\Card::getWishlist($id_product,$id_user);
    		if(!$wish && !isset($exist)){
	    		$insert = \App\models\Card::addWishlist($id_product,$id_user,$date_insert);
	    		return $insert;
    		}else{
    			$del=\App\models\Card::removeWishlist($id_product,$id_user);
	    		return $del;
    		}
    	}

	}
}
