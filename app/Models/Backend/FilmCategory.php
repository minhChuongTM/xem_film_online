<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon;

class FilmCategory extends Model
{
    use HasFactory;
    protected $table = 'film_category';
    protected $fillable = [
        'categories_id',
        'film_id'
    ];
   
}
