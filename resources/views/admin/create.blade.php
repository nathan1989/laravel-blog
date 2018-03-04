@extends('default.main')
    @section('content')
        @include('admin.nav')
        <h1>Add a post</h1>
        <form action="/admin" role="form" method="POST">
            <div class="form-group">
                @if(!empty($errors->first('title')))
                    <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                @endif
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            
            <div class="form-group">
                @if(!empty($errors->first('content')))
                    <div class="alert alert-danger">{{ $errors->first('content') }}</div>
                @endif
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control" rows="7"></textarea>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" value="Publish" class="btn btn-default">
        </form>
    @stop