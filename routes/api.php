<?php

use App\Http\Controllers\InformacionAcademicaController;
use App\Http\Controllers\HistorialCriminalController;
use App\Http\Controllers\InformacionGeneralController;
use App\Http\Controllers\MasterRegistrationController;
use App\Http\Controllers\PosicionAspiranteController;
use App\Http\Controllers\InformacionResidencialController;
use App\Http\Controllers\SentenciaUsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




