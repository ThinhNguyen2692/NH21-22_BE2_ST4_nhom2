<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WelcomeCotroller extends Controller
{
    function index()
    {
        $products = Product::all();
        return view('indexSP',['data'=> $products]);
    }
    // function frombt(Request $request)
    // {
    //     $request->flash('password');
    //     echo "Request info <br> " . "Name: "
    //         . $request->old('firstname')  . $request->old('lastname')
    //         . "<br> Phone:" . $request->old('Phone')
    //         . "<br> Day of Birth:" .  $request->old('day') . "/" . $request->old('month') . "/" . $request->old('year')
    //         . "<br> Gender:" . $request->old('gender');
    // }
    // function viewXuat(Request $request)
    // {
    //    $request->flash();
    //    $data = $request->old('firstname');
    //    return view('index', ['name'=>$data]);
    // }
}
