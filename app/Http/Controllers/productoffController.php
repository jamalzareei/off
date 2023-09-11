<?php 

namespace App\Http\Controllers;
use Validator, Request, Redirect, Toast, Hash, Mail, View, Cookie, Auth;
use Input;
use Response;

class productoffController extends Controller {

	public static function index($id_product, $name_product= null)
	{
		$user='';
	    if(Cookie::get('email')){
	        $user=\App\models\User::user(Cookie::get('email'));
	    }
		if(!is_null($id_product)){
			$product = \App\models\Product::getProduct($id_product);
			if($product){
				$date = \App\models\Product::getDate($product->id_product);
				$property = \App\models\Product::getProperty($product->id_product);
				$price = \App\models\Product::getPrice($product->id_product);
				$photo = \App\models\Product::getPhoto($product->id_product);
				$seller = \App\models\Product::getSeller($product->id_product);
				$comment = \App\models\Product::getComment($product->id_product);
				$star_rate = \App\models\Product::getStarRate($product->id_product);

				$sum=0;
				foreach ($star_rate as $key) {
					$sum+= $key->rate;
				}
				$rate_users=0;
				$count_star=$star_rate->count();
				if($star_rate->count()!=0){
					$rate_users= round($sum/$count_star,1);					
				}

				$date_now = date("Y-m-d H:i:s");
				if ($date_now > $date->date_end){
					// echo "yes \t\n";
					$date->ended=1;
				}else{
					$date->ended=0;
				}

				// round(4.96754,2)
				// echo $rate_users."<pre>";
				// return var_dump($date);
				
				return view('productoff',array(
					'product' 	=> $product,
					'date' 		=> $date,
					'property' 	=> $property,
					'price' 	=> $price,
					'photo' 	=> $photo,
					'seller' 	=> $seller,
					'user' 		=> $user,
					'comment'	=> $comment,
					'rate_users'=> $rate_users,
					'count_star'=> $count_star,
					));
			}else{
				return Redirect::to('shop');
			}
		}else{
			return Redirect::to('shop');
		}
	}

	public static function addComment(){
		$input= Request::all();
		// return var_dump($input);
		$_token= $input["_token"];
		$id_user= $input["id_user"];
		$id_product= $input["id_product"];
		$name_comment= $input["name_comment"];
		$email_comment= $input["email_comment"];
		$message= $input["message_comment"];
		$rate= $input["star"];
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
                'id_user'   		=> 'required|exists:tbl_user',
                'id_product'		=> 'required|exists:tbl_product',
                'name_comment'   	=> 'required',
                'email_comment' 	=> 'required',
                'message_comment'   => 'required',
                );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		// return 'jamal';
    		$insert = \App\models\Product::addComment($id_product,$id_user,$message,$rate,$date_insert,$name_comment,$email_comment);
    		return $insert;
    	}
	}


}