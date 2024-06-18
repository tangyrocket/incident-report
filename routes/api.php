<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\IncidentController;


    Route::apiResource('v1/incidents', App\Http\Controllers\Api\V1\IncidentController::class);



