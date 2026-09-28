<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function showWelcomePage(): View
    {
        return view('welcome');
    }
}
