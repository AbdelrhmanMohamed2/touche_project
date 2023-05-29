<?php
namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('Admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (auth()->attempt($credentials) && auth()->user()->role == 'admin') {
            return redirect()->route('admin.index');
        } else {
            $this->logout();
            return redirect()->back()->withErrors(['login' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->back();
    }
}
