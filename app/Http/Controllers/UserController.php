<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{

    public function index()
        {
            $users = User::all();
            return view('users.index', compact('users'));
        }

    public function create()
        {
            return view('users.create');
        }

    //
    public function store(UserRequest $request)
        {
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $user->created_at = now();
            $user->updated_at = now();
            $user->save();
    
            //return redirect('/');
            return redirect('/users')->with('success', 'A User was created successfully.');
        }


    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',compact('user'));

    }

    public function update(UserRequest $request,$id)
        {
   
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->updated_at = now();
            $user->save();

            return redirect('/users');

        }
    public function delete($id)
        {

            User::destroy($id);

            return redirect('/users');

        }
}
