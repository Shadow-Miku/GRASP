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
