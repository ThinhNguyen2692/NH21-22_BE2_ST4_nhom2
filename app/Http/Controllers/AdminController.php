<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufactures;
use App\Models\Protype;
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
        //trả về số lượng  trong bảng sản phẩm đang bán

        $soLuongProducts = DB::select('select Count(id)  as `soluong` from product where status = ?', [1]);
        //trả về số lượng  trong bảng Bill
        $soLuongBill = DB::select('select Count(id)  as `soluong`  from bill');
        //trả về số lượng trong bang san phẩm đang sale
        $soLuongSale = DB::select('select Count(id)  as `soluong`  from product where sale_price != ?', [0]);
        return view('indexAdmin')
            ->with('soLuongProduct', $soLuongProducts)
            ->with('soLuongBill', $soLuongBill)
            ->with('soLuongSale', $soLuongSale);
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
            $img->move($Location, $img->getClientOriginalName());
            DB::table('product')->insert([
                ['name' => $name, 'sale_price' => 0, 'manu_id' => $manu_id, 'type_id' => $type_id, 'price' => $price, 'image' => $imageName, 'description' => $desc, 'feature' => $feature, 'quantity' => $quantity, 'status' => 1, 'Ram' => $ram, 'Capacity' => $Capacity, 'HDH' => $HDH, 'chip' => $chip, 'origin' => $origin]
            ]);
        } elseif ($nameShow == 'addManu') {
            $name = $request->post('name');
            $request->hasFile('image');
            $img = $request->image;
            $Location = "..\public\assets\pages\img\brands";
            $imageName = $img->getClientOriginalName();
            $img->move($Location, $img->getClientOriginalName());
            DB::table('manufactures')->insert([
              ['manu_name'=>$name, 'image'=>$imageName]
            ]);
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
    public function show($id)
    {
        //trả về du liệu 
        $manufactures = Manufactures::all();
        $products = DB::table('product')
            ->join('manufactures', 'product.manu_id', '=', 'manufactures.id')
            ->join('protypes', 'product.type_id', '=', 'protypes.id')
            ->select('product.*', 'manufactures.manu_name', 'protypes.type_name')
            ->get();

        $protypes = Protype::all();


        //

        return view($id)->with('getProducts', $products)
            ->with('getProtypes', $protypes)
            ->with('getManufactures', $manufactures);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "day laf trang update";
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
          
            DB::delete('delete from product where id = ? ',[$id]);
        } elseif ($nameShow == 'manu') {
            DB::delete('delete from manufactures where id = ? ',[$id]);
        }else {
            DB::delete('delete from protypes where id = ? ',[$id]);
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