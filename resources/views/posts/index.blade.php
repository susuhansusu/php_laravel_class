@extends('layouts.master')

@section('title', 'Post List')

@section('content')

@foreach ($posts as $post)
        <div>
            <h3>
                <a href="/posts/show/{{ $post->id }}">{{ $post->title }}</a>
            </h3>
            <i>{{$post->updated_at}}</i>
            <b> {{$post->name}}</b>
            <p>{{ $post->body }}</p>


            @auth
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
            @endauth

        </div>
    
        <hr>
    @endforeach

    {{ $posts->links() }}

@endsection