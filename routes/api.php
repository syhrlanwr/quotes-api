<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuoteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/quote/random', [QuoteController::class, 'acak']);
Route::get('/quote', [QuoteController::class, 'index']);
Route::post('/quote', [QuoteController::class, 'store']);
Route::get('/quote/{id}', [QuoteController::class, 'show']);
Route::put('/quote/{id}', [QuoteController::class, 'update']);
Route::post('/quote/delete/{id}', [QuoteController::class, 'destroy']);
Route::get('/quote/search/{search}', [QuoteController::class, 'search']);
// Route::get('/quote/acak', [QuoteController::class, 'acak']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
