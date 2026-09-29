<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function switch(string $locale): RedirectResponse
    {
        if (in_array($locale, ['en', 'ka'])) {
            Session::put('locale', $locale);
            Session::save();
        }

        return redirect()->back();
    }
}
