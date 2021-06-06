<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/blogs',function(Request $request){
    $blogs = Blog::all();
    return response()->json(['blogs'=>$blogs]);
});
Route::get('/blogs/{blog}',function(Blog $blog){
    return response()->json(['blog'=>$blog]);
});
Route::patch('/blogs/{blog}',function(Blog $blog, Request $request){
    $blog->update($request->blog);
    return response()->json(['blog'=>$blog]);
});
Route::delete('/blogs/{blog}',function(Blog $blog){
	$blog->delete();
	return response()->json(['message' => 'delete successfully']);
});
Route::post('/blogs', function(Request $request){
	$blog = Blog::create($request->blog);
	return response()->json(['blog' => $blog]);
});