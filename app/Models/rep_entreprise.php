<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class rep_entreprise extends User {

    use HasFactory;

    protected $table = 'rep_entreprise';

    protected $fillable = [
        'role',
        'ref_entreprise',
        'ref_user'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, "ref_user" );
    }
    public function entreprise(): HasOne{
        return $this->hasOne(entreprise::class, "ref_rep_entreprise");
    }
}
