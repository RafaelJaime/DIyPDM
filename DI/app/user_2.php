<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_2 extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'id', 'name', 'surname', 'cicle_id', 'actived', 'email', 'email_verified_at', 'password', 'type', 'num_offer_applied', 'remember_token',
    ];
}
