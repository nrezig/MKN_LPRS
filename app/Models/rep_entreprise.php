<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rep_entreprise extends User {
    use HasFactory;
    protected $fillable = ['role'];
}
