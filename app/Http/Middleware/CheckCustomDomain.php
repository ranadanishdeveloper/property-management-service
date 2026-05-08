<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class CheckCustomDomain
{
    public function handle($request, Closure $next)
    {
        $host = $request->getHost();

        // FOR LOCAL DEVELOPMENT - Skip localhost
        if ($host === 'localhost' || $host === '127.0.0.1') {
            return $next($request);
        }

        // FOR PRODUCTION - Skip if using IP address (13.61.10.174)
        $serverIp = '13.61.10.174';

        // If visitor is using IP address directly, show main website
        if ($host === $serverIp || filter_var($host, FILTER_VALIDATE_IP)) {
            return $next($request);
        }

        // Check if this is a custom domain (like abc.com)
        $isCustomDomain = !filter_var($host, FILTER_VALIDATE_IP);

        if ($isCustomDomain) {
            // Find owner by custom domain
            $owner = User::where('custom_domain', $host)
                         ->where('custom_domain_enabled', 1)
                         ->where('custom_domain_verified', 1)
                         ->first();

            if ($owner) {
                $request->attributes->set('owner', $owner);
                $request->attributes->set('owner_code', $owner->code);
                return $next($request);
            }
        }

        // If no owner found for this domain, show main app
        return $next($request);
    }
}
