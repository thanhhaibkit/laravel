<?php

namespace Henry\Permission\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role, $permission = null)
    {
        // Use must has the required role
        if (!$request->user()->hasRole($role)) {
            abort(404);
        }

        // Use must has the required permission
        if ($permission !== null && !$request->user()->can($permission)) {
            abort(404);
        }

        return $next($request);
    }
}
