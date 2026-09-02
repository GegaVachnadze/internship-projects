<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class AdminPanelController extends Controller
{
    public function changeLocale(string $locale): RedirectResponse
    {
        if (in_array($locale, ['ka', 'en'])) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
}
