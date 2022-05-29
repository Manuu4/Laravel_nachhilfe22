<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
Use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'firstname', 'lastname', 'studies', 'helper', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Ein Nachhilfegeber macht mehrere Nachhilfeangebote
    public function lessons() : HasMany {
        return $this->hasMany(Lesson::class);
    }

    //Ein Nachhilfenehmer kann mehrere Vorschläge machen
    public function proposal() : HasMany {
        return $this->hasMany(Proposal::class);
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();

    }

    public function getJWTCustomClaims()
    {
        return ['user' => ['id' => $this->id, 'helper' => $this->helper]];
    }
}
