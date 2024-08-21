<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kind;
use Illuminate\Http\Request;

class KindController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kinds = Kind::with(['category'])->get();

        return response()->json($kinds);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_kind' => 'required|max:100',
        ]);

        $kind = Kind::create($request->all());

        // $games = $request->games;
        // $kind->arounds()->attach($games);

        return response()->json([
            'status' => 'Success',
            'data' => $kind,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kind $kind)
    {
        return response()->json($kind);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kind $kind)
    {
        $request->validate([
            'name_kind' => 'required|max:100',
        ]);

        $kind->update($request->all());

        return response()->json([
            'status' => 'Mise à jour avec succèss'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kind $kind)
    {
        $kind->delete();

        return response()->json([
            'status' => 'Supprimer avec succès avec succèss'
        ]);
    }
}
