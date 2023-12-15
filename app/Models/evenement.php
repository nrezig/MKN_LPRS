<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evenement extends Model{
    use HasFactory;
    protected $table='evenement';

    protected $fillable = ['id','nom','description','date','heure', 'duree', 'ref_salle', 'ref_admin', 'ref_users'];

    public function salle()
    {
        return $this->belongsTo(salle::class, 'ref_salle');
    }

    public function admin()
    {
        return $this->belongsTo(admin::class, 'ref_admin');
    }



}
