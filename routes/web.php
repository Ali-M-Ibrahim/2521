<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\InvokeController;
use App\Http\Controllers\ProductController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// We are defining endpoints

// I created an endpoint of type GET with the name of test1 and it will return a string "Hello I am your first endpoint
// so the user can now call http://localhost:8000/test1 and it will return the string "Hello I am your first endpoint"
Route::get('test-1', function () {
    return 'Hello I am your first endpoint';
});

// you can return any data type you want
Route::get('test2', function () {
    // return 50;
    // return true;
    return [1, 2, 3, 4, 5];
});

// you can return a json
Route::get('test3', function () {
    return response()->json([
        'name' => 'John Doe',
        'age' => 30,
        'email' => 'john@gmail.com',
    ]);
});

// when you return a response, you have a lot of options to customize it, you can set the status code, headers
Route::get('test4', function () {
    $obj = [
        'name' => 'John Doe',
        'age' => 30,
        'email' => 'john@gmail.com',
    ];

    return response($obj, 201);
});
Route::get('test5', function () {
    return response()->json([
        'name' => 'John Doe',
        'age' => 30,
        'email' => 'john@gmail.com',
    ], 201);
});

Route::get('test6', function () {
    return response(['message' => 'Hello I am your first endpoint'], Response::HTTP_CREATED);
});

Route::get('test7', function () {
    return response([
        'name' => 'John Doe',
        'age' => 30,
        'email' => 'a@hotmail.com'], Response::HTTP_CREATED)
        ->header('Content-Type', 'application/json')
        ->header('password', 1234);
});

Route::get('test7', function () {
    return response([
        'name' => 'John Doe',
        'age' => 30,
        'email' => 'a@hotmail.com'], Response::HTTP_CREATED)
        ->withHeaders([
            'Content-Type' => 'application/json',
            'password' => 1234,
        ]);
});

Route::get('error', function () {
    return abort(403, 'CUSTM ERROR MESSAGE');
});

// ROUTE WITH PARAMETER
Route::get('route1/{id}', function ($id) {
    return 'The id is: '.$id;
});

Route::get('route2/{id}/{name}', function ($id, $name) {
    return 'The id is: '.$id.' and the name is: '.$name;
});

Route::get('route3/{id?}', function ($id = 0) {
    return 'The id is: '.$id;
});

Route::get('gotogoogle', function () {
    return redirect('https://www.google.com');
});

Route::get('gotoroute1', function () {
    return redirect('test1');
});

Route::get('routing4', function () {
    return 'i am route 4';
})->name('route-4');

Route::get('gotorounte4', function () {
    return redirect()->route('route-4');
});

Route::get('route-7', function (Request $request) {
    $toreadHeader = $request->header('secret');
    if ($toreadHeader != 123) {
        return abort(403);
    } else {
        return 'The secret is: '.$toreadHeader;

    }
});

Route::post('post-route', function () {
    return 'ok i am post';
});

Route::get('arrow-route', fn () => 'ok i am arrow route');

// recommended way to create routes

Route::get('first-controller', [FirstController::class, 'index']);
Route::get('second-controller', [FirstController::class, 'returnjson']);
Route::get('third-controller/{id}', [FirstController::class, 'third'])->name('third-controller');
Route::get('invoke-controller', InvokeController::class);
// other ways to create routes but not recommended
Route::get('first-controller-2', 'App\Http\Controllers\FirstController@index')->name('my-name');
Route::get('first-controller-3', [
    'uses' => 'App\Http\Controllers\FirstController@index',
    'as' => 'first-controller-3',
]);

Route::get('test-relations', function () {
    // select * from tableName where id=?;
    // ModelName::find($id);
    // select * from customers where id=1;
    $customer = Customer::find(1);
    $crendetials = $customer->getCredentials;
    $accounts = $customer->getAccounts;

    return $accounts;
});

Route::get('getAll', [DataController::class, 'getAll']);
Route::get('getById/{id}', [DataController::class, 'getById']);
Route::get('getByCondition', [DataController::class, 'getByCondition']);
Route::get('getByMultipleConditions', [DataController::class, 'getByMultipleConditions']);
Route::get('getUsingLike', [DataController::class, 'getUsingLike']);
Route::get('getConditionOr', [DataController::class, 'getConditionOr']);
Route::get('getIn', [DataController::class, 'getIn']);
Route::get('getNotIn', [DataController::class, 'getNotIn']);
Route::get('getBetween', [DataController::class, 'getBetween']);
Route::get('getSpecificAttributes', [DataController::class, 'getSpecificAttributes']);

Route::get('getDistinct', [DataController::class, 'getDistinct']);
Route::get('ordering', [DataController::class, 'ordering']);
Route::get('Arithmetic', [DataController::class, 'Arithmetic']);
Route::get('getPluck', [DataController::class, 'getPluck']);
Route::get('getLatst', [DataController::class, 'getLatst']);
Route::get('groupBy', [DataController::class, 'groupBy']);
Route::get('join', [DataController::class, 'join']);
Route::get('relation', [DataController::class, 'relation']);

Route::get('create1', [ProductController::class, 'create1']);
Route::get('create2', [ProductController::class, 'create2']);
