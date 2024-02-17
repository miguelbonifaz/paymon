<?php

use App\Http\Controllers\Api\VideoAnalyticsController;
use App\Http\Controllers\Api\VideoController;
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
    Route::get('/videos', [VideoController::class, 'index'])->name('api.videos.index');
    Route::get('/video-analytics', VideoAnalyticsController::class)->name('api.video-analytics.index');
});
