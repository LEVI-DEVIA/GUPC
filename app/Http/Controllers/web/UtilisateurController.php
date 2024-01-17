<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $utilisateurs = Utilisateur::all();

        return response()->json($utilisateurs);
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
    public function ajouterUtilisateur(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:utilisateurs',
            'permission' => 'required',
            'password' => 'required',
        ]);
    
        $nouvelUtilisateur = Utilisateur::create([
            'name' => $request->name,
            'email' => $request->email,
            'permission' => $request->permission,
            'password' => $request->password,
        ]);

        return redirect()->intended(route('admin'));
        
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
