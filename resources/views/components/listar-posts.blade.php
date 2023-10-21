
@if($posts->count())
    @foreach ($posts as $post)
        <div class="col-lg-4 mb-4">
            <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user ]) }}" class="text-decoration-none">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="mb-3">{{ $post->user->username }}</h3>
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="" class="w-100 img-home">
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@else
    <p>No hay posts</p>
@endif