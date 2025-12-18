<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return redirect('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

});
