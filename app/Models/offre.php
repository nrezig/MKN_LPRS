<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class offre extends Model
{
    use HasFactory;

    protected $table = 'offre'; // Assurez-vous que le nom de la table est correct

    protected $fillable = ['titre', 'description', 'etat', 'ref_type', 'ref_entreprise']; // Ajoutez 'ref_entreprise'

    protected $attributes = [
        'etat' => 'à pourvoir',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'ref_type');
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'ref_entreprise'); // Assurez-vous d'ajuster le modèle Entreprise si nécessaire
    }

    public function rep_entreprise()
    {
        return $this->belongsTo(Rep_entreprise::class, 'ref_entreprise', 'ref_entreprise');
    }

    public function candidatures()
    {
        return $this->hasMany(Candidature::class, 'ref_offre');
    }
}

