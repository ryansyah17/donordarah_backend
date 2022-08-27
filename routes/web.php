<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PendonorController;
use App\Http\Controllers\StokdarahController;
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
    return view('member');
});
Route::get('/member', function () {
    return view('member');
});
Route::get(
    '/pendonor',
    [PendonorController::class, 'index']

);

Route::get(
    '/history',
    [HistoryController::class, 'index']

);
Route::get(
    '/history/create',
    [HistoryController::class, 'create']

);
Route::get(
    '/edithistory/{id}',
    [HistoryController::class, 'edit']

);
Route::put(
    '/edithistory/{id}',
    [HistoryController::class, 'update']

);
Route::get('/deletehistory/{id}', [HistoryController::class, 'destroy']);


Route::get(
    '/stok',
    [StokdarahController::class, 'index']

);
Route::get(
    '/jadwal',
    [JadwalController::class, 'index']

);
Route::get(
    '/notification',
    [NotificationController::class, 'index']

);
Route::get('/form', function () {
    return view('form');
});
