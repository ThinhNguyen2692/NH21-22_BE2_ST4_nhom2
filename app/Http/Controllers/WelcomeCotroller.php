<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeCotroller extends Controller
{
    function index()
    {
        return view('frombt');
    }
    function frombt(Request $request)
    {
        $request->flash('password');
        echo "Request info <br> " . "Name: "
            . $request->old('firstname')  . $request->old('lastname')
            . "<br> Phone:" . $request->old('Phone')
            . "<br> Day of Birth:" .  $request->old('day') . "/" . $request->old('month') . "/" . $request->old('year')
            . "<br> Gender:" . $request->old('gender');
    }
    function viewXuat(Request $request)
    {
       $request->flash();
       $data = $request->old('firstname');
       return view('index', ['name'=>$data]);
    }
}
