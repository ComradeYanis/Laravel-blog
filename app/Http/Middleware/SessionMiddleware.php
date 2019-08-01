<?php


namespace App\Http\Middleware;


use App\Models\Session;
use Closure;
use Illuminate\Http\Request;

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
    public function handle(Request $request, Closure $next, $guard = null)
    {
        $session = $request->session();
        $ip = $request->ip();
        $last_activity = date('Y-m-d H:i:s');
        $user_agent = $request->server('HTTP_USER_AGENT');
        Session::create([
            'user_id'       => $session->getId(),
            'ip_address'    => $ip,
            'last_activity' => $last_activity,
            'user_agent'    => $user_agent
        ]);

        return $next($request);
    }

}
