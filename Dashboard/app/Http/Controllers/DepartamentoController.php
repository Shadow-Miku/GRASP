<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidadorDepartamentos;
use DB;
use Carbon\Carbon;

class DepartamentoController extends Controller
{
    public function index(Request $request)
    {
        $filtrar = $request->get('filtrar');
        $consultaDep = DB::table('departamentos')->where('departamento','like','%'.$filtrar.'%')->get();
        $ConsultaD= DB::table('departamentos')->get();
        return view('admin.adminDep',compact('ConsultaD','filtrar','consultaDep'));
    }

    public function create()
    {
        return view('admin.regDep');
    }

    public function store(ValidadorDepartamentos $request)
    {
        DB::table('departamentos')->insert([
            "departamento"=> $request->input('departamento'),
            "created_at"=> Carbon::now(),
            "updated_at"=> Carbon::now()
        ]);
        return redirect('admin.adminDep')->with('confirmacion','abc');
    }

    public function show($id)
    {
        $consultaId= DB::table('departamentos')->where('IdDep',$id)->first();
        return view('admin.eliDep', compact('consultaId'));
    }

    public function edit($id)
    {
        $consultaId= DB::table('departamentos')->where('idDep',$id)->first();
        return view('admin.actDep', compact('consultaId'));
    }

    public function update(Request $request, $id)
    {
     DB::table('departamentos')->where('idDep',$id)->update([
            "departamento"=> $request->input('departamento'),
            "updated_at"=> Carbon::now()
        ]);

        return redirect('admin.adminDep')->with('actualizar','abc');
    }

    public function destroy($id)
    {
        DB::table('departamentos')->where('idDep',$id)->delete();

        return redirect('admin.adminDep')->with('elimina','abc');
    }
}
