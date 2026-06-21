<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\MautController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlternativeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/hotels/import', [HotelController::class, 'import'])->name('hotels.import');
    Route::resource('hotels', HotelController::class);
    Route::resource('criterias', CriteriaController::class);

    Route::get('/maut', [MautController::class, 'index'])->name('maut.index');
    Route::post('/maut/calculate', [MautController::class, 'calculate'])->name('maut.calculate');

    Route::get('/route', [RouteController::class, 'index'])->name('route.index');

    Route::get('/alternatives', [AlternativeController::class, 'index'])->name('alternatives.index');
    Route::get('/alternatives/create', [AlternativeController::class, 'create'])->name('alternatives.create');
    Route::post('/alternatives', [AlternativeController::class, 'store'])->name('alternatives.store');
    Route::get('/alternatives/{hotel_id}/edit', [AlternativeController::class, 'edit'])->name('alternatives.edit');
    Route::delete('/alternatives/{hotel_id}', [AlternativeController::class, 'destroy'])->name('alternatives.destroy');

    Route::get('/matriks', function () {
        $hotels = \App\Models\Hotel::all();
        $criterias = \App\Models\Criteria::all();
        $alternatives = \App\Models\Alternative::with(['hotel', 'criteria'])->get()->groupBy('hotel_id');
        return view('matriks.index', compact('hotels', 'criterias', 'alternatives'));
    })->name('matriks.index');

    Route::get('/matriks/normalisasi', [\App\Http\Controllers\MatriksController::class, 'normalisasi'])->name('matriks.normalisasi');

    Route::resource('users', UserController::class);
    Route::get('/tentang', function () {
        return view('tentang');
    })->name('tentang');
});
