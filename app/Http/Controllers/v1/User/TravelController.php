<?php

namespace App\Http\Controllers\v1\User;

use App\AdminTravel;
use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;
use Illuminate\Http\Request;

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

    public function show($to)
    {
        try {
            $cars = Car::where('to', $to)->where('status', true)->get();
            $results = [];
            foreach ($cars as $car) {
                if($car->driver){
                    $results[] = [
                        'id' => $car->travel->id,
                        'business_name' => $car->travel->business_name,
                        'address' => $car->travel->address,
                        'telephone' => $car->travel->telephone,
                        'cars' => [
                            'id' => $car->id,
                            'to' => $car->to,
                            'logo' => $car->logo_to,
                            'driver' => [
                                'id' => $car->driver->id,
                                'name' => $car->driver->name,
                                'avatar' => $car->driver->avatar
                            ],
                            'days' => $this->getDay($car->days),
                            'hours' => $this->getHour($car->hours)
                        ]
                    ];
                }
            }

            return response()->json([
                'status' => false,
                'message' => 'berhasil',
                'data' => $results,
            ], 200);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage(),
                'data' => [],
            ], 500);
        }
    }
}
