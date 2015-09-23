<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            if($this->auth->user()->type == 'pm')
            {
                return redirect('pm/dashboard');
            }
            elseif($this->auth->user()->type == 'suppport')
            {
                return redirect('suppport/dashboard');
            }
            elseif($this->auth->user()->type == 'client')
            {
                return redirect('client/dashboard');
            }
        }
        elseif($this->auth->viaRemember())
        {
            if($this->auth->user()->type == 'pm')
            {
                return redirect('pm/dashboard');
            }
            elseif($this->auth->user()->type == 'suppport')
            {
                return redirect('suppport/dashboard');
            }
            elseif($this->auth->user()->type == 'client')
            {
                return redirect('client/dashboard');
            }
        }

        return $next($request);
    }
}
