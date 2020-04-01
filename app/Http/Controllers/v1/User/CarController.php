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
            $results = [];
            $cars = Car::where('status', true)->get();
            foreach ($cars as $car){
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
                'message' => $exception,
                'data' => [],
            ], 500);
        }
    }

    public function show($to)
    {
        try {
            $cars = Car::where('to', $to)->where('status', true)->get();
            //$data = DB::table('cars')->select('to')->where('status', true)->get();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil',
                'data' => $this->getData($cars),
                /*'data' => TravelResource::collection($cars),*/
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception,
                /*'data' => $this->getData($data),*/
                'data' => [],
            ], 200);
        }
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
