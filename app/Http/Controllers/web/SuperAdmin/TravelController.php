<?php

namespace App\Http\Controllers\web\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:superadmin');
    }

    public function index()
    {
        $datas = Travel::all()->where('status', '1');
        return view('pages.admin.travel.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel.create');
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
            'license_number' => 'required|unique:travels|max:11',
            'business_owner' => 'required',
            'business_name' => 'required',
        ]);

        $travel = new Travel();
        $travel->license_number = $request->license_number;
        $travel->business_owner = $request->business_owner;
        $travel->business_name = $request->business_name;
        $travel->save();

        return redirect()->route('travel.index')->with('create', 'Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Travel::find($id);
        return view('pages.admin.travel.edit', compact('data'));
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
            'business_owner' => 'required',
            'business_name' => 'required',
        ]);

        $travel = Travel::find($id);
        $travel->business_owner = $request->business_owner;
        $travel->business_name = $request->business_name;
        $travel->update();

        //dd($request->all());

        return redirect()->route('travel.index')->with('update', 'Berhasil Mengupdate Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Travel::find($id);
        $data->delete();
        //Alert::success('Berhasill Menghapus Data!')->persistent('Confirm');
        return redirect()->route('travel.index')->with('delete', 'Berhasil Menghapus Data!');
    }
}
