<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('locale') && in_array(session('locale'), ['ka', 'en'])) {
            App::setLocale(session('locale'));
        } else {
            App::setLocale('en');
        }

        return $next($request);
    }
}
