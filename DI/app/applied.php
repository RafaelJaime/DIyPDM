<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applied extends Model
{
    protected $table = 'applieds';

    protected $fillable = [
        'id', 'user_id', 'offer_id',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function offer() {
        return $this->belongsTo(offer::class, 'offer_id');
    }
}
