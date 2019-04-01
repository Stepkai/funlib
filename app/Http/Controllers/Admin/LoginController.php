<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('login.loginform');
    }
    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard('web')->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }
    protected function redirectTo()
    {
        return '/admin/home';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);
    }
}