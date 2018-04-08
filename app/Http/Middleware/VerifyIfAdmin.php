<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class VerifyIfAdmin
{
    /**
     * @var Guard
     */
    protected $auth;

    /**
     * @var array
     */
    protected $blacklistedRoles = ['merchant', 'ambassador'];

    /**
     * Creates a new instance of the middleware.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest() || $request->user()->hasRole($this->blacklistedRoles)) {
            abort(403);
        }

        return $next($request);
    }
}
