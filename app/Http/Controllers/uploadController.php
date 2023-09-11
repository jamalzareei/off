<?php 
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator, Request, Redirect, Toast, Hash, Mail, View, Cookie, Auth;
use Input;
use Response;

class uploadController extends Controller {

	public function uploadFiles() {
		// $file= Request::file('file');
		// $fileName=date('Y-m-d-H-i-s-').$file->getClientOriginalName();
		// $path='uploadajax/uploads';
		// return $file->move($path, $fileName);

		$file= Request::file('file');
		$input = Request::all();
		$id_product = $input["id_product"];
		$date_insert=date("Y-m-d H:i:s");

		$destinationPath = 'uploadajax/uploads'; // upload path
        $extension = $file->getClientOriginalExtension(); // getting file extension
        // $fileName=date('Y-m-d-H-i-s-').$file->getClientOriginalName();
        $fileName = date("Y-m-d-H-i-s").'-zareie-.'.$extension;
        $upload_success = $file->move($destinationPath, $fileName); // uploading file to given path
        $path_photo = 'uploads/'.$fileName;

        $insert= \App\models\Admin::insertPhoto($id_product,$path_photo,$date_insert);
 
        if ($upload_success) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
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

	public function uploadFiles_old() {
 		
        $input = Input::all();
 
        $rules = array(
            'file' => 'image|max:3000',
        );
 
        $validation = Validator::make($input, $rules);
 
        if ($validation->fails()) {
            return Response::make($validation->errors->first(), 400);
        }
 
        $destinationPath = 'uploadajax/uploads'; // upload path
        $extension = Input::file('file')->getClientOriginalExtension(); // getting file extension
        $fileName = date('Y-m-d-h-i-s').rand(11111, 99999) . '.' . $extension; // renameing image
        $upload_success = Input::file('file')->move($destinationPath, $fileName); // uploading file to given path
 
        if ($upload_success) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }

    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('uploadajax'),$imageName);
        return response()->json(['success'=>$imageName]);
    }

    public function uploadTest(){
    	echo "string";
    	// $file= Input::file('file');
    	// $fileName=$file->getClientOriginalName();
    	// $path='uploadajax';
    	// return $file->move($path, $fileName);
    }

    public function imageUpload(){
    	header('Content-Type: text/plain; charset=utf-8');

    	if((!empty($_FILES["file"])) && ($_FILES['file']['error'] == 0)) {

    		$filename = basename($_FILES['file']['name']);
    		$ext = substr($filename, strrpos($filename, '.') + 1);

    		if (($ext == "jpg") && ($_FILES["file"]["type"] == "image/jpeg") && 
    			($_FILES["file"]["size"] < 3500000)) {
    			$newname = '/home/anglicvw/public_html/newdev/app/templates/default/images/testimages/'.$filename;

	    		if (!file_exists($newname)) {

	    			if ((move_uploaded_file($_FILES['file']['tmp_name'],$newname))) {
	    				echo "It's done! The file has been saved as: ".$newname;
	    			} else {
	    				header('Error: A problem occurred during file upload!', true, 500);
	    			}
	    		} else {
	    			header("Error: File ".$_FILES["file"]["name"]." already exists", true, 500);
	             //echo "Error: File ".$_FILES["file"]["name"]." already exists";
	    		}
	    	} else {
	    		header("Error: Only .jpg images under 350Kb are accepted for upload", true, 500);
	    	}
	    } else {
	    	header("Error: No file uploaded", true, 500);
	    }
	}

}
