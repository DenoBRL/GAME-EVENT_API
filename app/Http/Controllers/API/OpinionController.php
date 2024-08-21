<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opinions = Opinion::with(['user'])->get();

        return response()->json($opinions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content_opinion' => 'required|max:100',
            'note_site' => 'required|max:100',
        ]);

        $opinion = Opinion::create($request->all());

        return response()->json([
            'status' => 'Success',
            'data' => $opinion,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Opinion $opinion)
    {
        return response()->json($opinion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Opinion $opinion)
    {
        $request->validate([
            'content_opinion' => 'required|max:100',
            'note_site' => 'required|max:100',
        ]);

        $opinion->update($request->all());

        return response()->json([
            'status' => 'Mise à jour avec succèss'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Opinion $opinion)
    {
        $opinion->delete();

        return response()->json([
            'status' => 'Supprimer avec succès avec succèss'
        ]);
    }
}
