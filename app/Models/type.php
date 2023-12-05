<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;

    protected $table = 'type';

    protected $fillable = ['libelle', 'valide'];

    protected $attributes = [
        'valide' => false,
        'libelle' => "NUL",

    ];


    public function offres()
    {
        return $this->hasMany(Offre::class, 'ref_type');
    }

}
