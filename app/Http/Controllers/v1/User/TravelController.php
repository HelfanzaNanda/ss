<?php

namespace App\Http\Controllers\v1\User;

use App\AdminTravel;
use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;
use Illuminate\Http\Request;
use App\Car;

class TravelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = AdminTravel::all();
        //return TravelResource::collection($data);
        return response()->json([
            'status' => true,
            'message' => 'Berhasil',
            'data' => TravelResource::collection($data)
        ], 200);
    }
}
