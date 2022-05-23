<?php

namespace App\Http\Controllers;

use App\Models\Manufactures;
use App\Models\Protype;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;

class BillController extends Controller
{
    public function addBill(Request $request){
        $email = $request->post('email');
        $address = $request->post('address');
        if(isset(Auth::user()->id)){
        
         DB::table('bill')->insert([
            ['id_user'=>Auth::user()->id, 'address'=>$address, 'total'=>0, 'payment'=>0]
          ]);
          //lay id bill vua tao
          $billnew = Bill::orderBy('id', 'DESC')->LIMIT(1)->get(); 
          foreach($billnew as $value){
               $bill_id = $value->id;
          }
          // lay danh sach giỏ hàng cua user
          $cart = DB::table('cart')
          ->join('product', 'cart.id_product', '=', 'product.id')
          ->join('users', 'cart.id_user', '=', 'users.id')
          ->select('cart.*', 'product.*', 'users.*')
          ->where('users.id', '=', Auth::user()->id)
          ->get();
          // so tien phai thanh toan
          $payment = 0;
          //tông tien cua don hang
          $total = 0;
          foreach($cart as $value){
            DB::table('bill_details')->insert([
                ['id_bill'=>$bill_id, 'id_product'=>$value->id_product, 'quantity_bill'=>$value->quantity_cart, 'payment'=>$value->total_cart, 'total'=>$value->price * $value->quantity_cart]
              ]);
              $total += $value->price * $value->quantity_cart;
              $payment +=  $value->total_cart;
          }
          //cap nhat bill
          DB::update('update bill set total = ?, payment = ? where id = ?', [$total,$payment,$bill_id]);
          DB::delete('delete from cart where id_user = ?', [ Auth::user()->id]);
          
        }else{
                if (session_id() === '')
              session_start();
            var_dump($_SESSION['cart']);
            DB::table('bill')->insert([
                ['id_user'=>0, 'address'=>$address, 'total'=>0, 'payment'=>0]
              ]);
              //lay id bill vua tao
              $billnew = Bill::where('total','=',0)->get(); 
              foreach($billnew as $value){
                   $bill_id = $value->id;
              }
             
              if (session_id() === '')
              session_start();
                // so tien phai thanh toan

                $payment = 0;
                //tông tien cua don hang
                $total = 0;
              foreach($_SESSION['cart'] as $value){
                  var_dump($value);
                   $payment = 0;
          //tông tien cua don hang
          $total = 0;
                DB::table('bill_details')->insert([
                    
                    ['id_bill'=>$bill_id, 'id_product'=>$value['id'], 'quantity_bill'=>$value['quantity_cart'], 'payment'=>$value['total_cart'], 'total'=>$value['price'] * $value['quantity_cart']]
                  ]);
                  $total += $value['price'] * $value['quantity_cart'];
                  $payment +=  $value['total_cart'];
              }
              DB::update('update bill set total = ?, payment = ? where id = ?', [$total,$payment,$bill_id]);
              unset($_SESSION['cart']);
        }
        $manufactures = Manufactures::all();
        $protype = Protype::all();
       return view('shop-shopping-cart')->with('protype', $protype)->with('manufactures', $manufactures);
    }
    public function history(){
        $getBill = DB::table('bill')
        ->join('bill_details', 'bill.id', '=', 'bill_details.id_bill')
        ->join('product', 'bill_details.id_product', '=', 'product.id')
        ->join('users', 'bill.id_user', '=', 'users.id')
        ->select('bill.*', 'product.*', 'users.*', 'bill_details.*')
        ->where('users.id', '=', Auth::user()->id)
        ->get();
        $manufactures = Manufactures::all();
        $protype = Protype::all();
        return view('shop-history')->with('getBill', $getBill)->with('protype', $protype)->with('manufactures', $manufactures);
    }
}
