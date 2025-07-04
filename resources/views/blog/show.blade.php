@extends('base')

@section('title', content: $post->title)


@section('content')

    <p>
               <a href="{{ route('post.edit', $post) }}" class="btn btn-warning"> Modifier le blog </a>
        </p>

        <h1>{{ $post->title }}</h1>
        <article>
            <p>
                {{ $post->content }}
            </p>
        </article>
     

@endsection
