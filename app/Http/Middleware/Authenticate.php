<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $host = $request->getHost();

        $mainDomains = [
            '13.61.10.174',
            'localhost',
            '127.0.0.1',
            'your-main-domain.com',
        ];

        if (!in_array(str_replace('www.', '', $host), $mainDomains)) {
            abort(404);
        }

        return route('login');
    }
}
