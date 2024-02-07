<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\AutreInfo;
use App\Models\Demande_Permis;
use App\Models\Document;
use App\Models\InformationDemande;
use App\Models\InformationDemandeur;
use App\Models\InformationProprietaire;
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
        // Section 1
        $nom = $request->input('nom');
        $visa = $request->input('visa');
        $immo = $request->input('immo');
        $type_maison = $request->input('type_maison');
        
        // Section 2
        $demandeur_nom = $request->input('demandeur_nom');
        $demandeur_adresse = $request->input('demandeur_adreseP');
        $demandeur_adresse2 = $request->input('demandeur_adresseE');
        $demandeur_tel = $request->input('Tel');
        $demandeur_type = $request->input('demandeur_type');

        // Section 3
        $nomP = $request->input('nomP');
        $nomG = $request->input('nomG');
        $AdresseG = $request->input('AdresseG');
        $AdresseE = $request->input('AdresseE');
        $telP = $request->input('telP');

        // Section 4
        $num_tf = $request->input('num_tf');
        $section = $request->input('section');
        $lotissement = $request->input('lotissement');
        $ilot = $request->input('ilot');
        $lot = $request->input('lot');
        $nbr_lot = $request->input('nbr_lot');
        $superficie = $request->input('superficie');
        $autre = $request->input('autre');
        $num_acte = $request->input('num_acte');
        $date_acte = $request->input('date_acte');

        // Section 5 - Fichiers
        if ($request->hasFile('documents')) {
            $documents = $request->file('documents');

            foreach ($documents as $document) {
                $name = $document->getClientOriginalName();
                $path = $document->store('uploads');

                // Enregistrer $name et $path en BDD  
            }
        }
        // die(print_r($request->input()));
        // Traitement en base de données
        $demande = Demande_Permis::create([
            'information_sur_la_demande'=> $demandeur_type,
            'information_sur_le_proprietaire'=>  $nomP,
            'document_a_fournir'=>   $path ?? '',
            'utilisateur_id'=> $request->user()->id,
        ]);

        //dd($demande);
        // Section 1
        $informationDemande = new InformationDemande;
        $informationDemande->natureProjet = $request->nom;
        $informationDemande->listeVisage = $request->visa;
        $informationDemande->class = $request->type_maison;
        $informationDemande->operationImmobiliere = $demande->id;
        $informationDemande->demande_id = $demande->id;
        // dd(($informationDemande));
        $informationDemande->save();

        // Section 2
        $informationDemandeur = new InformationDemandeur;
        $informationDemandeur->demandeur = $request->demandeur_nom;
        $informationDemandeur->adressePostale =  $demandeur_adresse;
        $informationDemandeur->tel = $demandeur_tel;
        $informationDemandeur->typeProprietaire = $request->demandeur_type;
        $informationDemandeur->demande_id = $demande->id;
        $informationDemandeur->save();

        // Section 3
        $informationProprietaire = new InformationProprietaire;
        $informationProprietaire->proprietaire = $request->nomP;
        $informationProprietaire->nomGerant = $request->nomG;
        $informationProprietaire->adressePostale = $request->AdresseG;
        $informationProprietaire->adresseElectronique = $request->AdresseE;
        $informationProprietaire->tel = $request->telP;
        $informationProprietaire->demande_id = $demande->id;
        $informationProprietaire->save();

        // Section 4
        $autreInfo = new AutreInfo;
        $autreInfo->numeroTf = $request->num_tf;
        $autreInfo->sectionCadastral = $request->section;
        $autreInfo->lotissement = $request->lotissement;
        $autreInfo->lot = $request->lot;
        $autreInfo->superficie = $request->superficie;
        $autreInfo->autreTitre = $request->autre;
        $autreInfo->numActe = $request->num_acte;
        $autreInfo->dateActe = $request->date_acte;
        $autreInfo->demande_id = $demande->id;
        $autreInfo->save();

        // Section 5 - Fichiers
        if ($request->hasFile('documents')) {
            $documents = $request->file('documents');

            foreach ($documents as $document) {
                $doc = new Document();
                $doc->urlDocuments = $document->store('uploads');
                $doc->demande_id = $demande->id;
                $doc->save();
            }
        }

        return view('architects.paiement');
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
