<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () 
{
    //All for Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //End for Profile

    //Route for upload photo
    Route::post('/profile/uploadPhoto', [ProfileController::class, 'uploadPhoto'])->name('profile.uploadPhoto');
    //End for photo

    //Shop routeshop
    Route::get('/shop', [ShopController::class, 'index'])->name('shop');
    
    //end shop route
});

require __DIR__.'/auth.php';
