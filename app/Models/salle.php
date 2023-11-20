<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salle extends Model{
    protected $table = 'salle';
    use HasFactory;
    protected $fillable = ['nom', 'capacite', 'disponibilite'];


}
