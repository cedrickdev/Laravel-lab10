@extends('base')

@section('title', 'Acceuil du blog')


@section('content')

    @foreach ($posts as $post)
        <h1>{{ $post->title }}</h1>
        <article>
            <p>
                {{ $post->content }}
            </p>
        </article>
        <p>
            <a href="{{ route('post.show', ['slug' => $post->slug, 'id' => $post->id]) }}" class="btn btn-primary"> Lire la
                suite </a>
        </p>
    @endforeach


    <!-- pagination-->
    {{ $posts->links() }}

@endsection
