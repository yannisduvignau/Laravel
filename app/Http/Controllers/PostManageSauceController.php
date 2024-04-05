<?php

namespace App\Http\Controllers;
use App\Models\Sauce;
use Illuminate\Http\Request;

class PostManageSauceController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sauces = Sauce::all();
        return view('manageSauces',[
            'sauces'=>$sauces
        ]);
        /* RECUPERER LES SAUCES ICI */
    }

    // Méthode pour supprimer une sauce
    public function destroy($id)
    {
        // Récupérer la sauce à supprimer
        $sauce = Sauce::findOrFail($id);

        // Supprimer la sauce de la base de données
        $sauce->delete();

        // Rediriger l'utilisateur avec un message de succès
        return redirect()->back()->with('success', 'La sauce a été supprimée avec succès.');
    }

    public function edit($id)
    {
        // Mise à jour de la sauce dans la base de données
        $sauce = Sauce::findOrFail($id);
        return view('edit', compact('sauce'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'manufacturer' => 'required|string',
            'description' => 'required|string',
            'mainPepper' => 'required|string',
            'heat' => 'required|numeric|min:0|max:10',
        ]);

        // Mise à jour de la sauce dans la base de données
        $sauce = Sauce::findOrFail($id);
        $sauce->update($validatedData);

        return redirect()->route('AllSauces.index')->with('success', 'Les informations de la sauce ont été mises à jour avec succès.');
    }

    public function addSauce(){
        return view("addSauce");
    }

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
