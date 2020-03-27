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

    public function days()
    {
        return $this->hasMany(Day::class, 'id_car', 'id');
    }

    public function day()
    {
        return $this->hasOne(Day::class, 'id_car', 'id');
    }

    public function hours()
    {
        return $this->hasMany(Hour::class, 'id_car', 'id');
    }

    public function travel()
    {
        return $this->belongsTo(AdminTravel::class, 'id_travel', 'id');
    }
}
