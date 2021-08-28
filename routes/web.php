<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'auth.login');
Route::middleware('auth')->group(function(){
    Route::get('timeline',TimelineController::class)->name('timeline');
    Route::post('status',[StatusController::class,'store'])->name('statuses.store');
    Route::get('profile/{user}',ProfileInformationController::class)->name('profile');
    Route::get('profile/{user}/{following}',FollowController::class)->name('following');
});


require __DIR__.'/auth.php';
