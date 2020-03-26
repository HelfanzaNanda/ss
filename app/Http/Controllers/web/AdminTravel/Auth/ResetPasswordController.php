<?php

namespace App\Http\Controllers\web\AdminTravel\Auth;

use App\AdminTravel;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = 'travel/tdashboard';

    public function __construct()
    {
        $this->middleware('guest:travel');
    }

    public function guard()
    {
        return Auth::guard('travel');
    }

    public function broker()
    {
        return Password::broker('travels');
    }

    public function showResetForm(Request $request, $token  = null)
    {
        return view('auth_travel.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
