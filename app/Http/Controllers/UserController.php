<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest()->paginate(10);


        if ($request->has('search')) {
            $users = User::where('name', 'like', '%' . $request->input('search') . '%')
                ->orWhere('email', 'like', '%' . $request->input('search') . '%')
                ->latest()
                ->paginate(10);
        }


        return view('user', compact('users'));
    }

    public function showModal(User $user)
    {
        return view('user.show-modal', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    ]);

    $user->update($request->all());
    return redirect()->route('users')->with('success', 'User updated successfully.');
}

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
