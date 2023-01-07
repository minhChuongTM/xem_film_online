<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = "movie";
    protected $fillable = [
        'episodes',
        'resolution',
        'link',
        'film_id',
        'created_at'
    ];
    public function film() {
        return $this->belongsTo(Film::class, 'id');
    }
}
