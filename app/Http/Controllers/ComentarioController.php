<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\User;
use App\Models\Post;

class ComentarioController extends Controller
{
    //Método para crear y almacenar los comentarios
    public function store(Request $request, User $User, Post $post)
    {
        //Validar
        $this->validate($request, [
            'comentario' => 'required|max:255'
        ]);
        
        //Almacenar el resultado
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);

        // Devolver la vista, con un mensaje
        return back()->with('mensaje', 'Comentario realizado correctamente.');

    }
}
