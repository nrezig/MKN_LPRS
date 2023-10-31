<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;

    protected $table = 'type';

    protected $fillable = ['libelle'];

    protected $attributes = [
        'valide' => false,
        'libelle' => "NUL",

    ];

}