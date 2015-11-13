<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $auth;
    public function __construct(Guard $auth){
        $this->auth=$auth;
    }

    public function handle($request, Closure $next)
    {
        if($this->auth->user()->role!='admin'){
            $this->auth->logout();
            if ($this->auth->guest()) {
                   if ($request->ajax()) {
                        return response('Unauthorized.', 401);
                    } else {
                        return redirect()->to('auth/login');
                    }
            }
        }
        return $next($request);
    }
}
