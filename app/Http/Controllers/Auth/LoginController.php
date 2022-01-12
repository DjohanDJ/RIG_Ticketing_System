<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    public function loginBimay(Request $request)
    {
        $adminList = [
            "at20-1",
            // "dy20-1"
        ];
        $username = $request->username;
        $password = $request->password;
        $base_url = config('global.base_url');
        $url =  $base_url . "Account/LogOn";
        $isStudent = false;
        if (!str_contains($username, "-")) {
            $url =  "$base_url" . "Account/LogOnBinusian";
            $isStudent = true;
        }
        $response = Http::asForm()->post($url, [
            "username" => $username,
            "password" => $password
        ]);
        if ($response->successful() == false) {
            return redirect("login")->withErrors("Invalid Username or Password");
        }
        $name = "";
        $token = "";
        $role = "";
        if ($isStudent == true) {
            $role = "Student";
            $token = $response->json()["Token"]["token"];
            // login as student
            $new_url = $base_url . "Student";
            $newResponse = Http::get($new_url, [
                "nim" => $username
            ]);
            $name = $newResponse->json()["Name"];
            // $name = "Adinata Susanto"

        } else {
            // login as ast
            $role = "Assistant";
            if (in_array($username, $adminList)) {
                $role = "Admin";
            }
            $token = $response->json()["access_token"];
            $new_url = $base_url . "Assistant";
            $newResponse = Http::get($new_url, [
                "initial" => $username,
                "generation" => substr($username, 2)
            ]);

            $name = $newResponse->json()[0]["Name"];
        }

        //put username in session
        $request->session()->put('username', $username);
        // $request->session()->put('username', "2440116486");
        $request->session()->put('role', $role);
        $request->session()->put('token', $token);
        $request->session()->put('name', $name);
        dd($request->session());
    }
}
