<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(){
        $user = auth()->user();

        return view('viewProfile', compact('user'));
    }

    public function edit(){
        $user = auth()->user();

        return view('editProfile', compact('user'));
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|min:5|max:20|unique:users,username,' . auth()->user()->id,
            'email' => 'required|email:dns|unique:users,email,' . auth()->user()->id,
            'phone_number' => 'required|min:10|max:13',
            'address' => 'required|min:5'
        ]);

        $user = auth()->user();

        User::findOrFail($user->id)->update([
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address
        ]);

        return redirect(route('showProfile'));
    }

    public function editPass(){
        $user = auth()->user();

        return view('editPassword', compact('user'));
    }

    public function updatePass(Request $request){
        $user = auth()->user();

        // dd($user);
        $validatedData = $request->validate([
            'old_password' => 'required|min:5|max:20',
            'new_password' => 'required|min:5|max:20',
        ]);

        if(!Hash::check($request->old_password,  $user->password)){
            return back()->withErrors(['old_password' => 'Password not match']);
        }

        User::findOrFail($user->id)->update([
            'password' => bcrypt($request->new_password),
        ]);

        return redirect(route('showProfile'));
    }
}
