<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MemberController;
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


Route::get('/',[MemberController::class, 'index']);
Route::get('/pendonor',[PendonorController::class, 'index']);

Route::get('/history',[HistoryController::class, 'index']);
Route::get('/history/create',[HistoryController::class, 'create']);
Route::get('/edithistory/{id}',[HistoryController::class, 'edit']);
Route::put('/edithistory/{id}',[HistoryController::class, 'update']);
Route::get('/deletehistory/{id}', [HistoryController::class, 'destroy']);



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


Route::get('/member-create',[MemberController::class, 'create']);
Route::post('/member-create',[MemberController::class, 'store']);
Route::get('/deleteMember/{id}', [MemberController::class, 'destroy']);

Route::get('/editMember/{id}', [MemberController::class, 'edit']);
Route::put('/editMember/{id}', [MemberController::class, 'update']);

Route::resource('member', MemberController::class);
Route::resource('stokdarah', StokdarahController::class);
Route::resource('notification', NotificationController::class);
Route::resource('pendonor', PendonorController::class);
Route::resource('jadwal', JadwalController::class);



// Route::resource('user', MemberController::class);
