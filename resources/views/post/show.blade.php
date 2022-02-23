@extends('layouts.index')
@section('content')
    <div class="container">
        <div>{{ $post['title'] }}</div>
        <div>{{ $post['description'] }}</div>
        <div>{{ $post['content'] }}</div>
        @foreach($category as $item)
            <div>{{ $item['title'] }}</div>
            @endforeach
        @foreach($tags as $tag)
            <div>{{$tag['title']}}</div>
            @endforeach
    </div>
    <div><a href="{{route('posts.index')}}">Назад</a></div>
    <div><a href="{{route('posts.edit', $post['id'])}}">Редагувати</a></div>
    <div>
        <form action="{{ route('posts.destroy', $post['id']) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Видалити</button>
        </form>
    </div>
    @endsection