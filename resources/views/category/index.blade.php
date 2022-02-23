@extends('layouts.index')
@section('content')
    <div><a href="{{ route('posts.index') }}">Пости</a></div>
    <div><a href="{{ route('category.create') }}">Створити категорію</a></div>
    <div class="container">
        @foreach($categories as $category)
            <div><a href="{{ route('category.show', $category['id']) }}">{{$category['id'].'. '. $category['title']}}</a></div>
            @endforeach
    </div>
    @endsection