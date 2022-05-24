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
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class BillController extends Controller
{
    public function addBill(Request $request){
        $email = $request->post('email');
        $address = $request->post('address');
        $bill_id = 0;
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
              DB::update('update product set quantity = quantity - ? where id = ?', [ $value->quantity_cart,$value->id_product]);
          }
          //cap nhat bill
          DB::update('update bill set total = ?, payment = ? where id = ?', [$total,$payment,$bill_id]);
          DB::delete('delete from cart where id_user = ?', [ Auth::user()->id]);
          
        }else{
                if (session_id() === '')
              session_start();
            var_dump($_SESSION['cart']);
            DB::table('bill')->insert([
                ['id_user'=>1, 'address'=>$address, 'total'=>0, 'payment'=>0]
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
        //Gui mail
        $getBillDetail = DB::table('bill_details')
        ->join('product', 'bill_details.id_product', '=', 'product.id')
        ->select('product.*', 'bill_details.*')
        ->where('bill_details.id_bill', '=', $bill_id)
        ->get();
        
        $data = [
          'title'=>"Hóa đơn mua hàng",
          'address'=>$address,
          'datas' => $getBillDetail
      ];
        Mail::to($email)->send(new SendMail($data));
       return view('shop-shopping-cart')->with('protype', $protype)->with('manufactures', $manufactures);
    }



    public function history(){
      $getBillDetail = DB::table('bill_details')
      ->join('product', 'bill_details.id_product', '=', 'product.id')
      ->select('product.*', 'bill_details.*')
      ->where('bill_details.id_bill', '=', $bill_id)
      ->get();
        $manufactures = Manufactures::all();
        $protype = Protype::all();
        return view('shop-history')->with('getBill', $getBill)->with('protype', $protype)->with('manufactures', $manufactures);
    }

    public function admimBill(){
      $getBillAll = DB::table('bill')->join('Users', 'bill.id_user', '=', 'users.id')->get();;
      return view('Bill')->with('getBillAll', $getBillAll);
    }
    
    public function admimBilldetail(){
      $getBillAll = Bill::all();
      $getBillDetail = DB::table('bill_details')
      ->join('product', 'bill_details.id_product', '=', 'product.id')
      ->select('product.*', 'bill_details.*')
      ->get();
      
    }
}
