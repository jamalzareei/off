<?php 

namespace App\Http\Controllers;
use Validator, Request, Redirect, Toast, Hash, Mail, View, Cookie, Auth;
use Input;
use Response;

class shopoffController extends Controller {

	public static function index($type= null,$search=null)
	{
		$type_new=str_replace('-',' ',$type);//explode("--",$type)[0]);
		$search_new=str_replace('-',' ',$search);//explode("--",$type)[0]);
		// echo (explode("--",$type)[0])."<br>";
		// return;
		// $type_off= \App\models\Product::getTypeOff();
		$product = \App\models\Product::getAllProduct($type_new,$search_new);
		$date_now = date("Y-m-d H:i:s");
		// echo date("Y-m-d H:i:s")."<br>";
		foreach ($product as $key) {
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
		// var_dump($product);
		// return;
		return view('shopoff',array(
			'product' => $product,
			));
	}

}
