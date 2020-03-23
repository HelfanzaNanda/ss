<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $guarded = [];

    public function car()
    {
        // ini adalah child, dimana driver membutuhkan id car
        // jadi child menggunakan belongsTo, dan parent menggunakan hasOne (bisa di lihat di Driver)
        return $this->belongsTo(Car::class, 'id_car', 'id');
    }

    public function booking()
    {
        return $this->hasOne(Booking::class, 'id_driver', 'id');
    }
}
