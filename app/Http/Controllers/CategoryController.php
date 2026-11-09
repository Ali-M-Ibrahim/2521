<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(){
        // select * from categories;

        $data = Category::all();
        return view('category.list',compact('data'));
    }

    public function create(){
        return view('category.add');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required|min:5|max:10',
        ],
        [
            'required'=>"this is my default error message, the :attribute is mandatory"
        ]);

        $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->description = $request->description;
        $newCategory->save();
        return redirect()->route('list-category');

    }

    public function show($id){
        $category = Category::findOrFail($id);
        return view('category.show',compact('category'));
    }

    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('list-category');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('category.edit',compact('category'));

    }


    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'description' => 'required|min:5|max:10',
        ],
            [
                'required'=>"this is my default error message, the :attribute is mandatory"
            ]);

        $newCategory = Category::findOrFail($id);
        $newCategory->name = $request->name;
        $newCategory->description = $request->description;
        $newCategory->save();
        return redirect()->route('list-category');
    }

}
