<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VistaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AsignadoController;
use App\Http\Controllers\cbdreportes;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('welcome',[LoginController::class,'show']);
Route::post('welcome',[LoginController::class,'login']);

Route::get('admin.priAdm',[VistaController::class,'showPriAdm'])->name('priAdm');
Route::get('auxiliar.priAux',[VistaController::class,'showPriAux'])->name('priAux');
Route::get('cliente.priCli',[VistaController::class,'showPriCli'])->name('priCli');
/*
|--------------------------------------------------------------------------
| CRUD DEPARTAMETOS JEFE
|--------------------------------------------------------------------------
*/
Route::get('admin.regDep',[VistaController::class,'showRegDep'])->name('regDep');
Route::get('admin.adminDep',[VistaController::class,'showAdmDep'])->name('adminDep');

/*
|--------------------------------------------------------------------------
| CRUD USUARIOS JEFE
|--------------------------------------------------------------------------
*/
Route::get('admin.regUsu',[VistaController::class,'showRegUsu'])->name('regUsu');
Route::get('admin.adminUsu',[VistaController::class,'showAdmUsu'])->name('adminUsu');

/*
|--------------------------------------------------------------------------
| ADMINISTRACIÓN Y ASIGNACIÓN TICKETS JEFE
|--------------------------------------------------------------------------
*/
Route::get('admin.adminTic',[VistaController::class,'showAdmTic'])->name('adminTic');

/*
|--------------------------------------------------------------------------
| TICKETS CLIENTE
|--------------------------------------------------------------------------
*/
// Create
Route::get('cliente.regTic/create',[TicketController::class,'create'])->name('regTic.create');
Route::post('cliente.reg',[TicketController::class,'store'])->name('regTic.store');

// Index
Route::get('cliente.consTic',[TicketController::class,'indexCli'])->name('consTic.indexCli');

//edit
Route::get('cliente.consTic/{id}/edit',[TicketController::class,'editCli'])->name('infoCanT.edit');
//cancelar ticket
Route::put('cliente.consTic/{id}',[TicketController::class,'cancelarTicket'])->name('cancelarTicket.update');

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
| TICKETS JEFE, GESTION Y ASIGNACIÓN
|--------------------------------------------------------------------------
*/

//index
Route::get('admin.adminTic',[TicketController::class,'index'])->name('adminTic.index');
//edit
Route::get('admin.adminTic/{id}/edit',[TicketController::class,'edit'])->name('adminTic.edit');
//comentarios y observaciones
Route::put('admin.adminTic/{id}',[TicketController::class,'update'])->name('adminTic.update');

//asignar tickets crete
Route::get('admin.asigTic/create',[AsignadoController::class,'create'])->name('asigTic.create');
//asignar tickets store
Route::post('admin.asigTic',[AsignadoController::class,'store'])->name('asigTic.store');
//index de tickets asignados
Route::get('admin.adminAsg',[AsignadoController::class,'index'])->name('adminAsg.index');


/*
|--------------------------------------------------------------------------
| AXILIAR
|--------------------------------------------------------------------------
*/
//Index Tickets
Route::get('auxiliar.contrTic',[TicketController::class,'indexAux'])->name('contrTic.index');

//Edit Tickets
Route::get('auxiliar.contrTic/{id}/edit',[TicketController::class,'editAux'])->name('contrTic.edit');

//Update Tickets
Route::put('auxiliar.contrTic/{id}',[TicketController::class,'updateAux'])->name('contrTic.update');

//Edit Nombre
Route::get('auxiliar.perfilAux/{id}/edit',[UserController::class,'editnameAux'])->name('perfilAux.edit');

//Update Nombre
Route::put('auxiliar.perfilAux/{id}',[UserController::class,'updatenameAux'])->name('perfilAux.update');

Route::get('auxiliar.buscar-tickets', [cbdreportes::class,'mostrarFormulario'])->name('mostrar-formulario');

Route::post('auxiliar.buscar-tickets',[cbdreportes::class,'buscarPorFecha'])->name('buscar-tickets');


/*
|--------------------------------------------------------------------------
| CLIENTE
|--------------------------------------------------------------------------
*/

//Edit Nombre
Route::get('cliente.perfilCli/{id}/edit',[UserController::class,'editnameCli'])->name('perfilCli.edit');

//Update Nombre
Route::put('cliente.perfilCli/{id}',[UserController::class,'updatenameCli'])->name('perfilCli.update');



/*
|--------------------------------------------------------------------------
| Validadores
|--------------------------------------------------------------------------
*/
Route::post('admin.regDep', [VistaController::class,'procesarregistroDeparamento'])->name('RegiDepartamento');
Route::post('admin.regUsu', [VistaController::class,'procesarregistroUsuario'])->name('RegiUsuario');
Route::post('admin.asgTic', [VistaController::class,'procesarregistroAsignado'])->name('AsgTicket');
Route::post('cliente.regTic', [VistaController::class,'procesarregistroTicket'])->name('RegiTicket');

/*
|--------------------------------------------------------------------------
| PDF'S
|--------------------------------------------------------------------------
*/
Route::get('/imprimir', [cbdreportes::class, 'imprimir']);
Route::get('/imprimir2', [cbdreportes::class, 'imprimidor']);
Route::get('/imprimir3', [cbdreportes::class, 'imprimidor1']);
Route::get('/imprimir4', [cbdreportes::class, 'imprimidor2']);
//PDF's del auxiliar
Route::get('/imprimir5', [cbdreportes::class, 'imprimidor3']);
Route::get('/imprimir6', [cbdreportes::class, 'imprimidor4']);
Route::get('/imprimir7', [cbdreportes::class, 'imprimidor5']);
Route::get('/imprimir8', [cbdreportes::class, 'imprimidor6']);


//Edit Nombre Admin
Route::get('Admin.perfilAdmin/{id}/edit',[UserController::class,'editnameAdmin'])->name('perfilAdmin.edit');

//Update Nombre Admin
Route::put('Admin.perfilAdmin/{id}',[UserController::class,'updatenameAdmin'])->name('perfilAdmin.update');
