<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);
        if (Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $email = $request->email;
            Session()->put('email', $email);
            // return Redirect::to('index')
            //     ->with('email', $email);
            return Redirect::to('index');
        }
        return back();
    }

}
