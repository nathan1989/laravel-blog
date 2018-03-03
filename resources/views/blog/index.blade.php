@extends('layout.main')
    @section('content')
        <h1>{{ config('blog.title') }}</h1>
        <h2>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h2>
        <section>
            @foreach($posts as $post)
            <article>
                <h3><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h3>
                <p><strong> {{ $post->published_at->format('jS M Y') }} at {{ $post->published_at->format('g:ia') }} </strong></p>
                <div>
                    {{ str_limit($post->content) }}
                </div>
            @endforeach
            </article>
        </section>
        {{!! $posts->render() !!}}
    @stop