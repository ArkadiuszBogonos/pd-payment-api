<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

final readonly class SetLocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $lang = $request->query('lang');

        if ($lang && in_array($lang, config('app.available_locales'))) {
            app()->setLocale($lang);
        } else {
            app()->setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
