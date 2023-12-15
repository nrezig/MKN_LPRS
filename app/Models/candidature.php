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

    public function offre()
    {
        return $this->belongsTo(Offre::class, 'ref_offre'); // Assurez-vous que 'ref_offre' est la clé étrangère correcte
    }
}
