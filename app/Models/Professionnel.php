<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professionnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'cp',
        "ville",
        'telephone',
        'email',
        'naissance',
        'formation',
        'domaine',
        'observation',
        'metier_id',
        'source',
        'cv'
    ];


    function metier(){
        return $this->belongsTo(Metier::class);
    }


    function competences(){
        return $this->belongsToMany(Competence::class)->withTimestamps();
    }

}
