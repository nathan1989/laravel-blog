@extends('default.main')
    @section('content')
        <h1>{{ $post->title }}</h1>
        <p><strong> {{ $post->published_at->format('jS M Y') }}</strong></p>
        <div>
            {!! nl2br($post->content) !!}
        </div>
    @stop   