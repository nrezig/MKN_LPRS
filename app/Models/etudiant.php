<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant extends User {
    use HasFactory;
    protected $fillable = ['domaine_etude'];
}
