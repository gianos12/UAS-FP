<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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

Route::get('/home', [BarangController::class, 'home'])->name('home')->middleware('auth');

Route::get('/form-tambah', function () {
    return view('form-tambah');
})->middleware('auth');
Route::post('/tambah', [BarangController::class, 'tambah'])->middleware('auth');
Route::get('/hapus-brg/{id}', [BarangController::class, 'hapus'])->middleware('auth');
Route::get('/ubah-brg/{id}', [BarangController::class, 'formUbah'])->middleware('auth');
Route::post('/ubah-brg', [BarangController::class, 'ubah'])->middleware('auth');
Route::get('/download-pdf', [BarangController::class, 'downloadPDF']);
