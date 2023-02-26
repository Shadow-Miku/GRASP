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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $depa = Departamentos::all();
        $autor = User::all();
        $consultaId = DB::table('tickets')->where('idTk',$id)->first();
        return view('admin.ctrTic',compact('consultaId','depa','autor'));
    }

    public function update(Request $request, $id)
    {    
        DB::table('tickets')->where('idTk',$id)->update([
            "respuesta"=> $request->input('respuesta'),
            "observacion"=> $request->input('observacion'),
            "updated_at"=> Carbon::now()
        ]);

        return redirect('admin.adminTic')->with('actualizar','abc');
    }

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
