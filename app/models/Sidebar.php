<?php 
namespace App\models;
use Request, DB;
use Illuminate\Database\Eloquent\Model;

class Sidebar extends Model {

    public static function getType(){
        $type= DB::table('tbl_typeoff')
            // ->leftJoin('tbl_product','tbl_typeoff.id_typeoff','=','tbl_product.id_typeoff')
            // ->where('active_product',1)
            ->orderby('id_typeoff','desc')
            ->get();

        foreach ($type as $key) {
            # code...
            $key->count= DB::table('tbl_product')
                ->where('id_typeoff',$key->id_typeoff)
                ->where('active_product',1)
                ->count();
        }

        // $type->url=$_SERVER['REQUEST_URI'];

        return $type;
    }

    public static function getAllProduct($type,$search){
        // return DB::table('tbl_product')
        //     ->join('tbl_typeoff','tbl_typeoff.id_typeoff','=','tbl_product.id_typeoff')
        //     // ->join('tbl_date','tbl_date.id_product','=','tbl_product.id_product')
        //     // ->join('tbl_price','tbl_price.id_product','=','tbl_product.id_product')
        //     ->join('tbl_date', function ($join) {
        //         $join->on('tbl_product.id_product', '=', 'tbl_date.id_product')
        //              ->orderby('tbl_date.id_date','desc')->groupBy('tbl_date.id_date');
        //     })
        //     ->join('tbl_price', function ($join) {
        //         $join->on('tbl_product.id_product', '=', 'tbl_price.id_product')
        //              ->orderby('tbl_price.id_price','desc')->groupBy('tbl_price.id_price');
        //     })
        //     // ->where('tbl_date.id_date','max(tbl_date.id_date)')
        //     ->orderby('tbl_product.id_product','desc')
        //     ->get();

        // return DB::select('  SELECT u.*,
        //          MAX(t.id_date) AS id_date,t.date_two,t.date_one,
        //          MAX(p.id_price) AS id_price,p.main_price,p.discount_price,p.discount_percent,
        //          AVG(w.rate) AS rate
        //     FROM tbl_product u
        //     LEFT JOIN tbl_date t ON t.id_product = u.id_product
        //     LEFT JOIN tbl_price p ON p.id_product = u.id_product
        //     LEFT JOIN tbl_comment w ON w.id_product = u.id_product
        //     GROUP BY u.id_product ORDER BY u.id_product desc');

        $pro= DB::table('tbl_product')
            ->join('tbl_typeoff','tbl_typeoff.id_typeoff','=','tbl_product.id_typeoff')
            ->orderby('id_product','desc')
            ->where('active_product',1)
            ->where('name_typeoff','like','%'.$type.'%')
            ->where('name_product','like','%'.$search.'%')
            ->paginate(1);

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

}
