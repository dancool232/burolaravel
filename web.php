<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
//Route::get('/', function (){
//    $results = App\Category::all();
//    return view('welcome',['links'=>$results ]);
//});
Route::get('/ajax',function(Request $req){
    header('Access-Control-Allow-Origin:*');
    return $results = App\Post::where('id',$req->test)->get();
});
Route::get('/getAll', function (Request $req){
    header('Access-Control-Allow-Origin:*');
    return App\Item::all();
});
Route::get('/getLost', function (){
    header('Access-Control-Allow-Origin:*');
    return App\Item::where('status',0)->get();
});
Route::get('/getFound', function (){
    header('Access-Control-Allow-Origin:*');
    return App\Item::where('status',1)->get();
});
Route::get('/searchAll', function (Request $req){
    header('Access-Control-Allow-Origin:*');
    return App\Item::where('title', 'like', '%' . $req->searching . '%')
    ->orWhere('desc', 'like', '%' . $req->searching . '%')->get();
});
Route::get('/add', function (Request $req){
    header('Access-Control-Allow-Origin:*');
    $item = DB::table('items')->insert(
         ['title' => $req->key1, 'desc' => $req->key2,'contact'=> $req->key3, 'status'=> $req->key4, 'solution'=> $req->key5]);
    return $item;
    });