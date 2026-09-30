<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Tenant;

class InitializeTenantFromUser
{
    public function handle(Request $request, Closure $next): Response
    {
        $tenant = Tenant::find('tbilisi_hills');

        if ($tenant) {
            tenancy()->initialize($tenant);
        }

        return $next($request);
    }
}
