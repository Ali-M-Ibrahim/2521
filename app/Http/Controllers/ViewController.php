<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    function page1(){
        // method 1 to send data from backend to frontend
//        $title = "this is my first title";
//        $price = 100;
//        $flag = false;
//        return view('page1',["mytitle" => $title, "myprice" => $price,'flag' => $flag]);

        // method 2
//        $title = "this is my first title";
//        $price = 100;
//        $flag = false;
//        return view('page1')->with('mytitle', $title)->with('myprice', $price)->with('flag', $flag);

        // method 3
        $mytitle= "this is my title method 3";
        $myprice = 20;
        $flag=true;
        return view('page1',compact('mytitle','myprice','flag'));
    }

    function page2(){
        return view('Pages/page2');
    }

    function listProduct(){
        // select * from products
        $data = Product::all();
        return view('Products.list',compact('data'));
    }

    function addProduct(){
        return view('Products.add');
    }

    function saveProduct(Request $request){
        $row = new Product();
        $row->name = $request->name;
        $row->description = $request->description;
        $row->price = $request->price;
        $row->save();

        Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price
        ]);

        Product::create($request->all());

        return redirect()->route('list-product');
    }
}
