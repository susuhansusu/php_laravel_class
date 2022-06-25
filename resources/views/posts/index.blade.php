@extends('layouts.master')

@section('title', 'Post List')

@section('content')

@foreach ($posts as $post)
        <div>
            <h3>
                <a href="/posts/show/{{ $post->id }}">{{ $post->title }}</a>
            </h3>
            {{-- {{ $post->created_at->format('M d, Y') }} by Mark --}}
            {{-- {{ $post->created_at->toDateString() }} by Mark --}}
            {{-- {{ $post->created_at->toDateTimeString() }} by Mark --}}
            {{-- {{ $post->created_at->toFormattedDateString() }} by Mark --}}
            <i>{{ $post->created_at->diffForHumans() }}</i> by 
            <b> 
                @php
                            $userId = $post->user_id;
                            $user = \App\Models\User::find($userId);
                            echo $user->name;
                @endphp
            </b>
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

    {{$posts->links()}}

@endsection