<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LogoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        Session::flush();
        session()->regenerate();
        return redirect('login');
        // Auth::guard()->logout();
        // Session::flush();
        // session()->regenerate();
        // return redirect('login');
    }

}
