<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //create
    public function create()
    {
        return view('auth.login');
    }

    //store
    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(! $user) {
            return redirect('login');
        }

        $credentials = [
            'email' => $user->email,
            'password' => $request->password,
        ];

        if(! Auth::attempt($credentials)) {
            return redirect('login');
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
