<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufactures;
use App\Models\Protype;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    public function index()
    {       
      
        //truy vấn có điều kiện
            $productSale = Product::where('sale_price', '!=', 0)->where( 'status', '=', 1)->where( 'quantity', '>', 0)->orderBy('id', 'DESC')->get();
            //lấy 10 sp
            $productsNew = Product::orderBy('id', 'DESC')->where( 'status', '=', 1)->where( 'quantity', '>', 0)->LIMIT(10)->get();
            //truy vấn có điều kiện
            $productsfeature = Product::where('feature', '=', 1)->where( 'status', '=', 1)->where( 'quantity', '>', 0)->orderBy('id', 'DESC')->LIMIT(10)->get();
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
            $products = Product::where('type_id', '=', $id)->paginate(6);
        }elseif($pieces[0] == "manu"){
            $id = $pieces[1];
            //lấy theo loại sp
            $products = Product::where('manu_id', '=', $id)->paginate(6);
        }elseif($pieces[0] == "item"){
            //lấy chi tiết sản phẩm
            $id = $pieces[1];
            $product = Product::where('id', '=', $id)->get();

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
      

       switch ($request) {
           //lấy toan bo san ham
        case  $request->post('Ram') == "" && $request->post('Capacity') == "" && $request->post('Manufactures') == "ALL" && $request->post('Protype') == "ALL" && $request->post('Protype') == "ALL":
            $products = Product::orderBy('id', 'DESC')->where( 'status', '=', 1)->where( 'quantity', '>', 0)->paginate(6);
               break;
               // loc theo manu, type, Capacity, Ram
               case  $request->post('Ram') != "" && $request->post('Capacity') != "" && $request->post('Manufactures') != "ALL" && $request->post('Protype') != "ALL":
                $products = Product::where('manu_id','=',$request->post('Manufactures'))->where('Capacity','=',$request->post('Capacity'))->where('type_id','=',$request->post('Protype'))->where('Ram','=',$request->post('Ram'))->paginate(6);
                   break;
                    // loc theo  Ram
                   case  $request->post('Ram') != "" && $request->post('Capacity') == "" && $request->post('Manufactures') == "ALL" && $request->post('Protype') == "ALL" && $request->post('Protype') == "ALL":
                    $products = Product::where('Ram','=',$request->post('Ram'))->paginate(6) ;
                       break;
                        // loc theo Capacity
                       case  $request->post('Ram') == "" && $request->post('Capacity') != "" && $request->post('Manufactures') == "ALL" && $request->post('Protype') == "ALL" && $request->post('Protype') == "ALL":
                        $products = Product::where('Capacity','=',$request->post('Capacity'))->paginate(6) ;
                           break;
                            // loc theo manu, type
           case $request->post('Ram') == "" && $request->post('Capacity') == "":
            $products = Product::where('type_id','=',$request->post('Protype'))->where('manu_id','=',$request->post('Manufactures'))->paginate(6) ;
               break;
                // loc theo type, Ram
               case $request->post('Manufactures') == "ALL" && $request->post('Capacity') == "":
                $products = Product::where('type_id','=',$request->post('Protype'))->where('Ram','=',$request->post('Ram'))->paginate(6) ;
                   break;
                    // loc theo  type, Capacity
                   case $request->post('Manufactures') == "ALL" && $request->post('Ram') == "":
                    $products = Product::where('type_id','=',$request->post('Protype'))->where('Capacity','=',$request->post('Capacity'))->paginate(6) ;
                       break;
                        // loc theo manu, Capacity,
                       case $request->post('Protype') == "ALL" && $request->post('Ram') == "":
                        $products = Product::where('manu_id','=',$request->post('Manufactures'))->where('Capacity','=',$request->post('Capacity'))->paginate(6) ;
                           break;
                            // loc theo manu, Ram
                           case $request->post('Protype') == "ALL" && $request->post('Capacity') == "":
                            $products = Product::where('manu_id','=',$request->post('Manufactures'))->where('Ram','=',$request->post('Ram'))->paginate(6) ;
                               break;
                                 
                             // loc theo manu, type, Ram
                   case  $request->post('Capacity') == "" && $request->post('Ram') != "" && $request->post('Manufactures') != "ALL" && $request->post('Protype') != "ALL":
                    $products = Product::where('manu_id','=',$request->post('Manufactures'))->where('Ram','=',$request->post('Ram'))->where('type_id','=',$request->post('Protype'))->paginate(6) ;
                       break;
                        // loc theo manu, type, Capacity
                       case  $request->post('Ram') == "" :
                        $products = Product::where('manu_id','=',$request->post('Manufactures'))->where('Capacity','=',$request->post('Capacity'))->where('type_id','=',$request->post('Protype'))->paginate(6) ;
                           break;
                         
       }
       
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
  
    public function logout()
    {       
        Auth::logout();
        return view('auth.login');
    }
}
