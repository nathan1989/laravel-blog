@extends('default.main')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif    
    <h1>Welcome to my app</h1>
    @if (!Auth::guest())
    <p>Hello {{ Auth::user()->name }}!</p>
    @endif
@endsection
