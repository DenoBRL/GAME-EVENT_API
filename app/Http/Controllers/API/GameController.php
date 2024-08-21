<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::with(['kinds'])->get();

        return response()->json($games);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_game' => 'required|max:100',
            'description_game' => 'required|max:100',
        ]);

        $filename = "";
        if ($request->hasFile('image_game')) {
            $filenameWithExt = $request->file('image_game')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_game')->getClientOriginalExtension();
            $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
            $path = $request->file('image_game')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }
        $game = Game::create(array_merge($request->all(), ['image_game' => $filename]));

        $kinds = $request->kinds;
        for ($i = 0; $i < count($kinds); $i++) {
            $game->kinds()->attach($kinds[$i]);
        }


        return response()->json([
            'status' => 'Success',
            'data' => $game,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return response()->json($game);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name_game' => 'required|max:100',
            'description_game' => 'required|max:100',
        ]);

        $game->update($request->all());

        return response()->json([
            'status' => 'Mise à jour avec succèss'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return response()->json([
            'status' => 'Supprimer avec succès avec succèss'
        ]);
    }
}
