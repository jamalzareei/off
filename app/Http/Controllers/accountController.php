<?php namespace App\Http\Controllers;
use Redirect, Cookie;

class accountController extends Controller {

	public function index()
	{
		// return view('home');
	}

	public static function account_edit()
	{
		$user='';
	    if(Cookie::get('email')){
	        $user=\App\models\User::user(Cookie::get('email'));
	        // echo "<pre>";
	        // var_dump($user);
	        // return;
			return view('_account_edit',array('user' => $user));
	    }else{
	    	return Redirect::to('/');
	    }
	}

	public static function account_addressbook()
	{
		$user='';
	    if(Cookie::get('email')){
	        $user=\App\models\User::user(Cookie::get('email'));
	        // echo "<pre>";
	        // var_dump($user);
	        // return;
			return view('_account_addressbook',array('user' => $user));
	    }else{
	    	return Redirect::to('/');
	    }
		// return view('_account_addressbook');
	}

	public static function account_orders()
	{
		$user='';
	    if(Cookie::get('email')){
	        $user=\App\models\User::user(Cookie::get('email'));
	        $order=\App\models\Card::getBuyCardUser($user->id_user);
	        // echo "<pre>";
	        // var_dump($order);
	        // return;
			return view('_account_orders',array('user' => $user,'order' => $order));
	    }else{
	    	return Redirect::to('/');
	    }
		// return view('_account_orders');
	}

	public static function account_wishlist()
	{
		$user='';
	    if(Cookie::get('email')){
	        $user=\App\models\User::user(Cookie::get('email'));
	        $wish= \App\models\Card::getWishlistUser($user->id_user);
	        // echo "<pre>";
	        // var_dump($wish);
	        // return;
			return view('_account_wishlist',array('user' => $user,'wish' => $wish));
	    }else{
	    	return Redirect::to('/');
	    }
		// return view('_account_wishlist');
	}

}
