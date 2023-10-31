<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant extends User {

    use HasFactory;

    protected $table = 'etudiant';

    protected $fillable = [
        'domaine_etude',
        'ref_user'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
