<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){


        //Validación
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Autenticación
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('mensaje', 'No se ha encontrado el usuario');
        }

        return redirect()->route('home');
    }
}
