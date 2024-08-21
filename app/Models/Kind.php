<?php

namespace App\Models;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kind extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_kind',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
