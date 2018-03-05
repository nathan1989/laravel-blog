@extends('default.main')
    @section('content')
        @include('admin.nav')
        <h1>Edit {{ $post->title }}</h1>
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <form action="/admin/{{ $post->id }}" role="form" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                @if(!empty($errors->first('title')))
                    <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                @endif
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}">
            </div>
            
            <div class="form-group">
                @if(!empty($errors->first('content')))
                    <div class="alert alert-danger">{{ $errors->first('content') }}</div>
                @endif
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control" rows="7">{{ $post->content }}</textarea>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" value="Publish" class="btn btn-default">
        </form>
    @stop