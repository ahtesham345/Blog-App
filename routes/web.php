<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[App\Http\Controllers\frontend\frontendcontroller::class,'index']);
Route::get('tutorial/{category_slug}',[App\Http\Controllers\frontend\frontendcontroller::class,'viewcategorypost']);
Route::get('tutorial/{category_slug}/{post_slug}',[App\Http\Controllers\frontend\frontendcontroller::class,'viewpost']);
// Comments Route
Route::post('comments',[App\Http\Controllers\commentcontroller::class,'store']);
Route::post('/delete-comment',[App\Http\Controllers\commentcontroller::class,'destroy']);

Route::prefix('admin')->middleware(['auth','isadmin'])->group(function (){
    Route::get('/dashboard', [App\Http\Controllers\admin\DashBoardController::class, 'index']);
    Route::get('/category' ,[App\Http\Controllers\admin\categorycontroller::class,'index']);
    Route::get('/add-category' ,[App\Http\Controllers\admin\categorycontroller::class,'create']);
    Route::post('/add-category' ,[App\Http\Controllers\admin\categorycontroller::class,'store']);
    Route::get('edit-category/{category_id}',[\App\Http\Controllers\admin\categorycontroller::class,'edit']);
    Route::put('update-category/{category_id}',[\App\Http\Controllers\admin\categorycontroller::class,'update']);
    // Route::get('delete-category/{category_id}',[\App\Http\Controllers\admin\categorycontroller::class,'destroy']);
    Route::post('delete-category',[\App\Http\Controllers\admin\categorycontroller::class,'destroy']);


    Route::get('posts',[App\Http\Controllers\admin\postcontroller::class,'index']);
    Route::get('add-post',[App\Http\Controllers\admin\postcontroller::class,'create']);
    Route::post('add-post',[App\Http\Controllers\admin\postcontroller::class,'store']);
    Route::get('edit-post/{post_id}',[App\Http\Controllers\admin\postcontroller::class,'edit']);
    Route::put('edit-post/{post_id}',[App\Http\Controllers\admin\postcontroller::class,'update']);
    Route::get('delete-post/{post_id}',[App\Http\Controllers\admin\postcontroller::class,'destroy']);

    Route::get('users',[App\Http\Controllers\admin\usercontroller::class,'index']);
    Route::get('user/{user_id}',[App\Http\Controllers\admin\usercontroller::class,'edit']);
    Route::put('update-user/{user_id}',[App\Http\Controllers\admin\usercontroller::class,'update']);
});
