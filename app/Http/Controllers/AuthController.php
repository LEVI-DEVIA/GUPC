<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function Vulogin()
    {

        return view('auth.login');
    }

    public function Vuregister()
    {

        return view('auth.register');
    }

        public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return redirect()->route('login')->with('error', 'Les informations de connexion sont incorrectes.');
        }

        Auth::login($user);

        return redirect()->intended(route('admin'));
    }

        public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = new User();
        $user->name = $credentials['name'];
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->save(); // marcher ?

        return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès.');
    }


}
