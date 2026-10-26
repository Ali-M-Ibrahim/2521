<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create1()
    {
        $obj = new Product;
        $obj->name = 'Product 1';
        $obj->description = 'This is my description';
        $obj->price = 500;
        $obj->save();

        return 'Ok data created successfully';
    }

    public function create2()
    {
        Product::create([
            'name' => 'Product 2',
            'description' => 'This is my description 2',
            'price' => 200,
        ]);

        return 'Ok data created successfully';

    }

    public function create3(Request $request)
    {
        $name = $request->request_name;
        $desc = $request->request_description;
        $price = $request->request_price;

        $desc2 = $request->input('request_description', 'default value');

        $product4 = new Product;
        $product4->name = $name;
        $product4->description = $desc;
        $product4->price = $price;
        $product4->save();

        Product::create([
            'name' => $name,
            'description' => $desc2,
            'price' => $price,
        ]);

        return 'ok created';
    }

    public function create4(Request $request)
    {
        Product::create($request->all());

        return 'ok created';
    }

    public function update1($id, Request $request)
    {
        $row = Product::findOrFail($id);
        $row->name = $request->name;
        $row->description = $request->description;
        $row->price = $request->price;
        $row->save();

        return 'ok updated';
    }

    public function update2($id, Request $request){
        $row = Product::findOrFail($id);
        $row->fill($request->all());
        if($row->isClean()){
            return "nothing changed";
        }
        $row->save();
        return "ok updated";

    }

    public function massUpdate(){
        // update products set description = "high cost", name= "name 2" where price = 1000;
        $data = Product::where('price','1000')->update(['description'=>'High cost','name'=>'name 2']);
        return "ok updated";
    }

    public function delete($id){
        $row = Product::findOrFail($id);
        $row->delete();
        return "row deleted";
    }

    public function massDelete(){
        // delete from products where price = 1000;
        Product::where('price',1000)->delete();
        return "mass delete";
    }
}
