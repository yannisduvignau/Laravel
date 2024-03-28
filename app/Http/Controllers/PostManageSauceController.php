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
        $sauce = Sauce::findOrFail($id+1);

        // Supprimer la sauce de la base de données
        $sauce->delete();

        // Rediriger l'utilisateur avec un message de succès
        return redirect()->back()->with('success', 'La sauce a été supprimée avec succès.');
    }

    public function edit($id)
    {
        // Mise à jour de la sauce dans la base de données
        $sauce = Sauce::findOrFail($id+1);
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
        $sauce = Sauce::findOrFail($id+1);
        $sauce->update($validatedData);

        return redirect()->route('AllSauces.index')->with('success', 'Les informations de la sauce ont été mises à jour avec succès.');
    }
}
