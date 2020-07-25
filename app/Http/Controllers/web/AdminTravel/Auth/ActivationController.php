<?php

namespace App\Http\Controllers\web\AdminTravel\Auth;

use App\AdminTravel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
        $user = AdminTravel::where('email', $request->email)->where('activation_token', $request->token)->firstOrFail();
        $user->active = '2';
        $user->activation_token = null;
        $user->update();

        Auth::guard('travel')->loginUsingId($user->id);
        return redirect()->route('tdashboard.index')->with('success', 'Berhasil Aktivasi Email!, Sekarang anda sudah masuk!');
    }
}
