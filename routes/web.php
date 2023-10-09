<?php

use App\Http\Controllers\BuktiPrestasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\UserController;
use App\Models\BuktiPrestasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/mahasiswa/users/{user}/editSKPI', [UserController::class, 'editSKPI'])->name('mahasiswa.editSKPI');
Route::put('/mahasiswa/users/{user}/updateSKPI', [UserController::class, 'updateSKPI'])->name('mahasiswa.updateSKPI');

Route::get('/mahasiswa/users', [UserController::class, 'index'])->name('users.index');
Route::get('/mahasiswa/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/mahasiswa/users', [UserController::class, 'store'])->name('users.store');
Route::get('/mahasiswa/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/mahasiswa/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::patch('/mahasiswa/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/mahasiswa/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/mahasiswa/users/{user}/cetak', [UserController::class, 'cetak'])->name('mahasiswa.cetak');

Route::get('/mahasiswa/pesans', [PesanController::class, 'index'])->name('pesans.index');
Route::get('/mahasiswa/pesans/create', [PesanController::class, 'create'])->name('pesans.create');
Route::post('/mahasiswa/pesans', [PesanController::class, 'store'])->name('pesans.store');
Route::get('/mahasiswa/pesans/{pesan}', [PesanController::class, 'show'])->name('pesans.show');
Route::get('/mahasiswa/pesans/{pesan}/edit', [PesanController::class, 'edit'])->name('pesans.edit');
Route::patch('/mahasiswa/pesans/{pesan}', [PesanController::class, 'update'])->name('pesans.update');
Route::delete('/mahasiswa/pesan/{pesan}', [PesanController::class, 'destroy'])->name('pesans.destroy');

Route::post('/mahasiswa/buktiPrestasis', [BuktiPrestasiController::class, 'store'])->name('mahasiswabukti.store');

Route::delete('/mahasiswa/buktiPrestasi/{buktiPrestasi}', [BuktiPrestasiController::class, 'destroy'])->name('mahasiswabukti.destroy');



Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/home/admin', [HomeController::class, 'admin'])->name('admin.home');

    Route::get('/admin/users/{user}/editSKPI', [UserController::class, 'editSKPI'])->name('admin.editSKPI');
    Route::put('/admin/users/{user}/updateSKPI', [UserController::class, 'updateSKPI'])->name('admin.updateSKPI');

    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/admin/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/admin/users/{user}/cetak', [UserController::class, 'cetak'])->name('admin.cetak');

    Route::get('/admin/pesans', [PesanController::class, 'index'])->name('pesans.index');
    Route::get('/admin/pesans/create', [PesanController::class, 'create'])->name('pesans.create');
    Route::post('/admin/pesans', [PesanController::class, 'store'])->name('pesans.store');
    Route::get('/admin/pesans/{pesan}', [PesanController::class, 'show'])->name('pesans.show');
    Route::get('/admin/pesans/{pesan}/edit', [PesanController::class, 'edit'])->name('pesans.edit');
    Route::put('/admin/pesans/{pesan}', [PesanController::class, 'update'])->name('pesans.update');
    Route::delete('/admin/pesan/{pesan}', [PesanController::class, 'destroy'])->name('pesans.destroy');

    Route::get('/admin/buktiPrestasis', [BuktiPrestasiController::class, 'index'])->name('buktiPrestasis.index');
    Route::get('/admin/buktiPrestasis/create', [BuktiPrestasiController::class, 'create'])->name('buktiPrestasis.create');
    Route::post('/admin/buktiPrestasis', [BuktiPrestasiController::class, 'store'])->name('buktiPrestasis.store');
    Route::get('/admin/buktiPrestasis/{buktiPrestasi}', [BuktiPrestasiController::class, 'show'])->name('buktiPrestasis.show');
    Route::get('/admin/buktiPrestasis/{buktiPrestasi}/edit', [BuktiPrestasiController::class, 'edit'])->name('buktiPrestasis.edit');
    Route::patch('/admin/buktiPrestasis/{buktiPrestasi}', [BuktiPrestasiController::class, 'update'])->name('buktiPrestasis.update');
    Route::delete('/admin/buktiPrestasi/{buktiPrestasi}', [BuktiPrestasiController::class, 'destroy'])->name('buktiPrestasis.destroy');
});
