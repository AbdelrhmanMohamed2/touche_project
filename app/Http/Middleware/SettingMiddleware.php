<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        view()->share('settings', Setting::get());
        return $next($request);
    }
}
