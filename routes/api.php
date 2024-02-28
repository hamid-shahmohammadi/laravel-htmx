<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/store/post",function(Request $request){
    return $request->all();

});

Route::post('/upload/file',function(Request $request){

    $request->validate([
        'file' => 'required|mimes:pdf,jpg,png|max:2048',
    ]);

    // Store the file in storage\app\public folder
    $file = $request->file('file');
    $fileName = $file->getClientOriginalName();
    $filePath = $file->store('uploads', 'public');

    return 'upload file';

});
