<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //create
    public function create()
    {
        return view('auth.login');
    }

    //store
    public function store(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if(! $user) {
            //return redirect('login');
            throw ValidationException::withMessages([
                'email' => 'The email is not registerd.'
            ]);
        }

        $credentials = [
            'email' => $user->email,
            'password' => $request->password,
        ];

        if(! Auth::attempt($credentials)) {
            //return redirect('login');
            throw ValidationException::withMessages([
                'email' => 'The email or password is incorrect.'
            ]);
        }


        return redirect('/users');
    }

    //Logout
    public function destroy()
    {
        Auth::logout();

        return redirect('login');
    }
}
