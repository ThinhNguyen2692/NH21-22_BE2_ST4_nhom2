<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufactures;
use App\Models\Protype;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    public function index()
    {       
      
        //truy vấn có điều kiện
            $productSale = Product::where('sale_price', '!=', 0)->where( 'status', '=', 1)->orderBy('id', 'DESC')->get();
            //lấy 10 sp
            $productsNew = Product::orderBy('id', 'DESC')->where( 'status', '=', 1)->LIMIT(10)->get();
            //truy vấn có điều kiện
            $productsfeature = Product::where('feature', '=', 1)->where( 'status', '=', 1)->orderBy('id', 'DESC')->LIMIT(10)->get();
            $manufactures = Manufactures::all();
            $protype = Protype::all();
            //truy vấn lấy 1 sp  
            return view('shop-index')->with('protype', $protype)->with('manufactures', $manufactures) ->with('dataNew', $productsNew) ->with('datafeature', $productsfeature) ->with('productSale', $productSale);
    }

    //hiện thị danh sach san phâm và chi tiết sản phẩm
    public function show($name, $id)
    {       
        $key = $id;
        $pieces = explode("_", $id);
        $product = Product::where('type_id', '=', $id)->where('status', '=', 1)->paginate(3);
        $products = Product::where('type_id', '=', $id)->where('status', '=', 1)->paginate(3);
        //lấy sản phẩm theo type
        if($pieces[0] == "type") {
            $id = $pieces[1];
            $products = Product::where('type_id', '=', $id)->where('status', '=', 1)->paginate(6);
        }elseif($pieces[0] == "manu"){
            $id = $pieces[1];
            //lấy theo loại sp
            $products = Product::where('manu_id', '=', $id)->where('status', '=', 1)->paginate(6);
        }elseif($pieces[0] == "item"){
            //lấy chi tiết sản phẩm
            $id = $pieces[1];
            $product = Product::where('id', '=', $id)->where('status', '=', 1);

        }
        $manufactures = Manufactures::all();
        $protype = Protype::all();
        return view($name)->with('data', $product) ->with('datas', $products)->with('manufactures', $manufactures)->with('protype', $protype)->with('key', $key);
    }


    // ham tim kiếm
    public function store(Request $request)
    {       
        $manufactures = Manufactures::all();
        $protype = Protype::all();
       $keyword =$request->get('keyword');
      $products = Product::where('name', 'like', "%$keyword%")->where('status', '=', 1)->take(30)->paginate(6)->appends(['keyword' => $keyword]);
        return view('shop-product-list')->with('datas', $products)->with('manufactures', $manufactures)->with('keyword', $keyword)->with('protype', $protype);
    }
    public function filter(Request $request)
    {       
      
       //thứ tự mảng [Ram,CAPACITY,MANU,TYPE]
       if( $request->post('Manufactures') == "ALL"){
           //trường hợp manu Al
        $products = Product::where('type_id','=',$request->post('Protype'))->where('Ram', 'LIKE',"%{$request->post('Ram')}%")->where('Capacity', 'LIKE',"%{$request->post('Capacity')}%")->paginate(6);
       }elseif($request->post('Protype') == "ALL"){
             //trường hợp type All             
        $products = Product::where('Ram', 'LIKE',"%{$request->post('Ram')}%")->where('Capacity','LIKE',"%{$request->post('Capacity')}%")->where('manu_id','=',$request->post('Manufactures'))->paginate(6);
       }

       if($request->post('Manufactures') == "ALL" && $request->post('Protype') == "ALL"){
      
        $products = Product::where('Ram', 'LIKE',"%{$request->post('Ram')}%")->where('Capacity','LIKE',"%{$request->post('Capacity')}%")->paginate(6);
    }else{   $products = Product::where('Ram', 'LIKE',"%{$request->post('Ram')}%")->where('Capacity','LIKE',"%{$request->post('Capacity')}%")->where('type_id','=',$request->post('Protype'))->where('manu_id','=',$request->post('Manufactures'))->paginate(6); }
       
    $manufactures = Manufactures::all();
    $protype = Protype::all();
    $manu = $request->post('Manufactures');
    $type = $request->post('Protype');
    foreach ($manufactures as $key) {
        if($key->id == $request->post('Manufactures') ) {
            $manu = $key->manu_name;
            break;
        }
    }
    foreach ($protype as $key) {
        if($key->id == $request->post('Protype') ) {
            $type = $key->type_name;
            break;
        }
    }
   $loc = "Ram: {$request->post('Ram')}; Capacity: {$request->post('Capacity')}; Manu: {$manu}; Type: {$type}";
    return view('shop-product-list')->with('datas', $products)->with('manufactures', $manufactures)->with('protype', $protype)->with('locSP', $loc);
    }
  
 
}
