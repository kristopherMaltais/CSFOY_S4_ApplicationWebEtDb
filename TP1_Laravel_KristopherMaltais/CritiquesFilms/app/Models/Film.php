<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'release_year', 'length', 'description', 'rating', 'language_id', 'special_features', 'image'];

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }
}
