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

                <form action="/posts/store" method="POST" enctype="multipart/form-data">
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Post Image</label>
                        <input class="form-control @error('image_path') is-invalid @enderror" type="file" name="image_path">
                        @error('image_path')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

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
                    <div class="mb-3">
                        <label class="form-label">Categories</label>                 
                        <select class="form-select" name="category[]" multiple>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
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
