<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            // Mettez à jour le chemin de l'image pour l'utilisateur actuel
            // dans votre modèle ou votre base de données
            $user = Auth::user();
            $user->image = $imageName;
            $user->save();

            return redirect()->back()->with('success', 'Image enregistrée avec succès.');
        }

        return redirect()->back()->with('error', "Erreur lors de l'enregistrement de l'image.");
    }
}
