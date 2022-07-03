<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('categories', CategoryController::class);
Route::get('categories/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
Route::get('categories/restore-all', [CategoryController::class, 'restoreAll'])->name('categories.restoreAll');

Route::resource('author', AuthorController::class);
Route::resource('blog', BlogController::class);
Route::get('blog/category/assign-view', [BlogController::class, 'assignView'])->name('blog.assignView');
Route::post('blog/category/assign', [BlogController::class, 'assignBlogCategory'])->name('blog.assingBlogCategory');
// Route::post('ckeditor/upload', 'BlogController@upload')->name('ckeditor.upload');
require __DIR__ . '/auth.php';
