<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $scoreboard = DB::table('users')->orderBy('elo', 'desc')->get();
        $response = Http::get('http://127.0.0.1:8080/games');
        $games = $response->json();
        return view('profile', ['user' => $user, 'scoreboard' => $scoreboard, 'games' => $games]);
    }

    public function createGame()
    {
        $user = Auth::user();
        $request = Http::post('http://127.0.0.1:8080/create', ['username' => $user->username]);
        $res = $request->json();
        return redirect('/game/' . $res['uuid']);
    }
}
