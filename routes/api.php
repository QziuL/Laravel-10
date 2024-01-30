<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ReplySupportApiController;
use App\Http\Controllers\Api\SupportController;
use Illuminate\Support\Facades\Route;

Route::post('/auth', [AuthController::class, 'auth']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/supports', SupportController::class);

    Route::get('/replies/{support_id}', [ReplySupportApiController::class, 'getRepliesFromSupport']);
    Route::post('/replies/{support_id}', [ReplySupportApiController::class, 'storeReplySupport']);
    Route::delete('/replies/{id}', [ReplySupportApiController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', [AuthController::class, 'getUser']);
});