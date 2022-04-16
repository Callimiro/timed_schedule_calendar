<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        // show the form
        return View('auth.login');
    }
    public function login(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],    [
            'email.required' => 'Email is required!',
            'password.required' => 'Password is required!'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                ->withSuccess('Signed in');
        }

        return redirect("login")->with('loginerror', 'Login details are not valid');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function showSignupForm(Request $request)
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        # code...
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
