<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufactures;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    public function index($name = 'shop-index', $id = "1_type")
    {       
        $pieces = explode("_", $id);
        $product = Product::where('type_id', '=', $id)->paginate(3);
        $products = Product::where('type_id', '=', $id)->paginate(3);
        if($pieces[1] == "type") {
            $id = $pieces[0];
            $products = Product::where('type_id', '=', $id)->paginate(3);
        }elseif($pieces[1] == "manu"){
            $id = $pieces[0];
            //lấy theo loại sp
            $products = Product::where('manu_id', '=', $id)->paginate(3);
        }elseif($pieces[1] == "item"){
            $id = $pieces[0];
            $product = Product::where('id', '=', $id)->paginate(3);
        }else{
            // $timKiem = explode("=", $id);
            // $id = $pieces[1];
            // $products = Product::where('name', 'like', '%M1%')->paginate(3);
            
        }
        //truy vấn có điều kiện
            $productSale = Product::where('sale_price', '!=', 0)->orderBy('id', 'DESC')->get();
            //lấy 10 sp
            $productsNew = Product::orderBy('id', 'DESC')->LIMIT(10)->get();
            //truy vấn có điều kiện
            $productsfeature = Product::where('feature', '=', 1)->orderBy('id', 'DESC')->LIMIT(10)->get();
            //truy vấn lấy 1 sp  
            return view($name) ->with('dataNew', $productsNew) ->with('datafeature', $productsfeature) ->with('data', $product) ->with('datas', $products)->with('productSale', $productSale)->with('id', $id);
    }
    public function store(Request $id)
    {       
       
      $products = Product::where('name', 'like', '%'.$id->value.'%')->paginate(3);
       
        return view('shop-product-list')->with('datas', $products);
    }
    
 
}
