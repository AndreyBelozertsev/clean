<?php

namespace App\Http\Middleware;

use Closure;

use Domain\Seo\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SeoMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $seo_information = Cache::rememberForever('seo_' . str($request->getPathInfo())->slug('_'), function () use($request) {
            return Seo::query()->where('url', $request->getPathInfo())->select(['id','url','title','description','open_graph'])->first() ?? false;
        });
        
        view()->share('seo_information', $seo_information);
        
        return $next($request);
    }
}
