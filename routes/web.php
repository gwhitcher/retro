<?php
use Illuminate\Support\Facades\Route;

//frontend
Route::get('/', [App\Http\Controllers\PageController::class, 'view'])->name('home');

Route::get('/cheats', [App\Http\Controllers\CheatController::class, 'index'])->name('cheats');

Route::get('/forums', [App\Http\Controllers\ForumController::class, 'index'])->name('forums');

require __DIR__.'/auth.php';
Auth::routes();

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

//backend
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin-dashboard');

Route::any('/admin/pages', [App\Http\Controllers\Admin\PageController::class, 'index'])->name('admin-pages');
Route::any('/admin/pages/add', [App\Http\Controllers\Admin\PageController::class, 'add'])->name('admin-page-add');
Route::any('/admin/pages/edit/{id}', [App\Http\Controllers\Admin\PageController::class, 'edit'])->name('admin-page-edit');
Route::any('/admin/pages/delete/{id}', [App\Http\Controllers\Admin\PageController::class, 'delete'])->name('admin-page-delete');

Route::any('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin-users');
Route::any('/admin/users/add', [App\Http\Controllers\Admin\UserController::class, 'add'])->name('admin-user-add');
Route::any('/admin/users/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin-user-edit');
Route::any('/admin/users/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin-user-delete');


//this needs to be at the end to catch all
Route::get('/{slug}', [App\Http\Controllers\PageController::class, 'view'])->name('page');
