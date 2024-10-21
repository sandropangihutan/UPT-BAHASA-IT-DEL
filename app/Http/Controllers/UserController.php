<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('pages.users.main', compact('users'));
    }

    public function edit(User $user)
    {
        return view('pages.users.input', ['data' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $user->status = $request->status;
        $user->update();

        return redirect()->route('users.index')->with('success', 'User berhasil diubah');
    }
}
