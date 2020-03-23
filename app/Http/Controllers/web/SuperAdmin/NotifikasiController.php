<?php

namespace App\Http\Controllers\web\SuperAdmin;

use App\AdminTravel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
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
        $datas = AdminTravel::all()->where('status', '1');
        return view('pages.admin.notifikasi.index', compact('datas'));
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
        $data = AdminTravel::findOrFail($id);
        $data->update(['status' => '2']);
        return redirect()->route('notifikasi.index')->with('create', 'Berhasil Mengkonfirmasi Travel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AdminTravel::find($id);
        $data->update(['status' => '0']);
        return redirect()->route('notifikasi.index')->with('create', 'Berhasil Tidak Mengkonfirmasi Travel');
    }
}
