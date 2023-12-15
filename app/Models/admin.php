<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class admin extends Model
{
use HasFactory;

protected $fillable = ['ref_user'];

// Si la table 'admin' a un nom différent, vous pouvez le spécifier ici
protected $table = 'admin';

// Relation avec User
public function user()
{
return $this->belongsTo(User::class, 'ref_user');
}
}
