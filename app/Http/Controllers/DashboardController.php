<?php

namespace App\Http\Controllers;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    public function index()
    {
        if(Auth::check()){
            return view('dashboard.index');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function users()
    {
        $users= User::all();
        return view('dashboard.users',compact('users'));
    }

  
}
