<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $scoreboard = DB::table('users')->orderBy('elo', 'desc')->get();
        return view('profile', ['user' => $user, 'scoreboard' => $scoreboard]);
    }
}
