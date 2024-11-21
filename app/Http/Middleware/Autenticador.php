<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            throw new AuthenticationException();
        }
        return $next($request);
    }
}
