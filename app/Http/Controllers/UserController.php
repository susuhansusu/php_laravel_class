<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            $user->password = $request->password;

            $user->created_at = now();
            $user->updated_at = now();
            $user->save();
    
            return redirect('/users');
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
            $user->password = $request->password;
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
