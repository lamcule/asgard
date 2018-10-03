<?php

namespace Modules\Category\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\Repositories\UserTokenRepository;
use JWTAuth;

class AuthorisedApiTokenAdmin
{
    /**
     * @var UserTokenRepository
     */

    public function handle(Request $request, \Closure $next)
    {
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);

        if ($token === null) {
            return new Response('Token is not null', 403);
        }

        if ($user->hasRoleName('admin') === false) {
            return new Response('User is not admin', 403);
        }

        return $next($request);
    }

}
