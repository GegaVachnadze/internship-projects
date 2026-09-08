<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function switch(string $locale): RedirectResponse
    {
        if (in_array($locale, ['ka', 'en'])) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
}
