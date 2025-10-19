<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

    Route::post('/transaction', [\App\Http\Controllers\TransactionController::class, 'store'])->name('transactions.store');

    Route::get('/transactions',[\App\Http\Controllers\TransactionController::class, 'show'])->name('transactions.show');

    Route::delete('/transactions/destroy/{id}', [\App\Http\Controllers\TransactionController::class, 'destroy'])->name('transactions.destroy');

    Route::get('/budgets',[\App\Http\Controllers\BudgetController::class, 'show'])->name('budgets.show');

    Route::delete('/budget/destroy/{id}', [\App\Http\Controllers\BudgetController::class, 'destroy'])->name('budgets.destroy');

    Route::post('/budgets/store', [\App\Http\Controllers\BudgetController::class, 'store'])->name('budgets.store');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});


