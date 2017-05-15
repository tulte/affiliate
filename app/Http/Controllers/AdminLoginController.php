<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Session;


class AdminLoginController extends Controller {

    public function index() {
        return view('admin.login');
    }

    public function login(Request $request) {
        $credentials = ['email' => $request->input('email'), 'password' => $request->input('password')];
        if (Auth::attempt($credentials)) {
            return 'okay';
        }
        return redirect()->route('admin.login')->with('message', 'Login Failed');
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

}
