<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class RefreshToken extends BaseMiddleware
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
        // 检查此次请求中是否带有 token，如果没有则抛出异常
        $this->checkForToken($request);

        try {
            if ( $this->auth->parseToken()->authenticate() ) {
                return $next($request);
            }
            throw new UnauthorizedException('jwt_auth','未登录');
        }catch (TokenExpiredException $exception){
            try {
                $token = $this->auth->refresh();
                \Auth::guard('api')->onceUsingId($this->auth->manager()->getPayloadFactory()->buildClaimsCollection()->toPlainArray()['sub']);
            }catch (JWTException $exception){
                throw new UnauthorizedHttpException('jwt_auth',$exception->getMessage());
            }
        }

        return $this->setAuthenticationHeader($next($request),$token);
    }

}
