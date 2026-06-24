<?php

namespace App\Http\Controllers;

use App\Models\Temoignage;
use Illuminate\Http\Request;

class TemoignageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
         $request->validate([
            'nom' => 'nullable|string|max:255',
            'telephone' => 'nullable|string',
            'email' => 'nullable|email',
            'message' => 'required|string',
        ]);

        Temoignage::create([
            'nom' => $request->nom ?? 'Anonyme',
            'telephone' => $request->telephone,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Temoignage enregistré. Merci ');
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
