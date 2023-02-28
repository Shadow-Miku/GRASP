<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use PDF;
use Illuminate\Support\Facades\Storage;
use DB;
use Carbon\Carbon;

class cbdreportes extends Controller
{
    public function imprimir(Request $request){
        $filtrar = $request->get('filtrar');

        $consultaUsu = DB::table('users')
        ->where('name', 'like', '%'.$filtrar.'%')
        ->orWhere('username', 'like', '%'.$filtrar.'%')
        ->orWhere('roll', 'like', '%'.$filtrar.'%')
        ->orWhere('email', 'like', '%'.$filtrar.'%')
        ->get();

        $Consulta= DB::table('users')->get();
        
        $pdf = \PDF::loadView('admin.reporteusuarios',compact('consultaUsu','Consulta','filtrar'));
        return $pdf->stream('reporteUsuarios.pdf');
    }

    public function imprimidor(Request $request){
        $filtrar = $request->get('filtrar');
        $consultaDep = DB::table('departamentos')->where('departamento','like','%'.$filtrar.'%')->get();
        $ConsultaD= DB::table('departamentos')->get();
        
        $pdf = \PDF::loadView('admin.reportedepa',compact('ConsultaD','consultaDep','filtrar'));
        return $pdf->stream('reporteDepartamentos.pdf');
    }

    public function imprimidor1(Request $request){
        $filtrar = $request->get('filtrar');

        $consultaTic = DB::table('tickets')
        ->join('users', 'tickets.autor', '=', 'users.id')
        ->join('departamentos', 'tickets.departamento', '=', 'departamentos.idDep')
        ->where('tickets.status', 'like', '%' . $filtrar . '%')
        ->orWhere('tickets.clasificacion', 'like', '%' . $filtrar . '%')
        ->orWhere('departamentos.departamento', 'like', '%' . $filtrar . '%')
        ->orWhere('users.name', 'like', '%' . $filtrar . '%')
        ->orWhere('tickets.created_at', 'like', '%' . $filtrar . '%')
        ->select('tickets.*', 'users.name as autor_name', 'departamentos.departamento')
        ->get();

        $Consulta= DB::table('tickets')->get();
        $pdf = \PDF::loadView('admin.reportetickets',compact('consultaTic','Consulta','filtrar'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->stream('reporte de Tickets.pdf');
    }

    public function imprimidor2(Request $request){
        $filtrar = $request->get('filtrar');

        $consultaAsg = DB::table('asignados')
        ->join('users', 'asignados.encargadoId', '=', 'users.id')
        ->join('tickets', 'asignados.ticketId', '=', 'tickets.idTk')
        ->select('asignados.idAsg', 'users.name as encargado', 'tickets.detalles', 'asignados.created_at')
        ->where('users.name', 'like', '%' . $filtrar . '%')
        ->orWhere('asignados.created_at', 'like', '%' . $filtrar . '%')
        ->orWhere('tickets.detalles','like','%'.$filtrar.'%')
        ->get();
        $pdf = \PDF::loadView('admin.reporteasig',compact('filtrar','consultaAsg'));
        return $pdf->stream('reporte de Asignaciones.pdf');
    }
    


    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
