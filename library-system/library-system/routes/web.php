<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BorrowerController;

Route::get('/', function () {
    return redirect()->route('sections.index');
});

Route::resource('sections', SectionController::class);
Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('borrowers', BorrowerController::class);

Route::post('books/{book}/borrow', [BookController::class, 'borrow'])->name('books.borrow');
Route::post('books/{book}/return/{borrower}', [BookController::class, 'return'])->name('books.return');
