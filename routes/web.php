<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('search');
});

Route::get('/hello', function () {
    return 'hello';
});

Route::get('/search', function (Request $request) {
    $term=$request->get('search-term');
    $pageSize=3;
    if($term==''){
        $results=Post::paginate($pageSize);
    }else{
        $results=Post::where('title','LIKE','%'.$term.'%')->paginate($pageSize);
    }
    return view('search-results',compact('results'));
});
