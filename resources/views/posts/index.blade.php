@extends('layouts.master')

@section('title', 'Post List')

@section('content')
<div>

    <section class="row justify-content-end">
            <div class="col-5">
                <form>
                    <div class="input-group mb-3">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search...">
                        <button class="btn btn-outline-secondary" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
    </section>

    @if (count($posts) > 0)
            @foreach ($posts as $post)
                <div>
                    <h3>
                        <a href="/posts/show/{{ $post->id }}">{{ $post->title }}</a>
                    </h3>
                    <i>{{$post->updated_at->diffForHumans()}}</i> by 
                    <b> {{$post->author->name}}</b>
                    <p>{{ $post->body }}</p>

                    <p>{{ $post->name }}</p>



                    @if($post->isOwnPost())
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
                    @endif

                </div>
            
                <hr>
            @endforeach
            {{ $posts->links() }}

    @else
        Post Not Found.
    @endif

</div>

@endsection