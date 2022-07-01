@extends('layouts.master')

@section('title', 'Category Create')

@section('content')

    <div class="container mt-5">

        <div class="card">
            <div class="card-header">
                <h3>Category Create</h3>
            </div>
            <div class="card-body">
                {{-- @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif --}}

                <form action="/categories/store" method="POST">
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</Title></label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Create a Category</button>
                        <a href="/categories" class="btn btn-outline-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
