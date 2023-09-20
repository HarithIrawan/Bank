<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            return view('Admin.A_index');
        } elseif (Auth::user()->role == 'User') {
            return view('User.U_index');
        } else {
            return view('auth.login');
        }
    }

    public function logout() {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return view('welcome');
    }

    public function homeAdmin() {
        return view('Admin.A_index');
    }

    public function homeUser() {
        return view('User.U_index');
    }
}
