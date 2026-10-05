<?php

namespace App\Http\Controllers;

class FirstController extends Controller
{
    public function index()
    {
        return 'hello from index method inside first controller';
    }

    public function returnjson()
    {
        return response()->json([
            'name' => 'John Doe',
            'age' => 30,
            'email' => 'john@gmail.com',
        ]);
    }

    public function third($id)
    {
        return 'The id is: '.$id;
    }
}
