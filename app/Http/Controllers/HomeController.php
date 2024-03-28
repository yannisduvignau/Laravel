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
        $sauces = Sauce::all();
        return view('home',[
            'sauces'=>$sauces
        ]);
        /* RECUPERER LES SAUCES ICI */
    }

    public function show($id){
        $sauces = Sauce::all();
        return view("sauce",[
            'sauce' => $sauces[$id-1]
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
