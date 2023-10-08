<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\offrecontroller;

class offre extends Model
{


    use HasFactory;

    protected $table = 'offre';


    protected $fillable = ['titre', 'description', 'etat', 'ref_type'];

    protected $attributes = [
        'etat' => 'à pourvoir',
    ];





}
