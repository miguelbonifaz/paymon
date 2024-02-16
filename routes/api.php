<?php

use App\Http\Controllers\Api\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/videos')->group(function () {
        Route::get('/', [VideoController::class, 'index'])->name('api.videos.index');
        Route::post('/', [VideoController::class, 'store'])->name('api.videos.store');
        Route::get('/{video}', [VideoController::class, 'show'])->name('api.videos.show');
        Route::put('/{video}', [VideoController::class, 'update'])->name('api.videos.update');
        Route::delete('/{video}', [VideoController::class, 'destroy'])->name('api.videos.destroy');
    });
});
