<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Tickets;
use App\Http\Requests\ValidadorAsignados;


class AsignadoController extends Controller
{
    public function index(Request $request)
    {
        $filtrar = $request->get('filtrar');

        $consultaAsg = DB::table('asignados')
        ->join('users', 'asignados.encargadoId', '=', 'users.id')
        ->join('tickets', 'asignados.ticketId', '=', 'tickets.idTk')
        ->select('asignados.idAsg', 'users.name as encargado', 'tickets.detalles', 'asignados.created_at')
        ->where('users.name', 'like', '%' . $filtrar . '%')
        ->orWhere('asignados.created_at', 'like', '%' . $filtrar . '%')
        ->orWhere('tickets.detalles','like','%'.$filtrar.'%')
        ->get();

        return view('admin.adminAsg',compact('filtrar','consultaAsg'));
    }

    public function create()
    {
        $encargado = User::where('roll','Auxiliar')->get();
        $ticket = tickets::all();
        return view('admin.asigTic',compact('encargado','ticket'));
    }

    public function store(ValidadorAsignados $request)
    {
        $ticketId = $request->input('ticket');

        DB::table('asignados')->insert([
            "encargadoId"=> $request->input('encargado'),
            "ticketId"=> $ticketId,
            "created_at"=> Carbon::now(),
            "updated_at"=> Carbon::now(),
        ]);

        // Actualizar el status del ticket a "Asignado"
        DB::table('tickets')->where('idTk', $ticketId)->update([
            "status"=> 'Asignado',
            "updated_at"=> Carbon::now()
        ]);

        return redirect('admin.adminAsg')->with('confirmacion','abc');
    }

















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
