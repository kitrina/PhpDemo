<?php


namespace App\common\Auth;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\ValidationData;

/**
 * 单例 一次请求中所有出现使用jst的地方都是一个用户
 *
 * Class JwtAuth
 * @package App\common\Auth
 */
class JwtAuth
{
    /**
     * jwt token
     * @var
     */
    private $token;

    /**
     * claim iss
     * @var string
     */
    private $iss = 'api.test.com';

    /**
     * claim aud
     * @var string
     */
    private $aud = 'katrina_server_app';

    /**
     * claim uid
     * @var string
     */
    private $uid = '';

    /**
     * secrect
     * @var string
     */
    private $secrect = 'asfwejrljkljkljklj1kl2jlk3j!@';

    /**
     * decode token
     * @var
     */
    private $decodeToken;

    /**
     * 单例模式 jwtAuth句柄
     * @var
     */
    private static $instance;

    /**
     * 获取jwtAuth的句柄
     * @return JwtAuth
     */
    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * 私有化构造函数
     * JwtAuth constructor.
     */
    private function __construct()
    {
    }

    /**
     * 私有化clone函数
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * 获取token
     * @return string
     */
    public function getToken()
    {
        return (string)$this->token;
    }

    /**
     * 设置token
     * @param $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * uid
     * @param $uid
     * @return $this
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * 编码jwt token
     * @return $this
     */
    public function encode()
    {
        $time = time();
        $this->token = (new Builder())->setHeader('alg', 'HS256')
            ->setIssuer($this->iss)
            ->setAudience($this->aud)
            ->setIssuedAt($time)
            ->setExpiration($time + 3600)
            ->set('uid', $this->uid)
            ->sign(new Sha256(), $this->secrect)
            ->getToken();

        return $this;
    }

    /**
     * parse string token
     * @return \Lcobucci\JWT\Token
     */
    public function decode()
    {
        if (!$this->decodeToken) {
            $this->decodeToken = (new Parser())->parse((string)$this->token);
            $this->uid = $this->decodeToken->getClaim('uid');
        }

        return $this->decodeToken;
    }

    /**
     * verify token
     * @return bool
     */
    public function verify()
    {
        $result = $this->decode()->validate(new Sha256(), $this->secrect);
        return $result;
    }

    /**
     * validate
     * @return bool
     */
    public function validate()
    {
        $data = new ValidationData();
        $data->setIssuer($this->iss);
        $data->setAudience($this->aud);

        return $this->decode()->validate($data);
    }
}