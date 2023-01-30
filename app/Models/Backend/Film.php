<?php

namespace App\Models\Backend;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Film extends Model
{
    use HasFactory;
    protected $table = 'film';
    protected $fillable = [
        'name_film',
        'movie_duration',
        'nation',
        'year_of_manufacture',
        'status',
        'film_content',
        'movie_format',
        'film_style',
        'avatar',
        'language_id',
        'film_company_id',
        'film_style',
        'created_at',
        'year_of_manufacture',
    ];

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'Film_Categories');
    }
    public function cast () {
        return $this->belongsToMany(Cast::class, 'Cast_In_Film');
    }
    public function languages() {
        return $this->hasOne(Language::class, 'name');    
    }
    public function images() {
        return $this->hasOne(Images::class, 'film_id');
    }
    public function film_categories() {
        return $this->hasOne(FilmCategory::class, 'categories_id');
    }
    public function filmCategories() {
        return $this->hasOne(FilmCategory::class, 'film_id');
    }
    public function movie() {
        return $this->hasOne(Movie::class, 'film_id');
    }
}
