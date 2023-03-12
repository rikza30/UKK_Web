<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LogoutController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');
Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');


Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' =>['auth']], function () {
    // Route::resource('buku', 'BukuController')->except(['index']);
    Route::post('logout', LogoutController::class)->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/buku/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
});
