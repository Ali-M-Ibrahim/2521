<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function index(){
        $data = Document::all();
        return view('document.list',compact('data'));
    }
    public function create(){
        return view('document.create');
    }

    public function store(Request $request){
        $request->validate([
            'document'=>'required|max:2048'
        ]);


        $imageName = $request->file('document')->getClientOriginalName();
        $newName = time() .'-' . $imageName;

        // method 1:  create a copy of the image in the public folder
//        $request->file('document')->move('myImages',$newName);

        // method 2 : crate a copu of the documetn and store it in storage
        // once you save the images in public, execture php artisan storage:link
        $request->file('document')->storeAs('myImages2',$newName,'public');

//       $newpath = $request->file('document')->store('myImages3','public');

        $row = new Document();
        $row->name=$imageName;
        // method 1:  create a copy of the image in the public folder
//        $row->path = 'myImages/' . $newName;

        // method 2 and 3
        $row->path = 'storage/myImages2/' . $newName;
        $row->save();

        return redirect()->route('list-document');


    }
}
