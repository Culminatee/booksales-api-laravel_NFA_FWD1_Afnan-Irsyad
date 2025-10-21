<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

// ===========================
//  CUSTOMER ROUTES
// ===========================
Route::middleware(['auth:api', 'role:customer'])->group(function () {
    Route::post('/transactions', [TransactionController::class, 'store']);   // Create
    Route::get('/transactions/{id}', [TransactionController::class, 'show']); // Show detail
    Route::put('/transactions/{id}', [TransactionController::class, 'update']); // Update
});

// ===========================
//  ADMIN ROUTES
// ===========================
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::apiResource('/authors', AuthorController::class);
    Route::apiResource('/genres', GenreController::class);
    Route::apiResource('/books', BookController::class);

    // Update authors, genres, and books
    Route::put('/authors/{id}', [AuthorController::class, 'update']);
    Route::put('/genres/{id}', [GenreController::class, 'update']);
    Route::put('/books/{id}', [BookController::class, 'update']);

    // Delete authors, genres, and books
    Route::delete('/authors/{id}', [AuthorController::class, 'delete']);
    Route::delete('/genres/{id}', [GenreController::class, 'delete']);
    Route::delete('/books/{id}', [BookController::class, 'delete']);

    // transactions
    Route::get('/transactions', [TransactionController::class, 'index']); // Read all
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']); // Destroy
});

// ===========================
//  PUBLIC ROUTES (no login)
// ===========================
Route::apiResource('/authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('/genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('/books', BookController::class)->only(['index']);
