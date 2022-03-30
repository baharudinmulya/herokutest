<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DataAsistenController;
use App\Http\Controllers\Backend\KelasController;
use App\Http\Controllers\Backend\MateriController;
use App\Http\Controllers\Backend\KodeGeneratorController;
use App\Http\Controllers\Backend\AbsensiController;
use App\Http\Controllers\SendMailController;

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
    return view('auth.login');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' =>false,
]);

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout1');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kirimemail',[App\Http\Controllers\SendMailController::class, 'send'])->name('kirimemail');

Route::controller(DataAsistenController::class)->group(function () {
    Route::get('/dataass/index', 'index')->name('indexDataAss');
    Route::get('/dataass/create', 'create')->name('createDataAss');
    Route::get('/dataass/edit/{id}', 'edit')->name('editDataAss');
    Route::post('/dataass/post', 'store')->name('storeDataAss');
    Route::post('/dataass/update/{id}', 'update')->name('updateDataAss');
    Route::get('/dataass/delete/{id}', 'destroy')->name('destroyDataAss');
});

Route::controller(KelasController::class)->group(function () {
    Route::get('kelas/index', 'index')->name('indexDataKelas');
    Route::get('kelas/create', 'create')->name('createDataKelas');
    Route::get('kelas/edit/{id}', 'edit')->name('editDataKelas');
    Route::post('kelas/post', 'store')->name('storeDataKelas');
    Route::post('kelas/update/{id}', 'update')->name('updateDataKelas');
    Route::get('kelas/delete/{id}', 'destroy')->name('destroyDataKelas');
});

Route::controller(MateriController::class)->group(function () {
    Route::get('materi/index', 'index')->name('indexDataMateri');
    Route::get('materi/create', 'create')->name('createDataMateri');
    Route::get('materi/edit/{id}', 'edit')->name('editDataMateri');
    Route::post('materi/post', 'store')->name('storeDataMateri');
    Route::post('materi/update/{id}', 'update')->name('updateDataMateri');
    Route::get('materi/delete/{id}', 'destroy')->name('destroyDataMateri');
});

Route::controller(KodeGeneratorController::class)->group(function () {
    Route::get('/kode/index', 'index')->name('indexKode');
    Route::get('/kode/generate/modul/{frommodule}', 'store')->name('generateKode');
    Route::get('/kode/generator/dash/{fromdashboard}', 'store')->name('generateKodeDash');
});

Route::controller(AbsensiController::class)->group(function () {
    Route::post('/absen/masuk', 'store')->name('storeAbsen');
    Route::get('/absen/keluar', 'updateAbsen')->name('updateAbsen');
});