<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/tickets');
 
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets/create', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');


Route::middleware('auth')->group(function () {

    // Customer Routes
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    // Agent Routes
    Route::group([
        'prefix' => 'agent',
        'middleware' => 'is_agent',
        'as' => 'agent.',
    ], function () {
        Route::get('/dashboard', \App\Http\Controllers\Agent\DashboardController::class)->name('dashboard');
        Route::get('/tickets', [\App\Http\Controllers\Agent\TicketController::class, 'index'])->name('tickets.index');
        Route::get('/tickets/create', [\App\Http\Controllers\Agent\TicketController::class, 'create'])->name('tickets.create');
        Route::post('/tickets/create', [\App\Http\Controllers\Agent\TicketController::class, 'store'])->name('tickets.store');
        Route::get('/tickets/{ticket}', [\App\Http\Controllers\Agent\TicketController::class, 'show'])->name('tickets.show');
    }); 

});

require __DIR__ . '/auth.php';
