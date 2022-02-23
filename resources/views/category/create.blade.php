@extends('layouts.index')
@section('content')
    <div class="container">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="title">
            </div>
            <button type="submit" class="btn btn-primary">Створити</button>
        </form>
    </div>
    @endsection