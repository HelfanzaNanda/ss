<?php

namespace App\Http\Controllers\v1\User;

use App\AdminTravel;
use App\Car;
use App\Driver;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Http\Resources\TravelResource;
use App\Travel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        try {
            $cars = Car::where('status', true)->get();
            $results = [];
            foreach ($cars as $car) {
                $results[] = [
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
                ];

                /*$results[] = [
                    'travel' => [
                        'id' => $car->travel->id,
                        'business_name' => $car->travel->business_name,
                        'address' => $car->travel->address,
                        'telephone' => $car->travel->telephone,
                        'cars' => [
                            'id' => $car->id,
                            'to' => $car->to,
                            'logo' => $car->logo_to
                        ]
                    ]
                ];*/
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

private function driver($cars){
    $results= [];
    foreach ($cars as $car) {
        $driver = Driver::where('id_car',$car->id)->first();
        if ($driver) {
          $results[] = [
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
            'driver' => $driver,
            'days' => $this->getDay($car->days),
            'hours' => $this->getHour($car->hours)
            ];  
        } 
    }

    return $results;
}

public function show($to)
    {
        try {
            $cars = Car::where('to', $to)->where('status', true)->get();
            $results = [];
            $filteredCar = [];
            foreach ($cars as $car) {
                if($car->driver){
                    $car['travel'] = [
                        'id' => $car->travel->id,
                        'business_owner' => $car->travel->license_number,
                        'days' => $this->getDay($car->days),
                        'hours' => $this->getHour($car->hours)

                    ];
                    array_push($filteredCar, $car);
                }
            }

            return response()->json([
                'status' => true,
                'message' => 'berhasil',
                'data' => $filteredCar,
            ], 200);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage(),
                'data' => [],
            ], 500);
        }
    }

    private function getDay($days)
    {
        $results = [];
        foreach ($days as $day) {
            $results[] = [
                'id_car' => $day->id_car,
                'day' => $day->day
            ];
        }
        return $results;
    }

    private function getHour($hours)
    {
        $results = [];
        foreach ($hours as $hour) {
            $results[] = [
                'id_car' => $hour->id_car,
                'hour' => $hour->hour
            ];
        }
        return $results;
    }
}
