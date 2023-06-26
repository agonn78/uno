<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('profile', ['username' => Auth::user()->username]);
        }
        return view('index');
    }

    public function login(Request $request)
    {
        $cred = $request->only('username', 'password');
        if (Auth::attempt($cred)) {
            DB::table('users')->where('username', $request->username)->update(['updated_at' => now()]);
            return redirect()->route('profile', ['username' => Auth::user()->username]);
        }

        return redirect('/')->withErrors(['password' => 'Nom d\'utilisateur ou mot de passe incorrect.'])
            ->withInput();
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = new \App\Models\User();
        $user->uuid = \Illuminate\Support\Str::uuid();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->username. '@gmail.com';
        $user->save();

        return redirect('/')->with('success', 'Inscription validée ! Vous pouvez vous connecter.');
    }
}
