<?php

namespace App\Models;

use App\Models\Kind;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_game',
        'image_game',
        'description_game',

    ];

    public function kinds()
    {
        return $this->belongsToMany(Kind::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
