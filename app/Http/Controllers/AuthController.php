<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('authorize');
    }

    public function login(LoginRequest $request): RedirectResponse
    {

        $credentials = $request->validated();

        $loginField = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$loginField => $credentials['login'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            return redirect()->intended('/admin-panel')->with('success', __('Authorization successful!'));
        }

        return back()->withErrors([
            'login' => __('admin.the_provided_credentials_do_not_match_our_records.'),
        ])->onlyInput('login');
    }
}
