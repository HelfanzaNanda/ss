<?php

namespace App\Http\Controllers\web\AdminTravel\Auth;

use App\AdminTravel;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Travel;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function __construct()
    {
        $this->middleware('guest:travel');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function showRegisterForm(){
        return view('auth_travel.register');
    }

    public function store (Request $request)
    {
        $this->validate($request,[
            'license_number'    => 'required|unique:admin_travels',
            'business_owner'    => 'required',
            'business_name'     => 'required',
            'address'           => 'required',
            'email'             => 'required|unique:admin_travels',
            'password'          => 'required|confirmed',
            'telephone'         => 'required',
        ]);

        $a = Travel::all()->where('license_number', '=', $request->license_number)->toArray();
        if ($a){
            $data = new AdminTravel();
            $data->license_number = $request->license_number;
            $data->business_owner = $request->business_owner;
            $data->business_name = $request->business_name;
            $data->type = $request->type;
            $data->address = $request->address;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->telephone = $request->telephone;
            //dd($request->all());
            $data->save();
        }else{
            return redirect()->back()->with('error', 'Silahkan urus license number dahulu');
        }

        return redirect()->route('travel.login')->with('reg', 'Silahkan Menunggu Dikonfirmasi Oleh Developers');
    }
}
