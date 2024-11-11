<?php

use App\Http\Controllers\AcademicInfoController;
use App\Http\Controllers\CriminalHistoryController;
use App\Http\Controllers\GeneralInfoController;
use App\Http\Controllers\MasterRegistrationController;
use App\Http\Controllers\PositionAspireController;
use App\Http\Controllers\ResidentialInfoController;
use App\Http\Controllers\SentenceUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




