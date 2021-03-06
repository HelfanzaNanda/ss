<?php

namespace App\Http\Controllers\web\AdminTravel;

use App\Car;
use App\Day;
use App\Driver;
use App\Hour;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Http\Resources\DayResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:travel');
    }

    public function index()
    {
        $datas = Car::all()
            ->where('id_travel', Auth::guard('travel')->user()->id)
            ->where('status', '1');
        return view('pages.travel.car.index', compact('datas'));
//        foreach ($datas as $data) {
//            $result[] = [
//                'id' => $data->id,
//                'plate' => $data->number_plate,
//                'driver-name' => $data->driver->name
//            ];
//        }
//        $datas = Car::find(1);
        //$drivers = Driver::all()->where('status', '1')->toArray();

//        return response()->json([
//            'data' => $result
//        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$drivers = Driver::all()->where('status', '1');
        return view('pages.travel.car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'number_plate' => 'required|unique:cars',
            'name' => 'required',
            'to' => 'required',
            'price' => 'required|numeric',
            'seat' => 'required|numeric',
            'facility' => 'required',
            'day' => 'required',
            'hour' => 'required'
        ]);

        $picture_travel = $request->file('picture_travel');
        $path = time() . '-car' . '.' . $picture_travel->getClientOriginalExtension();
        $destinationPath = public_path('uploads/travel/car');
        $picture_travel->move($destinationPath, $path);

        //dd($logo);

        $logo = ['Bandung', 'Bekasi', 'Bogor', 'Jakarta', 'Jogja', 'Magelang', 'Malang',
            'Semarang', 'Solo', 'Surabaya', 'Tanggerang'];
        $data = new Car();
        for ($i = 0; $i < count($logo); $i++){
            if ($request->to == $logo[$i]){
                $data->id_travel = Auth::guard('travel')->user()->id;
                $data->number_plate = strtoupper($request->number_plate);
                $data->name = $request->name;
                $data->from = 'Tegal';
                $data->to = ucwords($request->to);
                $data->logo_to = $logo[$i].'.jpg';
                $data->price = $request->price;
                $data->seat = $request->seat;
                $data->facility = $request->facility;
                $data->picture_travel = $path;
                $data->status = '1';
            }
        }
        $data->save();

        $hours = $request->hour;
        foreach ($hours as $hour) {
            $itemhours[] = [
                'id_car' => $data->id,
                'hour' => $hour,
            ];
        }
        DB::table('hours')->insert($itemhours);

        $days = $request->day;
        foreach ($days as $day) {
            $itemdays[] = [
                'id_car' => $data->id,
                'day' => $day,

            ];
        }
        DB::table('days')->insert($itemdays);
        return redirect()->route('car.index')->with('create', 'Berhasil menambahkan data!');


        /*return response()->json([
            'data' => $data,
            'hour' => $itemhours,
            'day' => $itemdays,
        ],201);*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Car::findOrFail($id);

//        dd($data->days);
        //$days = (DayResource::collection($data))->groupBy('day');
//        return response()->json([
//            'car' => $data,
//            'days' => $data->days
//        ]);
        //dd($data->days);
        return view('pages.travel.car.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'number_plate' => 'required|unique:cars',
            'name' => 'required',
            'to' => 'required',
            'price' => 'required|numeric',
            'seat' => 'required|numeric',
            'facility' => 'required',
            'day' => 'required',
            'hour' => 'required'
        ]);

        $picture_travel = $request->file('picture_travel');
        $path = time() . '-car' . '.' . $picture_travel->getClientOriginalExtension();
        $destinationPath = public_path('uploads/travel/car');
        $picture_travel->move($destinationPath, $path);

        $data = Car::findOrFail($id);
        $data->id_travel = Auth::guard('travel')->user()->id;
        $data->number_plate = strtoupper($request->number_plate);
        $data->name = $request->name;
        $data->from = 'Tegal';
        $data->to = $request->to;
        $data->price = $request->price;
        $data->seat = $request->seat;
        $data->facility = $request->facility;
        $data->picture_travel = $path;
        $data->status = '1';
        $data->save();

        $hours = $request->hour;
        foreach ($hours as $hour) {
            $itemhours[] = [
                'id_car' => $data->id,
                'hour' => $hour,
            ];
        }
        DB::table('hours')->update($itemhours);

        $days = $request->day;
        foreach ($days as $day) {
            $itemdays[] = [
                'id_car' => $data->id,
                'day' => $day,

            ];
        }
        DB::table('days')->update($itemdays);


        return redirect()->route('car.index')->with('create', 'Berhasil menambahkan data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
