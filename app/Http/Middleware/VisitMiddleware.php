<?php

namespace App\Http\Middleware;

use App\Models\Theme;
use App\Models\ThemeView;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class VisitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Route::current()->hasParameter('theme')){
            $theme = Route::current()->parameter('theme');
            ThemeView::firstOrCreate([
                'theme_id' => $theme->id,
                'ip' => $request->ip(),
            ]);
        }
        return $next($request);
    }
}
