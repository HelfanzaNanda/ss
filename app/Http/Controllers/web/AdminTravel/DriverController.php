<?php

namespace App\Http\Controllers\web\AdminTravel;

use App\Car;
use App\Day;
use App\Driver;
use App\Hour;
use App\Http\Controllers\Controller;
use App\Http\Resources\DayResource;
use App\Http\Resources\DriverResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
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
        $datas = Driver::all()->where('status', '1');
        return view('pages.travel.driver.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Car::all()->where('status', '1');
        return view('pages.travel.driver.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'nik'        => 'required|unique:drivers',
           'number_sim' => 'required|unique:drivers',
           'name'       => 'required',
           'email'      => 'required|unique:drivers',
           'telephone'  => 'required|numeric',
           'address'    => 'required',
           'path_avatar'=> 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $avatar              = $request->file('path_avatar');
        $path_avatar         = time().'-driver'.'.'. $avatar->getClientOriginalExtension();
        $destinationPath    = public_path('uploads/travel/driver');
        $avatar->move($destinationPath, $path_avatar);


        $data               = new Driver();
        $data->nik          = $request->nik;
        $data->number_sim   = $request->number_sim;
        $data->id_car       = $request->id_car;
        $data->name         = $request->name;
        $data->path_avatar  = $path_avatar;
        $data->gender       = $request->gender;
        $data->email        = $request->email;
        $data->password     = bcrypt($request->telephone);
        $data->telephone    = $request->telephone;
        $data->address      = $request->address;
        $data->api_token    = bcrypt($request->email);
        $data->status       = '1';
        $data->save();
        return redirect()->route('driver.index')->with('create', 'Berhasil Menambahkan Data!');

        return response()->json([
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Driver::findOrFail($id);
        $days = Day::all()->where('id_car',  $data->car->id);
        $hours = Hour::all()->where('id_car',  $data->car->id);
        $driver = Driver::all()->where('id_car', '=', $data->car->id);
//        return response()->json([
//            'driver' => $driver,
//            'days' => $days,
//            'hour' => $hour
//        ]);

//        $result[] = [
//
//        ];

//
//            return json_encode($driver);

        return view('pages.travel.driver.show', compact(['data', 'days', 'hours']));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Driver::find($id);
        $cars = Car::all()->where('status', '1');
        return view('pages.travel.driver.edit', compact('data', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'       => 'required',
            'telephone'  => 'required|numeric',
            'address'    => 'required',
            'path_avatar'=> 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $avatar              = $request->file('path_avatar');
        $path_avatar         = time().'-driver'.'.'. $avatar->getClientOriginalExtension();
        $destinationPath    = public_path('uploads/travel/driver');
        $avatar->move($destinationPath, $path_avatar);

        $data               = Driver::findOrFail($id);
        $data->id_car       = $request->id_car;
        $data->name         = $request->name;
        $data->gender       = $request->gender;
        $data->telephone    = $request->telephone;
        $data->address      = $request->address;
        $data->path_avatar  = $request->file('path_avatar') == '' ? $request->old_avatar : $path_avatar;
        $data->update();

//        return response()->json([
//            'data' => $data
//        ], 201);



        return redirect()->route('driver.index')->with('update', 'Berhasil Mengupdate Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Driver::findOrFail($id);
        $data->update(['status' => '0']);
        return redirect()->route('driver.index')->with('delete', 'Berhasil Menghapus Data!');
    }
}
