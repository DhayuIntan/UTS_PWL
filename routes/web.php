<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\TransaksiController;
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

//Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->group(function(){
    Route::get('/', function () {
        return view('index');
    });
    Route::resource('/mobil', MobilController::class);
    Route::resource('/transaksi', TransaksiController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
