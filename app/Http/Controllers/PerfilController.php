<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    //Utilizamos el middleware de auth para hacer que solo un usuario autenticado pueda editar el perfil
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {

        //Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        //Validación
        $this->validate($request, [
            'username' => ['required','unique:users,username,' . auth()->user()->id, 'min:3', 'max:30', 'not_in:twitter,editar-perfil' /* esto evita que se puedan elegir esos nombres */],
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);
            /* $imagenServidor->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            }); */

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        //Guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;

        // Obtener la imagen anterior y eliminarla si existe
        $imagenAnterior = $usuario->imagen;
        if ($imagenAnterior && file_exists(public_path('perfiles') . '/' . $imagenAnterior)) {
            unlink(public_path('perfiles') . '/' . $imagenAnterior);
        }

        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);

    }

}
