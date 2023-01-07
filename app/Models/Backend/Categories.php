<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = "categories";
    public $timeStamp = true;

    public function film() {
        return $this->belongsToMany(Film::class, 'Film_Categories');
    }
}
