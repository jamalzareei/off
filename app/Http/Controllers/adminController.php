<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class adminController extends Controller {

	//
	public static function index()
	{
		return view('admin.addpost');
	}

}
