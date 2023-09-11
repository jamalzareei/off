<?php 
namespace App\models;
use Request, DB;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

	protected $table = 'tbl_user';
	//
	public static function registerUser($firstname,$lastname,$email,$tell,$sex,$code_confirm_email,$code_confirm_tell,$get_offer,$date_register){
        return DB::table('tbl_user')->insert(array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'tell' => $tell,
            'sex' => $sex,
            'get_offer' => $get_offer,
            'date_register' => $date_register,
            'code_confirm_email' => $code_confirm_email,
            'code_confirm_tell' => $code_confirm_tell,
            'active_user' => 0,
        ));
	}

	public static function checkUser($email)
    {
        return DB::table('tbl_user')->where('email', $email)->first();
    }

    public static function checkUserExit($email,$code_confirm_tell,$code_confirm_email){
        return DB::table('tbl_user')
            ->where('email', $email)
            ->where('code_confirm_tell', $code_confirm_tell)
            ->where('code_confirm_email', $code_confirm_email)
            ->first();
    }
//http://localhost/masoud/public/resetpassword/jzcs89@gmail.com/4168/k2CZEXX8XIFLYMcupIjpfe217wB6Y2ghGozriXdS

	public static function passwordUser($id_user,$password,$date_login,$device_login,$os_login,$ip_user,$browser_login){
        return DB::table('tbl_password')->insert(array(
            'id_user' => $id_user,
            'password' => $password,
            'date_login' => $date_login,
            'device_login' => $device_login,
            'os_login' => $os_login,
            'ip_user' => $ip_user,
            'browser_login' => $browser_login,
        ));
	}
    public static function changeToken($id_user,$_token){
        return DB::table('tbl_user')
            ->where('id_user', $id_user)
            ->update(array(
                'active_user' => 1,
                'code_confirm_email' => $_token
            ));
    }

    public static function activeUser($email,$code_confirm_tell,$code_confirm_email){
        return DB::table('tbl_user')
            ->where('email', $email)
            ->where('code_confirm_tell', $code_confirm_tell)
            ->where('code_confirm_email', $code_confirm_email)
            ->update(array(
                'active_user' => 1
            ));
    }

    public static function user($email){
        return DB::table('tbl_user')
            ->join('tbl_password','tbl_user.id_user','=','tbl_password.id_user')
            ->where('tbl_user.email',$email)
            ->orderby('tbl_password.id_password','desc')
            // ->where('tbl_password.password',$password)
            ->first();
    }

    public static function updateUser($firstname,$lastname,$email,$tell,$sex,$get_offer){
        return DB::table('tbl_user')
            ->where('email', $email)
            ->update(array(
                'firstname' => $firstname,
                'lastname' => $lastname,
                'tell' => $tell,
                'sex' => $sex,
                'get_offer' => $get_offer,
            ));
    }

}
