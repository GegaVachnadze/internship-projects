<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }

        $host = $request->getHost();

        if (str_ends_with($host, '.localhost')) {
            $tenant = str_replace('.localhost', '', $host);

            if ($tenant !== '') {
                URL::defaults([
                    'tenant' => $tenant,
                ]);
            }
        }

        return $next($request);
    }
}