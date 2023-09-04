<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/books', [BooksController::class , 'store']);
Route::patch('/books/{book}', [BooksController::class , 'update']);
Route::delete('/books/{book}', [BooksController::class , 'delete']);
