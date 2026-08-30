<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('authorize');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'login' => 'required|min:3',
            'password' => 'required',
        ], [
            'login.required' => 'გთხოვთ შეიყვანოთ Username ან Email',
            'login.min' => 'Username უნდა შედგებოდეს მინიმუმ 3 სიმბოლოსგან',
            'password.required' => 'პაროლის ველი სავალდებულოა',
        ]);

        return back()->with('success', 'ავტორიზაცია წარმატებულია!');
    }
}
