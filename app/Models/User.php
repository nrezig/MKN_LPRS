<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nom', 'prenom', 'email', 'password', 'role', 'valide'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function etudiant(): HasOne{
        return $this->hasOne(etudiant::class, "ref_user");
    }

    public function entreprise(): HasOne{
        return $this->hasOne(entreprise::class, "ref_user");
    }

    public function rep_entreprise(): HasOne{
        return $this->hasOne(rep_entreprise::class, "ref_user");
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'ref_user');
    }
}
