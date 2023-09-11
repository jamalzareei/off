<?php 
namespace App\models;

use Request, DB;
use Illuminate\Database\Eloquent\Model;

class Card extends Model {

	//

	public static function addCardUser($id_user,$id_product,$code_card,$date_insert,$active_card,$cookie_ip){
		return DB::table('tbl_card')->insertGetId(array(
			'id_user' => $id_user,
			'id_product' => $id_product,
			'code_card' => $code_card,
			'date_insert' => $date_insert,
			'active_card' => $active_card,
			'cookie_ip' => $cookie_ip,
			));
	}

	public static function existCardUser($id_user,$id_product){
		return DB::table('tbl_card')
			->where('id_user',$id_user)
			->where('id_product',$id_product)
			->first();
	}

	public static function existCard($id_product,$cookie_ip){
		return DB::table('tbl_card')
			->where('cookie_ip',$cookie_ip)
			->where('id_product',$id_product)
			->first();
	}

	public static function existUpCardUser($id_user,$id_product,$count){
		return DB::table('tbl_card')
			->where('id_user',$id_user)
			->where('id_product',$id_product)
			->update(array(
				'count' => $count,
				));
	}
	public static function existUpCard($id_product,$cookie_ip,$count){
		return DB::table('tbl_card')
			->where('cookie_ip',$cookie_ip)
			->where('id_product',$id_product)
			->update(array(
				'count' => $count,
				));
	}

	public static function addCard($id_product,$date_insert,$active_card,$cookie_ip){
    	// return 'aa';
		return DB::table('tbl_card')->insertGetId(array(
			'id_product' => $id_product,
			'date_insert' => $date_insert,
			'active_card' => $active_card,
			'cookie_ip' => $cookie_ip,
			));
	}

	public static function upCard($id_user,$code_card,$cookie_ip){
		return DB::table('tbl_card')
		->where('cookie_ip', $cookie_ip)
		->update(array(
			'id_user' => $id_user,
			'code_card' => $code_card,
			));
	}

	public static function getCardUser($id_user){
		$query= DB::table('tbl_card')
		->join('tbl_product','tbl_product.id_product','=','tbl_card.id_product')
		->where('id_user',$id_user)
		->where('active_card',0)
		->get();

		foreach ($query as $key) {
			$key->price= DB::table('tbl_price')
			->where('id_product',$key->id_product)
			->orderby('id_price', 'desc')
			->first();

			$key->date= DB::table('tbl_date')
			->where('id_product',$key->id_product)
			->orderby('id_date', 'desc')
			->first();
		}
		return $query;
	}

	public static function getBuyCardUser($id_user){
		$query= DB::table('tbl_card')
		->join('tbl_product','tbl_product.id_product','=','tbl_card.id_product')
		->where('id_user',$id_user)
		->where('active_card',1)
		->get();

		foreach ($query as $key) {
			$key->price= DB::table('tbl_price')
			->where('id_product',$key->id_product)
			->orderby('id_price', 'desc')
			->first();

			$key->date= DB::table('tbl_date')
			->where('id_product',$key->id_product)
			->orderby('id_date', 'desc')
			->first();
		}
		return $query;
	}

	public static function getCardCookie($cookie_ip){
		$query= DB::table('tbl_card')
		->join('tbl_product','tbl_product.id_product','=','tbl_card.id_product')
		->where('cookie_ip',$cookie_ip)
		->where('active_card',0)
		->get();

		foreach ($query as $key) {
			$key->price= DB::table('tbl_price')
			->where('id_product',$key->id_product)
			->orderby('id_price', 'desc')
			->first();

			$key->date= DB::table('tbl_date')
			->where('id_product',$key->id_product)
			->orderby('id_date', 'desc')
			->first();
		}
		return $query;
	}

	public static function updateCountCard($id_card,$count){
		return DB::table('tbl_card')
			->where('id_card', $id_card)
			->update(array(
					'count' => $count,
			));
	}

	public static function deleteCard($id_card){
		return DB::table('tbl_card')
			->where('id_card', $id_card)
			->delete();
	}

	public static function addWishlist($id_product,$id_user,$date_insert){
		return DB::table('tbl_wishlist')->insertGetId(array(
			'id_product' => $id_product,
			'id_user' => $id_user,
			'date_insert' => $date_insert,
			));
	}
	public static function removeWishlist($id_product,$id_user){
		return DB::table('tbl_wishlist')
			->where('id_product', $id_product)
			->where('id_user', $id_user)
			->delete();
	}
	public static function getWishlist($id_product,$id_user){
		return DB::table('tbl_wishlist')
			->where('id_product', $id_product)
			->where('id_user', $id_user)
			->first();
	}
	public static function getWishlistUser($id_user){
		$query= DB::table('tbl_wishlist')
			->join('tbl_product','tbl_wishlist.id_product','=','tbl_product.id_product')
			->where('id_user', $id_user)
			->get();

		foreach ($query as $key) {
			$key->price= DB::table('tbl_price')
			->where('id_product',$key->id_product)
			->orderby('id_price', 'desc')
			->first();

			$key->date= DB::table('tbl_date')
			->where('id_product',$key->id_product)
			->orderby('id_date', 'desc')
			->first();
		}
		return $query;
	}
}
