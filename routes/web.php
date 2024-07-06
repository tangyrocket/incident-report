<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncidentsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CompanyController;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'welcome');
});

Route::controller(PageController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('reportes', 'reports')->name('reportes');

    Route::get('dashboard_reporte', 'dashboard_report')->name('dashboard_reporte');
    Route::get('reportes/{incident:slug}', 'incident')->name('incident');


    Route::resource('users', UserController::class);
    Route::resource('companies', CompanyController::class);
});


Route::put('incident/{incident}', [IncidentsController::class, 'update'])->name('incident.update');
Route::get('incident/{incident}', [IncidentsController::class, 'show'])->name('incident.show');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


// En tu archivo de rutas web.php
Route::get('/incidents/filter', [IncidentsController::class, 'filter'])->name('incidents.filter');




require __DIR__ . '/auth.php';
