<?php


namespace App\Http\Controllers\App;

use App\common\Auth\JwtAuth;
use App\common\Err\ApiErrDesc;
use App\Exceptions\ApiException;
use App\Http\Response\ResponseJson;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class JwtLoginController extends BaseController
{
    use ResponseJson;

    /**
     * 用户登录
     *
     * @param Request $request
     * @return false|string
     */
    public function login(Request $request)
    {
        // 从客户端获取参数
        $email = $request->input('email');
        $password = $request->input('password');

        //去数据库中查询 用户信息
        $re = User::where('email', $email)->first();
        if (!$re) {
            throw new ApiException(ApiErrDesc::ERR_USER_NOT_EXIST);
        }

        // password_hash()
        $userPasswordHash = $re['password'];
        if (!password_verify($password, $userPasswordHash)) {
            throw new ApiException(ApiErrDesc::ERR_PASSWORD);
        }

        $jwtAuth = JwtAuth::getInstance();
        $token = $jwtAuth->setUid(1)->encode()->getToken();

        return $this->jsonSuccessData([
            'token' => $token,
        ]);
    }
}