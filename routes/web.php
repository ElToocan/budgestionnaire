<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return redirect('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('budgets', \App\Http\Controllers\BudgetController::class);
    Route::resource('transactions', TransactionController::class);
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

});
