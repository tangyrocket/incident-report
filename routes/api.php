<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\IncidentController;


    Route::apiResource('v1/incidents', App\Http\Controllers\Api\V1\IncidentController::class)->middleware('auth:sanctum');
    Route::apiResource('v1/corrective', App\Http\Controllers\Api\V1\CorrectiveActionController::class)->middleware('auth:sanctum');;



Route::post('login', [App\Http\Controllers\Api\LoginController::class,'login']);

Route::get('login', [App\Http\Controllers\Api\LoginController::class,'login']);


Route::get('v1/ueData', [App\Http\Controllers\Api\V1\DataController::class, 'ueData']);

Route::get('v1/seData', [App\Http\Controllers\Api\V1\DataController::class, 'seData']);


Route::get('v1/areaData', [App\Http\Controllers\Api\V1\DataController::class, 'areaData']);

Route::get('v1/eventoData', [App\Http\Controllers\Api\V1\DataController::class, 'eventoData']);

Route::get('v1/empresaData', [App\Http\Controllers\Api\V1\DataController::class, 'empresaData']);

Route::get('v1/personalData', [App\Http\Controllers\Api\V1\DataController::class, 'personalData']);
