<?php

namespace App\Http\Controllers\web\SuperAdmin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\SuperAdmin;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:superadmin');
    }

    public function showRegisterForm(){
        return view('auth_superadmin.register');
    }

    public function store (Request $request)
    {
        $this->validate($request,[
            'name'      => 'required',
            'email'     => 'required|unique:super_admins|email',
            'password'  => 'required|confirmed'
        ]);

         $data = new SuperAdmin();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        //dd($request->all());
        $data->save();

        return redirect()->route('admin.login');
    }
}
