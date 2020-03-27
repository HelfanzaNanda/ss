<?php

namespace App\Http\Controllers\v1\User;

use App\AdminTravel;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\TravelResource;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        $data = AdminTravel::all();
        return TravelResource::collection($data);

        /*return response()->json([
            'data' => $data,
        ], 200);*/
    }
}
