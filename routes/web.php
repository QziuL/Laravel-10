<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\SupportController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contato', [SiteController::class, 'contact']);
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
Route::post('/supports/create', [SupportController::class, 'store'])->name('supports.store');
Route::put('/supports/{id}/edit', [SupportController::class, 'update'])->name('supports.update');