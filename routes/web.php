<?php

use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\ArtistImageController;
use App\Models\Admin;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExhibitionController;
use App\Http\Controllers\Admin\OpenCallController;
use App\Http\Controllers\Admin\OpenCallFormController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\OpenCallUserFormController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('artist', [HomeController::class, 'artist'])->name('artist');
Route::get('artist/{artist}', [HomeController::class, 'artist_detail'])->name('artist.detail');
Route::get('exhibition', [HomeController::class, 'exhibition'])->name('exhibition');
Route::get('exhibition/{exhibition}', [HomeController::class, 'exhibition_detail'])->name('exhibition.detail');
Route::get('shop', [HomeController::class, 'shop'])->name('shop');
Route::get('opencall', [HomeController::class, 'opencall'])->name('opencall');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('opencall/apply/{opencall?}', [OpenCallUserFormController::class, 'index'])->name('opencall.apply');
Route::get('opencall/thanks', [OpenCallUserFormController::class, 'show'])->name('opencall.thanks');
Route::post('opencall/apply', [OpenCallUserFormController::class, 'store']);

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

    Route::resource('artist', ArtistController::class);
    Route::get('artist/{artist}/gallery', [ArtistController::class, 'gallery'])->name('artist.gallery');
    Route::post('artist/{artist}/upload', [ArtistController::class, 'upload'])->name('artist.upload');
    Route::post('artist/{artist}/doremove', [ArtistController::class, 'removeUpload'])->name('artist.removeUpload');

    Route::resource('opencall', OpenCallController::class);
    Route::resource('opencall.opencall-form', OpenCallFormController::class);
    Route::resource('shop', ShopController::class);
});

require __DIR__.'/auth.php';
