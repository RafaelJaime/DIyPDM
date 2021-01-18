<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applied extends Model
{
    protected $table = 'applieds';

    protected $fillable = [
        'id', 'user_id', 'offer_id',
    ];
}
