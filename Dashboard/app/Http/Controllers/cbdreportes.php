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

/*
|--------------------------------------------------------------------------
| PDF'S de los departamentos en el sistema
|--------------------------------------------------------------------------
*/

    public function imprimidor(Request $request){
        $filtrar = $request->get('filtrar');
        $consultaDep = DB::table('departamentos')->where('departamento','like','%'.$filtrar.'%')->get();
        $ConsultaD= DB::table('departamentos')->get();

        $pdf = \PDF::loadView('admin.reportedepa',compact('ConsultaD','consultaDep','filtrar'));
        return $pdf->stream('reporteDepartamentos.pdf');
    }

/*
|--------------------------------------------------------------------------
| PDF'S de los tickets levantados Jefe
|--------------------------------------------------------------------------
*/

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

    /*
|--------------------------------------------------------------------------
| PDF'S de los ticket asignados vista Jefe
|--------------------------------------------------------------------------
*/

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

/*
|--------------------------------------------------------------------------
| PDF'S de los ticket x primer semestre y x auxiliar asignado
|--------------------------------------------------------------------------
*/

    public function imprimidor3(Request $request){
        $filtrar = $request->get('filtrar');

        $consultaSem1 = DB::table('tickets')
        ->join('users', 'tickets.autor', '=', 'users.id')
        ->join('departamentos', 'tickets.departamento', '=', 'departamentos.idDep')
        ->join('asignados', 'tickets.idTk', '=', 'asignados.ticketId')
        ->where('asignados.encargadoId', '=', auth()->user()->id)
        ->where(function($query) use ($filtrar) {
            $query->where('tickets.status', 'like', '%' . $filtrar . '%')
                  ->orWhere('tickets.clasificacion', 'like', '%' . $filtrar . '%')
                  ->orWhere('departamentos.departamento', 'like', '%' . $filtrar . '%')
                  ->orWhere('users.name', 'like', '%' . $filtrar . '%')
                  ->orWhere('tickets.created_at', 'like', '%' . $filtrar . '%');
        })
        ->whereBetween('tickets.created_at', ['2023-01-01', '2023-06-30'])
        ->select('tickets.*', 'users.name as autor_name', 'departamentos.departamento')
        ->get();


        $pdf = \PDF::loadView('auxiliar.reportexsemestre1',compact('filtrar','consultaSem1'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->stream('reporte del primer semestre.pdf');

    }

/*
|--------------------------------------------------------------------------
| PDF'S de los ticket x segundo semestre y x auxiliar asignado
|--------------------------------------------------------------------------
*/

    public function imprimidor4(Request $request){
        $filtrar = $request->get('filtrar');
        $user = auth()->user()->id;

        $consultaSem2 = DB::table('tickets')
        ->join('users', 'tickets.autor', '=', 'users.id')
        ->join('departamentos', 'tickets.departamento', '=', 'departamentos.idDep')
        ->join('asignados', 'tickets.idTk', '=', 'asignados.ticketId')
        ->where('asignados.encargadoId', '=', auth()->user()->id)
        ->where(function($query) use ($filtrar) {
            $query->where('tickets.status', 'like', '%' . $filtrar . '%')
                  ->orWhere('tickets.clasificacion', 'like', '%' . $filtrar . '%')
                  ->orWhere('departamentos.departamento', 'like', '%' . $filtrar . '%')
                  ->orWhere('users.name', 'like', '%' . $filtrar . '%')
                  ->orWhere('tickets.created_at', 'like', '%' . $filtrar . '%');
        })
        ->whereBetween('tickets.created_at', ['2023-07-01', '2023-12-30'])
        ->select('tickets.*', 'users.name as autor_name', 'departamentos.departamento')
        ->get();

        $pdf = \PDF::loadView('auxiliar.reportexsemestre2',compact('filtrar','consultaSem2','user'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->stream('reporte del segundo semestre.pdf');

    }

/*
|--------------------------------------------------------------------------
| PDF'S de los ticket x departamentos y x auxiliar asignado
|--------------------------------------------------------------------------
*/

    public function imprimidor5(Request $request){
    $user = auth()->user()->id;
    $filtrar = $request->get('filtrar');

    // Obtener los departamentos que tienen tickets asignados al usuario actual
    $departamentos = DB::table('tickets')
        ->join('asignados', 'tickets.idTk', '=', 'asignados.ticketId')
        ->join('departamentos', 'tickets.departamento', '=', 'departamentos.idDep')
        ->where('asignados.encargadoId', '=', $user)
        ->select('departamentos.departamento')
        ->distinct()
        ->get();

    // Generar un PDF por cada departamento y agregarlo al archivo ZIP
    $zip = new \ZipArchive();
    $zipName = 'ticketsxDepartamentos.zip';
    $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

    foreach ($departamentos as $departamento) {
        $consultaxDep = DB::table('tickets')
            ->join('users', 'tickets.autor', '=', 'users.id')
            ->join('departamentos', 'tickets.departamento', '=', 'departamentos.idDep')
            ->join('asignados', 'tickets.idTk', '=', 'asignados.ticketId')
            ->where('asignados.encargadoId', '=', $user)
            ->where('departamentos.departamento', '=', $departamento->departamento)
            ->where(function($query) use ($filtrar) {
                $query->where('tickets.status', 'like', '%' . $filtrar . '%')
                    ->orWhere('tickets.clasificacion', 'like', '%' . $filtrar . '%')
                    ->orWhere('departamentos.departamento', 'like', '%' . $filtrar . '%')
                    ->orWhere('users.name', 'like', '%' . $filtrar . '%')
                    ->orWhere('tickets.created_at', 'like', '%' . $filtrar . '%');
            })
            ->select('tickets.*', 'users.name as autor_name', 'departamentos.departamento')
            ->get();

        $pdf = \PDF::loadView('auxiliar.reportexdepartamento',compact('filtrar','consultaxDep','user','departamento'));
        $pdf->setPaper('legal', 'landscape');

        $pdfName = $departamento->departamento . '.pdf';
        $zip->addFromString($pdfName, $pdf->output());
    }

    $zip->close();

    // Devolver el archivo ZIP
    return response()->download($zipName)->deleteFileAfterSend(true);
    }


/*
|--------------------------------------------------------------------------
| PDF'S de los ticket x estados y x auxiliar asignado
|--------------------------------------------------------------------------
*/

    public function imprimidor6(Request $request){
        $user = auth()->user()->id;
        $filtrar = $request->get('filtrar');

        // Obtener los estados que tienen tickets asignados al usuario actual
        $estados = DB::table('tickets')
            ->join('asignados', 'tickets.idTk', '=', 'asignados.ticketId')
            ->where('asignados.encargadoId', '=', $user)
            ->select('tickets.status')
            ->distinct()
            ->get();

        // Generar un PDF por cada estado y agregarlo al archivo ZIP
        $zip = new \ZipArchive();
        $zipName = 'ticketsxEstado.zip';
        $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        foreach ($estados as $estado) {
            $consultaxEst = DB::table('tickets')
                ->join('users', 'tickets.autor', '=', 'users.id')
                ->join('departamentos', 'tickets.departamento', '=', 'departamentos.idDep')
                ->join('asignados', 'tickets.idTk', '=', 'asignados.ticketId')
                ->where('asignados.encargadoId', '=', $user)
                ->where('tickets.status', '=', $estado->status)
                ->where(function($query) use ($filtrar) {
                    $query->where('tickets.status', 'like', '%' . $filtrar . '%')
                        ->orWhere('tickets.clasificacion', 'like', '%' . $filtrar . '%')
                        ->orWhere('departamentos.departamento', 'like', '%' . $filtrar . '%')
                        ->orWhere('users.name', 'like', '%' . $filtrar . '%')
                        ->orWhere('tickets.created_at', 'like', '%' . $filtrar . '%');
                })
                ->select('tickets.*', 'users.name as autor_name', 'departamentos.departamento')
                ->get();

            $pdf = \PDF::loadView('auxiliar.reportexestado',compact('filtrar','consultaxEst','user','estado'));
            $pdf->setPaper('legal', 'landscape');

            $pdfName = $estado->status . '.pdf';
            $zip->addFromString($pdfName, $pdf->output());
        }

        $zip->close();

        // Devolver el archivo ZIP
        return response()->download($zipName)->deleteFileAfterSend(true);
    }

}
