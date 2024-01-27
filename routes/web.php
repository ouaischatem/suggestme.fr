<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Suggestion\SuggestionController;
use App\Http\Controllers\Suggestion\SuggestionCreateController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/suggestions/create', [SuggestionCreateController::class, 'index'])->name('suggestions.create');
Route::post('/suggestions/create/store', [SuggestionCreateController::class, 'store'])->name('suggestions.store');

Route::post('/suggestions/{suggestion}/vote', [SuggestionController::class, 'vote'])->name('vote');
