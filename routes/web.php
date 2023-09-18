<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitorController;
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


Route::get('/',[VisitorController::class, 'visitor_form']);
Route::post('/visitor',[VisitorController::class, 'store']);
Route::get('/login', [AuthController::class, 'view_login']);
Route::post('/logout',[AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'process_login']);
Route::get('/dashboard-admin', function () {
    return view('dashboard.index',[
        'title' => 'Dashboard'
    ]);
});

Route::get('/buku-tamu', function () {
    return view('dashboard.visitors',[
        'title' => 'Buku Tamu'
    ]);
});
