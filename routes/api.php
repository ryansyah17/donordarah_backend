<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalApiController;
use App\Http\Controllers\HistoryApiController;
use App\Http\Controllers\PendonorApiController;
use App\Http\Controllers\StokdarahApiController;
use App\Http\Controllers\NotificationApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);
    Route::post('users', [UserController::class, 'update']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('refresh', [UserController::class, 'refresh']);
    Route::post('me', [UserController::class, 'me']);
    Route::get('users', [UserController::class, 'all']);
});

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'pendonor'

    ],
    function ($router) {
        Route::get('pendonor', [PendonorApiController::class, 'index']);
        Route::get('pendonor/{id}', [PendonorApiController::class, 'show']);
        Route::post('pendonor', [PendonorApiController::class, 'store']);
        Route::put('pendonor/{pendonor}', [PendonorApiController::class, 'update']);
        Route::delete('pendonor/{id}', [PendonorApiController::class, 'destroy']);
    }
);
Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'jadwal'

    ],
    function ($router) {
        Route::get('jadwal', [JadwalApiController::class, 'index']);
        Route::get('jadwal/{id}', [JadwalApiController::class, 'show']);
        Route::post('jadwal', [JadwalApiController::class, 'store']);
        Route::put('jadwal/{jadwal}', [JadwalApiController::class, 'update']);
        Route::delete('jadwal/{id}', [JadwalApiController::class, 'destroy']);
    }
);

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'notification'

    ],
    function ($router) {
        Route::get('notification', [NotificationApiController::class, 'index']);
        Route::get('notification/{id}', [NotificationApiController::class, 'show']);
        Route::post('notification', [NotificationApiController::class, 'store']);
        Route::put('notification/{notification}', [NotificationApiController::class, 'update']);
        Route::delete('notification/{id}', [NotificationApiController::class, 'destroy']);
    }
);

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'history'

    ],
    function ($router) {
        Route::get('history', [HistoryApiController::class, 'index']);
        Route::get('history/{id}', [HistoryApiController::class, 'show']);
        Route::post('history', [HistoryApiController::class, 'store']);
        Route::put('history/{history}', [HistoryApiController::class, 'update']);
        Route::delete('history/{id}', [HistoryApiController::class, 'destroy']);
    }
);

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'stokdarah'

    ],
    function ($router) {
        Route::get('stokdarah', [StokdarahApiController::class, 'index']);
        Route::get('stokdarah/{id}', [StokdarahApiController::class, 'show']);
        Route::post('stokdarah', [StokdarahApiController::class, 'store']);
        Route::put('stokdarah/{stokdarah}', [StokdarahApiController::class, 'update']);
        Route::delete('stokdarah/{id}', [StokdarahApiController::class, 'destroy']);
    }
);
