<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmCompany extends Model
{
    use HasFactory;
    protected $table = 'film_company';
    public $timeStamp = true;
}
