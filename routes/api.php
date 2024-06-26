<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\LinkController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\SubscriberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('news/all',[NewsController::class,'index']);
Route::get('links/all',[LinkController::class,'index']);
Route::post('add/subscribe',[SubscriberController::class,'store']);
Route::post('contact',[ContactController::class,'send']);
