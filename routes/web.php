<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExhibitionController;
use App\Http\Controllers\Admin\OpenCallController;
use App\Http\Controllers\Admin\OpenCallFormController;
use App\Http\Controllers\Admin\ShopController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth:admin')->prefix(Admin::PATH)->name('admin.')->group(function () {
    Route::get('', [DashboardController::class, 'index']);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('pages', PageController::class);

    Route::resource('exhibition', ExhibitionController::class);
    Route::get('exhibition/{exhibition}/gallery', [ExhibitionController::class, 'gallery'])->name('exhibition.gallery');
    Route::post('exhibition/{exhibition}/upload', [ExhibitionController::class, 'upload'])->name('exhibition.upload');
    Route::post('exhibition/{exhibition}/doremove', [ExhibitionController::class, 'removeUpload'])->name('exhibition.removeUpload');

    Route::resource('opencall', OpenCallController::class);
    Route::resource('opencall.opencall-form', OpenCallFormController::class);
    Route::resource('shop', ShopController::class);
});

require __DIR__.'/auth.php';
