<?php

use App\Http\Controllers\CourtController;
use App\Models\Court;
use Illuminate\Support\Facades\Route;

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', function () {
    $courts = Court::all();
    return view('homepage', compact('courts'));
});

Route::get('/addCourt', function () {
    return view('pages.court.addCourt');
});

Route::post('/addCourt', [CourtController::class, 'store'])->name('court.store');

Route::get('/viewCourt', [CourtController::class, 'showAll'])->name('court.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
