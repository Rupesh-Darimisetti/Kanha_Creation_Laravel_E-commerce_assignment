<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            if(Auth::user()->user_type === 'admin') {
                return view('admin.dashboard');
            }
            return view('dashboard');
        }
        return view('dashboard');
    }
}
