<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VistaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin.priAdm',[VistaController::class,'showPriAdm'])->name('priAdm');

Route::get('admin.regDep',[VistaController::class,'showRegDep'])->name('regDep');
Route::get('admin.adminDep',[VistaController::class,'showAdmDep'])->name('adminDep');

Route::get('admin.regUsu',[VistaController::class,'showRegUsu'])->name('regUsu');
Route::get('admin.adminUsu',[VistaController::class,'showAdmUsu'])->name('adminUsu');

/*
|--------------------------------------------------------------------------
| CRUD DEPARTAMETO JEFE
|--------------------------------------------------------------------------
*/

//index
Route::get('admin.adminDep',[DepartamentoController::class,'index'])->name('adminDep.index');

//Create
Route::get('admin.adminDep/create', [DepartamentoController::class,'create'])->name('adminDep.create');

//store
Route::post('admin.adminDep', [DepartamentoController::class,'store'])->name('adminDep.store');

//Edit
Route::get('admin.adminDep/{id}/edit',[DepartamentoController::class,'edit'])->name('adminDep.edit');

//Update
Route::put('admin.adminDep/{id}',[DepartamentoController::class,'update'])->name('adminDep.update');

//show
Route::get('admin.adminDep/{id}/show',[DepartamentoController::class,'show'])->name('adminDep.show');

//destroy
Route::delete('admin.adminDep/{id}',[DepartamentoController::class,'destroy'])->name('adminDep.destroy');

/*
|--------------------------------------------------------------------------
| CRUD USUARIOS JEFE
|--------------------------------------------------------------------------
*/

//index
Route::get('admin.adminUsu',[UserController::class,'index'])->name('adminUsu.index');

//Create
Route::get('admin.adminUsu/create', [UserController::class,'create'])->name('adminUsu.create');

//store
Route::post('admin.adminUsu', [UserController::class,'store'])->name('adminUsu.store');

//Edit
Route::get('admin.adminUsu/{id}/edit',[UserController::class,'edit'])->name('adminUsu.edit');

//Update
Route::put('admin.adminUsu/{id}',[UserController::class,'update'])->name('adminUsu.update');

//show
Route::get('admin.adminUsu/{id}/show',[UserController::class,'show'])->name('adminUsu.show');

//destroy
Route::delete('admin.adminUsu/{id}',[UserController::class,'destroy'])->name('adminUsu.destroy');

/*
|--------------------------------------------------------------------------
| Validadores
|--------------------------------------------------------------------------
*/
Route::post('admin.regDep', [VistaController::class,'procesarregistroDeparamento'])->name('RegiDepartamento');
Route::post('admin.regUsu', [VistaController::class,'procesarregistroUsuario'])->name('RegiUsuario');
