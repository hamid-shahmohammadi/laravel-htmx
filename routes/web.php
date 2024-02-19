<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('search');
});
Route::get('/hello', function () {
    return 'hello htmx';
});
Route::get('/search', function (Request $request) {
    sleep(2);
    $term=$request->get('search-term');
    $pageSize=3;
    if($term==''){
        $posts=Post::paginate($pageSize);
    }else{
        $posts=Post::where('title','LIKE','%'.$term.'%')->paginate($pageSize);
    }
    return view('search_result',compact('posts'));
});
