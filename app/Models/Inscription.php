<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
use HasFactory;

protected $table = 'inscription';

protected $fillable = ['ref_etudiant', 'ref_evenement'];

    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'ref_evenement');
    }



}
