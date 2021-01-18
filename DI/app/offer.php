<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    protected $table = 'offer';
    protected $fillable = [
        'headline', 'description','cicle_id', 'date_max', 'num_candidates',
    ];
}
