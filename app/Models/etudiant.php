<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Ajoutez cette ligne

class Etudiant extends Model // Assurez-vous que c'est Model, pas User
{
use HasFactory;

protected $table = 'etudiant';

protected $fillable = [
'domaine_etude',
'ref_user'
];

public function user(): BelongsTo // Assurez-vous que le type de retour est correct
{
return $this->belongsTo(User::class, 'ref_user'); // Spécifiez la clé étrangère si elle n'est pas la convention par défaut
}
}
