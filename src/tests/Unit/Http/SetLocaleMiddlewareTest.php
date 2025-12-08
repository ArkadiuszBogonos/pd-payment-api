<?php

declare(strict_types=1);

namespace Tests\Unit\Http\Middleware;

use App\Http\Middleware\SetLocaleMiddleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

final class SetLocaleMiddlewareTest extends TestCase
{
    private function runMiddleware(Request $request): void
    {
        $middleware = new SetLocaleMiddleware();

        $next = function ($req) {
            return response('OK');
        };

        $middleware->handle($request, Closure::fromCallable($next));
    }

    protected function setUp(): void
    {
        parent::setUp();

        Config::set('app.available_locales', ['pl', 'en']);
        Config::set('app.locale', 'en');
    }

    public function test_sets_locale_from_query_parameter()
    {
        $request = Request::create('/test?lang=pl');

        $this->runMiddleware($request);

        $this->assertEquals('pl', App::getLocale());
    }

    public function test_ignores_invalid_query_parameter()
    {
        $request = Request::create('/test?lang=xx');

        $this->runMiddleware($request);

        $this->assertEquals('en', App::getLocale());
    }

    public function test_sets_locale_from_accept_language_header()
    {
        $request = Request::create('/test');
        $request->headers->set('Accept-Language', 'fr-CH, pl-PL');

        $this->runMiddleware($request);

        $this->assertEquals('pl', App::getLocale());
    }

    public function test_uses_default_locale_if_none_provided()
    {
        $request = Request::create('/test');

        $this->runMiddleware($request);

        $this->assertEquals('en', App::getLocale());
    }
}
