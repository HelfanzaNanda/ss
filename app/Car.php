<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public function driver()
    {
        //ini adalah parent, jadi disini akan menggunakan has one
        return $this->hasOne(Driver::class, 'id_car', 'id');
    }

    public function day()
    {
        return $this->hasMany(Day::class, 'id_car', 'id');
    }

    public function hour()
    {
        return $this->hasMany(Hour::class, 'id_car', 'id');
    }
}
