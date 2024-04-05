<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JuniorController;

use App\Http\Controllers\FullController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('funcionario/junior/{name}/{salaryPerHour}/{regNumber}', [JuniorController::class, "show"])
    ->where('name', '[A-Za-z]+')
    ->where('salaryPerHour', '[0-9]+')
    ->where('regNumber', '[0-9]+')
    ->where('workedHours', '[0-9]+');

Route::get('funcionario/aumentasalario/junior/{name}/{salaryPerHour}/{regNumber}', [JuniorController::class, "incrSalary"])
    ->where('name', '[A-Za-z]+')
    ->where('salaryPerHour', '[0-9]+')
    ->where('regNumber', '[0-9]+')
    ->where('workedHours', '[0-9]+');

Route::get('funcionario/pleno/{name}/{salaryPerHour}/{regNumber}', [FullController::class, "show"])
    ->where('name', '[A-Za-z]+')
    ->where('salaryPerHour', '[0-9]+')
    ->where('regNumber', '[0-9]+')
    ->where('workedHours', '[0-9]+');

Route::get('funcionario/aumentasalario/pleno/{name}/{salaryPerHour}/{regNumber}', [FullController::class, "incrSalary"])
    ->where('name', '[A-Za-z]+')
    ->where('salaryPerHour', '[0-9]+')
    ->where('regNumber', '[0-9]+')
    ->where('workedHours', '[0-9]+');