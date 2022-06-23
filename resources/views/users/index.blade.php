@extends('layouts.master')

@section('title', 'Home Page')

@section('content')


    @foreach ($users as $user)
        <div>
            <h3>
                <a href="/users/edit/{{ $user->id }}">{{ $user->name }}</a>
            </h3>
            <p>{{ $user->email }}</p>

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

        </div>
    
        <hr>
    @endforeach

@endsection
