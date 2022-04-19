<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufactures;

class MyController extends Controller
{
    public function index($name = 'shop-index')
    {
        if ($name == 'shop-index') {
            $productsNew = Product::orderBy('id', 'DESC')->LIMIT(5)->get();
            $productsfeature = Product::where('feature', '=', 1)->orderBy('id', 'DESC')->LIMIT(5)->get();
            return view($name, ['dataNew' => $productsNew], ['datafeature' => $productsfeature]);
        }
        return view($name);
    }
    public function showItem($id)
    {
        $products = Product::where('id', '=', $id)->get();
        return view('shop-item', ['data' => $products]);
    }
    public function list($id)
    {
        $products = Product::where('manu_id', '=', $id)->get();
        return view('shop-product-list', ['data' => $products]);
    }
}
