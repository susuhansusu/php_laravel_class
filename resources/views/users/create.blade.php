@extends('layouts.master')

@section('title', 'User Create')

@section('content')

    <div class="container mt-5">

        <div class="card">
            <div class="card-header">
                <h3>User Create</h3>
            </div>
            <div class="card-body">
                {{-- @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif --}}

                <form action="/users/store" method="POST">
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control  @error('email') is-invalid @enderror" name="email" rows="5">{{ old('email') }}</input>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" rows="5">{{ old('password') }}</input>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Create a User</button>
                        <a href="/users" class="btn btn-outline-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection