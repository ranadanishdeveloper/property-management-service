<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class BlockTenantFromBackend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $host = str_replace('www.', '', $request->getHost());

        $adminDomains = ['127.0.0.1', 'localhost'];

        if (!in_array($host, $adminDomains)) {
            if (in_array($request->path(), [
                'login',
                'register',
                'dashboard',
            ])) {
                abort(404);
            }
        }

        return $next($request);
    }
}
