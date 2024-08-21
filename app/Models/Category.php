<?php

namespace App\Models;

use App\Models\Kind;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_category',
    ];

    public function kinds()
    {
        return $this->hasMany(Kind::class);
    }
}
