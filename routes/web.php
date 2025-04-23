<?php

use Illuminate\Support\Facades\Route;
use App\Models\Movie;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MovieController;

use App\Models\Ticket;
Route::get('/', function () {
    return view('welcome', ['movies'=>Movie::all()]);
});
Route::get('/movie/{movie:id}', [MovieController::class,'show']);
Route::get('/tickets/create/{movie:id}', [TicketController::class,'create']);
Route::post('/ticket/insert', [TicketController::class,'insert'])->name('ticket.insert');
Route::get('/movies/create', [MovieController::class,'create']);
Route::post('/movie/insert', [MovieController::class,'insert'])->name('movie.insert');
Route::put('/ticket/edit/{ticket:id}', [TicketController::class,'edit'])->name('ticket.edit');
Route::delete('/ticket/delete/{ticket:id}', [TicketController::class,'hapus'])->name('ticket.delete');
Route::put('/movie/update/{movie:id}', [MovieController::class, 'update'])->name('movie.update');
Route::get('/movies/edit/{movie:id}', [MovieController::class,'edit'])->name('movies.edit');
Route::delete('/movie/delete/{movie:id}', [MovieController::class,'hapus'])->name('movie.delete');
