<?php

namespace App\Http\Controllers\v1\User;

use App\Car;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Http\Resources\DriverResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index()
    {
        $data = Car::all()->where('status', true);

        return response()->json([
            'status' => true,
            'message' => 'Berhasil',
            'data' => CarResource::collection($data),
        ], 200);
    }
}
