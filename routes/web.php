<?php

use App\Http\Controllers\Acceptance\AcceptanceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Drug\DrugController;
use App\Http\Controllers\Procurement\ProcurementController;
use App\Http\Controllers\Release\ReleaseController;
use App\Http\Controllers\WriteOff\WriteOffController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/', function () {
        return view('welcome');
    })->name('main');
    Route::get('/main', function () {
        return view('welcome');
    })->name('main');
});

Route::group(['namespace'=>'App\Http\Controllers\User'], function() {
    Route::get('/user/{user}', 'ShowController')->name('user.show');
    Route::get('/login', 'LoginController')->name('user.login');
    Route::post('/login', 'LoginInController')->name('user.loginIn');
    Route::get('/logout', 'LogOutController')->name('user.logout');
    Route::get('/registration', 'RegistrationController')->name('user.registration');
    Route::post('/registration', 'CreateController')->name('user.store');
});

Route::group(['namespace'=>'Drug', 'prefix'=>'drugs', 'middleware' => ['auth']], function() {
    Route::get('/', [DrugController::class, 'index'])->name('drug.index');
    Route::get('/drug/create', [DrugController::class, 'create'])->name('drug.create');
    Route::post('/', [DrugController::class, 'store'])->name('drug.store');
    Route::get('/drug/{drug}', [DrugController::class, 'show'])->name('drug.show');
    Route::get('/drug/{drug}/edit', [DrugController::class, 'edit'])->name('drug.edit');
    Route::patch('/drug/{drug}', [DrugController::class, 'update'])->name('drug.update');
    Route::delete('/drug/{drug}', [DrugController::class, 'delete'])->name('drug.delete');
});

Route::group(['namespace'=>'Acceptance', 'prefix'=>'acceptance', 'middleware' => ['auth']], function() {
    Route::get('/', [AcceptanceController::class, 'index'])->name('acceptance.index');
    Route::get('/acceptance/create', [AcceptanceController::class, 'create'])->name('acceptance.create');
    Route::post('/', [AcceptanceController::class, 'store'])->name('acceptance.store');
    Route::get('/acceptance/{acceptance}', [AcceptanceController::class, 'show'])->name('acceptance.show');
//    Route::get('/drug/{drug}/edit', [DrugController::class, 'edit'])->name('drug.edit');
//    Route::patch('/drug/{drug}', [DrugController::class, 'update'])->name('drug.update');
//    Route::delete('/drug/{drug}', [DrugController::class, 'delete'])->name('drug.delete');
});

Route::group(['namespace'=>'Release', 'prefix'=>'release', 'middleware' => ['auth']], function() {
    Route::get('/', [ReleaseController::class, 'index'])->name('release.index');
    Route::get('/release/create', [ReleaseController::class, 'create'])->name('release.create');
    Route::post('/', [ReleaseController::class, 'store'])->name('release.store');
    Route::get('/release/{release}', [ReleaseController::class, 'show'])->name('release.show');
    Route::get('/release/{release}/edit', [ReleaseController::class, 'edit'])->name('release.edit');
    Route::patch('/release/{release}', [ReleaseController::class, 'update'])->name('release.update');
//    Route::delete('/drug/{drug}', [DrugController::class, 'delete'])->name('drug.delete');
});

Route::group(['namespace'=>'WriteOff', 'prefix'=>'write_off', 'middleware' => ['auth']], function() {
    Route::get('/', [WriteOffController::class, 'index'])->name('write_off.index');
    Route::get('/write_off/create', [WriteOffController::class, 'create'])->name('write_off.create');
    Route::post('/', [WriteOffController::class, 'store'])->name('write_off.store');
    Route::get('/write_off/{write_off}', [WriteOffController::class, 'show'])->name('write_off.show');
//    Route::get('/release/{release}/edit', [ReleaseController::class, 'edit'])->name('release.edit');
//    Route::patch('/release/{release}', [ReleaseController::class, 'update'])->name('release.update');
//    Route::delete('/drug/{drug}', [DrugController::class, 'delete'])->name('drug.delete');
});

Route::group(['namespace'=>'Procurement', 'prefix'=>'procurement', 'middleware' => ['auth']], function() {
    Route::get('/', [ProcurementController::class, 'index'])->name('procurement.index');
    Route::get('/procurement/create', [ProcurementController::class, 'create'])->name('procurement.create');
    Route::post('/', [ProcurementController::class, 'store'])->name('procurement.store');
    Route::get('/procurement/{procurement}', [ProcurementController::class, 'show'])->name('procurement.show');
////    Route::get('/release/{release}/edit', [ReleaseController::class, 'edit'])->name('release.edit');
////    Route::patch('/release/{release}', [ReleaseController::class, 'update'])->name('release.update');
////    Route::delete('/drug/{drug}', [DrugController::class, 'delete'])->name('drug.delete');
});

Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'middleware' => ['auth']], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/user', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/user/create', [AdminController::class, 'createUser'])->name('admin.createUser');
    Route::post('/', [AdminController::class, 'storeUser'])->name('admin.storeUser');
//    Route::get('/procurement/{procurement}', [ProcurementController::class, 'show'])->name('procurement.show');
////    Route::get('/release/{release}/edit', [ReleaseController::class, 'edit'])->name('release.edit');
////    Route::patch('/release/{release}', [ReleaseController::class, 'update'])->name('release.update');
////    Route::delete('/drug/{drug}', [DrugController::class, 'delete'])->name('drug.delete');
});

