<?php 
namespace App\models;
use Request, DB;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model {

	//
	// protected $table = 'db_admin';

	public static function checkAdmin($username){
		return DB::table('db_admin')->where('username', $username)->first();
    }

    public static function addPost($name_product,$date_insert,$id_typeoff){
    	return DB::table('tbl_product')->insertGetId(array(
            'name_product' => $name_product,
            'date_insert' => $date_insert,
            'id_typeoff' => $id_typeoff,
        ));
    }

    public static function upProduct($id_product,$photo,$details){
        return DB::table('tbl_product')
            ->where('id_product', $id_product)
            ->update(array(
                'photo' => $photo,
                'details' => $details
            ));
    }

    public static function insertDate($id_product,$date_start,$date_end,$date_two,$date_one,$date_start_fa,$date_end_fa,$date_insert){
        // return 'jamal';
        return DB::table('tbl_date')->insertGetId(array(
            'id_product' => $id_product,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'date_two' => $date_two,
            'date_one' => $date_one,
            'date_start_fa' => $date_start_fa,
            'date_end_fa' => $date_end_fa,
            'date_insert' => $date_insert,
        ));
    }

    public static function insertPrice($id_product,$main_price,$discount_price,$discount_percent,$date_insert,$save_you,$t_r_value){
        return DB::table('tbl_price')->insertGetId(array(
            'id_product' => $id_product,
            'main_price' => $main_price,
            'discount_price' => $discount_price,
            'discount_percent' => $discount_percent,
            'date_insert' => $date_insert,
            'save_you' => $save_you,
            't_r_value' => $t_r_value,
        ));
    }

    public static function insertSeller($id_product,$name_seller,$address_seller,$latitude,$longitude,$address_map,$date_insert){
         // return 'aaa';
        return DB::table('tbl_seller')->insertGetId(array(
            'id_product' => $id_product,
            'name_seller' => $name_seller,
            'address_seller' => $address_seller,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'address_map' => $address_map,
            'date_insert' => $date_insert,
        ));
    }

    public static function insertPhoto($id_product,$path_photo,$date_insert){
        return DB::table('tbl_photo')->insertGetId(array(
            'id_product' => $id_product,
            'path_photo' => $path_photo,
            'date_insert' => $date_insert,
        ));
    }

    public static function insertProperty($id_product,$question_property,$answer_property,$date_insert){
        return DB::table('tbl_property')->insertGetId(array(
            'id_product' => $id_product,
            'question_property' => $question_property,
            'answer_property' => $answer_property,
            'date_insert' => $date_insert,
        ));
    }

    public static function deleteProperty($id_property){
        return DB::table('tbl_property')
            ->where('id_property', $id_property)
            ->delete();
    }
    
    public static function deletePhoto($id_photo){
        return DB::table('tbl_photo')
            ->where('id_photo', $id_photo)
            ->delete();
    }

    public static function publish($id_product,$date_insert){
        return DB::table('tbl_product')
            ->where('id_product', $id_product)
            ->update(array(
                'active_product' => 1,
                'date_insert' => $date_insert,
            ));
    }

    public static function getProduct($id_product){
        return DB::table('tbl_product')
            ->where('id_product', $id_product)
            ->orderby('id_product','desc')
            ->first();
    }

    public static function getDate($id_product){
        return DB::table('tbl_date')
            ->where('id_product', $id_product)
            ->orderby('id_date','desc')
            ->first();
    }
    public static function getProperty($id_product){
        return DB::table('tbl_property')
            ->where('id_product', $id_product)
            ->orderby('id_property','desc')
            ->get();
    }
    public static function getPrice($id_product){
        return DB::table('tbl_price')
            ->where('id_product', $id_product)
            ->orderby('id_price','desc')
            ->first();
    }
    public static function getPhoto($id_product){
        return DB::table('tbl_photo')
            ->where('id_product', $id_product)
            ->orderby('id_photo','desc')
            ->get();
    }
    public static function getSeller($id_product){
        return DB::table('tbl_seller')
            ->where('id_product', $id_product)
            ->orderby('id_seller','desc')
            ->first();
    }

    public static function updatePost($id_product,$name_product,$date_insert,$id_typeoff){
        return DB::table('tbl_product')
            ->where('id_product', $id_product)
            ->update(array(
                'active_product' => 0,
                'date_insert' => $date_insert,
                'name_product' => $name_product,
                'id_typeoff' => $id_typeoff,
            ));
    }

    public static function getTypeOff(){
        return DB::table('tbl_typeoff')
            ->orderby('id_typeoff','desc')
            ->get();
    }

    public static function listOffs(){
        $pro= DB::table('tbl_product')
            ->join('tbl_typeoff','tbl_typeoff.id_typeoff','=','tbl_product.id_typeoff')
            ->orderby('id_product','desc')
            // ->where('active_product',1)
            // ->where('name_typeoff','like','%'.$type.'%')
            // ->where('name_product','like','%'.$search.'%')
            ->paginate(9);

        foreach ($pro as $key) {
            # code...
            $key->date= DB::table('tbl_date')
                ->where('id_product',$key->id_product)
                ->orderby('id_date', 'desc')
                ->first();
            $key->price= DB::table('tbl_price')
                ->where('id_product',$key->id_product)
                ->orderby('id_price', 'desc')
                ->first();
            $key->seller= DB::table('tbl_seller')
                ->where('id_product',$key->id_product)
                ->orderby('id_seller', 'desc')
                ->first();
            // $key->rate= DB::table('tbl_comment')
            //     ->where('id_product',$key->id_product)
            //     ->select(DB::raw('MAX(id_comment) AS id_comment,AVG(rate) as rate'))
            //     ->groupby('id_user,id_product')
            //     ->orderby('id_comment', 'desc')
            //     ->get();
                $key->rate= DB::table('tbl_comment')
                    ->where('id_product',$key->id_product)
                    ->orderby('id_comment', 'desc')
                    ->select(DB::raw('AVG(rate) as rate'))
                    ->get();
        }

        return $pro;
    }

    public static function sosial($id_product,$sosial){
        return DB::table('tbl_product')
            ->where('id_product', $id_product)
            ->select('spesial')
            ->update(array(
                'spesial' => $sosial,
            ));
    }


    public static function active($id_product,$active_product){
        return DB::table('tbl_product')
            ->where('id_product', $id_product)
            ->update(array(
                'active_product' => $active_product,
            ));
    }


}
