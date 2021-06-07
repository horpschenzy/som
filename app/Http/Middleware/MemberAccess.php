<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\UserTypes;

class MemberAccess
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
        if ((Auth::check() && Auth::user()->access) || $request->routeIs('frontend.payment')) {
            return $next($request);
        } else {
            $region = Auth::user()->member->region;
            switch ($region) {
                case 'NG':
                    return redirect()->route('frontend.payment');
                    break;
                case 'IN':
                    return redirect()->route('frontend.confirmation');
                    break;

                default:
                    return redirect()->route('frontend.payment');
                    break;
            }
        }
    }
}
