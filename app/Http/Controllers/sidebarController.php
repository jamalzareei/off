<?php 
namespace App\Http\Controllers;
use Validator, Request, Redirect, Toast, Hash, Mail, View, Cookie, Auth;
use vendor\GuzzleHttp\Post\PostFile;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class sidebarController extends Controller {

	public static function index()
	{
		$type= \App\models\Sidebar::getType();

		var_dump($type);
		return;
	}

}
