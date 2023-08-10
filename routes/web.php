<?php

use App\Http\Controllers\TroopController;
use App\Http\Controllers\VillageController;
use Illuminate\Support\Facades\Route;


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return redirect('/');
});
//Route::prefix('troops')->name('troops.')->controller('');
Route::middleware('auth')->group(function(){
    Route::resource('troops', TroopController::class);
    Route::resource('villages', VillageController::class);
    Route::prefix('villages')->name('villages.')->controller(VillageController::class)->group(function(){
        Route::get('/create/many', 'createMany')->name('create-many');
        Route::post('/create/store-many','storeMany')->name('store-many');
    });
});
