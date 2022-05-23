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
          return view('shop-item')->with('data',$product)->with('manufactures', $manufactures)->with('protype', $protype)->with('getReview',$getReview);
    }
}
