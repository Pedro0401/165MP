<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAdministrator
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
        $user = $request->user();
        if ($user && $user->user_type == 1){
            return $next($request);
        }
        return redirect('/erroradmin');
        //abort(404, 'No Way. You must be an Admin to Add Products.');
        
    }
}
