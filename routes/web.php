<?php

use App\Http\Controllers\CourtController;
use App\Models\Court;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplexController;

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', [CourtController::class, 'selectCourt']);

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
