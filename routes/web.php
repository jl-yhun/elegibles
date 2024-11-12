<?php

use App\Http\Controllers\InformacionAcademicaController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HistorialCriminalController;
use App\Http\Controllers\InformacionGeneralController;
use App\Http\Controllers\MasterRegistrationController;
use App\Http\Controllers\PosicionAspiranteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InformacionResidencialController;
use App\Http\Controllers\SentenciaUsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registro', [RegisteredUserController::class, 'create'])->name('register');

Route::post('/register-manual', [MasterRegistrationController::class, 'register'])->name('manual.register');
Route::post('/save-code', [MasterRegistrationController::class, 'verifyCode'])->name('save.code');
Route::get('/verify-code', [MasterRegistrationController::class, 'viewVerifyCode'])->name('view.verify.code');

Route::middleware(['auth'])->group(function () {

    Route::get('/formulario', function () {
        return view('index');
    })->name('formulario');

    Route::post('/add-general-info', [InformacionGeneralController::class, 'store']);
    Route::resource('residential_infos', InformacionResidencialController::class);
    Route::resource('academic_infos', InformacionAcademicaController::class);
    Route::resource('criminal_histories', HistorialCriminalController::class);
    Route::resource('position_aspires', PosicionAspiranteController::class);
    Route::post('/wizard/save', [MasterRegistrationController::class, 'store'])->name('wizard.save');
    Route::resource('sentence_users', SentenciaUsuarioController::class);

});



require __DIR__.'/auth.php';
