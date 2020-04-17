<?php

namespace App\Http\Middleware;

use Closure;

class Local
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    protected $languages = ['en', 'fr'];

    public function handle($request, Closure $next)
    {

        if(!session()->has('Local')){
            session()->put('local',$request->getPreferredLanguage($this->languages));
        }
        app()->setLocale(session('Local'));

        return $next($request);
    }
}
