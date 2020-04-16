<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        auth()->user()->update($request->only('name', 'email'));
        return redirect()->route('admin.profile.index');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8',
        ]);
        $user = User::findOrFail(auth()->id());
        // Validate old password form db and request
        if(!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors('The old password does not match.');
        }
        if($user->update(['password' => bcrypt($request->new_password)])) {
            return redirect()->route('admin.profile.index')
            ->with('success', 'The password was changed.');
        }
        return redirect()->route('admin.profile.index')
            ->withErrors('The password changing Fail.');
    }
}
