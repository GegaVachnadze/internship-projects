<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class RegisterController extends Controller
{
    public function showRegisterPage(): View
    {
        return view('register');
    }
}
