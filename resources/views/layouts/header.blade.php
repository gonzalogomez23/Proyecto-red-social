<header>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-secondary py-3" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">
                <h1 class="d-none">Devstagram</h1>
                <img src="{{asset('img/Z-white.png')}}" alt="" class="mx-5" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-lg-5 align-items-center gap-4">
                    @if (auth()->user())
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2 align-items-center" href="{{route('posts.create')}}">
                            <i class="bi bi-plus-square"></i>
                            <span>Crear</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex gap-2 align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset('img/profile-white.svg')}}" alt="" width="24">
                            {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu rounded-0">
                            <li>
                                <a class="dropdown-item" href="{{route('posts.index', auth()->user()->username)}}">Mi perfil</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="p-0">Cerrar sesión</button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link d-flex gap-2 align-items-center" href="/login">
                                <img src="{{asset('img/profile.svg')}}" alt="" width="24">
                                {{ auth()->user()->username }}
                            </a>
                        </li> --}}
                        
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Crear cuenta</a>
                        </li>
                    @endif
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li> --}}
                </ul>
            </div>
        </div>
      </nav>
</header>