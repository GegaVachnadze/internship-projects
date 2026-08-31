<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('authorize');
    }

    public function login(FormRequest $request): RedirectResponse
    {
        $request->validate([
            'login' => 'required|min:3',
            'password' => 'required',
        ], [
            'login.required' => __('Please enter Username or Email'),
            'login.min' => __('Username must be at least 3 characters'),
            'password.required' => __('Password field is required'),
        ]);

        return back()->with('success', __('Authorization successful!'));
    }
}
