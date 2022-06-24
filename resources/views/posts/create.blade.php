@extends('layouts.master')

@section('title', 'Post Create')

@section('content')

    <div class="container mt-5">

        <div class="card">
            <div class="card-header">
                <h3>Post Create</h3>
            </div>
            <div class="card-body">
                {{-- @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif --}}

                <form action="/posts/store" method="POST">
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</Title></label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Body</label>
                        <input class="form-control  @error('body') is-invalid @enderror" name="body" rows="5">{{ old('body') }}</input>
                        @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Create a Post</button>
                        <a href="/posts" class="btn btn-outline-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
