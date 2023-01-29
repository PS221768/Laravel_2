<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return view('user.index', ['items' => User::all()]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        try
        {
            $attr = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed'
            ]);
    
            $user = User::create([
                'name' => $attr['name'],
                'password' => bcrypt($attr['password']),
                'email' => $attr['email']
            ]);

            return view('user.index', ['items' => User::all()]);
        }
        catch(\Exception $e)
        {
            return "error: " . $e->getMessage();
        }

        
    }

    public function show($id)
    {
        return view('user.show', ['user' => User::Find($id)]);
    }

    public function edit($id)
    {
        return view('user.edit', ['user' => User::Find($id)]);
    }

    public function update(Request $request, $id)
    {
        try
        {
            $user = User::findOrFail($id);
            $attr = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email'
            ]);
    
            $user->name = $attr['name'];
            $user->email = $attr['email'];
            $user->save();
    
            return view('user.show', ['user' => $user]);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try
        {
            $user = User::findOrFail($id);
            $user->delete();
            return view('user.index', ['items' => User::all()]);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
