<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\CustomRegisteredUserController;
use App\Http\Controllers\CourtController;
use App\Models\Court;
use Illuminate\Support\Facades\Route;

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', [CourtController::class, 'selectCourt'])->name('homepage');


Route::get('/addCourt', function () {
    return view('pages.court.addCourt');
});

Route::post('/addCourt', [CourtController::class, 'store'])->name('court.store');

Route::get('/viewCourt', [CourtController::class, 'showAll'])->name('court.show');

Route::get('/editCourt/{courtId?}', [CourtController::class, 'edit'])->name('court.edit');
Route::post('/editCourt/{courtId?}', [CourtController::class, 'update'])->name('court.update');

Route::post('/deleteCourt/{courtId?}', [CourtController::class, 'delete'])->name('court.delete');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//rotta per la pagina di modifica dell'account
Route::get('/profile/edit', function () {
    return view('profile.update-profile-information-form');
})->name('profile.edit');

//rotta specifica per modificare l'immagine
Route::put('/user/profile-information', [ProfileController::class, 'update'])
    ->name('user-profile-information.update');

//rotta per eliminare l'account
Route::delete('/user/delete', [ProfileController::class, 'destroy'])->name('profile.delete');

//rotta per registrare l'utente
Route::post('/register', [CustomRegisteredUserController::class, 'store'])->name('register');


