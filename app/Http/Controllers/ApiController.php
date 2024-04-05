<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;

class ApiController extends Controller
{
    public function index()
    {
        $sauces = Sauce::all();
        return response()->json($sauces);
    }

    public function create()
    {
        return response()->json(['message' => 'Create a new sauce']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
            'description' => 'required',
            'mainPepper' => 'required',
            'imageUrl' => 'required',
            'heat' => 'required | min:1 | max:10'
        ]);

        $sauce = new Sauce($request->all());
        $sauce->userId = auth()->user()->id;
        $sauce->save();

        return response()->json($sauce, 201);
    }

    public function show($id)
    {
        $sauce = Sauce::findOrFail($id);
        return response()->json($sauce);
    }

    public function edit($id)
    {
        // Il n'est pas nécessaire de créer une vue pour l'édition dans une API
        return response()->json(['message' => 'Edit sauce']);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
            'description' => 'required',
            'mainPepper' => 'required',
            'imageUrl' => 'required',
            'heat' => 'required | min:1 | max:10'
        ]);

        $sauce = Sauce::findOrFail($id);
        $sauce->update($request->all());
        
        return response()->json($sauce, 200);
    }

    public function destroy($id)
    {
        $sauce = Sauce::findOrFail($id);
        $sauce->delete();

        return response()->json(null, 204);
    }
}