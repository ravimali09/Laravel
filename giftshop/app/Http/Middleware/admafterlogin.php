<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class admafterlogin
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
           
        }
        else
        {
            echo "<script> 
            alert('Please Login First !');
            window.location='/admin_login';
            </script>"; 
        }
        return $next($request);
    }
}
