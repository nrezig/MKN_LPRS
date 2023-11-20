<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidature extends Model
{
    use HasFactory;

    protected $table = 'candidature';
    protected $fillable = ['ref_etudiant', 'ref_offre'];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'ref_etudiant', 'id');
    }
}
