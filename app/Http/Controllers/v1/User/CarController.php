<?php

namespace App\Http\Controllers\v1\User;

use App\AdminTravel;
use App\Car;
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
                ];
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

    public function show($to)
    {
        try {
            $cars = Car::where('to', $to)->where('status', true)->get();
            $results = [];
            foreach ($cars as $car) {
                $results[] = [
                    'travel' => [
                        'id' => $car->travel->id,
                        'business_name' => $car->travel->business_name,
                        'address' => $car->travel->address,
                        'telephone' => $car->travel->telephone,
                        'cars' => [
                            'id' => $car->id,
                            'to' => $car->to,
                            'logo' => $car->logo_to,
                            'driver' => [
                                'id_driver' => $car->driver->id,
                                'name' => $car->driver->name,
                                'avatar' => $car->driver->avatar
                            ],
                            'days' => $this->getDay($car->days),
                            'hours' => $this->getHour($car->hours)
                        ]
                    ]
                ];
            }
            return response()->json([
                'status' => true,
                'message' => 'Berhasil',
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

    private function getDay($days){
        $results = [];
        foreach ($days as $day){
            $results[] = [
                'id_car' => $day->id_car,
                'day' => $day->day
            ];
        }
        return $results;
    }

    private function getHour($hours){
        $results = [];
        foreach ($hours as $hour){
            $results[] = [
                'id_car' => $hour->id_car,
                'hour' => $hour->hour
            ];
        }
        return $results;
    }

    function getData($data)
    {
        $results = [];
        foreach ($data as $d) {
            $travel = Travel::where('id', $d->id_travel)->first();
            $results = [
                'travel' => [
                    'id' => $travel->id,
                    'cars' => [
                        'number_plate' => $d->number_plate,
                        'days' => $d->days,
                        'hours' => $d->hours
                    ]
                ]
            ];
        }

        return $results;
    }
}
