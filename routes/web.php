<?php

use App\Http\Controllers\VideoAdminController;
use App\Http\Controllers\VideoAnalyticsController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn() => redirect()->route('login'));

Route::middleware('auth')->group(function () {
    Route::view('dashboard', 'dashboard')
        ->middleware(['verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::prefix('/admin/videos')->group(callback: function () {
            Route::get('/', [VideoAdminController::class, 'index'])->name('admin.videos.index');
            Route::get('/create', [VideoAdminController::class, 'create'])->name('admin.videos.create');
        });

        Route::get('/admin/analytics', VideoAnalyticsController::class)->name('admin.analytics.index');
    });

    Route::group(['middleware' => ['role:user']], function () {
        Route::prefix('/videos')->group(function () {
            Route::get('/', [VideoController::class, 'index'])->name('videos.index');
            Route::get('/{video}', [VideoController::class, 'show'])->name('videos.show');
        });
    });

});

require __DIR__.'/auth.php';
