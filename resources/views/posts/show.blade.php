@extends('layouts.master')

@section('title', 'Post Detail')

@section('content')

        <div class="card">
            <div class="card-body">
                <img src="{{$post->image_path}}" class="card-img-top" alt="...">
                <h3>{{ $post->title }}</h3>
                <i>{{$post->updated_at->diffForHumans()}}</i> by 
                <b> {{$post->author->name}}</b>
                <p>{{ $post->body }}</p>
                <div class="mb-3">
                        <label class="form-label">Categories</label>                 
                        <select class="form-select" name="category[]" multiple>
                            @foreach ($post->categories() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                <a href="/posts" class="btn btn-outline-secondary">Back</a>
                <a href="/posts/edit/{{ $post->id }}" class="btn btn-primary">Edit</a>
            </div>
        </div>

@endsection










 