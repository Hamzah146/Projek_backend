<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AnggotaController;

use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MahaSantriController;
use App\Http\Controllers\DosenController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salam', function () {
    return "Assalamu'alaikum Sobat, Selamat Belajar Laravel PeTIK Jombang Angkatan III";
});

Route::get('/pegawai/{nama}/{divisi}', function ($nama,$divisi) {
    return 'Nama Pegawai : '.$nama.'<br/>Departemen : '.$divisi;
});

// routing view kondisi
Route::get('/Kabar', function () {
    return view('Kondisi');
});

// routing Data Santri
Route::get('/santri', [SantriController::class, 'datasantri']
);

// routing view hello
Route::get('/hello', function () {
    return view('hello', ['name' => 'Inaya']);
});

// routing view nilai
Route::get('/nilai', function () {
    return view('nilai');
});

// routing view daftar_nilai
Route::get('/daftarNilai', function () {
    return view('daftar_nilai');
});

// routing view Layouts
Route::get('/framework', function () {
    return view('layouts.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// routing view Pegawai
Route::resource('pegawai', PegawaiController::class);

// routing view Anggota
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');

// routing view Pengarang, Penerbit, Kategori, Buku
Route::resource('/pengarang', PengarangController::class);
Route::resource('/penerbit', PenerbitController::class);
Route::resource('/kategori', KategoriController::class);
Route::resource('/buku', BukuController::class);

// routing view Jurusan, MataKuliah, MahaSantri, Dosen
Route::resource('/jurusan', JurusanController::class);
Route::resource('/matakuliah', MataKuliahController::class);
Route::resource('/mahasantri', MahaSantriController::class);
Route::resource('/dosen', DosenController::class);

Route::get('bukupdf',[BukuController::class, 'bukuPDF']);

//routing view pengarang
Route::resource('pengarang', PengarangController::class);
