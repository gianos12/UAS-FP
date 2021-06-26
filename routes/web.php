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

Route::get('/home', [BarangController::class, 'home'])->name('home');

Route::get('/form-tambah', function () {
    return view('form-tambah');
});
Route::post('/tambah', [BarangController::class, 'tambah']);
Route::get('/hapus-brg/{id}', [BarangController::class, 'hapus']);
Route::get('/ubah-brg/{id}', [BarangController::class, 'formUbah']);
Route::post('/ubah-brg', [BarangController::class, 'ubah']);
Route::get('/download-pdf', [BarangController::class, 'downloadPDF']);
