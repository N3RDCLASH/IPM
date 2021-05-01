<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function username()
    {
        return 'user_naam';
    }
    public function pinLogin(Request $request)
    {
        if ($request->pincode !== null) {
            $user = User::where("pincode", $request->pincode)->first();
            ($user ? Auth::login($user) : false);
            return (Auth::check() ? json_encode(["login_success" => true]) : json_encode(["login_success" => false]));
        }
        return json_encode(["login_success" => false, "message" => "invalid request body"]);
    }

    public function qrLogin(Request $request)
    {
        if ($request->qrcode !== null) {

            $user = User::where("QRpassword", $request->qrcode)->firstorfail();
            ($user ? Auth::login($user) : false);
            return (Auth::check() ? json_encode(["login_success" => true]) : json_encode(["login_success" => false]));
        }
        return json_encode(["login_success" => false, "message" => "invalid request body"]);
    }
}
