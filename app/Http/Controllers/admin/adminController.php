<?php 
namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator, Request, Redirect, Toast, Hash, Mail, View, Cookie, Auth;
use Input;
use Response;

class adminController extends Controller {
	// Here is your client ID: 32959448482-cvhk2ld37bkv9evppspk3mjcnp6gejsl.apps.googleusercontent.com
	//Here is your client secret: dS8BD9uYbiARrkf20hCUHXCh
	//
	public static function index()
	{
		if(Cookie::get('admin')){
			$login_admin = \App\models\Admin::checkAdmin(Cookie::get('admin'));
			if($login_admin){
				return view('admin.main');				
			}else{
				$notification = array(
					'message' => 'شما اجازه دسترسی ندارید.',
					'alert-type' => 'danger'
					);
				session()->set('notification',$notification);
				return Redirect::to('admin/masoud/login');
			}
		}else{
			$notification = array(
				'message' => 'شما اجازه دسترسی ندارید.',
				'alert-type' => 'danger'
				);
			session()->set('notification',$notification);
			$notification = array(
				'message' => 'شما اجازه دسترسی ندارید.',
				'alert-type' => 'danger'
				);
			session()->set('notification',$notification);
			return Redirect::to('admin/masoud/login');
		}
	}

	public static function login()
	{
		if(Cookie::get('admin')){
			return redirect::to('admin/masoud/index');
		}
		return view('admin.login');
	}

	public static function addpost($id_product = null)
	{
		// echo "<pre>";
		// var_dump($typeoff);
		// return;
		if(Cookie::get('admin')){
			$login_admin = \App\models\Admin::checkAdmin(Cookie::get('admin'));
			if($login_admin){
				$typeoff= \App\models\Admin::getTypeOff();
				if(!is_null($id_product)){
					// return $id_product;
					$product = \App\models\Admin::getProduct($id_product);
					$date = \App\models\Admin::getDate($product->id_product);
					$property = \App\models\Admin::getProperty($product->id_product);
					$price = \App\models\Admin::getPrice($product->id_product);
					$photo = \App\models\Admin::getPhoto($product->id_product);
					$seller = \App\models\Admin::getSeller($product->id_product);
					// echo "<pre>";
					// var_dump($property);
					// return;
					return view('admin.addpost',array(
						'product' => $product,
						'date' => $date,
						'property' => $property,
						'price' => $price,
						'photo' => $photo,
						'seller' => $seller,
						'typeoff' => $typeoff
						));
				}else{
					return view('admin.addpost',array('typeoff' => $typeoff));
				}
				
			}else{
				$notification = array(
					'message' => 'شما اجازه دسترسی ندارید.',
					'alert-type' => 'danger'
					);
				session()->set('notification',$notification);
				return Redirect::to('admin/masoud/login');
			}
		}else{
			$notification = array(
				'message' => 'شما اجازه دسترسی ندارید.',
				'alert-type' => 'danger'
				);
			session()->set('notification',$notification);
			$notification = array(
				'message' => 'شما اجازه دسترسی ندارید.',
				'alert-type' => 'danger'
				);
			session()->set('notification',$notification);
			return Redirect::to('admin/masoud/login');
		}
	}

	public static function login_admin(){
		$input = Request::all();
		$admin='jamalzareie';
		$username=$input["username"];
		$password=$input["password"];
		$minutes=3600*24;
		// echo "<pre>";
		// var_dump($input);
		// return;

		$messages = [
		'required'    	=> ' * فیلد الزامی است',
		'min'    		=> ' * کاراکتر ها کمتر از حد مجاز است',
		'max' 			=> ' * کاراکتر ها بیش از حد مجاز است',
		'email'      	=> ' * ایمیل را به درستی وارد کنید',
		'confirmed'		=> ' * رمز عبور با تکرار آن برابر نیست',
		'same'			=> ' * رمز عبور با تکرار آن برابر نیست',
		'unique'        => ' * قبلا استفاده شده است'
		];
        // |unique:posts|
		$rules=array(
			'username' 	=> 'required|min:3|max:100',
			'_token'   	=> 'required',
			'password' 	=> 'required'
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
			$login_admin = \App\models\Admin::checkAdmin($username);
			if($login_admin){
				if (Hash::check($password, $login_admin->password)){
					// echo "<pre>";
					// var_dump($login_admin);
					Cookie::queue('admin', $login_admin->username, $minutes);
					$notification = array(
						'message' => 'شما وارد سایت شدید.'.Cookie::get('admin'),
						'alert-type' => 'success'
						);
					session()->set('notification',$notification);
					return redirect()->to('admin/masoud/index');
				}else{
					$notification = array(
						'message' => 'نام کاربری و رمز عبور اشتباه است.',
						'alert-type' => 'danger'
						);
					session()->set('notification',$notification);
					return redirect()->back()->withErrors($validator->errors())->withInput();
				}
				
			}else{
				$notification = array(
					'message' => 'نام کاربری و رمز عبور اشتباه است.',
					'alert-type' => 'danger'
					);
				session()->set('notification',$notification);
				return redirect()->back()->withErrors($validator->errors())->withInput();
			}

		}

		return;
	}

