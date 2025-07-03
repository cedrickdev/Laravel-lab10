@extends('base')

@section('title', content: $post->title)


@section('content')


        <h1>{{ $post->title }}</h1>
        <article>
            <p>
                {{ $post->content }}
            </p>
        </article>
     

@endsection
