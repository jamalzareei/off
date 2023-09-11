<?php 
namespace App\Http\Controllers;
use Validator, Request, Redirect, Toast, Hash, Mail, View, Cookie, Auth;
use vendor\GuzzleHttp\Post\PostFile;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class cardoffController extends Controller {

	public static function index()
	{
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
	    // echo "<pre>";
	    // var_dump($card_user);
	    // return;
	    $sum=0;
	    foreach ($card_user as $key) {
	    	# code...
	    	if($key->ended==0){
	    		$sum+= ($key->count*$key->price->discount_price);	    		
	    	}
	    	
	    }
     //    return;
		return view('cardoff',array(
			'card_user' => $card_user,
			'sum' => $sum,
			));
	}

}
