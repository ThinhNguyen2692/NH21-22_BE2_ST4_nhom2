<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufactures;
use App\Models\Protype;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
      $getProductTop = DB::select('SELECT `product`.`id`, `product`.name, SUM(`bill_details`.`quantity_bill`) as SoLuongBan FROM `bill_details` INNER JOIN `product` ON `bill_details`.`id_product`= `product`.`id`GROUP BY `product`.`id` ORDER BY SoLuongBan DESC LIMIT 4');
     
      
        //trả về số lượng  trong bảng sản phẩm đang bán
        $soLuongUser = DB::select('select Count(id)  as `soluong` from users where role_id != ? and id != ?',[1,1]);
        $soLuongBillCustomerTK = DB::select('select Count(id_user)  as `soluong` from bill where id_user != ?',[1]);
        $soLuongBillCustomer = DB::select('select Count(id_user)  as `soluong` from bill where id_user = ?',[1]);
        $soLuongProducts = DB::select('select Count(id)  as `soluong` from product');
        //trả về số lượng  trong bảng Bill
        $soLuongBill = DB::select('select Count(id)  as `soluong`  from bill');
        //trả về số lượng trong bang san phẩm đang sale
        $soLuongSale = DB::select('select Count(id)  as `soluong`  from product where sale_price != ?', [0]);
        return view('indexAdmin')
            ->with('soLuongProduct', $soLuongProducts)
            ->with('soLuongBill', $soLuongBill)
            ->with('soLuongSale', $soLuongSale)
            ->with('getProductTop',$getProductTop)
            ->with('soLuongUser',$soLuongUser)
            ->with('soLuongBillCustomerTK',$soLuongBillCustomerTK)
            ->with('soLuongBillCustomer',$soLuongBillCustomer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProduct(Request $request, $nameShow)
    {
        if ($nameShow == 'addproduct') {
            $name = $request->post('name');
            $manu_id = $request->post('manu');
            $type_id = $request->post('type');
            $price = $request->post('price');
            $desc = $request->post('desc');
            $feature = $request->post('feature');
            $chip = $request->post('Chip');
            $ram = $request->post('Ram');
            $Capacity = $request->post('Capacity');
            $quantity = $request->post('quantity');
            $HDH = $request->post('HDH');
            $origin = $request->post('origin');
            $request->hasFile('image');
            $img = $request->image;
            $Location = "..\public\assets\pages\img\products";
            $imageName = $img->getClientOriginalName();
            if(!@is_array(getimagesize($Location.$imageName))){
                $img->move($Location, $img->getClientOriginalName());

                DB::table('product')->insert([
                    ['name' => $name, 'sale_price' => 0, 'manu_id' => $manu_id, 'type_id' => $type_id, 'price' => $price, 'image' => $imageName, 'description' => $desc, 'feature' => $feature, 'quantity' => $quantity, 'status' => 1, 'Ram' => $ram, 'Capacity' => $Capacity, 'HDH' => $HDH, 'chip' => $chip, 'origin' => $origin]
                ]);
            } else {
                $message = "Lỗi chọn không phải ảnh";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
          
        } elseif ($nameShow == 'addManu') {
            $name = $request->post('name');
            $request->hasFile('image');
            $img = $request->image;
            $Location = "..\public\assets\pages\img\brands";
            $imageName = $img->getClientOriginalName();
            if(!@is_array(getimagesize($Location.$imageName))){
                $img->move($Location, $img->getClientOriginalName());
            DB::table('manufactures')->insert([
              ['manu_name'=>$name, 'image'=>$imageName]
            ]);
            } else {
                $message = "Lỗi chọn không phải ảnh";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
           
        }else {
            $name = $request->post('name');
            DB::table('protypes')->insert([
              ['type_name'=>$name]
            ]);
        }
        $manufactures = Manufactures::all();
        $products = DB::table('product')
            ->join('manufactures', 'product.manu_id', '=', 'manufactures.id')
            ->join('protypes', 'product.type_id', '=', 'protypes.id')
            ->select('product.*', 'manufactures.manu_name', 'protypes.type_name')
            ->get();

        $protypes = Protype::all();


        //

        return view($nameShow)->with('getProducts', $products)
            ->with('getProtypes', $protypes)
            ->with('getManufactures', $manufactures);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "day laf trang store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
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

        return view($name)->with('getProducts', $products)
            ->with('getProtypes', $protypes)
            ->with('getManufactures', $manufactures)
            ->with('getUser', $getUser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name,$nameShow,$id)
    {
        if ($nameShow == 'editproduct') {
            $getItem = DB::table('product')
            ->join('manufactures', 'product.manu_id', '=', 'manufactures.id')
            ->join('protypes', 'product.type_id', '=', 'protypes.id')
            ->select('product.*', 'manufactures.manu_name', 'protypes.type_name')
            ->where('product.id', '=', $id)
            ->get();
         } elseif ($nameShow == 'editmanu') {
          $getItem = Manufactures::where('id', '=', $id)->get();
        }else {
            $getItem =  Protype::where('id', '=', $id)->get();
       }
        $manufactures = Manufactures::all();
        $protypes = Protype::all();
         return view($nameShow)->with('getItem',$getItem)->with('getProtypes', $protypes)
        ->with('getManufactures', $manufactures);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$name,$nameShow)
    {
        if($name == "products"){
            $id_product = $request->post('id');
            $name_product = $request->post('name');
            $manu_id = $request->post('manu');
            $type_id = $request->post('type');
            $price = $request->post('price');
            $saleprice = $request->post('saleprice');
            $desc = $request->post('desc');
            $feature = $request->post('feature');
            $status = $request->post('status');
            $chip = $request->post('Chip');
            $ram = $request->post('Ram');
            $Capacity = $request->post('Capacity');
            $quantity = $request->post('quantity');
            $HDH = $request->post('HDH');
            $origin = $request->post('origin');
            $request->hasFile('image');
            $img = $request->image;
            if($img != null){
                $Location = "..\public\assets\pages\img\products";
                $imageName = $img->getClientOriginalName();
                if(!@is_array(getimagesize($Location.$imageName))){
                    $img->move($Location, $img->getClientOriginalName());
                    DB::update('update product set name = ?, manu_id = ?, type_id = ?, price = ?, 
                    sale_price = ?, description = ?, feature = ?, quantity = ?, status = ?, Ram = ?
                    , Capacity= ?, chip = ?, origin = ?, image=? where id = ?',[$name_product,$manu_id,
                    $type_id,$price,$saleprice,$desc,$feature,$quantity,$status,$ram,$Capacity,
                    $chip,$origin, $imageName,$id_product]);
                } else {
                    $message = "Lỗi chọn không phải ảnh";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
              
            }else{
                DB::update('update product set name = ?, manu_id = ?, type_id = ?, price = ?, 
                sale_price = ?, description = ?, feature = ?, quantity = ?, status = ?, Ram = ?
                , Capacity= ?, chip = ?, origin = ? where id = ?',[$name_product,$manu_id,
                $type_id,$price,$saleprice,$desc,$feature,$quantity,$status,$ram,$Capacity,
                $chip,$origin,$id_product] );
             }            
        }elseif($name == "protypes"){
            $id_protype = $request->post('id');
            $name_protype = $request->post('name');
            DB::update('update protypes set type_name = ? where id = ?', [$name_protype,$id_protype]);
        }
        else{
            
            $id_manu = $request->post('id');
            $name_manu = $request->post('name');
            $request->hasFile('image');
            $img = $request->image;
            if($img != null){
                $Location = "..\public\assets\pages\img\brands";
                $imageName = $img->getClientOriginalName();
                if(!@is_array(getimagesize($Location.$imageName))){
                    $img->move($Location, $img->getClientOriginalName());
                    DB::update('update manufactures set manu_name = ?, image = ? where id = ?', [$name_manu,$imageName,$id_manu]);
                } else {
                    $message = "Lỗi chọn không phải ảnh";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }else {
                DB::update('update manufactures set manu_name = ? where id = ?', [$name_manu,$id_manu]);
            }
        }
       
         $manufactures = Manufactures::all();
         $products = DB::table('product')
            ->join('manufactures', 'product.manu_id', '=', 'manufactures.id')
            ->join('protypes', 'product.type_id', '=', 'protypes.id')
            ->select('product.*', 'manufactures.manu_name', 'protypes.type_name')
            ->get();

        $protypes = Protype::all();


        //

        return view($name)->with('getProducts', $products)
            ->with('getProtypes', $protypes)
            ->with('getManufactures', $manufactures);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nameShow,$id)
    {
        if ($nameShow == 'products') {
            $soLuong = DB::select('select Count(id_product)  as `soluong` from bill_details where id_product = ?',[$id]);
            $soluongCheck = 0;
            foreach ($soLuong as $value) {
                $soluongCheck = $value->soluong;
            }
            if($soluongCheck == 0) DB::delete('delete from product where id = ? ',[$id]);
            else{
                $message = "Sản phẩm này  hiện tại không thể xóa";
                    echo "<script type='text/javascript'>alert('$message');</script>";
            }
        } elseif ($nameShow == 'manu') {
            $soLuong = DB::select('select Count(manu_id)  as `soluong` from product where manu_id = ?',[$id]);
            $soluongCheck = 0;
            foreach ($soLuong as $value) {
                $soluongCheck = $value->soluong;
            }
            if($soluongCheck == 0)DB::delete('delete from manufactures where id = ? ',[$id]);
            else{
                $message = "Thương hiệu này hiện tại không thể xóa";
                    echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }else {
            $soLuong = DB::select('select Count(type_id)  as `soluong` from product where type_id = ?',[$id]);
            $soluongCheck = 0;
            foreach ($soLuong as $value) {
                $soluongCheck = $value->soluong;
            }
            if($soluongCheck == 0)DB::delete('delete from protypes where id = ? ',[$id]);
            else{
                $message = "Loại sản phẩm này hiện tại không thể xóa";
                    echo "<script type='text/javascript'>alert('$message');</script>";
            }
            
        }
        $manufactures = Manufactures::all();
        $products = DB::table('product')
            ->join('manufactures', 'product.manu_id', '=', 'manufactures.id')
            ->join('protypes', 'product.type_id', '=', 'protypes.id')
            ->select('product.*', 'manufactures.manu_name', 'protypes.type_name')
            ->get();

        $protypes = Protype::all();


        //

        return view($nameShow)->with('getProducts', $products)
            ->with('getProtypes', $protypes)
            ->with('getManufactures', $manufactures);
    }
}