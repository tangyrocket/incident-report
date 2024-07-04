<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\IncidentController;


    Route::apiResource('v1/incidents', App\Http\Controllers\Api\V1\IncidentController::class)->middleware('auth:sanctum');
    Route::apiResource('v1/corrective', App\Http\Controllers\Api\V1\CorrectiveActionController::class)->middleware('auth:sanctum');;



Route::post('login', [App\Http\Controllers\Api\LoginController::class,'login']);
