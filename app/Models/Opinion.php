<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_opinion',
        'note_site',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
