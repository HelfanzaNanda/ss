<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    protected $guarded =[];

    public function car()
    {
        return $this->belongsTo(Car::class, 'id_car', 'id');
    }
}
