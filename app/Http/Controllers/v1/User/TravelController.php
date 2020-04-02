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
                        'license_number' => $car->travel->license_number,
                        'business_owner' => $car->travel->business_owner,
                        'address' => $car->travel->address,
                        'telephone' => $car->travel->telephone,
                        'business_name' => $car->travel->business_name,
                        'address' => $car->travel->address,
                        'telephone' => $car->travel->telephone,
                        'cars' => [
                            'id' => $car->id,
                            'plat' => $car->number_plate,
                            'name' => $car->name,
                            'from' => $car->from,
                            'to' => $car->to,
                            'logo' => $car->logo_to,
                            'price' => $car->price,
                            'picture_travel' => $car->picture_travel,
                            'seat' => $car->seat,
                            'facility' => $car->facility,
                            'driver' => [
                                'id' => $car->driver->id,
                                'nik'   => $car->driver->nik,
                                'name' => $car->driver->name,
                                'avatar' => $car->driver->avatar,
                                'address' => $car->driver->address,
                                'telephone' => $car->driver->telephone
                            ],
                            'days' => $this->getDay($car->days),
                            'hours' => $this->getHour($car->hours)
                        ]
                    ];
                }
            }

            return response()->json([
                'status' => true,
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
