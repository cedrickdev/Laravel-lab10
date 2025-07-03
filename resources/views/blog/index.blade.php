@extends('base')

@section('title', 'Acceuil du blog')


@section('content')

 <p>
               <a href="{{ route('post.create') }}" class="btn btn-warning"> Creer un blog </a>
        </p>

    @foreach ($posts as $post)
        <h1>{{ $post->title }}</h1>
        <article>
            <p>
                {{ $post->content }}
            </p>
        </article>
        <p>
            <a href="{{ route('post.show', ['slug' => $post->slug, 'post' => $post->id]) }}" class="btn btn-primary"> Lire la
                suite </a>
        </p>
    @endforeach


    <!-- pagination-->
    {{ $posts->links() }}

@endsection
