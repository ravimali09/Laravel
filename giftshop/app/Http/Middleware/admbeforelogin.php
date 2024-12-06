<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class admbeforelogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('admin_id'))
        {
            echo "<script> 
            alert('Already Logged In !');
            window.location='/dashboard';
            </script>"; 
        }
        return $next($request);
    }
}
