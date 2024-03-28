<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostSauceController;
use App\Http\Controllers\PostManageSauceController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sauce/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('sauce/{id}');
Route::get('/addSauce', [HomeController::class, 'addSauce'])->name('addSauce');

Route::post('/addSauce/traitement', [PostSauceController::class, 'store'])->name('addSauce/traitement');

Route::get('/AllSauces', [PostManageSauceController::class, 'index'])->name('AllSauces.index');

Route::get('/AllSauces/{sauce}/edit', [PostManageSauceController::class, 'edit'])->name('AllSauces/{sauce}/edit');
Route::put('/AllSauce/{id}', [PostManageSauceController::class, 'update'])->name('AllSauce.update');

Route::delete('/AllSauces/{id}', [PostManageSauceController::class, 'destroy'])->name('AllSauces.destroy'); // Utilisez la méthode DELETE pour la suppression