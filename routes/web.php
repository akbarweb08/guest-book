<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\DashboardController;
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


Route::get('/form-tamu',[VisitorController::class, 'visitor_form'])->name('login');
Route::get('/',[VisitorController::class, 'VisitorHome']);
Route::post('/visitor',[VisitorController::class, 'store']);
Route::post('/visitor-approve/{id}',[VisitorController::class, 'approve']);
Route::post('/visitor-export',[VisitorController::class, 'export']);
// Route::get('/login', [AuthController::class, 'view_login'])->name('login');
Route::post('/logout',[AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'process_login']);
Route::middleware(['auth'])->group(function () {
    Route::delete('/delete-tamu/{id}',[VisitorController::class, 'delete']);
    Route::post('/tamu-pulang/{id}',[VisitorController::class, 'out']);
    Route::get('/dashboard-admin',[DashboardController::class, 'index']);
Route::get('/buku-tamu',[VisitorController::class, 'visitor_index']);
});

Route::get('/perusahaan-tamu', function () {
    return view('dashboard.perusahaan',[
        'title' => 'Perusahaan Tamu'
    ]);
});

