<?php

namespace App\Http\Controllers;
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
        // Paginer les sauces avec 4 sauces par page
        $sauces = Sauce::paginate(4);
        
        // Retourner la vue avec les sauces paginées
        return view('home', ['sauces' => $sauces])->with('i', (request()->input('page', 1) - 1) * 4);
    }

    public function show($id){
        $sauce = Sauce::findOrFail($id);
        return view("sauce",[
            'sauce' => $sauce
        ]);
        /* RECUPERER LA SAUCE SELECTIONNE ICI */
    }

}
