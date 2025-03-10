<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClubMembershipController;
use App\Http\Controllers\HomeController;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');


Route::get('/club_memberships', [ClubMembershipController::class, 'index'])
    ->name('club_memberships.index')
    ->middleware('auth');

Route::get('/club_memberships/create', [ClubMembershipController::class, 'create'])
    ->name('club_memberships.create')
    ->middleware('auth');

Route::post('/club_memberships', [ClubMembershipController::class, 'store'])
    ->name('club_memberships.store')
    ->middleware('auth');

Route::get('/club_memberships/{clubMembership}/edit', [ClubMembershipController::class, 'edit'])
    ->name('club_memberships.edit')
    ->middleware(['auth', 'role:Administrator']);

Route::put('/club_memberships/{clubMembership}', [ClubMembershipController::class, 'update'])
    ->name('club_memberships.update')
    ->middleware(['auth', 'role:Administrator']); 
    
Route::delete('/club_memberships/{clubMembership}', [ClubMembershipController::class, 'destroy'])
    ->name('club_memberships.destroy')
    ->middleware(['auth', 'role:Administrator']); 
