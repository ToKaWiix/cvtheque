<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    use HasFactory;


    protected $fillable = [
        'intitule', 'description', 'slug',
    ];



    public function professionnels(){
        return $this->hasMany(Professionnel::class);
    }


}
