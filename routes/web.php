<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KoprasiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Models\ModelKoprasi;

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

// Hallo kamal

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/mahasiswa/{nama}', function ($nama) {
        return view('mahasiswa', ['nama' => $nama]);
    });

    Route::view('/about', 'v_about', [
        'nama' => 'Kamaludin Darmawan',
        'alamat' => 'Jalan Raya Kawali - Cirebon',
        'nama2' => 'Naufal Fajar M',
        'alamat2' => '<h2>Jalan Raya Kawali - Ciamis</h2>'
    ]);

    Route::view('/admin', 'admin.v_index');
    Route::view('/add', 'admin.v_add');
    Route::view('/edit', 'admin.v_edit');
    Route::view('/dosen', 'admin.dosen.v_datadosen');
    Route::view('/dosen1', 'v_dosen');
    Route::view('/mahasiswa1', 'v_mahasiswa');
    Route::view('/about1', 'about');
    Route::view('/contact', 'contact');

    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
    Route::get('/guru/detail/{id_guru}', [GuruController::class, 'detail']);
    Route::get('/guru/add', [GuruController::class, 'add']);
    Route::post('/guru/insert', [GuruController::class, 'insert']);
    Route::get('/guru/edit/{id_guru}', [GuruController::class, 'edit']);
    Route::post('/guru/update/{id_guru}', [GuruController::class, 'update']);
    Route::get('/guru/delete/{id_guru}', [GuruController::class, 'delete']);

    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/user', [UserController::class, 'index'])->name('user');

    Route::get('/koprasi', [KoprasiController::class, 'index'])->name('koprasi');
    Route::get('/koprasi/print', [KoprasiController::class, 'print']);
    Route::get('/koprasi/printpdf', [KoprasiController::class, 'printpdf']);
});
Route::group(['middleware' => 'user'], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
});
Route::group(['middleware' => 'dosen'], function () {
    Route::get('/koprasi', [KoprasiController::class, 'index'])->name('koprasi');
    Route::get('/koprasi/print', [KoprasiController::class, 'print']);
    Route::get('/koprasi/printpdf', [KoprasiController::class, 'printpdf']);
});
