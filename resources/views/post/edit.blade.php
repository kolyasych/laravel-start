@extends('layouts.index')
@section('content')
    <div class="container">
        <form action="{{ route('posts.update', $post['id']) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" class="form-control" name="title" placeholder="Title"
                       value="{{$post['title']}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" id="description" class="form-control" name="description"
                          placeholder="Description">{{ $post['description'] }}</textarea>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea type="text" id="content" class="form-control" name="content"
                          placeholder="Content">{{ $post['content'] }}</textarea>
            </div>
            <div class="mb-3">
                <select class="form-select" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category['id']}}"
                        @if($post['category_id'] == $category['id'])
                            {{ 'selected' }}
                                @else {{''}}
                                @endif>
                            <div>
                                {{ $category['title'] }}
                            </div>
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <select class="form-select" multiple aria-label="multiple select example" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                                @foreach($post->tags as $postTag)
                                        {{$postTag['id'] == $tag['id'] ? 'selected' : ''}}
                                        @endforeach

                                value="{{$tag['id']}}">{{ $tag['title'] }}</option>

                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Редагувати</button>
        </form>
    </div>
    <div><a href="{{ route('posts.show', $post['id']) }}">Назад</a></div>
@endsection