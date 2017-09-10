<?php

namespace App\Http\Middleware;

use Closure;

class MusbeAdmin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $user = $request->user();
        if ($user && $user->status == 'admin') {
            return $next($request);
        } else {
            return redirect('/front');
        }
        abort(403);
    }

}
