<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\GameController;
use App\Http\Controllers\API\KindController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\OpinionController;
use App\Http\Controllers\API\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/currentuser', [UserController::class, 'currentuser']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::patch('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);
Route::get('/usersaddresses/{user}', [UserController::class, 'addressByUserId']);

// Route::apiResource("users", UserController::class);
Route::apiResource("comments", CommentController::class);
Route::apiResource("opinions", OpinionController::class);
Route::apiResource("kinds", KindController::class);
Route::apiResource("games", GameController::class);
Route::apiResource("events", EventController::class);
Route::apiResource("categories", CategoryController::class);
Route::apiResource("addresses", AddressController::class);
