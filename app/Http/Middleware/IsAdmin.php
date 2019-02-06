<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\HttpException;

class IsAdmin
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
        //Get user from Request
        $user = $request->user();
        //Check if user's Super Admin (is_admin == 1)
        if ($user->is_admin == 1) {
            return $next ($request);
        }

        //Else show Error Message
        else {
            throw new HttpException(403);
            return redirect()->route('home');
        }

    }
}
