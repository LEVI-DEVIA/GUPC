<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Demande_PermisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('architects.demandepermis');
    }


    public function storeForm(Request $request)
    {

        // Valider les données reçues

        // Section 1
        $natureProjet = $request->natureProjet;
        $listeVisage = $request->listeVisage;
        $class = $request->class;
        // etc

        // Section 2
        $demandeur = $request->demandeur; 
        $adressePostale = $request->adressePostale;
        
        // Stocker dans la session  
        session()->put('section1', [
            'natureProjet' => $natureProjet,
            'listeVisage' => $listeVisage,
            'class' => $class,
        ]);
        
        session()->put('section2', [
            'demandeur' => $demandeur,
            'adressePostale' => $adressePostale, 
            
        ]);

        

    }
// Dans app/Http/Controllers/FormController.php

    public function confirmForm() 
    {
    $section1 = session()->get('section1');
    $natureProjet = $section1['natureProjet'];


    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
