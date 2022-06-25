@extends('layouts.master')

@section('title', 'Home Page')

@section('content')

    {{-- @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

   
    @foreach ($users as $user)
        <div>
            <h3>
                <a href="/users/edit/{{ $user->id }}">{{ $user->name }}</a>
            </h3>
            {{-- {{ $users->created_at->format('M d, Y') }} by Mark --}}
            {{-- {{ $users->created_at->toDateString() }} by Mark --}}
            {{-- {{ $users->created_at->toDateTimeString() }} by Mark --}}
            {{-- {{ $users->created_at->toFormattedDateString() }} by Mark --}}
            {{ $user->created_at->diffForHumans() }} by Mark
            <p>{{ $user->email }}</p>

            @auth
                <div class="d-flex justify-content-end">
                    <a href="/users/edit/{{ $user->id }}" class="btn btn-primary">Edit</a>
                    <form action="/users/{{ $user->id }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure to delete?')">
                        @method('DELETE')
                        {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                        @csrf
                        <button type="submit" class="btn btn-outline-danger ms-2">Delete</button>
                    </form>
                </div>
            @endauth

        </div>
    
        <hr>
    @endforeach
   

@endsection
