<?php

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

// Route::get('/', function () {
    // return view('welcome');
// });
use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');
    Route::get('news/delete', 'delete')->name('news.delete');
    
});



use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('profile/create', 'add')->name('profile.add');
    Route::post('profile/create', 'create')->name('profile.create');
    Route::get('profile/edit', 'edit')->name('profile.edit');
    Route::post('profile/edit', 'update')->name('profile.update');
});

// ＜課題０４－３＞
// Route::controller(AAAController::class)->group(function() {
    // Route::get('xxx', 'bbb');
   
// });

use App\Http\Controllers\CommentController;
Route::controller(CommentController::class)->group(function() {
    Route::get('comment/create/{news_id}', 'add')->name('comment.add');
    Route::post('comment/create/{news_id}', 'create')->name('comment.create');
    Route::post('news_detail/{id}/comments', 'store')->name('comment.store');
    
    
    
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\NewsController as PublicNewsController;
Route::get('/', [PublicNewsController::class, 'index'])->name('news.index');
Route::get('/news_detail/{id}', [PublicNewsController::class, 'show'])->name('news_detail');

use App\Http\Controllers\ProfileController as PublicProfileController;
Route::get('/profiles', [PublicProfileController::class, 'index'])->name('profile.index');



