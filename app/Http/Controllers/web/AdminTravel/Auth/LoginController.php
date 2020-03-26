<?php

namespace App\Http\Controllers\web\AdminTravel\Auth;

use App\AdminTravel;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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

        ];

        if (Auth::guard('travel')->attempt($credential)){
            $user = Auth::guard('travel')->user();
            if ($user->active == '2'){
                return redirect()->intended(route('tdashboard.index'));
            }else{
                return redirect()->back()
                    ->withInput($request->only('email'))
                    ->with('error', 'Mohon Verifikasi Email Dahulu!');
            }
        }
        return redirect()->back()->withInput($request->only('email'))->with('error', 'Salah');
    }

    public function logout()
    {
        Auth::guard('travel')->logout();
        return redirect()->route('travel.login');
    }
}
