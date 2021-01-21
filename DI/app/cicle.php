<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cicle extends Model
{
    protected $table = 'cicles';
    protected $fillable = [
        'name', 
    ];
    public function Users(){
        return $this->hasMany(User::class);
    }
}
