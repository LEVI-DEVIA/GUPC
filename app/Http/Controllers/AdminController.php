<?php

namespace App\Http\Controllers;

use App\Models\Demande_Permis;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class AdminController extends Controller
{
        public function index()
    {

        return view('admin.index');
    }

    public function vuDemande()
    {
        $getVu = [];
        $user = Demande_Permis::all();
       
        foreach ($user as $key => $value) {
           array_push($getVu,Utilisateur::all()->where('id',$value->utilisateur_id));
        }
        
        return view('admin.vuDemande',[]);
    }
    public function vuDemandeFetch()
    {
        $getVu = [];
        $user = Demande_Permis::all();
       
        foreach ($user as $key => $value) {
           array_push($getVu,Utilisateur::all()->where('id',$value->utilisateur_id));
        }
        
        return response()->json($getVu);
    }
} 
