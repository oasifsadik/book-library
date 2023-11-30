<?php

use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Fontend\DashboardController;
use App\Http\Controllers\Fontend\FontendCOntroller;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();
//font
Route::controller(FontendCOntroller::class)->group(function(){
Route::get('/','index');
});

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/user/Dashboard', [DashboardController::class, 'index']);
    // Route::get('/Admin/Books', [DashboardController::class, 'books']);
    Route::get('/user/single/{id}', [DashboardController::class, 'single']);
    Route::post('orderItem/{id}',[DashboardController::class,'orderItem']);
    Route::get('order/books/{id}',[DashboardController::class,'orderbook']);
    Route::get('buy/books/{id}',[DashboardController::class,'buybooks']);

});
//Admin
Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/Admin/Dashboard', [BooksController::class, 'index']);
    Route::get('/Admin/Books', [BooksController::class, 'books']);
    Route::post('/admin/save',[BooksController::class,'store']);
    Route::get('/Admin/list', [BooksController::class, 'show']);
    Route::get('/Admin/edit/{id}', [BooksController::class, 'edit']);
    Route::post('/Admin/update/{id}', [BooksController::class, 'update']);
    Route::get('/Admin/delete/{id}', [BooksController::class, 'delete']);
    //order
    Route::get('admin/allOrder',[OrderController::class,'allOrder']);
    Route::get('admin/allOrder',[OrderController::class,'allOrder']);
    Route::get('admin/approved/{id}',[OrderController::class,'approved']);

});
