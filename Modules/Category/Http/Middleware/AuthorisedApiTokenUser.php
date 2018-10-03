<?php

namespace Modules\Category\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\Repositories\UserTokenRepository;
use JWTAuth;

class AuthorisedApiTokenUser
{
    /**
     * @var UserTokenRepository
     */

    public function handle(Request $request, \Closure $next)
    {
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);
        // dd($user->getPermissionsInstance()->hasAccess('appointment.appointments.index'));

        if ($token === null) {
            return new Response('Token is not null', 403);
        }

        if ($user->hasRoleName('user') === false) {
            return new Response('you dont have this role', 403);
        }

        return $next($request);
    }

}
