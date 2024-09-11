<?php

namespace App\Http\Controllers\API;

use App\Models\Game;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with(['address', 'game', 'user'])->paginate();

        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nb_players' => 'required|max:100',
        //     'place' => 'required|max:100',
        //     'date_event' => 'required|max:100',
        //     'hour_event' => 'required|max:100',
        //     'description_event' => 'required|max:100',
        // ]);

        $event = Event::create($request->all());

        return response()->json([
            'status' => 'Success',
            'data' => $event,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $user = User::find($event->user_id);
        $game = Game::find($event->game_id);
        $address = Address::find($event->address_id);

        return response()->json([
            'event' => $event,
            'user' => $user->pseudo,
            'address' => $address,
            'game' => $game->name_game,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'nb_players' => 'required|max:100',
            'place' => 'required|max:100',
            'date_event' => 'required|max:100',
            'hour_event' => 'required|max:100',
            'description_event' => 'required|max:100',
        ]);

        $event->update($request->all());

        return response()->json([
            'status' => 'Mise à jour avec succèss'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json([
            'status' => 'Supprimer avec succès avec succèss'
        ]);
    }
}
