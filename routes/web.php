<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubMembershipController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('club_memberships', ClubMembershipController::class);
    Route::get('/profile', function () { return view('profile'); })->name('profile');
});
