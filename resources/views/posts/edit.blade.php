@extends('layouts.master')

@section('title', 'Post Edit')

@section('content')

    <div class="container mt-5">

        <div class="card">
            <div class="card-header">
                <h3>User Edit</h3>
            </div>
            <div class="card-body">
                {{-- @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif --}}

                <form action="/posts/update/{{ $post->id }}" method="POST">
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ $post->title }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Body</label>
                        <input class="form-control  @error('body') is-invalid @enderror" name="body" rows="5" value="{{ $post->body }}">
                        @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/posts" class="btn btn-outline-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
