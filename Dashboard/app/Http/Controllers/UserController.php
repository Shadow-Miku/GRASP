<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidadorUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use app\Models\User;
use Svg\Tag\Rect;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $filtrar = $request->get('filtrar');

        $consultaUsu = DB::table('users')
        ->where('name', 'like', '%'.$filtrar.'%')
        ->orWhere('username', 'like', '%'.$filtrar.'%')
        ->orWhere('roll', 'like', '%'.$filtrar.'%')
        ->orWhere('email', 'like', '%'.$filtrar.'%')
        ->get();

        $Consulta= DB::table('users')->get();

        return view('admin.adminUsu',compact('consultaUsu','Consulta','filtrar'));
    }

    public function create()
    {
        return view('admin.regUsu');
    }

    public function store(ValidadorUser $request)
    {
        DB::table('users')->insert([
            "name"=> $request->input('name'),
            "email"=> $request->input('email'),
            "username"=> $request->input('username'),
            "password"=> Hash::make($request->input('password')),
            "roll"=> $request->input('roll'),
            "created_at"=> Carbon::now(),
            "updated_at"=> Carbon::now()
        ]);
        return redirect('admin.adminUsu')->with('confirmacion','abc');
    }

    public function show($id)
    {
        $consultaId= DB::table('users')->where('id',$id)->first();
        return view('admin.eliUsu', compact('consultaId'));
    }

    public function edit($id)
    {
        $consultaId= DB::table('users')->where('id',$id)->first();
        return view('admin.actUsu', compact('consultaId'));
    }

    public function update(Request $request, $id)
    {
        DB::table('users')->where('id',$id)->update([
            "name"=> $request->input('name'),
            "email"=> $request->input('email'),
            "username"=> $request->input('username'),
            "password"=> Hash::make($request->input('password')),
            "roll"=> $request->input('roll'),
            "updated_at"=> Carbon::now()
        ]);

        return redirect('admin.adminUsu')->with('actualizar','abc');
    }

    public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();

        return redirect('admin.adminUsu')->with('elimina','abc');
    }

    public function editnameAux()
    {
        $user = auth()->user()->id;
        return view('auxiliar.perfilAux', ['user' => $user]);
    }

    public function updatenameAux(Request $request, $id)
    {
        DB::table('users')->where('id',$id)->update([
            "name"=> $request->input('name'),
            "updated_at"=> Carbon::now()
        ]);
        return redirect('auxiliar.priAux');
    }

    public function editnameCli()
    {
        $user = auth()->user()->id;
        return view('cliente.perfilCli', ['user' => $user]);
    }

    public function updatenameCli(Request $request, $id)
    {
        DB::table('users')->where('id',$id)->update([
            "name"=> $request->input('name'),
            "updated_at"=> Carbon::now()
        ]);
        return redirect('cliente.priCli');
    }
}
