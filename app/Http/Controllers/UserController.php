<?php

namespace App\Http\Controllers;

use App\User;
// use Illuminate\Http\Request;
use App\Http\Requests\SaveUser;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        // $users = User::latest()->get();
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(SaveUser $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        return redirect()->route('users.index')
            ->with('success','user created successfully');
    }

    public function show(user $user)
    {
        //
    }

    public function edit(user $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update1(SaveUser $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();
        $user->update($input);

        return redirect()->route('users.index')
            ->with('success','user update successfully');
    }

    public function update(SaveUser $request, user $user)
    {
        $input = $request->all();
        if (empty(trim($request->password))) {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
        } else {
            // $input = Arr::except($input, array('password')); 
            $input = $request->except('password');
        }
        $user->update($input);

        return redirect()->route('users.index')
            ->with('success','user update successfully');
    }

    public function destroy1($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
 
        return redirect()->route('users.index')
            ->with('success','user deleted successfully');
    }

    public function destroy(user $user)
    {
        $user->delete();
 
        return redirect()->route('users.index')
            ->with('success','user deleted successfully');
    }
    
}
