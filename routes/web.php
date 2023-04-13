<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JasaController;
// use App\Http\Controllers\Auth\RegisterController;

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
Route::get('logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index']);
   
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/jasa', JasaController::class);
    Route::get('/cariJasa', [JasaController::class, 'cariJasa'])->name('cariJasa');

    Route::resource('/member', MemberController::class);
    Route::get('/cariMember', [MemberController::class, 'cariMember'])->name('cariMember');
});

