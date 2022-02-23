@extends('layouts.index')
@section('content')
    <div class="container">
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{old('title')}}" type="text" id="title" class="form-control" name="title" placeholder="Title">
                @error('title')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" id="description" class="form-control" name="description" placeholder="Description">{{old('description')}}</textarea>
            </div>
            @error('description')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea type="text" id="content" class="form-control" name="content" placeholder="Content">{{old('content')}}</textarea>
            </div>
            @error('content')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <select class="form-select" name="category_id">
                    @foreach($categories as $category)
                        <option
                                {{old('category_id') == $category['id'] ? 'selected' : ''}}
                                value="{{$category['id']}}">{{ $category['title'] }}</option>
                        @endforeach
                </select>
            </div>

            <div class="mb-3">
                <select class="form-select" multiple aria-label="multiple select example" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                                value="{{$tag['id']}}">{{ $tag['title'] }}</option>
                        @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Створити</button>
        </form>
    </div>
@endsection