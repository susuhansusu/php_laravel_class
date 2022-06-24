@extends('layouts.master')

@section('title', 'Post List')

@section('content')

@foreach ($posts as $post)
        <div>
            <h3>
                <a href="/posts/show/{{ $post->id }}">{{ $post->title }}</a>
            </h3>
            <p>{{ $post->body }}</p>

            <div class="d-flex justify-content-end">
                <a href="/posts/edit/{{ $post->id }}" class="btn btn-primary">Edit</a>
                <form action="/posts/{{ $post->id }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure to delete?')">
                    @method('DELETE')
                    {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                    @csrf
                    <button type="submit" class="btn btn-outline-danger ms-2">Delete</button>
                </form>
            </div>

        </div>
    
        <hr>
    @endforeach

@endsection