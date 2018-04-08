<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Middleware\GetUserFromToken;

class ValidateUserFromToken extends GetUserFromToken
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
        if (! $token = $this->auth->setRequest($request)->getToken()) {
            return $this->respondWithError('Token not provided', 400);
        }

        try {
            $user = $this->auth->authenticate($token);
        } catch (TokenExpiredException $e) {
            return $this->respondWithError('Token expired', $e->getStatusCode());
        } catch (JWTException $e) {
            return $this->respondWithError('Token invalid', $e->getStatusCode());
        }

        if (! $user) {
            return $this->respondWithError('User not found', 404);
        }

        $this->events->fire('tymon.jwt.valid', $user);

        return $next($request);
    }

    /**
     * @param $message
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    private function respondWithError($message, $statusCode)
    {
        return response()->json([
            'error' => [
                'message' => $message,
                'status_code' => $statusCode
            ]
        ], $statusCode);
    }
}
