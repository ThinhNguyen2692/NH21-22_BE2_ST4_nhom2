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
            $productSale = Product::where('sale_price', '!=', 0)->orderBy('id', 'DESC')->get();
            //lấy 10 sp
            $productsNew = Product::orderBy('id', 'DESC')->LIMIT(10)->get();
            //truy vấn có điều kiện
            $productsfeature = Product::where('feature', '=', 1)->orderBy('id', 'DESC')->LIMIT(10)->get();
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
        $product = Product::where('type_id', '=', $id)->paginate(3);
        $products = Product::where('type_id', '=', $id)->paginate(3);
        //lấy sản phẩm theo type
        if($pieces[0] == "type") {
            $id = $pieces[1];
            $products = Product::where('type_id', '=', $id)->paginate(6);
        }elseif($pieces[0] == "manu"){
            $id = $pieces[1];
            //lấy theo loại sp
            $products = Product::where('manu_id', '=', $id)->paginate(6);
        }elseif($pieces[0] == "item"){
            //lấy chi tiết sản phẩm
            $id = $pieces[1];
            $product = Product::where('id', '=', $id)->paginate(6);

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
      $products = Product::where('name', 'like', "%$keyword%")->take(30)->paginate(6)->appends(['keyword' => $keyword]);
        return view('shop-product-list')->with('datas', $products)->with('manufactures', $manufactures)->with('keyword', $keyword)->with('protype', $protype);
    }
    public function filter(Request $request)
    {       
       $products = Product::all();
       //thứ tự mảng [Ram,CAPACITY,MANU,TYPE]
       if( $request->post('Manufactures') == "ALL"){
           //trường hợp manu Al
        $products = DB::select('select * from users where Gam = ? AND Dung_Luong = ? AND type_id = ? ', $request->post('Ram'),$request->post('Capacity'),$request->post('Protype'));
       }elseif($request->post('Protype') == "ALL"){
             //trường hợp type All
        $products = DB::select('select * from users where Gam = ? AND Dung_Luong = ? AND manu_id = ? ', $request->post('Ram'),$request->post('Capacity'),$request->post('Manufactures'));
       }elseif($request->post('Manufactures') == "ALL" && $request->post('Protype') == "ALL"){
        $products = DB::select('select * from users where Gam = ? AND Dung_Luong = ?', $request->post('Ram'),$request->post('Capacity'));
    }else{
        $products = DB::select('select * from users where Gam = ? AND Dung_Luong = ? AND manu_id = ? AND type_id = ? ', $request->post('Ram'),$request->post('Capacity'),$request->post('Manufactures'),$request->post('Protype'));
    }
    $manufactures = Manufactures::all();
    $protype = Protype::all();
    return view('shop-product-list')->with('datas', $products)->with('manufactures', $manufactures)->with('protype', $protype);
    }
  
 
}
