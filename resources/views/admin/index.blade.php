@extends('default.main')
    @section('content')
        @include('admin.nav')
        @auth
            <p>Hello {{ Auth::user()->name }}!</p>
        @endauth

        @if(Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <div class="container">
            <div class="col-md-12">
                <div class="pull-right">
                <a href="/admin/create"><div class="btn btn-success">Add post</div></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td> {{ $post->id }} </td>
                            <td><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></td>
                            <td><a href="/admin/{{ $post->id }}/edit" class="btn btn-primary">Edit post</a></td>
                            <td>
                                <form action="/admin/{{ $post->id }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger" value="Delete post">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {!! $posts->render() !!}
    @stop