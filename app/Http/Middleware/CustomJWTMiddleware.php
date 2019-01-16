<?php

namespace App\Http\Middleware;

/**
 * Custom JWT Middleware
 *
 * @author Anuj Jaha <er.anujjaha@gmail.com>
 */
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use App\Http\Middleware\BaseJWTMiddleware;
use App\Library\API\BaseAPILibrary;

class CustomJWTMiddleware extends BaseJWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if (! $token = $this->auth->setRequest($request)->getToken()) 
        {
            return BaseAPILibrary::failureResponse([
                'message'   => 'Authentication Token Missing'
            ]);
        }
        try 
        {
            $user = $this->auth->authenticate($token);
        } catch (TokenExpiredException $e) 
        {
            return BaseAPILibrary::failureResponse([
                'message'   => 'Token Expired - Need to Regenerate Token'
            ]);
        } catch (JWTException $e)
        {
            return BaseAPILibrary::validationFailResponse($respond = [
                'success'   => false,
                'message'   => 'Token Expired - Or Invalid Token'
            ]);
        }

        if (! $user)
        {
            return BaseAPILibrary::failureResponse([
                'message'   => 'Opps, User not Found !'
            ]);
        }

        $this->events->fire('tymon.jwt.valid', $user);

        return $next($request);
    }
}