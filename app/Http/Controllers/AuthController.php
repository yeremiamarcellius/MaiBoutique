<?php

namespace App\Http\Controllers;

use App\Models\CartHeader;
use App\Models\TransactionHeader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    //
    public function signinPage(Request $request){
        $auth = json_decode($request->cookie('auth')) ?? null;

        return view('Auth.signin', compact('auth'));
    }

    public function signupPage(){
        return view('Auth.signup');
    }

    public function signup(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|min:5|max:20|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:20',
            'phone_number' => 'required|min:10|max:13',
            'address' => 'required|min:5'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $request->session()->flash('SignUpSuccess', 'Sign Up Successfull');
        User::create($validatedData);
        $user = User::where('username', '=', $request->username)->first();
        CartHeader::create([
            'user_id' => $user->id
        ]);

        return redirect(route('signinPage'));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->rememberme) {
                $minutes = 60 * 24 * 7;
                Cookie::queue('auth', json_encode(['email' => $request->email, 'password' => $request->password]), $minutes);
            }

            return redirect()->intended(route('home'));
        }

        return back()->with('SignInFailed', 'Sign In Failed');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('welcome'));
    }
}
