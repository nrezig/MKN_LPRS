<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evenement extends Model{
    use HasFactory;

    protected $table = 'evenement';

    protected $fillable = ['nom', 'description', 'date', 'heure', 'duree'];
}
