<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CastInFilm extends Model
{
    use HasFactory;
    protected $table = 'cast_in_film';
    protected $fillable = [
        'cast_id',
        'film_id'
    ];
}
