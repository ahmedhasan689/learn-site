<?php

namespace App\Http\Middleware;

use Closure;

class Owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // The Owner : Ahmed -> hlhatab@gmail.com
        $user = auth()->user();

        if(strtolower($user->email) == 'hlhatab@gmail.com'){
            return $next($request);
        }
        return abort(404);

    }
}
