<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $ids = auth()->user()->followings->pluck('id')->toArray() ; //El método pluck, devuelve únicamente el elemento o elementos que le indiques. En este caso, obtenemos sólo los ids de los usuarios seguidos por el usuario autenticado.
        $posts = Post::whereIn('user_id', $ids)->latest()->get(); //Dentro del modelo Post, buscamos entre los user_id, los ids del array anterior (usuarios seguidos por auth)


        return view('home', [
            'posts' => $posts
        ]);
    }
}
