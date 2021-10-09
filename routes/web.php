<?php

use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, DashboardController};

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/visi-misi', [DashboardController::class, 'visi_misi'])->name('visi-misi');
Route::get('/artikel', [DashboardController::class, 'artikel'])->name('artikel');
Route::get('/website-bpptik', [DashboardController::class, 'website_bpptik'])->name('website-bpptik');
Route::get('/tugas-fungsi', [DashboardController::class, 'tugas_fungsi'])->name('tugas-fungsi');
Route::get('/artikel/{article}', [DashboardController::class, 'show'])->name('show');

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::resource('home', HomeController::class);

    Route::prefix('media')->group(function () {
        Lfm::routes();
    });
});
