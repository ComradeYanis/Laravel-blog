<?php


namespace App\Http\Middleware;


use Closure;

/**
 * Class SessionMiddleware
 * @package App\Http\Middleware
 */
class SessionMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        dd($request->session());
        $value = $request->session();

        return $next($request);
    }

}
