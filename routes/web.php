<?php

use App\Http\Controllers\AcademicInfoController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CriminalHistoryController;
use App\Http\Controllers\GeneralInfoController;
use App\Http\Controllers\MasterRegistrationController;
use App\Http\Controllers\PositionAspireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentialInfoController;
use App\Http\Controllers\SentenceUserController;
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

    Route::post('/add-general-info', [GeneralInfoController::class, 'store']);
    Route::resource('residential_infos', ResidentialInfoController::class);
    Route::resource('academic_infos', AcademicInfoController::class);
    Route::resource('criminal_histories', CriminalHistoryController::class);
    Route::resource('position_aspires', PositionAspireController::class);
    Route::post('/wizard/save', [MasterRegistrationController::class, 'store'])->name('wizard.save');
    Route::resource('sentence_users', SentenceUserController::class);

});



require __DIR__.'/auth.php';
