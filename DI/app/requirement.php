<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requirement extends Model
{
    protected $table = 'requirements';

    protected $fillable = [
        'id', 'description', 'offer_id',
    ];
}
