<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class CheckPhone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $redirectToRoute = null)
    {

        if (
            !$request->user() ||
            ($request->user()->phone == null)
        ) {
            return $request->expectsJson()
                ? abort(403, 'Your number is not verified.')
                : Redirect::guest(URL::route($redirectToRoute ?: 'verification.phone'));
        }

        return $next($request);

        // if (auth()->user()->phone != null) {
        //     return $next($request);
        // }
        // return response()->json('Your number phone not verified');
    }
}
