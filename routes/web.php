<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\Auth\CustomRegisteredUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CourtController;
use App\Models\Court;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplexController;

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', [CourtController::class, 'selectCourt'])->name('homepage');


//***  COURT'S ROUTES ***//
Route::get('/addCourt', function () { return view('pages.court.addCourt'); });

Route::post('/addCourt', [CourtController::class, 'store'])->name('court.store');

Route::get('/viewCourt', [CourtController::class, 'showAll'])->name('court.show');

Route::get('/editCourt/{courtId?}', [CourtController::class, 'edit'])->name('court.edit');
Route::post('/editCourt/{courtId?}', [CourtController::class, 'update'])->name('court.update');

Route::post('/deleteCourt/{courtId?}', [CourtController::class, 'delete'])->name('court.delete');

//***  BOOKING'S ROUTES ***//
Route::middleware(['auth'])->group(function () {
    Route::get('/addBooking/{court?}', [BookingController::class, 'showBookingForm'])->name('booking.add');
    Route::post('/addBooking/{court?}', [BookingController::class, 'store'])->name('booking.store');
});

Route::get('/viewBooking', [BookingController::class, 'show'])->name('booking.show');
Route::get('/booking/events', [BookingController::class, 'events'])->name('booking.events');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/addComplex', function () {
    return view('pages.complex.addComplex');
});

Route::post('/addComplex', [ComplexController::class, 'store'])->name('complex.store');

Route::get('/viewComplex', [ComplexController::class, 'showAll'])->name('complex.show');

Route::get('/editComplex/{complexId?}', [ComplexController::class, 'edit'])->name('complex.edit');
Route::post('/editComplex/{complexId?}', [ComplexController::class, 'update'])->name('complex.update');

Route::post('/deleteComplex/{complexId?}', [ComplexController::class, 'delete'])->name('complex.delete');

Route::get('/complexes', [ComplexController::class, 'selectComplex']);

Route::get('/strutture', [ComplexController::class, 'showAll'])->name('complex.showAll');

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

//rotte per modificare la password
Route::get('/profile/password', function () {
    return view('profile.update-password-form');
})->name('password.update.form');

Route::put('/password/update', [PasswordController::class, 'update'])->name('password.update');


