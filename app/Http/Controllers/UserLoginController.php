<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function index()
    {
        return view('EndUser.login');
    }

    public function login(Request $request)
    {
        $request->validate(['email' => 'required|email', 'password' => 'required']);

        if(auth()->attempt($request->only(['email', 'password']))){
            return redirect()->route('home.index');
        }else{
            return redirect()->back()->withErrors(['login' =>'wrong credentials']);
        }
    }

    public function create()
    {

        return view('EndUser.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('users.login.page')->with('success', 'account created successfully, please login now.');
    }
}
