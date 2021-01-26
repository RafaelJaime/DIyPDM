<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'surname', 'cicle_id', 'activate', 'email', 'email_verified_at', 'password', 'type', 'num_offer_applied', 'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function cicle(){
        return $this->belongsTo(cicle::class, 'cicle_id');
    }
    public function Applied(){
        return $this->hasMany(applied::class);
    }
    
}
