<?php 

namespace App\Http\Controllers;

class mainController extends Controller {

	public static function index()
	{
		return view('indexoff');
		// return view('index');
	}

}
