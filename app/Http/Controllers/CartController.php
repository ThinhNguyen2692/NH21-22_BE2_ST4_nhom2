<?php

namespace App\Http\Controllers;
use App\Models\Manufactures;
use App\Models\Protype;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //them sanr pham vao cart
    //dang nhap: luu vao data base
    //khong dang nhap: luu vao session
    public function index($id, $quantity)
    {       
        //kiem tra co user la dang nhap
        if(isset(Auth::user()->id)){
            $product = Product::find($id);
            $total = $product->price - ($product->price * ($product->sale_price/100));
            $total = $total * $quantity;
            $cart = Cart::where('id_user','=',(Auth::user()->id))->get();
           
            foreach ($cart as $row) {
              //kiem tra san pham co trong cart hay chua
                if($row->id_product == $id){
                    if($quantity <= $product->quantity){
                        DB::update('update cart set quantity_cart = ?, total_cart = ? where id_product = ?', [$quantity,$total,$row->id_product]);
                       
                    }else{
                        $message = "So luong san pham khong du voi so luong mua cua quy khach";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                    //update khi san pham da co trong cart
                    $getCart = DB::table('cart')
                    ->join('product', 'cart.id_product', '=', 'product.id')
                    ->join('users', 'cart.id_user', '=', 'users.id')
                    ->select('cart.*', 'product.*', 'users.*')
                    ->where('users.id', '=', Auth::user()->id)
                    ->get();
                    $manufactures = Manufactures::all();
                    $protype = Protype::all();
                  return view('shop-shopping-cart')->with('getCart',$getCart)->with('protype', $protype)->with('manufactures', $manufactures);
                    
                }
            
           }
           // them khi san pham chua co trong cart
            DB::table('cart')->insert([
                ['id_product'=>$id, 'id_user'=>Auth::user()->id, 'quantity_cart'=>$quantity, 'total_cart'=>$total]
              ]);
              $getCart = DB::table('cart')
              ->join('product', 'cart.id_product', '=', 'product.id')
              ->join('users', 'cart.id_user', '=', 'users.id')
              ->select('cart.*', 'product.*', 'users.*')
              ->where('users.id', '=', Auth::user()->id)
              ->get();
        }else{
            //luu vao session khi user khong dang nhap
            if (session_id() === '')
            session_start();
            $product = Product::find($id);
            $id_product = $product->id;
            // kiem tra session cart co san pham hay khong
          if(!isset($_SESSION['cart'][$id_product])){
          $_SESSION['cart'][$id_product] = array(
                'id' => $product->id,
                'product_name' => $product->name,
                'sale_price' => $product->sale_price,
                'quantity_cart' => (int) $quantity,
                'image' =>  $product->image,
                'price' =>  $product->price,
                'total_cart' => ($product->price-($product->price * ($product->sale_price/100))) * $quantity
             );
            } else{
                if($quantity <= $product->quantity){
                    $_SESSION['cart'][$id_product]['quantity_cart'] = (int) $quantity;
                $_SESSION['cart'][$id_product]['total_cart'] = ($product->price - ($product->price * ($product->sale_price/100))) * (int) $quantity;
                }else{
                    $message = "So luong san pham khong du voi so luong mua cua quy khach";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
                
            } 
           
             $getCart = $_SESSION['cart'];
        }
        $manufactures = Manufactures::all();
        $protype = Protype::all();
      
        return view('shop-shopping-cart')->with('getCart',$getCart)->with('protype', $protype)->with('manufactures', $manufactures);
    }
    //hien thi cart
    public function show(){

        if(isset(Auth::user()->id)){
            $getCart = DB::table('cart')
            ->join('product', 'cart.id_product', '=', 'product.id')
            ->join('users', 'cart.id_user', '=', 'users.id')
            ->select('cart.*', 'product.*', 'users.*')
            ->get();
            
        }else{
            if (session_id() === '')
            session_start();
            $getCart = $_SESSION['cart'];
        }
     
        $manufactures = Manufactures::all();
        $protype = Protype::all();
        return view('shop-shopping-cart')->with('getCart',$getCart)->with('protype', $protype)->with('manufactures', $manufactures);
    }
    public function deleteCart($id){

        if(isset(Auth::user()->id)){
           
            DB::delete('delete from cart where id_product = ? and id_user = ?', [$id,Auth::user()->id]);
            $getCart = DB::table('cart')
            ->join('product', 'cart.id_product', '=', 'product.id')
            ->join('users', 'cart.id_user', '=', 'users.id')
            ->select('cart.*', 'product.*', 'users.*')
            ->get();
        }else{
            if (session_id() === '')
            session_start();
            unset($_SESSION['cart'][$id]);
            $getCart = $_SESSION['cart'];
        }
        $manufactures = Manufactures::all();
        $protype = Protype::all();
        return view('shop-shopping-cart')->with('getCart',$getCart)->with('protype', $protype)->with('manufactures', $manufactures);
    }

  
}
