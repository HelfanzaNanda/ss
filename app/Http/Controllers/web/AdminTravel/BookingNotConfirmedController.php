<?php

namespace App\Http\Controllers\web\AdminTravel;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingNotConfirmedController extends Controller
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
        $datas = Booking::all()->whereIn('status',['1', '0']);
        return view('pages.travel.booking.notconfirmed.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Booking::findOrFail($id);
        return view('pages.travel.booking.notconfirmed.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = Booking::findOrFail($id);
        $data->update(['status' => '2']);
        return redirect()->route('booking-notconfirmed.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Booking::findOrFail($id);
        $data->update(['status' => '0']);
        return redirect()->route('booking-notconfirmed.index');
    }
}
