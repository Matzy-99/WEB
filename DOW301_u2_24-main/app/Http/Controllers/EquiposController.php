<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Http\Requests\EquiposRequest;

class EquiposController extends Controller
{
    public function index(){
        $equipos = Equipo::all();
        #$equipos = Equipo::orderBy('id','desc')->get();
        //dd($equipos);
        #return view('equipos.index',['equipos'=>$equipos]);
        return view('equipos.index',compact('equipos'));
    }

    public function store(EquiposRequest $request){
        #dd($request->entrenador);
        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->entrenador = $request->entrenador;
        $equipo->save();
        return redirect()->route('equipos.index');
    }

    public function destroy(Equipo $equipo){
        $equipo->delete();
        return redirect()->route('equipos.index');
    }
}
