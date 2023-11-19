<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class entreprise extends Model
{
    use HasFactory;

    protected $table = 'entreprise';

    protected $fillable = [
        'nom',
        'adresse',
        'description',
        'ref_user',
        "ref_rep_entreprise"
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rep_entreprise(): BelongsTo{
        return $this->belongsTo(rep_entreprise::class, "ref_entreprise");
    }

}
