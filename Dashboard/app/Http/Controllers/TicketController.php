<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidadorTickets;
use App\Models\Departamentos;
use App\Models\Asignados;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\User;

class TicketController extends Controller
{

    public function index(Request $request)
    {
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
        return view('admin.adminTic',compact('consultaTic','Consulta','filtrar'));

    }

    public function indexAux(Request $request)
    {
        $filtrar = $request->get('filtrar');

        $consultaTic = DB::table('tickets')
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
        ->select('tickets.*', 'users.name as autor_name', 'departamentos.departamento')
        ->get();

        $Consulta= DB::table('tickets')->get();
        return view('auxiliar.contrTic',compact('consultaTic','Consulta','filtrar'));

    }

    public function indexCli(Request $request){
        $filtrar = $request->get('filtrar');

        $consultaTic = DB::table('tickets')
            ->join('users', 'tickets.autor', '=', 'users.id')
            ->join('departamentos', 'tickets.departamento', '=', 'departamentos.idDep')
            ->where('tickets.autor', '=', auth()->user()->id)
            ->where(function($query) use ($filtrar) {
                $query->where('tickets.status', 'like', '%' . $filtrar . '%')
                    ->orWhere('tickets.clasificacion', 'like', '%' . $filtrar . '%')
                    ->orWhere('departamentos.departamento', 'like', '%' . $filtrar . '%')
                    ->orWhere('users.name', 'like', '%' . $filtrar . '%')
                    ->orWhere('tickets.created_at', 'like', '%' . $filtrar . '%');
            })
            ->select('tickets.*', 'users.name as autor_name', 'departamentos.departamento')
            ->get();

        $Consulta= DB::table('tickets')->get();
        return view('cliente.consTic',compact('consultaTic','Consulta','filtrar'));

    }

    public function create()
    {
        $ConsultaD = departamentos::all();
        return view('cliente.regTic',compact('ConsultaD'));
    }

    public function store(ValidadorTickets $request)
    {
        DB::table('tickets')->insert([
            "autor"=>$request->input('autor'),
            "departamento"=>$request->input('departamento'),
            "clasificacion"=>$request->input('clasificacion'),
            "detalles"=>$request->input('detalles'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);

        return redirect('cliente.consTic')->with('confirmacion','abc');
    }

    public function show($id)
    {
        //
    }



    //edit JEFE
    public function edit($id)
    {
        $depa = Departamentos::all();
        $autor = User::all();
        $consultaId = DB::table('tickets')->where('idTk',$id)->first();
        return view('admin.ctrTic',compact('consultaId','depa','autor'));
    }

    //edit AUXILIAR
    public function editAux($id)
    {
        $consultaId = DB::table('tickets')->where('idTk',$id)->first();
        return view('auxiliar.actEst',compact('consultaId'));
    }

    //update JEFE
    public function update(Request $request, $id)
    {
        DB::table('tickets')->where('idTk',$id)->update([
            "respuesta"=> $request->input('respuesta'),
            "observacion"=> $request->input('observacion'),
            "updated_at"=> Carbon::now()
        ]);

        return redirect('admin.adminTic')->with('actualizar','abc');
    }


    //update Auxiliar
    public function updateAux(Request $request, $id)
    {
        DB::table('tickets')->where('idTk',$id)->update([
            "respuesta"=> $request->input('respuesta'),
            "status"=> $request->input('status'),
            "updated_at"=> Carbon::now()
        ]);

        return redirect('auxiliar.contrTic')->with('actualizar','abc');
    }
    //se usa????
    public function cambiarstatus(Request $request, $id)
    {
        DB::table('tickets')->where('idTk',$id)->update([
            "status"=> $request->input('status'),
            "updated_at"=> Carbon::now()
        ]);

        return redirect('admin.adminTic')->with('actualizar','abc');
    }

    public function destroy($id)
    {
        //
    }
}
