@extends('layouts.master')

@section('title', 'Post Detail')

@section('content')
    @foreach ($posts as $post)
        <div class="card">
            <div class="card-body">
                <h3>{{ $post->title }}</h3>
                <i>{{$post->updated_at->diffForHumans()}}</i>
                <b> {{$post->name}}</b>
                <p>{{ $post->body }}</p>
                
                <a href="/posts" class="btn btn-outline-secondary">Back</a>
                <a href="/posts/edit/{{ $post->id }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    @endforeach
@endsection










 