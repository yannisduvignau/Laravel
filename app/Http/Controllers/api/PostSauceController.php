<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Sauce;
use Illuminate\Http\Request;

class PostSauceController extends Controller
{
    //
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'fabricant' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|max:2048', // max:2048 spécifie une limite de taille de fichier de 2 Mo
            'ingredient_principal' => 'required|string',
            'heat' => 'required|numeric|min:0|max:10',
        ]);

        // Enregistrer l'image dans le stockage
        $imagePath = $request->file('image')->store('sauces_images', 'public');

        // Créer une nouvelle instance de Sauce avec les données validées
        $sauce = new Sauce();
        $sauce->userId = auth()->id();
        $sauce->name = $validatedData['nom'];
        $sauce->manufacturer = $validatedData['fabricant'];
        $sauce->description = $validatedData['description'];
        $sauce->imageURL = $imagePath;
        $sauce->mainPepper = $validatedData['ingredient_principal'];
        $sauce->heat = $validatedData['heat'];
        $sauce->likes = 0;
        $sauce->dislikes = 0;
        $sauce->usersLiked = json_encode([]);
        $sauce->usersDisliked = json_encode([]);

        // Sauvegarder la sauce dans la base de données
        $sauce->save();

        // Redirection avec un message de succès
        return redirect('/addSauce')->with('success', 'La sauce a été ajoutée avec succès.');
    }
}
