<?php

namespace App\Http\Controllers\web\AdminTravel;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingConfirmedController extends Controller
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

        $datas = Booking::all()
            ->where('id_travel',  Auth::guard('travel')->user()->id)
            ->where('status', '2');
        return view('pages.travel.booking.confirmed.index', compact('datas'));
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
        return redirect()->route('booking-notconfirmed.index')->with('update', 'Berhasil Mengkonfirmasi Pesanan');
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
        return redirect()->route('booking-notconfirmed.index')->with('update', 'Berhasil Menolak Pesanan');
    }
}
