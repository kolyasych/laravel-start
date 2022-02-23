@extends('layouts.index')
@section('content')
    <div><a href="{{ route('category.index') }}">Назад</a></div>
    <div><a href="{{ route('category.edit', $category['id']) }}">Редагувати</a></div>
    <div class="container">
        {{$category['id'].'. ' . $category['title']}}
    </div>
    <div>
        <form action="{{route('category.destroy', $category['id'])}}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Видалити</button>
        </form>
    </div>
    @endsection