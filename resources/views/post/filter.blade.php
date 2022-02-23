@extends('layouts.index')
@section('content')
    <div>
        <a href="{{ route('posts.create') }}">Створити пост</a>
    </div>
    <div><a href="{{ route('category.index') }}">Категорії</a></div>
    <div class="container">
        @foreach($posts as $post)
            <a href="{{ route('posts.show', $post['id']) }}"><div>{{ $post['id'] }}. {{ $post['title'] }}</div></a>
            <div>{{ $post['description'] }}</div>
        @endforeach
    </div>

    <div class="container mt-3">
        {{ $posts->onEachSide(1)->withQueryString()->links() }}
    </div>
@endsection