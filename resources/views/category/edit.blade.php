@extends('layouts.index')
@section('content')
    <div><a href="{{route('category.show', $category['id'])}}">Назад</a></div>
    <div><a href="{{ route('category.index') }}">Категорії</a></div>
    <div class="container">
        <form action="{{ route('category.update', $category['id']) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="title" value="{{ $category['title'] }}">
            </div>
            <button type="submit" class="btn btn-primary">Редагувати</button>
        </form>
    </div>
@endsection