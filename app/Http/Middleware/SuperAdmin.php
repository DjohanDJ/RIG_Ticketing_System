<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        // dd($request->session()->get('role'));
        if (in_array($request->session()->get('role'), explode('&', $roles))) {
            return $next($request);
        } else {
            if ($request->session()->get('role') == 'Admin') {
                return redirect('/admin-home/none/none');
            }
            if ($request->session()->get('role') == 'SuperAdmin') {
                return redirect('/super-admin-home');
            }
            if ($request->session()->get('role') == 'Student') {
                return redirect('/binusian-home');
            }
        }
    }
}