	public static function addpost_post(){
		$input= Request::all();
		// return $input;
		$name_product=$input["name_product"];
		$id_product=$input["id_product"];
		$id_typeoff=$input["id_typeoff"];
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
                'name_product' 	=> 'required|min:1',
                'id_product' 	=> 'required',
                '_token'   		=> 'required',
                'id_typeoff' 	=> 'required|exists:tbl_typeoff'
                );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		if($id_product==0){
	    		$insert = \App\models\Admin::addPost($name_product,$date_insert,$id_typeoff);
	    		return $insert;    			
    		}else{
	    		$update = \App\models\Admin::updatePost($id_product,$name_product,$date_insert,$id_typeoff);
	    		return $id_product;  
    		}
    		// return 'success';
    	}
	}

	public static function updateProduct(){
		$input = Request::all();//file-main
		
		$file= Request::file('file-main');
		$id_product=$input["id_product"];
		$detail_product=$input["detail-product"];
		$fake_file=$input["fake-file"];
		$res= strpos($fake_file, 'hotoMain/');
		// if($res){
		// 	return 'ok';
		// }else{
		// 	return 'no';
		// }
		// return strpos($fake_file, 'photoMainl');//(preg_split('/',$input["fake-file"]));
		if($res){
			$file = array(
	        	'id_product' => $input["id_product"],
	        	'detail-product' => $input["detail-product"]
	        	);
	        $rules = array(
	        	'id_product' => 'required|exists:tbl_product',
	        	'detail-product' => 'required'
	        	);	
		}else{
			$Path = 'uploadajax/photoMain';
	        $file = array(
	        	'image' => Request::file('file-main'),
	        	'id_product' => $input["id_product"],
	        	'detail-product' => $input["detail-product"]
	        );
	        $rules = array(
	        	'image' => 'required',
	        	'id_product' => 'required|exists:tbl_product',
	        	'detail-product' => 'required'
	        );			
		}
        // $rules = array(
        //     'image' => 'required|image|max:3000|unique:tbl_product',
        //     'id_product' => 'required',
        //     'detail-product' => 'required'
        // );
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        else {
        	if($res){
	        	$updatePro= \App\models\Admin::upProduct($id_product,$fake_file,$detail_product);
	            return $updatePro;
	        }else{
	            if (Request::file('file-main')->isValid()) {
	                $extension = Request::file('file-main')->getClientOriginalExtension();
	                $fileName = date("Y-m-d-H-i-s").'-zareie-.'.$extension;
	                Request::file('file-main')->move($Path, $fileName);
	                $photo='photoMain/'.$fileName;
	                // return $Path.'/'.$fileName;
	                $updatePro= \App\models\Admin::upProduct($id_product,$photo,$detail_product);
	                return $updatePro;
	                //return Redirect::to('upload_ajax_zareie')->withErrors('Success', 'messages');
	            }
	            else {
	                return 'error';
	                //return Redirect::to('upload_ajax_zareie')->withErrors('error', 'messages');
	            }
	        }
        }

		return $id_product;//$file->getClientOriginalName();
	}

	public static function insertDate(){
		$input = Request::all();
		$id_product=$input["id_product"];
		$date_start=$input["dateStart-milad"];
		$date_end=$input["dateEnd-milad2"];
		$date_two=$input["dateEnd-milad2"];
		$date_one=$input["dateEnd-milad1"];
		$date_start_fa=$input["dateStart"];
		$date_end_fa=$input["dateEnd"];
		$date_insert=date("Y-m-d H:i:s");
		// return var_dump($input);
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
                '_token' 			=> 'required',
                'id_product'  		=> 'required|exists:tbl_product',
                'dateStart'  		=> 'required',
                'dateStart-milad' 	=> 'required',
                'dateEnd'   		=> 'required',
                'dateEnd-milad1' 	=> 'required',
                'dateEnd-milad2' 	=> 'required'
                );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		// return var_dump($input);
    		$date= \App\models\Admin::insertDate($id_product,$date_start,$date_end,$date_two,$date_one,$date_start_fa,$date_end_fa,$date_insert);
            return $date;
    	}
	}

	public static function insertPrice(){
		$input = Request::all();
		// return var_dump($input);
		$id_product = $input["id_product"];
		$main_price = $input["main-price"];
		$discount_price = $input["discount-price"];
		$discount_percent = $input["discount-percent"];
		$date_insert=date("Y-m-d H:i:s");
		$save_you= $main_price-$discount_price;
		$t_r_value='تومان';
		// $ = $input[""];
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
            '_token' 			=> 'required',
            'id_product'  		=> 'required|exists:tbl_product',
            'main-price'  		=> 'required',
            'discount-price' 	=> 'required',
            'discount-percent'  => 'required'
        );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{//percent_=100-[(dis_price*100)/price_main]
    		// return ($discount_price).'<br>'.$main_price.'<br>'.$discount_percent;
    		if((100-$discount_percent)==(($discount_price*100)/$main_price)){
	    		$price= \App\models\Admin::insertPrice($id_product,$main_price,$discount_price,$discount_percent,$date_insert,$save_you,$t_r_value);
	            return $price;
    		}else{
    			return 'error';
    		}
    	}
	}

	public static function insertSeller(){
		$input = Request::all();
		// return var_dump($input);
		$id_product = $input["id_product"];
		$name_seller = $input["name-seller"];
		$address_seller = $input["address-seller"];
		$latitude = $input["latitude"];
		$longitude = $input["longitude"];
		$address_map = $input["address-map"];
		$date_insert=date("Y-m-d H:i:s");
		// $ = $input[""];
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
            '_token' 			=> 'required',
            'id_product'  		=> 'required|exists:tbl_product',
            'name-seller'  		=> 'required',
            'address-seller' 	=> 'required'
        );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		$price= \App\models\Admin::insertSeller($id_product,$name_seller,$address_seller,$latitude,$longitude,$address_map,$date_insert);
            return $price;
    	}
	}

	public static function insertProperty(){
		$input = Request::all();
		// return var_dump($input);
		$id_product=$input["id_product"];
		$question_property=$input["question-property"];
		$answer_property=$input["answer-property"];
		$date_insert=date("Y-m-d H:i:s");
		//($id_product,$question_property,$answer_property,$date_insert)
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
            '_token' 			=> 'required',
            'id_product'  		=> 'required|exists:tbl_product',
            'question-property' => 'required',
            'answer-property' 	=> 'required'
        );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		$propert= \App\models\Admin::insertProperty($id_product,$question_property,$answer_property,$date_insert);
    		$arrayName = array(
    			'id_property' => $propert, 
    			'question_property' => $question_property, 
    			'answer_property' => $answer_property, 
    			);
            return $arrayName;
    	}
	}

	public static function publish(){
		$input = Request::all();
		// return var_dump($input);
		$id_product=$input["id_product"];
		$date_insert=date("Y-m-d H:i:s");
		//($id_product,$question_property,$answer_property,$date_insert)
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
            '_token' 			=> 'required',
            'id_product'  		=> 'required|exists:tbl_product'
        );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		$publish= \App\models\Admin::publish($id_product,$date_insert);
            return $publish;
    	}
	}

	public static function deleteProperty(){
		$input = Request::all();
		// return var_dump($input);
		$id_property=$input["id_property"];
		//($id_product,$question_property,$answer_property,$date_insert)
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
            '_token' 			=> 'required',
            'id_property'  		=> 'required|exists:tbl_property'
        );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		$delete= \App\models\Admin::deleteProperty($id_property);
            return $id_property;
    	}
	}

	public static function deletePhoto(){
		$input = Request::all();
		// return var_dump($input);
		$id_photo=$input["id_photo"];
		//($id_product,$question_property,$answer_property,$date_insert)
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
            '_token' 			=> 'required',
            'id_photo'  		=> 'required|exists:tbl_photo'
        );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		$delete= \App\models\Admin::deletePhoto($id_photo);
            return $id_photo;
    	}
	}

	public static function listProduct(){
		// return view('admin.');
		if(Cookie::get('admin')){
			$login_admin = \App\models\Admin::checkAdmin(Cookie::get('admin'));
			if($login_admin){
				$list= \App\models\Admin::listOffs();
				// echo "<pre>";
				// var_dump($list);
				// return;
				return view('admin.product',array('list' => $list));				
			}else{
				$notification = array(
					'message' => 'شما اجازه دسترسی ندارید.',
					'alert-type' => 'danger'
					);
				session()->set('notification',$notification);
				return Redirect::to('admin/masoud/login');
			}
		}else{
			$notification = array(
				'message' => 'شما اجازه دسترسی ندارید.',
				'alert-type' => 'danger'
				);
			session()->set('notification',$notification);
			$notification = array(
				'message' => 'شما اجازه دسترسی ندارید.',
				'alert-type' => 'danger'
				);
			session()->set('notification',$notification);
			return Redirect::to('admin/masoud/login');
		}
	}

	public static function sosial(){
		$input = Request::all();
		// return var_dump($input);
		$id_product=$input["id_product"];
		$sosial=$input["sosial"];
		//($id_product,$question_property,$answer_property,$date_insert)
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
            '_token' 			=> 'required',
            'id_product'  		=> 'required|exists:tbl_product',
            'sosial'  			=> 'required'
        );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		$sosial= \App\models\Admin::sosial($id_product,$sosial);
            return $sosial;
    	}
	}

	public static function active(){
		$input = Request::all();
		// return var_dump($input);
		$_token=$input["_token"];
		$id_product=$input["id_product"];
		$active_product=$input["active_product"];
		//($id_product,$question_property,$answer_property,$date_insert)
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
            '_token' 			=> 'required',
            'id_product'  		=> 'required|exists:tbl_product',
            'active_product'  	=> 'required',
        );
    	$validator = Validator::make(Request::all(),$rules,$messages);
    	// echo '<pre>';var_dump($validator->errors());return;
    	if($validator->fails()){
    		return $validator->errors();
    	}else{
    		$active= \App\models\Admin::active($id_product,$active_product);
            return $active;
    	}
	}
}
