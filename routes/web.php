<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/dd', function () {
   auth()->loginUsingId(10);
    return view('welcome');
})->name('dd');

Auth::routes();
Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
$v='مدیر';
$s=1;
Route::get('Admin/Dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index'])->middleware("IsAdmin:$v,$s")->name('dashboard');
Route::resource('Admin/Users', App\Http\Controllers\Admin\AdminUserController::class)->middleware("IsAdmin:$v,$s");
Route::resource('Admin/Posts', App\Http\Controllers\Admin\AdminPostController::class)->middleware("IsAdmin:$v,$s");
Route::resource('Admin/Categories', App\Http\Controllers\Admin\AdminCategoryController::class)->middleware("IsAdmin:$v,$s");
Route::resource('Admin/Photos', App\Http\Controllers\Admin\AdminPhotoController::class)->middleware("IsAdmin:$v,$s");
Route::get('Admin/Comments',[App\Http\Controllers\Admin\CommentController::class,'index'])->middleware("IsAdmin:$v,$s")->name('comment.index');
Route::get('Admin/Comments/{comment}',[App\Http\Controllers\Admin\CommentController::class,'edit'])->middleware("IsAdmin:$v,$s")->name('comment.edit');
Route::post('Admin/Comments/{comment}',[App\Http\Controllers\Admin\CommentController::class,'update'])->middleware("IsAdmin:$v,$s")->name('comment.update');
Route::delete('Admin/Comments/{comment}',[App\Http\Controllers\Admin\CommentController::class,'destroy'])->middleware("IsAdmin:$v,$s")->name('comment.destroy');
Route::post('Admin/Comments/updatestatus/{comment}',[App\Http\Controllers\Admin\CommentController::class,'UpdateStatus'])->middleware("IsAdmin:$v,$s")->name('comment.updatestatus');
Route::delete('Admin/photo/delete',[App\Http\Controllers\Admin\AdminPhotoController::class,'photodelete'])->middleware("IsAdmin:$v,$s")->name('photodelete');
//Route::post('/abcd/{User}/{Photo}',[App\Http\Controllers\AdminUserController::class,'update'])->name('abcd');
Route::resource('posts',App\Http\Controllers\front\PostController::class);
Route::get('searchpost',[App\Http\Controllers\front\PostController::class,'SearchPost'])->name('SearchPost');
