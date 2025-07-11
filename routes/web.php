<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\Auth\CustomRegisteredUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CourtController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplexController;

//*** HOME PAGE ***//
Route::get('/', [CourtController::class, 'selectCourt'])->name('homepage');

//***  COURT'S ROUTES ***//
Route::controller(CourtController::class)->prefix('court')->name('court.')->group(function () {

    Route::group(['middleware' => ['can:court_create', 'can:court_edit', 'can:court_delete']], function () {
        Route::get('/edit/{courtId?}', 'edit')->name('edit');
        Route::put('/edit/{courtId?}', 'update')->name('update');
        Route::view('/add', 'pages.court.addCourt');
        Route::post('/add', 'store')->name('store');
        Route::delete('/delete/{courtId?}', 'delete')->name('delete');
    });

    Route::get('/view', 'showAll')->name('show');
});

//***  BOOKING'S ROUTES ***//
Route::controller(BookingController::class)->name('booking.')->group(function () {
    Route::group(['middleware' => ['can:booking_create', 'can:booking_cancel']], function () {
        Route::get('/booking/add/{court?}', 'showBookingForm')->name('add');
        Route::post('/booking/add/{court?}', 'store')->name('store');
       
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/booking/view', 'show')->name('show');
        Route::get('/booking/events', 'events')->name('events');    //=> Generazione eventi Full Calendar .js
        Route::delete('/deleteBooking/{bookingId?}', 'delete')->name('delete');
    });
});

//***  COMPLEX'S ROUTES ***//
Route::controller(ComplexController::class)->name('complex.')->group(function () {

    Route::group(['middleware' => ['can:complex_create', 'can:complex_edit', 'can:complex_delete']], function () {
        Route::view('/addComplex', 'pages.complex.addComplex');
        Route::post('/addComplex', 'store')->name('store');
        Route::get('/editComplex/{complexId?}', 'edit')->name('edit');
        Route::put('/editComplex/{complexId?}', 'update')->name('update');
        Route::delete('/deleteComplex/{complexId?}', 'delete')->name('delete');
    });
   
    Route::get('/viewComplex', 'showAll')->name('show');
    Route::get('/complexes', 'selectComplex');
    Route::get('/strutture', 'showAll')->name('showAll');
});

Route::controller(ProfileController::class)->group(function () {

    Route::middleware(['auth'])->group(function () {
        //=> Rotta specifica per modificare l'immagine
        Route::put('/user/profile-information', 'update')->name('user-profile-information.update');

        //=> Rotta per eliminare l'account
        Route::delete('/profile', 'destroy')->name('profile.destroy');

        //=> Rotta per la pagina di modifica dell'account
        Route::get('/profile/edit', function () {
            return view('profile.update-profile-information-form');
        })->name('profile.edit');

    });
});

//=> Rotta per registrare l'utente
Route::post('/register', [CustomRegisteredUserController::class, 'store'])->name('register');

//=> Rotte per modificare la password
Route::get('/profile/password', function () {
    return view('profile.update-password-form');
})->middleware('auth')->name('password.update.form');

Route::put('/password/update', [PasswordController::class, 'update'])->name('password.update');

/* DEFAULT IMPORTED */
/*Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});
*/
