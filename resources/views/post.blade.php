@extends('layouts.index')
@section('content')
    @foreach($posts as $post)
        <div class="container">{{$post['title']}}</div>
    @endforeach
    @endsection



