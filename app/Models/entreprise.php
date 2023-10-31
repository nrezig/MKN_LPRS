<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entreprise extends Model
{
    use HasFactory;

    protected $table = 'entreprise';

    protected $fillable = [
        'nom',
        'adresse',
        'description',
        'ref_user'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
