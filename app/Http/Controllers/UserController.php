<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufactures;
use App\Models\Protype;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function delete($id){
        $soLuong = DB::select('select Count(id_user)  as `soluong` from bill where id_user = ?',[$id]);
        $soluongCheck = 0;
        foreach ($soLuong as $value) {
            $soluongCheck = $value->soluong;
        }
        if($soluongCheck == 0) DB::delete('delete from users where id = ? ',[$id]);
            else{
                $message = "Khách hàng này hiện tại không thể xóa";
                    echo "<script type='text/javascript'>alert('$message');</script>";
            }
       
        $manufactures = Manufactures::all();
        $protypes = Protype::all();
        $getUser = User::where('id','!=', 1)->get();
  
        return view('user')
            ->with('getProtypes', $protypes)
            ->with('getManufactures', $manufactures)
            ->with('getUser', $getUser);
    }
    public function create(Request $request){
        
       $pass = Hash::make($request->post('pass'));
       DB::table('users')->insert([
        ['user_name'=>$request->post('name'),'email'=>$request->post('email'),'password'=>$pass,'role_id'=>$request->post('role')]
      ]);
      //trả về du liệu 
      $manufactures = Manufactures::all();
      $products = DB::table('product')
          ->join('manufactures', 'product.manu_id', '=', 'manufactures.id')
          ->join('protypes', 'product.type_id', '=', 'protypes.id')
          ->select('product.*', 'manufactures.manu_name', 'protypes.type_name')
          ->orderBy('product.id', 'asc')
          ->get();

      $protypes = Protype::all();
      $getUser = User::where('id','!=', 1)->get();


      //

      return view('user')->with('getProducts', $products)
          ->with('getProtypes', $protypes)
          ->with('getManufactures', $manufactures)
          ->with('getUser', $getUser);
    }
    public function updateuser(Request $request){
        if($request->post('pass') != ""){
            $pass = Hash::make($request->post('pass'));
        DB::update('update users set user_name = ?, email = ?, role_id = ?, password = ? where id = ?', [$request->post('name'),$request->post('email'),$request->post('role'),$pass,$request->post('id')]);
            
        
        }else{
            DB::update('update users set user_name = ?, email = ?, role_id = ? where id = ?', [$request->post('name'),$request->post('email'),$request->post('role'),$request->post('id')]);
        }

        $manufactures = Manufactures::all();
        $products = DB::table('product')
            ->join('manufactures', 'product.manu_id', '=', 'manufactures.id')
            ->join('protypes', 'product.type_id', '=', 'protypes.id')
            ->select('product.*', 'manufactures.manu_name', 'protypes.type_name')
            ->orderBy('product.id', 'asc')
            ->get();
  
        $protypes = Protype::all();
        $getUser = User::where('id','!=', 1)->get();
  
  
        //
  
        return view('user')->with('getProducts', $products)
            ->with('getProtypes', $protypes)
            ->with('getManufactures', $manufactures)
            ->with('getUser', $getUser);

        
    }

    public function editUser($id){
        $manufactures = Manufactures::all();
        $protypes = Protype::all();
        $getUser = User::where('id','=', $id)->get();
  
  
        //
  
        return view('editUser')
            ->with('getProtypes', $protypes)
            ->with('getManufactures', $manufactures)
            ->with('getUser', $getUser);

    }


}
