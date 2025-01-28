<?php
use Illuminate\Support\Facades\Route;

//frontend
Route::get('/', [App\Http\Controllers\PageController::class, 'view'])->name('home');

Route::get('/cheats', [App\Http\Controllers\CheatController::class, 'index'])->name('cheats');
Route::get('/cheats/system/{id}', [App\Http\Controllers\CheatController::class, 'system'])->name('cheats-systems');
Route::any('/cheats/game/{id}', [App\Http\Controllers\CheatController::class, 'game'])->name('cheats-game');
Route::any('/cheats/download', [App\Http\Controllers\CheatController::class, 'download'])->name('cheats-download');

Route::get('/forums', [App\Http\Controllers\ForumController::class, 'index'])->name('forums');
Route::get('/forums/category/{id}', [App\Http\Controllers\ForumController::class, 'category'])->name('forum-category');
Route::get('/forums/topics/{id}', [App\Http\Controllers\ForumController::class, 'topics'])->name('forum-topics');
Route::get('/forums/topic/{id}', [App\Http\Controllers\ForumController::class, 'topic'])->name('forum-topic');

require __DIR__.'/auth.php';
Auth::routes();

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

//backend
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin-dashboard');

Route::any('/admin/pages', [App\Http\Controllers\Admin\PageController::class, 'index'])->name('admin-pages');
Route::any('/admin/pages/add', [App\Http\Controllers\Admin\PageController::class, 'add'])->name('admin-page-add');
Route::any('/admin/pages/edit/{id}', [App\Http\Controllers\Admin\PageController::class, 'edit'])->name('admin-page-edit');
Route::any('/admin/pages/delete/{id}', [App\Http\Controllers\Admin\PageController::class, 'delete'])->name('admin-page-delete');

Route::any('/admin/cheats/systems', [App\Http\Controllers\Admin\CheatController::class, 'system'])->name('admin-cheat-systems');
Route::any('/admin/cheats/systems/add', [App\Http\Controllers\Admin\CheatController::class, 'systemAdd'])->name('admin-cheat-system-add');
Route::any('/admin/cheats/systems/edit/{id}', [App\Http\Controllers\Admin\CheatController::class, 'systemEdit'])->name('admin-cheat-system-edit');
Route::any('/admin/cheats/systems/delete/{id}', [App\Http\Controllers\Admin\CheatController::class, 'systemDelete'])->name('admin-cheat-system-delete');

Route::any('/admin/cheats/games', [App\Http\Controllers\Admin\CheatController::class, 'game'])->name('admin-cheat-games');
Route::any('/admin/cheats/games/add', [App\Http\Controllers\Admin\CheatController::class, 'gameAdd'])->name('admin-cheat-game-add');
Route::any('/admin/cheats/games/edit/{id}', [App\Http\Controllers\Admin\CheatController::class, 'gameEdit'])->name('admin-cheat-game-edit');
Route::any('/admin/cheats/games/delete/{id}', [App\Http\Controllers\Admin\CheatController::class, 'gameDelete'])->name('admin-cheat-game-delete');

Route::any('/admin/cheats/devices', [App\Http\Controllers\Admin\CheatController::class, 'device'])->name('admin-cheat-devices');
Route::any('/admin/cheats/devices/add', [App\Http\Controllers\Admin\CheatController::class, 'deviceAdd'])->name('admin-cheat-device-add');
Route::any('/admin/cheats/devices/edit/{id}', [App\Http\Controllers\Admin\CheatController::class, 'deviceEdit'])->name('admin-cheat-device-edit');
Route::any('/admin/cheats/devices/delete/{id}', [App\Http\Controllers\Admin\CheatController::class, 'deviceDelete'])->name('admin-cheat-device-delete');

Route::any('/admin/cheats/codes', [App\Http\Controllers\Admin\CheatController::class, 'code'])->name('admin-cheat-codes');
Route::any('/admin/cheats/code/add', [App\Http\Controllers\Admin\CheatController::class, 'codeAdd'])->name('admin-cheat-code-add');
Route::any('/admin/cheats/code/edit/{id}', [App\Http\Controllers\Admin\CheatController::class, 'codeEdit'])->name('admin-cheat-code-edit');
Route::any('/admin/cheats/code/delete/{id}', [App\Http\Controllers\Admin\CheatController::class, 'codeDelete'])->name('admin-cheat-code-delete');

Route::any('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin-users');
Route::any('/admin/users/add', [App\Http\Controllers\Admin\UserController::class, 'add'])->name('admin-user-add');
Route::any('/admin/users/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin-user-edit');
Route::any('/admin/users/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin-user-delete');


//this needs to be at the end to catch all
Route::get('/{slug}', [App\Http\Controllers\PageController::class, 'view'])->name('page');
