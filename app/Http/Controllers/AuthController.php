<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('authorize');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        return back()->with('success', __('Authorization successful!'));
    }
}
