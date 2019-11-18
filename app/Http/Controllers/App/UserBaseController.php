<?php


namespace App\Http\Controllers\App;


use App\common\Auth\JwtAuth;
use App\Http\Response\ResponseJson;
use Illuminate\Routing\Controller as BaseController;

class UserBaseController extends BaseController
{
    use ResponseJson;

    public $uid;

    public function __construct()
    {
        $this->uid = JwtAuth::getInstance()->getUid();
    }
}