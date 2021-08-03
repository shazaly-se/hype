<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/users')
                        ->withSuccess('Signed in');
        }
  
        return redirect()->back()->withSuccess('Invalid username/password');
    }

    public function registerForm()
    {
        return view('auth.register');
    }
      

    public function postRegister(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
          ]);
         
        return redirect()->back()->withSuccess('successfully register');
    }

    

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
