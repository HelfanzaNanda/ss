<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'id_driver', 'id');
    }
}
