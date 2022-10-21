<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
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
Route::controller(DosenController::class)->group(function () {
    Route::get('/insert-dosen', 'insert');
    Route::get('/select-dosen', 'select');
    Route::get('/update-dosen', 'update');
    Route::get('/delete-dosen', 'delete');
});

Route::controller(MahasiswaController::class)->group(function () {
    Route::get('/insert-mahasiswa', 'insert');
    Route::get('/select-mahasiswa', 'select');
    Route::get('/update-mahasiswa', 'update');
    Route::get('/delete-mahasiswa', 'delete');
});

Route::controller(MatkulController::class)->group(function () {
    Route::get('/insert-matkul', 'insert');
    Route::get('/select-matkul', 'select');
    Route::get('/update-matkul', 'update');
    Route::get('/delete-matkul', 'delete');
});

Route::get('/', function () {
    $dsn = [
        'Sayuti S.kom',
        'Siti maimunah S.kom',
        'Soetah Mahmud S.kom, m.kom',
        'Raden Pangestu Maulad S.kom, m.kom',
        'Jojo Kurniawan S.kom, m.kom',
        'Julaiha Maulya S.kom, m.kom',
        'Lesti',
        'Sultan Junaidi S.pd, m.kom',
        'Ucup Kinandar S.kom, m.kom',
        'Adam Lestaluhu S.kom, m.pd',

    ];
    return view('dosen')->with('dosen', $dsn);
});

Route::get('/matkul', function () {
    $mk = [
        'Framework web',
        'PBM',
        'Data Mining',
        'Basis Data',
        'Cloud Computing',
        'Blockchain',
        'Etika Pemrograman',
        'Kalkulus',
        'Bahasa Inggris',
        'Pancasila',

    ];
    return view('matkul')->with('matkul', $mk);
});

Route::get('/mahasiswa', function () {
    $mhs = [
        'M Hafizh Zainulquddus',
        'Ibnu Topan',
        'Hagi Azzam',
        'Harvian Arga',
        'Ilhan Firaldi',
        'gilang Maulana',
        'Hanna Athaya',
        'Frise Anesha',
        'Fanny Suyanto',
        'Lily',

    ];
    return view('mahasiswa')->with('mahasiswa', $mhs);
});
