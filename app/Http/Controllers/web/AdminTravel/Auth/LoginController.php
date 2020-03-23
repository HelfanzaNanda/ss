<?php

namespace App\Http\Controllers\web\AdminTravel\Auth;

use App\AdminTravel;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct()
    {
        $this->middleware('guest:travel')->except('logout');
    }

    public function showLoginForm()
    {
        /*$status = AdminTravel::all()->where('email', '=', 'connext@mail.com')
            ->where('status', '=', '1');

        return response()->json([
            'data' => $status
        ], 201);*/
        return view('auth_travel.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => '2',

        ];

        if (Auth::guard('travel')->attempt($credential, $request->remember)){
            return redirect()->intended(route('tdashboard.index'));
        }
        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->with('error', 'Silahkan Menunggu Konfirmasi dari Admin');
    }

    public function logout()
    {
        Auth::guard('travel')->logout();
        return redirect()->route('travel.login');
    }
}
