<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidadorDepartamentos;
use App\Http\Requests\ValidadorUser;
use App\Http\Requests\ValidadorTickets;
use App\Http\Requests\ValidadorAsignados;

class VistaController extends Controller
{
   
    public function showWelcome(){
        return view('Welcome');
    }

    public function showPriAdm(){
        return view('admin.priAdm');
    }



    /* Departamento Adm */
    public function showRegDep(){
        return view('admin.regDep');
    }

    public function showAdmDep(){
        return view('admin.adminDep');
    }



    /* Usuarios Adm */
    public function showRegUsu(){
        return view('admin.regUsu');
    }

    public function showAdmUsu(){
        return view('admin.adminUsu');
    }



    /* Tickets Adm */
    public function showAdmTic(){
        return view('admin.adminTic');
    }

    public function showAsgTic(){
        return view('admin.asigTic');
    }



    /* Tickets Auxiliares */
    public function showCntTic(){
        return view('auxiliar.contrTic');
    }


    /* Tickets Clientes */
    public function showRegTic(){
        return view('cliente.regTic');
    }

    public function GesTic(){
        return view('cliente.gestTic');
    }


    /*Reportes */
    public function showreporte(){
        return view('admin.reporte');
    }



    /* Rutas para procesar registros */
    public function procesarregistroDeparamento(ValidadorDepartamentos $req){
        return redirect('admin.regDep')->with('confirmacion','Registro de departamento exitoso');
    }

    public function procesarregistroUsuario(ValidadorUser $req){
        return redirect('admin.regUsu')->with('confirmacion','Registro de usuario exitoso');
    }

    public function procesarregistroAsinado(ValidadorAsignados $req){
        return redirect('admin.asgTick')->with('confirmacion','Asignamiento del Ticket exitoso');
    }

    public function procesarregistroTicket(ValidadorTickets $req){
        return redirect('cliente.regTic')->with('confirmacion','Levantamiento del Ticket exitoso');
    }
}
