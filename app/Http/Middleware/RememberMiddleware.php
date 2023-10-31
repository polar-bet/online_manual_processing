<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
class RememberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->hasCookie('email') && $request->hasCookie('password')) {
            $credentials = [
                'email' => $request->cookie('email'),
                'password' => $request->cookie('password'),
            ];

            if (auth('web')->attempt($credentials)) {
                return redirect()->route('user-office.index');
            }
        }
        return $next($request);
    }
}
