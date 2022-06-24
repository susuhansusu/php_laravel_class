@extends('layouts.master')

@section('title', 'Post Detail')

@section('content')

<div class="card">
    <div class="card-body">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->body }}</p>
        
        <a href="/posts" class="btn btn-outline-secondary">Back</a>
        <a href="/posts/edit/{{ $post->id }}" class="btn btn-primary">Edit</a>
    </div>
</div>
@endsection










 