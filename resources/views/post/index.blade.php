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
        {{ $posts->onEachSide(1)->links() }}
    </div>

    <div class="container mt-3">
        <form action="{{ route('posts.search') }}" method="post">
            @csrf
            <select class="form-select form-select-sm" name="category_id">
                <option value=""> Виберіть категорію</option>
                @foreach($categories as $category)
                    <option value="{{$category['id']}}">
                    {{ $category['title'] }}
                    </option>
                    @endforeach

            </select>

            <input type="text" name="title" value="">
            <button type="submit">Застосувати</button>
        </form>
    </div>
    @endsection