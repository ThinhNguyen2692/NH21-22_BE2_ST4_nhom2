<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufactures;
use App\Models\Protype;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function addReview($id,Request $request){
        DB::table('review')->insert([
            ['id_product'=>(int)$id, 'user_name'=>$request->post('name'), 'email'=>$request->post('email'), 'review_user'=>$request->post('review'),'rating'=>$request->post('inlineRadioOptions')]
          ]);
          $product = Product::where('id', '=', $id)->get();
          $getReview = null;
          $getReview = Review::where('id_product', '=', $id)->get();
          $manufactures = Manufactures::all();
          $protype = Protype::all();
          $typeid = 0;
        foreach($product as $value){$typeid = $value->type_id ;}
        $productType = Product::where('type_id', '=', $typeid)->orderBy('id', 'DESC')->LIMIT(5)->get();
        $productSale = Product::where('sale_price', '!=', 0)->where( 'status', '=', 1)->where( 'quantity', '>', 0)->orderBy('id', 'DESC')->LIMIT(3)->get();
          return view('shop-item')->with('data',$product)->with('manufactures', $manufactures)->with('protype', $protype)->with('getReview',$getReview)->with('productType',$productType )->with('productSale',$productSale );
    }
    public function show(){
        $getReview = DB::select('SELECT product.*, review.id as id_review, review.user_name, review.email, review.review_user, review.rating FROM `review` INNER JOIN `product` ON review.id_product = `product`.`id` order By id_product DESC');
        return view('review')->with('getReview',$getReview);
    }
    public function deleteReview($id){
         DB::select('DELETE FROM `review` WHERE `id` = ?',[$id]);
         $getReview = DB::select('SELECT product.*, review.id as id_review, review.user_name, review.email, review.review_user, review.rating FROM `review` INNER JOIN `product` ON review.id_product = `product`.`id` order By id_product DESC');
        return view('review')->with('getReview',$getReview);
    }
}
