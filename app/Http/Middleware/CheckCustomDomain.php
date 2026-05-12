<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class CheckCustomDomain
{
    public function handle($request, Closure $next)
    {
        $host = $request->getHost();

        // Remove www
        $host = str_replace('www.', '', $host);

        // Main system IP admin domain
        $mainDomains = ['13.61.10.174', 'localhost', '127.0.0.1'];

        // If main IP, skip custom domain handling
        if (in_array($host, $mainDomains)) {
            return $next($request);
        }

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

        // No owner found
        abort(404, 'Website not found for: ' . $host);
    }
}
