<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UnoController extends Controller
{
    function index($uuid)
    {
        $req = Http::get('http://127.0.0.1:8080/game/' . $uuid);
        $response = $req->json();
        if(empty($response)) {
            return redirect('/');
        }
        $user = auth()->user();
        return view('game.uno', ['uuid' => $uuid, 'playerUuid' => $user->uuid, 'game' => $response, 'user' => $user]);
    }
}
