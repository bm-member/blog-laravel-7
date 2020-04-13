<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $search = request('search', null);
        $users = User::when($search, function($user) use($search) {
            return $user->where("name", 'like', '%' . $search . '%')
            ->orWhere('id', $search);
        })->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $input = $request->only('name', 'email', 'password');
        $input['password'] = bcrypt($request->password);
        User::create($input);
        return redirect()->route('admin.user.index')->with('success', 'A user was created.');
    }

    public function show()
    {
        return redirect()->route('admin.user.index');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $input = $request->only('name', 'email');
        if($request->filled('password')) {
            $input['password'] = bcrypt($request->password);
        }
        $user->update($input);
        return redirect()->route('admin.user.index')->with('success', 'A user was updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'A user was deleted.');
    }
}
