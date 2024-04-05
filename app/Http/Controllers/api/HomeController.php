<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Sauce;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sauces = Sauce::all();
        return view('home',[
            'sauces'=>$sauces
        ]);
        /* RECUPERER LES SAUCES ICI */
    }

    public function show($id){
        $sauce = Sauce::findOrFail($id);
        return view("sauce",[
            'sauce' => $sauce
        ]);
        /* RECUPERER LA SAUCE SELECTIONNE ICI */
    }

    public function addSauce(){
        return view("addSauce");
    }

    public function AllSauces(){
        return view("manageSauces");
    }
}