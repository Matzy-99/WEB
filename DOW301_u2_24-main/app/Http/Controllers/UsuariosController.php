<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function login(Request $request){

        //dd($request->only('email','password'));
        $credenciales = $request->only('email','password');
        //if (Auth::attempt(['email' => $email, 'password' => $password]))
        if (Auth::attempt($credenciales)){
            //credenciales correctas
            $usuario = Usuario::where('email',$request->email)->first();
            $usuario->registrarUltimoLogin();
            return redirect()->route('home.index');
        }
        else{
            //redenciales incorrectas
            return back()->withErrors('Credenciales incorrectas');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home.login');
    }
    
}
