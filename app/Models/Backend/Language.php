<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table = 'language';
    public $timeStamp = true;

    // public function filmLanguage() {
    //     return $this->hasOne(Film::class, 'language_id');
    // }

    // public function languageTable() {
    //     return $this->morphTo();
    // }
}
