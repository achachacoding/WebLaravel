<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaPengunjungController;
use App\Http\Controllers\BukuPengunjungController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GaleriController;



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

Route::get('/', [HomeController::class, 'index']);

Route::get('/berita', [BeritaPengunjungController::class, 'index']);
Route::get('/berita/{berita_id}', [BeritaPengunjungController::class, 'detail']);

Route::get('/buku', [BukuPengunjungController::class, 'index']);


// Route untuk /admin, redirect ke login
Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');


Route::prefix('admin')->middleware('admin.auth')->group(function () {
 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('/users', UsersController::class);

    Route::resource('/kategori', KategoriController::class);

    Route::resource('/berita', BeritaController::class);

    Route::resource('/buku', BukuController::class);
    Route::get('/buku/{id}/download', [BukuController::class, 'download'])->name('buku.download');

    Route::resource('/album', AlbumController::class);

    Route::resource('/galeri', GaleriController::class);

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

});


