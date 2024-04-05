<?php

use App\Http\Controllers\api\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PostSauceController;
use App\Http\Controllers\api\PostManageSauceController;


Route::get('test', [HomeController::class, 'index'])->name('home');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api/', [HomeController::class, 'index'])->name('home');
Route::get('/api/sauce/{id}', [HomeController::class, 'show'])->name('sauce');
Route::get('/api/addSauce', [HomeController::class, 'addSauce'])->name('addSauce');

Route::post('/api/addSauce/traitement', [PostSauceController::class, 'store'])->name('addSauce/traitement');

Route::get('/api/AllSauces', [PostManageSauceController::class, 'index'])->name('AllSauces.index');

Route::get('/api/AllSauces/{id}/edit', [PostManageSauceController::class, 'edit'])->name('AllSauces.edit');
Route::put('/api/AllSauce/{id}', [PostManageSauceController::class, 'update'])->name('AllSauce.update');

Route::delete('/api/AllSauces/{id}', [PostManageSauceController::class, 'destroy'])->name('AllSauces.destroy');