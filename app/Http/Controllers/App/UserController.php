<?php


namespace App\Http\Controllers\App;

use App\common\Auth\JwtAuth;
use App\common\Err\ApiErrDesc;
use App\Exceptions\ApiException;
use App\Http\Response\ResponseJson;
use App\User;

class UserController extends UserBaseController
{
    use ResponseJson;

    /**
     * 获取用户信息
     * @return false|string
     */
    public function info()
    {
        // jwtAuth uid
        // 根据uid查询用户信息

        $jwtAuth = JwtAuth::getInstance();
        $uid = $jwtAuth->getUid();

        $user = User::where('id', $uid)->first();
        if (!$user) {
            throw new ApiException(ApiErrDesc::ERR_USER_NOT_EXIST);
        }

        return $this->jsonSuccessData([
            'name' => $user->name,
            'email' => $user->email,
            'sex' => $user->sex,
        ]);
    }

    public function infoWithCache()
    {
        $cacheUserInfo = Redis::get('uid' . $this->uid);
        if (!$cacheUserInfo) {
            $user = User::where('uid', $this->uid)->first();
            if ($user) {
                throw new ApiException(ApiErrDesc::ERR_USER_NOT_EXIST);
            }

            Redis::setex('uid:' . $this->uid, 3600, json_encode($user->toArray()));
        } else {
            $user = json_decode($cacheUserInfo);
        }

        return $this->jsonSuccessData([
            'name' => $user->name,
            'email' => $user->email,
            'sex' => $user->sex,
        ]);
    }
}