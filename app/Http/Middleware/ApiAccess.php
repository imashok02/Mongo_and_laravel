<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use MongoDB;

class ApiAccess
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
        $user = new User;
        $findUser = $user->findOneApi($_REQUEST['api_key']);

     if ($_REQUEST['api_key'] === $findUser->api_key) 
        {
            return $next($request);
        }

        return response()->json('Sorry, Cannot Let you In');
    }
}
