<?php


namespace App\Http\Middleware;


use App\common\Auth\JwtAuth;
use App\common\Err\ApiErrDesc;
use App\Exceptions\ApiException;
use App\Http\Response\ResponseJson;
use Closure;

class JwtMiddleware
{
    use ResponseJson;

    /**
     * @param $request
     * @param Closure $next
     * @return false|mixed|string
     */
    public function handle($request, Closure $next)
    {
        $token = $request->input('token');

        if ($token) {
            $jwtAuth = JwtAuth::getInstance();
            $jwtAuth->setToken($token);

            if ($jwtAuth->validate() && $jwtAuth->verify()) {
                return $next($request);
            } else {
                throw new ApiException(ApiErrDesc::ERR_TOKEN);
            }
        } else {
            throw new ApiException(ApiErrDesc::ERR_PARAMS);
        }
    }
}