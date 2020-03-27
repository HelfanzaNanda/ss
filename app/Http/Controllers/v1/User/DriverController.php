<?php

namespace App\Http\Controllers\v1\User;

use App\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $data = Driver::all()->where('active', true);

        return ;
    }
}
