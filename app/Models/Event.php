<?php

namespace App\Models;

use App\Models\Game;
use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nb_players',
        'place',
        'date_event',
        'hour_event',
        'description_event',
        'address_id',
        'game_id',
        'user_id',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
