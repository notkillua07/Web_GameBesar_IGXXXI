<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    use AuthenticatesUsers;

    public function username()
    {
        return 'username';
    }

    public function index(Request $request)
    {
        return view('login-new');
    }

    // public function redirectTo(){
    //     $this->redirectTo = '/pembelian';
    //     return $this->redirectTo;
    // }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role == "1") {

                return redirect()->intended('pembelian');

            } else if (Auth::user()->role == "4") {

                return redirect()->intended('penjualan');

            } else if (Auth::user()->role == "2") {

                return redirect()->intended('distribusi');
                
            } else if (Auth::user()->role == "3") {

                return redirect()->intended('hutang');
            }
        }

        return back()->with('loginError', 'Login Gagal, kombinasi username dan password salah!');
    }
}
