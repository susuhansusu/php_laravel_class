@extends('layouts.master')

@section('title', 'Category Edit')

@section('content')

    <div class="container mt-5">

        <div class="card">
            <div class="card-header">
                <h3>Category Edit</h3>
            </div>
            <div class="card-body">
                {{-- @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif --}}

                <form action="/categories/{{ $category->id }}" method="POST">
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $category->name }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/categories" class="btn btn-outline-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
