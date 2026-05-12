<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CheckCustomDomain
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();

        // Remove www
        $host = str_replace('www.', '', $host);

        // Main system domains
        $mainDomains = [
            '13.61.10.174',
            'localhost',
            '127.0.0.1',
            'your-main-domain.com',
        ];

        // If main system domain
        if (in_array($host, $mainDomains)) {
            return $next($request);
        }

        // Find owner
        $user = User::where('custom_domain', $host)
            ->where('custom_domain_enabled', 1)
            ->where('custom_domain_verified', 1)
            ->first();

        // Domain not found
        if (!$user) {
            abort(404, 'Domain not connected');
        }

        // Store tenant globally
        app()->instance('tenant', $user);

        view()->share('tenant', $user);

        return $next($request);
    }
}
