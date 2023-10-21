<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Faker\Core\File;
use Illuminate\Http\Request;

class PostController extends Controller
{

    //Protegemos la ruta del perfil
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(User $user)
    {

        //Filtramos las publicaciones por usuario y las paginamos
        $posts = Post::where('user_id', $user->id)->latest()->paginate(6);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    //Método que lleva a la vista de create
    public function create()
    {
        return view('posts.create');
    }

    //Método para crear y almacenar las publicaciones
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        // Otra forma de crear registros
        /* $post = new Post;
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->user_id = auth()->user()->id;
        $post->save(); */


        return redirect()->route('posts.index', auth()->user()->username);
    }

    //Método para mostrar cada publicación
    public function show(User $user, Post $post){
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    //Eliminiar publicaciones
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        //Eliminar la imagen

        $imagen_path = public_path('uploads/' . $post->imagen);

        if(file_exists($imagen_path)) {
            unlink($imagen_path);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }

}
