<?php
namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('Admin.pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('Admin.pages.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.all')->with('success', 'user created successfully');
    }

    public function edit(User $user)
    {
        return view('Admin.pages.user.edit', compact('user'));
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'user updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.all')->with('success', 'user deleted successfully');
    }
}
