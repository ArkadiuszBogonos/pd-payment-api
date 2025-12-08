<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

final readonly class SetLocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $available = config('app.available_locales');
        $default = config('app.locale');

        $lang = null;

        $queryLang = $request->query('lang');
        if ($queryLang && in_array($queryLang, $available, true)) {
            $lang = $queryLang;
        }

        if (!$lang) {
            foreach ($request->getLanguages() as $headerLocale) {
                $short = substr($headerLocale, 0, 2);

                if (in_array($short, $available, true)) {
                    $lang = $short;
                    break;
                }
            }
        }

        $lang = $lang ?: $default;

        app()->setLocale($lang);

        return $next($request);
    }
}
