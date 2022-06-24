@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="container ">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label
                                class="form-label">Name</label>
                                <input class="form-control  @error('name') is-invalid @enderror" name="name" rows="5">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label
                                class="form-label">Email</label>
                                <input class="form-control  @error('email') is-invalid @enderror" name="email" rows="5">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label
                                class="form-label">Password</label>
                                <input type= "password" class="form-control  @error('password') is-invalid @enderror" name="password" rows="5">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection