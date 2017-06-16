<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Site;


class AffiliateSite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $url = ($request->server()['SERVER_NAME']);
        $site = $this->getSite($url);
        if($site !== null) {
            view()->share('site', $site);
            return $next($request);
        }

        return response()->view('errors.404', [], 404);
    }

    private function getSite($url) {
        $entry = Cache::get($url);
        if($entry === null) {
            $entry = Site::findByUrl($url);
            if($entry !== null) {
                $entry->load('topics');
                Cache::put($url, $entry, 1);
            }
        }
        return $entry;
    }
}
